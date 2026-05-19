<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLayanan;


class Layanan extends BaseController
{

    public function __construct()
    {
        $this->ModelLayanan = new ModelLayanan;
    }

    public function index()
    {
    }

    public function Detail($id_layanan)
    {
        $data = [
            'judul' => 'Services',
            'description' => 'Services',
            'page' => 'v_layanan_detail',
            'layanan' => $this->ModelLayanan->DetailData($id_layanan),
            
        ];
        return view('v_template_front', $data);
    }
}
