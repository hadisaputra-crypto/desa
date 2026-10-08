<?php

namespace App\Controllers\Dinas;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $all_bumdes = $db->table('tbl_bumdes')->get()->getResultArray();
        $ids = array_column($all_bumdes, 'id_bumdes');

        $chart_labels = [];
        $chart_pemasukan = [];
        $chart_pengeluaran = [];
        if (!empty($ids)) {
            $id_list = implode(',', $ids);
            $rows = $db->query("
                SELECT b.nama_bumdes,
                       COALESCE(SUM(CASE WHEN t.tipe IN ('pemasukan','modal') THEN t.nominal ELSE 0 END), 0) as pemasukan,
                       COALESCE(SUM(CASE WHEN t.tipe = 'pengeluaran' THEN t.nominal ELSE 0 END), 0) as pengeluaran
                FROM tbl_bumdes b
                LEFT JOIN tbl_transaksi t ON t.id_bumdes = b.id_bumdes AND YEAR(t.tanggal) = YEAR(CURDATE())
                GROUP BY b.id_bumdes
                ORDER BY b.nama_bumdes
            ")->getResultArray();
            foreach ($rows as $r) {
                $chart_labels[] = $r['nama_bumdes'];
                $chart_pemasukan[] = (int)$r['pemasukan'];
                $chart_pengeluaran[] = (int)$r['pengeluaran'];
            }
        }

        $data = [
            'judul' => 'Dashboard Dinas',
            'subjudul' => 'Pemantauan BUMDes Seluruh Desa',
            'menu' => 'dashboard',
            'page' => 'dinas/v_beranda',
            'bumdes' => $all_bumdes,
            'chart_labels' => json_encode($chart_labels),
            'chart_pemasukan' => json_encode($chart_pemasukan),
            'chart_pengeluaran' => json_encode($chart_pengeluaran),
        ];
        return view('pages/v_template_monitor', $data);
    }
}
