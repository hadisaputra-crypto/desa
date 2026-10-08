<?php

namespace App\Controllers\Bumdes;
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

        $id_bumdes = session()->get('user')['id_bumdes'];

        $chart = $this->db->query("
            SELECT MONTH(tanggal) as bulan,
                   COALESCE(SUM(CASE WHEN tipe IN ('pemasukan','modal') THEN nominal ELSE 0 END), 0) as pemasukan,
                   COALESCE(SUM(CASE WHEN tipe = 'pengeluaran' THEN nominal ELSE 0 END), 0) as pengeluaran
            FROM tbl_transaksi
            WHERE id_bumdes = ? AND YEAR(tanggal) = YEAR(CURDATE())
            GROUP BY MONTH(tanggal)
            ORDER BY bulan
        ", [$id_bumdes])->getResultArray();

        $bulan = array_fill(0, 12, 0);
        $pemasukan = array_fill(0, 12, 0);
        $pengeluaran = array_fill(0, 12, 0);
        foreach ($chart as $r) {
            $i = (int)$r['bulan'] - 1;
            $bulan[$i] = $i + 1;
            $pemasukan[$i] = (int)$r['pemasukan'];
            $pengeluaran[$i] = (int)$r['pengeluaran'];
        }
        
        $data = [
            'judul' => 'Beranda',
            'subjudul' => 'Dashboard BUMDes',
            'menu' => 'beranda',
            'submenu' => '',
            'active_menu' => 'beranda',
            'page' => 'user/v_beranda',
            'total_layanan' => $this->ModelHome->TotalLayanan($id_bumdes),
            'total_pengumuman' => $this->ModelHome->TotalPengumuman($id_bumdes),
            'total_anggota' => $this->ModelHome->TotalAnggota($id_bumdes),
            'total_unit' => $this->ModelHome->TotalUnitUsaha($id_bumdes),
            'total_produk' => $this->ModelHome->TotalProduk($id_bumdes),
            'total_user' => $this->ModelHome->TotalUser($id_bumdes),
            'chart_bulan' => json_encode($bulan),
            'chart_pemasukan' => json_encode($pemasukan),
            'chart_pengeluaran' => json_encode($pengeluaran),
        ];
        return view('pages/v_template_user', $data);
    }
}
