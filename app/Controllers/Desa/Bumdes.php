<?php

namespace App\Controllers\Desa;

use App\Controllers\BaseController;

class Bumdes extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $user = session()->get('user');

        $bumdes_saya = $db->table('tbl_bumdes')->where('id_bumdes', $user['id_bumdes'])->get()->getRowArray();
        $desa = $bumdes_saya['desa'] ?? '';

        $all_bumdes = $db->table('tbl_bumdes')->where('desa', $desa)->get()->getResultArray();

        $data = [
            'judul' => 'Data BUMDes',
            'subjudul' => 'Se-Desa ' . $desa,
            'menu' => 'bumdes',
            'page' => 'desa/v_bumdes_table',
            'bumdes' => $all_bumdes,
        ];
        return view('pages/v_template_monitor', $data);
    }

    public function detail($id_bumdes)
    {
        $db = \Config\Database::connect();

        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $unit = $db->table('tbl_unit_usaha')->where('id_bumdes', $id_bumdes)->get()->getResultArray();

        $produk = $db->query("
            SELECT p.id_produk, p.nama_produk, p.harga, p.stok, p.satuan, p.status,
                   u.id_unit, u.nama_unit
            FROM tbl_produk p
            LEFT JOIN tbl_unit_usaha u ON u.id_unit = p.id_unit
            WHERE p.id_bumdes = ?
            ORDER BY u.nama_unit, p.nama_produk
        ", [$id_bumdes])->getResultArray();

        $total_transaksi = $db->query("
            SELECT COUNT(*) as total, COALESCE(SUM(CASE WHEN tipe IN ('pemasukan','modal') THEN nominal ELSE 0 END), 0) as pemasukan,
                   COALESCE(SUM(CASE WHEN tipe = 'pengeluaran' THEN nominal ELSE 0 END), 0) as pengeluaran
            FROM tbl_transaksi WHERE id_bumdes = ? AND YEAR(tanggal) = YEAR(CURDATE())
        ", [$id_bumdes])->getRowArray();

        $data = [
            'judul' => 'Detail BUMDes',
            'subjudul' => $bumdes['nama_bumdes'],
            'menu' => 'bumdes',
            'page' => 'desa/v_bumdes_detail',
            'bumdes' => $bumdes,
            'unit' => $unit,
            'produk' => $produk,
            'total_transaksi' => $total_transaksi,
        ];
        return view('pages/v_template_monitor', $data);
    }
}
