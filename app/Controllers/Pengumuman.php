<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengumuman;

class Pengumuman extends BaseController
{
    public function __construct()
    {
        $this->ModelPengumuman = new ModelPengumuman;
    }

    public function index()
    {
        $data = [
            'judul' => 'Pengumuman',
            'description' => 'Pengumuman',
            'page' => 'v_pengumuman',
            'pengumuman' => $this->ModelPengumuman->AllData(),
        ];
        return view('v_template_front', $data);
    }

    public function Detail($id_pengumuman)
    {
        $data = [
            'judul' => 'Pengumuman',
            'description' => 'Pengumuman',
            'page' => 'v_pengumuman_detail',
            'pengumuman' => $this->ModelPengumuman->DetailData($id_pengumuman),
        ];
        return view('v_template_front', $data);
    }
}
