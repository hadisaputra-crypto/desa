<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurnal;

class Jurnal extends BaseController
{

    public function __construct()
    {
        $this->ModelJurnal = new ModelJurnal;
    }

    public function index()
    {
        $data =
            [
                'judul' => 'Jurnal',
                'page' => 'v_jurnal',
                'description' => 'Jurnal Padang Tekno',
                'jurnal' => $this->ModelJurnal->AllData(),
            ];
        return view('v_template_front', $data);
    }

    public function lembagaClient()
    {
        $data =
            [
                'judul' => 'Client',
                'page' => 'v_lembaga_client',
                'lembaga' => $this->ModelLembaga->AllDataLembaga(),
                'jenis_lembaga' => $this->ModelLembaga->AllJenisLembaga(),
            ];
        return view('v_template_front', $data);
    }
}
