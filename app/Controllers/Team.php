<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTeam;

class Team extends BaseController
{
    public function __construct()
    {
        $this->ModelTeam = new ModelTeam;
    }

    public function index()
    {
        $data = [
            'judul' => 'Team',
            'description' => 'Team',
            'page' => 'v_team',
            'team' => $this->ModelTeam->AllData(),
        ];
        return view('v_template_front', $data);
    }
}
