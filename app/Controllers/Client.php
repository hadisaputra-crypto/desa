<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelClient;
use App\Models\ModelLembaga;

class Client extends BaseController
{

    public function __construct()
    {
        $this->ModelClient = new ModelClient;
        $this->ModelLembaga = new ModelLembaga;
    }

    public function jurnalClient()
    {
        $data =
            [
                'judul' => 'Jurnal Client',
                'description' => 'Jurnal Client',
                'page' => 'v_client_ojs',
                'client' => $this->ModelClient->AllData(),
            ];
        return view('v_template_front', $data);
    }

    public function lembagaClient()
    {
        $data =
            [
                'judul' => 'Lembaga Client',
                'description' => 'Lembaga Client',
                'page' => 'v_lembaga_client',
                'lembaga' => $this->ModelLembaga->AllDataLembaga(),
                'jenis_lembaga' => $this->ModelLembaga->AllJenisLembaga(),
            ];
        return view('v_template_front', $data);
    }

    public function detailLembaga($id_lembaga)
    {
        $data =
            [
                'judul' => 'Lembaga',
                'description' => '',
                'page' => 'v_lembaga_client_detail',
                'lembaga' => $this->ModelLembaga->DetailData($id_lembaga),
                'jurnal' => $this->ModelLembaga->AllJurnalLembaga($id_lembaga),
            ];
        return view('v_template_front', $data);
    }
}
