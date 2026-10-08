<?php

namespace App\Controllers\Dinas;

use App\Controllers\BaseController;

use App\Models\ModelShu;

class Laporan extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function kas($id_bumdes)
    {
        $bumdes = $this->db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-m-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');

        $transaksi = $this->db->query("
            SELECT t.*, k.nama_kategori as kategori
            FROM tbl_transaksi t
            LEFT JOIN tbl_kategori_transaksi k ON k.nama_kategori = t.kategori AND (k.id_unit IS NULL OR k.id_unit = 0)
            WHERE t.id_bumdes = ? AND t.tanggal BETWEEN ? AND ?
            ORDER BY t.tanggal ASC, t.id_transaksi ASC
        ", [$id_bumdes, $tgl_awal, $tgl_akhir])->getResultArray();

        $data = [
            'judul' => 'Buku Kas',
            'subjudul' => 'Laporan Buku Kas - ' . $bumdes['nama_bumdes'],
            'menu' => 'laporan',
            'page' => 'desa/v_laporan_kas',
            'bumdes' => $bumdes,
            'transaksi' => $transaksi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('pages/v_template_monitor', $data);
    }

    public function labaRugi($id_bumdes)
    {
        $bumdes = $this->db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-01-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');

        $pendapatan = $this->db->query("
            SELECT k.nama_kategori as kategori, SUM(t.nominal) as total
            FROM tbl_transaksi t
            LEFT JOIN tbl_kategori_transaksi k ON k.nama_kategori = t.kategori AND (k.id_unit IS NULL OR k.id_unit = 0)
            WHERE t.id_bumdes = ? AND t.tanggal BETWEEN ? AND ? AND t.tipe = 'pemasukan'
            GROUP BY k.nama_kategori
            ORDER BY total DESC
        ", [$id_bumdes, $tgl_awal, $tgl_akhir])->getResultArray();

        $beban = $this->db->query("
            SELECT k.nama_kategori as kategori, SUM(t.nominal) as total
            FROM tbl_transaksi t
            LEFT JOIN tbl_kategori_transaksi k ON k.nama_kategori = t.kategori AND (k.id_unit IS NULL OR k.id_unit = 0)
            WHERE t.id_bumdes = ? AND t.tanggal BETWEEN ? AND ? AND t.tipe = 'pengeluaran'
            GROUP BY k.nama_kategori
            ORDER BY total DESC
        ", [$id_bumdes, $tgl_awal, $tgl_akhir])->getResultArray();

        $total_pendapatan = array_sum(array_column($pendapatan, 'total'));
        $total_beban = array_sum(array_column($beban, 'total'));
        $laba_bersih = $total_pendapatan - $total_beban;

        $data = [
            'judul' => 'Laba Rugi',
            'subjudul' => 'Laporan Laba Rugi - ' . $bumdes['nama_bumdes'],
            'menu' => 'laporan',
            'page' => 'desa/v_laporan_labarugi',
            'bumdes' => $bumdes,
            'pendapatan' => $pendapatan,
            'beban' => $beban,
            'total_pendapatan' => $total_pendapatan,
            'total_beban' => $total_beban,
            'laba_bersih' => $laba_bersih,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('pages/v_template_monitor', $data);
    }

    public function neraca($id_bumdes)
    {
        $bumdes = $this->db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();

        $tgl_sampai = $this->request->getGet('tgl_sampai') ?? date('Y-m-d');

        $kas = $this->db->query("
            SELECT COALESCE(SUM(CASE WHEN tipe IN ('pemasukan','modal') THEN nominal ELSE 0 END), 0) -
                   COALESCE(SUM(CASE WHEN tipe = 'pengeluaran' THEN nominal ELSE 0 END), 0) as saldo
            FROM tbl_transaksi
            WHERE id_bumdes = ? AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['saldo'] ?? 0;

        $persediaan = $this->db->table('tbl_produk')
            ->select('COALESCE(SUM(harga * stok), 0) as total')
            ->where('id_bumdes', $id_bumdes)
            ->get()->getRowArray()['total'] ?? 0;

        $total_modal = $this->db->query("
            SELECT COALESCE(SUM(nominal), 0) as total
            FROM tbl_transaksi
            WHERE id_bumdes = ? AND tipe = 'modal' AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['total'] ?? 0;

        $laba = $this->db->query("
            SELECT COALESCE(SUM(CASE WHEN tipe = 'pemasukan' THEN nominal ELSE 0 END), 0) -
                   COALESCE(SUM(CASE WHEN tipe = 'pengeluaran' THEN nominal ELSE 0 END), 0) as laba
            FROM tbl_transaksi
            WHERE id_bumdes = ? AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['laba'] ?? 0;

        $total_aktiva = $kas + $persediaan;
        $total_pasiva = $total_modal + $laba;

        $data = [
            'judul' => 'Neraca',
            'subjudul' => 'Neraca Keuangan - ' . $bumdes['nama_bumdes'],
            'menu' => 'laporan',
            'page' => 'desa/v_laporan_neraca',
            'bumdes' => $bumdes,
            'kas' => $kas,
            'persediaan' => $persediaan,
            'total_modal' => $total_modal,
            'laba' => $laba,
            'total_aktiva' => $total_aktiva,
            'total_pasiva' => $total_pasiva,
            'tgl_sampai' => $tgl_sampai,
        ];
        return view('pages/v_template_monitor', $data);
    }

    public function shu($id_bumdes)
    {
        $bumdes = $this->db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-01-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');

        $per_unit = $this->db->query("
            SELECT COALESCE(u.nama_unit, 'Tanpa Unit') as nama_unit,
                   COALESCE(SUM(CASE WHEN t.tipe = 'pemasukan' THEN t.nominal ELSE 0 END), 0) as pemasukan,
                   COALESCE(SUM(CASE WHEN t.tipe = 'pengeluaran' THEN t.nominal ELSE 0 END), 0) as pengeluaran
            FROM tbl_transaksi t
            LEFT JOIN tbl_unit_usaha u ON u.id_unit = t.id_unit
            WHERE t.id_bumdes = ? AND t.tanggal BETWEEN ? AND ?
            GROUP BY u.nama_unit
            ORDER BY pemasukan DESC
        ", [$id_bumdes, $tgl_awal, $tgl_akhir])->getResultArray();

        $total_pemasukan = 0;
        $total_pengeluaran = 0;
        foreach ($per_unit as &$pu) {
            $pu['shu'] = $pu['pemasukan'] - $pu['pengeluaran'];
            $total_pemasukan += $pu['pemasukan'];
            $total_pengeluaran += $pu['pengeluaran'];
        }
        unset($pu);

        $total_shu = $total_pemasukan - $total_pengeluaran;
        $settings = (new ModelShu())->getBumdesSettings($id_bumdes);

        $alokasi = [];
        foreach ($settings as $s) {
            if ($s['aktif'] !== 1) {
                continue;
            }
            $alokasi[] = [
                'nama_alokasi' => $s['nama_alokasi'],
                'persentase' => $s['persentase'],
                'nilai' => $total_shu * ($s['persentase'] / 100),
            ];
        }

        $data = [
            'judul' => 'Laporan SHU',
            'subjudul' => 'Sisa Hasil Usaha & Alokasi - ' . $bumdes['nama_bumdes'],
            'menu' => 'laporan',
            'page' => 'desa/v_laporan_shu',
            'bumdes' => $bumdes,
            'per_unit' => $per_unit,
            'total_pemasukan' => $total_pemasukan,
            'total_pengeluaran' => $total_pengeluaran,
            'total_shu' => $total_shu,
            'alokasi' => $alokasi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('pages/v_template_monitor', $data);
    }
}
