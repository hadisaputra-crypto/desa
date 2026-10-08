<?php

namespace App\Controllers\Unit;
use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function kas()
    {
        $id_unit = session()->get('user')['id_unit'];
        $db = \Config\Database::connect();

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-m-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');

        $transaksi = $db->query("
            SELECT * FROM tbl_transaksi
            WHERE id_unit = ? AND tanggal BETWEEN ? AND ?
            ORDER BY tanggal ASC, id_transaksi ASC
        ", [$id_unit, $tgl_awal, $tgl_akhir])->getResultArray();

        $data = [
            'judul' => 'Laporan Buku Kas',
            'subjudul' => 'Buku Kas Unit Usaha',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'unit/v_laporan_kas',
            'transaksi' => $transaksi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('pages/v_template_unit', $data);
    }

    public function labaRugi()
    {
        $id_unit = session()->get('user')['id_unit'];
        $db = \Config\Database::connect();

        $tgl_awal = $this->request->getGet('tgl_awal') ?? date('Y-m-01');
        $tgl_akhir = $this->request->getGet('tgl_akhir') ?? date('Y-m-t');

        $pendapatan = $db->query("
            SELECT kategori, SUM(nominal) as total
            FROM tbl_transaksi
            WHERE id_unit = ? AND tanggal BETWEEN ? AND ? AND tipe = 'pemasukan'
            GROUP BY kategori ORDER BY kategori
        ", [$id_unit, $tgl_awal, $tgl_akhir])->getResultArray();

        $beban = $db->query("
            SELECT kategori, SUM(nominal) as total
            FROM tbl_transaksi
            WHERE id_unit = ? AND tanggal BETWEEN ? AND ? AND tipe = 'pengeluaran'
            GROUP BY kategori ORDER BY kategori
        ", [$id_unit, $tgl_awal, $tgl_akhir])->getResultArray();

        $total_pendapatan = array_sum(array_column($pendapatan, 'total'));
        $total_beban = array_sum(array_column($beban, 'total'));

        $data = [
            'judul' => 'Laporan Laba Rugi',
            'subjudul' => 'Laba / Rugi Unit Usaha',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'unit/v_laporan_labarugi',
            'pendapatan' => $pendapatan,
            'beban' => $beban,
            'total_pendapatan' => $total_pendapatan,
            'total_beban' => $total_beban,
            'laba_bersih' => $total_pendapatan - $total_beban,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];
        return view('pages/v_template_unit', $data);
    }

    public function neraca()
    {
        $id_unit = session()->get('user')['id_unit'];
        $db = \Config\Database::connect();

        $tgl_sampai = $this->request->getGet('tgl_sampai') ?? date('Y-m-d');

        $total_pemasukan = $db->query("
            SELECT COALESCE(SUM(nominal),0) FROM tbl_transaksi
            WHERE id_unit = ? AND tipe IN ('pemasukan','modal') AND tanggal <= ?
        ", [$id_unit, $tgl_sampai])->getRowArray();
        $total_pemasukan = reset($total_pemasukan);

        $total_pengeluaran = $db->query("
            SELECT COALESCE(SUM(nominal),0) FROM tbl_transaksi
            WHERE id_unit = ? AND tipe = 'pengeluaran' AND tanggal <= ?
        ", [$id_unit, $tgl_sampai])->getRowArray();
        $total_pengeluaran = reset($total_pengeluaran);

        $kas = $total_pemasukan - $total_pengeluaran;

        $persediaan = $db->query("
            SELECT COALESCE(SUM(stok * harga),0) FROM tbl_produk
            WHERE id_unit = ?
        ", [$id_unit])->getRowArray();
        $persediaan = reset($persediaan);

        $total_modal = $db->query("
            SELECT COALESCE(SUM(nominal),0) FROM tbl_transaksi
            WHERE id_unit = ? AND tipe = 'modal' AND tanggal <= ?
        ", [$id_unit, $tgl_sampai])->getRowArray();
        $total_modal = reset($total_modal);

        $total_revenue = $db->query("
            SELECT COALESCE(SUM(nominal),0) FROM tbl_transaksi
            WHERE id_unit = ? AND tipe = 'pemasukan' AND tanggal <= ?
        ", [$id_unit, $tgl_sampai])->getRowArray();
        $total_revenue = reset($total_revenue);

        $total_expense = $db->query("
            SELECT COALESCE(SUM(nominal),0) FROM tbl_transaksi
            WHERE id_unit = ? AND tipe = 'pengeluaran' AND tanggal <= ?
        ", [$id_unit, $tgl_sampai])->getRowArray();
        $total_expense = reset($total_expense);

        $laba = $total_revenue - $total_expense;

        $data = [
            'judul' => 'Neraca',
            'subjudul' => 'Neraca Keuangan Unit Usaha',
            'menu' => 'laporan',
            'submenu' => '',
            'active_menu' => 'laporan',
            'page' => 'unit/v_laporan_neraca',
            'kas' => $kas,
            'persediaan' => $persediaan,
            'total_aktiva' => $kas + $persediaan,
            'total_modal' => $total_modal,
            'laba' => $laba,
            'total_pasiva' => $total_modal + $laba,
            'tgl_sampai' => $tgl_sampai,
        ];
        return view('pages/v_template_unit', $data);
    }
}
