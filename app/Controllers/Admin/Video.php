<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelVideo;

class Video extends BaseController
{

    public function __construct()
    {
        $this->ModelVideo = new ModelVideo();
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Gallery',
                'subjudul'    => 'Video',
                'menu' => 'gallery',
                'submenu' => 'video',
                'page' => 'admin/v_video',
                'video' => $this->ModelVideo->AllData(),

            ];
        return view('pages/v_template_back', $data);
    }

    public function getTambah()
    {
        $data =
            [
                'judul' => 'Playlist',
                'subjudul'    => 'Tambah Playlist',
                'menu' => 'playlist',
                'submenu' => 'playlist',
                'page' => 'admin/playlist/v_tambah',
                'kelompok' => $this->ModelKelompok->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {

        $data = [
            'judul_video' => $this->request->getPost('judul_video'),
            'embed_video' => $this->request->getPost('embed_video'),
        ];

        $this->ModelVideo->InsertData($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
        return redirect()->to('Admin/Video');
        //jika valid

    }

    public function updateData($id_video)
    {

        $data = [
            'id_video' => $id_video,
            'judul_video' => $this->request->getPost('judul_video'),
            'embed_video' => $this->request->getPost('embed_video'),
        ];

        $this->ModelVideo->updateData($data);
        session()->setFlashdata('update', 'Data Berhasil Diupdate !');
        return redirect()->to('Admin/Video');
        //jika valid

    }

    public function  deleteData($id_video)
    {
        $data = [
            'id_video' => $id_video,
        ];

        $this->ModelVideo->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !');
        return redirect()->to('Admin/Video');
    }
}
