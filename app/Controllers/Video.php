<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelVideo;

class Video extends BaseController
{
    public function __construct()
    {
        $this->ModelVideo = new ModelVideo;
    }

    public function index()
    {
        $data = [
            'judul' => 'Video',
            'description' => 'Video',
            'page' => 'v_video',
            'video' => $this->ModelVideo->AllData(),
        ];
        return view('v_template_front', $data);
    }
}
