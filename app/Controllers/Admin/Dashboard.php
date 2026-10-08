<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelHome;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function getIndex()
    {
        $data =
            [
                'judul' => 'Dashboard',
                'subjudul'    => 'Dashboard',
                'menu' => 'dashboard',
                'submenu' => '',
                'page' => 'admin/v_dashboard',
                'total_layanan' => $this->ModelHome->TotalLayanan(),
                'total_pengumuman' => $this->ModelHome->TotalPengumuman(),
                'total_agenda' => $this->ModelHome->TotalAgenda(),
                'total_berita' => $this->ModelHome->TotalBerita(),
                'total_lembaga' => $this->ModelHome->TotalLembaga(),
                'total_dokumen' => $this->ModelHome->TotalDokumen(),
                'total_album' => $this->ModelHome->TotalAlbum(),
                'total_video' => $this->ModelHome->TotalVideo(),
                'total_slider' => $this->ModelHome->TotalSlider(),
                'total_bumdes' => $this->ModelHome->TotalBumdes(),
                'total_unit' => $this->ModelHome->TotalUnitUsaha(),
                'total_anggota' => $this->ModelHome->TotalAnggota(),
                'total_produk' => $this->ModelHome->TotalProduk(),
                'total_transaksi' => $this->ModelHome->TotalTransaksi(),
                'total_user' => $this->ModelHome->TotalUser(),
            ];
        return view('pages/v_template_back', $data);
    }
}
