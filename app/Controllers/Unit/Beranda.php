<?php

namespace App\Controllers\Unit;
use App\Controllers\BaseController;
use App\Models\ModelHome;

class Beranda extends BaseController
{
    protected $ModelHome;
    protected $db;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->to('Auth/Login');
        }

        $id_unit = session()->get('user')['id_unit'];
        $id_bumdes = session()->get('user')['id_bumdes'];

        $chart = $this->db->query("
            SELECT MONTH(tanggal) as bulan,
                   COALESCE(SUM(CASE WHEN tipe IN ('pemasukan','modal') THEN nominal ELSE 0 END), 0) as pemasukan,
                   COALESCE(SUM(CASE WHEN tipe = 'pengeluaran' THEN nominal ELSE 0 END), 0) as pengeluaran
            FROM tbl_transaksi
            WHERE id_unit = ? AND id_bumdes = ? AND YEAR(tanggal) = YEAR(CURDATE())
            GROUP BY MONTH(tanggal)
            ORDER BY bulan
        ", [$id_unit, $id_bumdes])->getResultArray();

        $pemasukan = array_fill(0, 12, 0);
        $pengeluaran = array_fill(0, 12, 0);
        foreach ($chart as $r) {
            $i = (int)$r['bulan'] - 1;
            $pemasukan[$i] = (int)$r['pemasukan'];
            $pengeluaran[$i] = (int)$r['pengeluaran'];
        }

        $data = [
            'judul' => 'Beranda',
            'subjudul' => 'Dashboard Unit Usaha',
            'menu' => 'beranda',
            'submenu' => '',
            'active_menu' => 'beranda',
            'page' => 'unit/v_beranda',
            'total_anggota' => $this->ModelHome->TotalAnggotaByUnit($id_unit),
            'total_produk' => $this->ModelHome->TotalProdukByUnit($id_unit),
            'total_transaksi' => $this->ModelHome->TotalTransaksiByUnit($id_unit),
            'total_layanan' => $this->ModelHome->TotalLayananByUnit($id_unit),
            'chart_pemasukan' => json_encode($pemasukan),
            'chart_pengeluaran' => json_encode($pengeluaran),
        ];
        return view('pages/v_template_unit', $data);
    }
}
