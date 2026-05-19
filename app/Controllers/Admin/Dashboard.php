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
                'total_team' => $this->ModelHome->TotalTeam(),
                'total_agenda' => $this->ModelHome->TotalAgenda(),
                'total_pengumuman' => $this->ModelHome->TotalPengumuman(),
                'total_lembaga' => $this->ModelHome->TotalLembaga(),
                'total_dokumen' => $this->ModelHome->TotalDokumen(),
                'total_berita' => $this->ModelHome->TotalBerita(),
                'total_user' => $this->ModelHome->TotalUser(),

            ];
        return view('pages/v_template_back', $data);
    }
}
