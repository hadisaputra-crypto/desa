<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelHome;
use App\Models\ModelShu;

class Laporan extends BaseController
{
    protected $ModelHome;
    protected $ModelShu;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelShu = new ModelShu();
    }

    public function getIndex()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Pusat Laporan',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'user/v_laporan',
        ];
        return view('pages/v_template_user', $data);
    }

    public function kas()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $db = \Config\Database::connect();

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-m-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');
        $id_unit = $this->request->getGet('id_unit');

        $whereUnit = '';
        $params = [$id_bumdes, $tgl_awal, $tgl_akhir];
        if ($id_unit) {
            $whereUnit = 'AND t.id_unit = ?';
            $params[] = $id_unit;
        }

        $transaksi = $db->query("
            SELECT t.*, u.nama_unit
            FROM tbl_transaksi t
            LEFT JOIN tbl_unit_usaha u ON u.id_unit = t.id_unit
            WHERE t.id_bumdes = ? AND t.tanggal BETWEEN ? AND ?
            $whereUnit
            ORDER BY t.tanggal ASC, t.id_transaksi ASC
        ", $params)->getResultArray();

        $units = $db->table('tbl_unit_usaha')->where('id_bumdes', $id_bumdes)->get()->getResultArray();

        $data = [
            'judul' => 'Laporan Buku Kas',
            'subjudul' => 'Buku Kas Umum',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'user/v_laporan_kas',
            'transaksi' => $transaksi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'units' => $units,
            'id_unit' => $id_unit,
        ];
        return view('pages/v_template_user', $data);
    }

    public function labaRugi()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $db = \Config\Database::connect();

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-m-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');
        $id_unit = $this->request->getGet('id_unit');

        $whereUnit = '';
        $params = [$id_bumdes, $tgl_awal, $tgl_akhir];
        if ($id_unit) {
            $whereUnit = 'AND t.id_unit = ?';
            $params[] = $id_unit;
        }

        $pendapatan = $db->query("
            SELECT t.kategori, SUM(t.nominal) as total
            FROM tbl_transaksi t
            WHERE t.id_bumdes = ? AND t.tanggal BETWEEN ? AND ?
            AND t.tipe = 'pemasukan' $whereUnit
            GROUP BY t.kategori ORDER BY t.kategori
        ", $params)->getResultArray();

        $beban = $db->query("
            SELECT t.kategori, SUM(t.nominal) as total
            FROM tbl_transaksi t
            WHERE t.id_bumdes = ? AND t.tanggal BETWEEN ? AND ?
            AND t.tipe = 'pengeluaran' $whereUnit
            GROUP BY t.kategori ORDER BY t.kategori
        ", $params)->getResultArray();

        $total_pendapatan = array_sum(array_column($pendapatan, 'total'));
        $total_beban = array_sum(array_column($beban, 'total'));

        $units = $db->table('tbl_unit_usaha')->where('id_bumdes', $id_bumdes)->get()->getResultArray();

        $data = [
            'judul' => 'Laporan Laba Rugi',
            'subjudul' => 'Laporan Laba / Rugi',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'user/v_laporan_labarugi',
            'pendapatan' => $pendapatan,
            'beban' => $beban,
            'total_pendapatan' => $total_pendapatan,
            'total_beban' => $total_beban,
            'laba_bersih' => $total_pendapatan - $total_beban,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'units' => $units,
            'id_unit' => $id_unit,
        ];
        return view('pages/v_template_user', $data);
    }

    public function neraca()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $db = \Config\Database::connect();

        $tgl_sampai = $this->request->getGet('tgl_sampai') ?? date('Y-m-d');

        // Total Kas: pemasukan + modal - pengeluaran
        $total_pemasukan = $db->query("
            SELECT COALESCE(SUM(nominal),0) as total FROM tbl_transaksi
            WHERE id_bumdes = ? AND tipe IN ('pemasukan','modal') AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['total'];

        $total_pengeluaran = $db->query("
            SELECT COALESCE(SUM(nominal),0) as total FROM tbl_transaksi
            WHERE id_bumdes = ? AND tipe = 'pengeluaran' AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['total'];

        $kas = $total_pemasukan - $total_pengeluaran;

        // Total Persediaan (stok produk * harga)
        $persediaan = $db->query("
            SELECT COALESCE(SUM(stok * harga),0) as total FROM tbl_produk
            WHERE id_bumdes = ?
        ", [$id_bumdes])->getRowArray()['total'];

        // Total Modal
        $total_modal = $db->query("
            SELECT COALESCE(SUM(nominal),0) as total FROM tbl_transaksi
            WHERE id_bumdes = ? AND tipe = 'modal' AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['total'];

        // Total Laba (pemasukan - pengeluaran - modal)
        $total_revenue = $db->query("
            SELECT COALESCE(SUM(nominal),0) as total FROM tbl_transaksi
            WHERE id_bumdes = ? AND tipe = 'pemasukan' AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['total'];

        $total_expense = $db->query("
            SELECT COALESCE(SUM(nominal),0) as total FROM tbl_transaksi
            WHERE id_bumdes = ? AND tipe = 'pengeluaran' AND tanggal <= ?
        ", [$id_bumdes, $tgl_sampai])->getRowArray()['total'];

        $laba = $total_revenue - $total_expense;

        $data = [
            'judul' => 'Neraca',
            'subjudul' => 'Neraca Keuangan',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'user/v_laporan_neraca',
            'kas' => $kas,
            'persediaan' => $persediaan,
            'total_aktiva' => $kas + $persediaan,
            'total_modal' => $total_modal,
            'laba' => $laba,
            'total_pasiva' => $total_modal + $laba,
            'tgl_sampai' => $tgl_sampai,
        ];
        return view('pages/v_template_user', $data);
    }

    public function shu()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $db = \Config\Database::connect();

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-01-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');

        $per_unit = $db->query("
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
        $settings = $this->ModelShu->getBumdesSettings($id_bumdes);

        $alokasi = [];
        foreach ($settings as $s) {
            if ($s['aktif'] !== 1) {
                continue;
            }
            $nilai = $total_shu * ($s['persentase'] / 100);
            $alokasi[] = [
                'nama_alokasi' => $s['nama_alokasi'],
                'persentase' => $s['persentase'],
                'nilai' => $nilai,
            ];
        }

        $data = [
            'judul' => 'Laporan SHU',
            'subjudul' => 'Sisa Hasil Usaha & Alokasi',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'user/v_laporan_shu',
            'per_unit' => $per_unit,
            'total_pemasukan' => $total_pemasukan,
            'total_pengeluaran' => $total_pengeluaran,
            'total_shu' => $total_shu,
            'alokasi' => $alokasi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('pages/v_template_user', $data);
    }
}