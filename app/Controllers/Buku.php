<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBuku;

class Buku extends BaseController
{
    public function __construct()
    {
        $this->ModelBuku = new ModelBuku;
    }

    public function index()
    {
        $data = [
            'judul' => 'Buku',
            'description' => 'Buku',
            'page' => 'v_buku',
            'buku' => $this->ModelBuku->AllData(),
        ];
        return view('v_template_front', $data);
    }

    public function Detail($slug_buku)
    {
        $buku = $this->ModelBuku->detailBuku($slug_buku);
        $data = [
            'judul' => 'Detail Buku',
            'page' => 'v_buku_detail',
            'buku' => $buku,
            'description' => $buku['judul_buku'],
        ];
        return view('v_template_front', $data);
    }
}
