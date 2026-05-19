<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFoto;

class AlbumFoto extends BaseController
{
    public function __construct()
    {
        $this->ModelFoto = new ModelFoto;
    }

    public function index()
    {
        $data = [
            'judul' => 'Album Foto',
            'description' => 'Album Foto',
            'page' => 'v_album_foto',
            'album' => $this->ModelFoto->AllDataAlbum(),
        ];
        return view('v_template_front', $data);
    }

    public function Foto($id_album)
    {
        $data = [
            'judul' => 'Foto',
            'description' => 'Foto',
            'page' => 'v_foto',
            'foto' => $this->ModelFoto->AllDataPerAlbum($id_album),
            'album' => $this->ModelFoto->DetailAlbum($id_album),
        ];
        return view('v_template_front', $data);
    }
}
