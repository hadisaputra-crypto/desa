<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgenda;

class Agenda extends BaseController
{
    public function __construct()
    {
        $this->ModelAgenda = new ModelAgenda;
    }

    public function getindex()
    {
        $data = [
            'judul' => 'Event',
            'description' => 'Event',
            'page' => 'pages/v_agenda',
            'agenda' => $this->ModelAgenda->AllData(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getDetail($id_agenda)
    {
        $data = [
            'judul' => 'Event',
            'description' => 'Event',
            'page' => 'v_agenda_detail',
            'agenda' => $this->ModelAgenda->DetailData($id_agenda),
        ];
        return view('pages/v_template_front', $data);
    }
}
