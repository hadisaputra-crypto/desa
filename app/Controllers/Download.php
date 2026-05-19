<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDokumen;

class Download extends BaseController
{
    public function __construct()
    {
        $this->ModelDokumen = new ModelDokumen;
    }

    public function index()
    {
        $data = [
            'judul' => 'Doenload Area',
            'description' => 'Download Area',
            'page' => 'v_download',
            'dokumen' => $this->ModelDokumen->AllData(),
        ];
        return view('v_template_front', $data);
    }
}
