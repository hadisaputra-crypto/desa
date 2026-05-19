<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelFoto;

class Foto extends BaseController
{

    public function __construct()
    {
        $this->ModelFoto = new ModelFoto();
    }
    // Album

    public function getindex()
    {
        $data =
            [
                'judul' => 'Gallery',
                'subjudul'    => 'Album Foto',
                'menu' => 'gallery',
                'submenu' => 'foto',
                'page' => 'admin/foto/v_album',
                'album' => $this->ModelFoto->AllDataAlbum(),

            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahAlbum()
    {
        $data =
            [
                'judul' => 'Gallery',
                'subjudul'    => 'Tambah Album Foto',
                'menu' => 'gallery',
                'submenu' => 'foto',
                'page' => 'admin/foto/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertDataAlbum()
    {
        if ($this->validate([
            'nama_album' => [
                'label' => 'Nama Album',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'cover_album' => [
                'label' => 'Cover Album',
                'rules' => 'uploaded[cover_album]|max_size[cover_album,500]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {

            $cover_album = $this->request->getFile('cover_album');
            $nama_file = $cover_album->getRandomName();
            $cover_album->move('foto', $nama_file);
            $data = [
                'nama_album' => $this->request->getPost('nama_layanan'),
                'cover_album' => $nama_file,
            ];

            $this->ModelFoto->InsertDataAlbum($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Foto');
            //jika valid
        } else {
            return redirect()->to('Admin/Foto/tambahAlbum')->withInput();
        }
    }


    public function deleteAlbum($id_album)
    {
        $data = [
            'id_album' => $id_album,
        ];

        $this->ModelFoto->DeleteDataAlbum($data);
        session()->setFlashdata('delete', 'Album Foto Berhasil Dihapus !');
        return redirect()->to('Admin/Foto');
    }

    // Foto
    public function gettambahFoto($id_album)
    {
        $data =
            [
                'judul' => 'Album Foto',
                'subjudul'    => 'Tambah Foto',
                'menu' => 'gallery',
                'submenu' => 'foto',
                'page' => 'admin/foto/v_tambah_foto',
                'foto' => $this->ModelFoto->AllDataPerAlbum($id_album),
                'album' => $this->ModelFoto->DetailAlbum($id_album),
            ];
        return view('pages/v_template_back', $data);
    }

    public function uploadFoto($id_album)
    {
        if ($this->validate([
            'file_foto' => [
                'label' => 'File Foto',
                'rules' => 'max_size[file_foto,1024]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1000 KB !',
                ]
            ]
        ])) {
            $file_foto = $this->request->getFile('file_foto');
            $nama_file = $file_foto->getRandomName();
            $file_foto->move('foto', $nama_file);
            $data = [
                'id_album' => $id_album,
                'file_foto'    => $nama_file,
            ];

            $this->ModelFoto->InsertDataFoto($data);
            session()->setFlashdata('insert', 'Foto Berhasil Ditambahkan !');
            return redirect()->to('Admin/Foto/tambahFoto/' . $id_album);
            //jika valid
        } else {
            return redirect()->to('Admin/Foto/tambahFoto/' . $id_album)->withInput();
        }
    }

    public function deleteFoto($id_album, $id_foto)
    {

        $data = [
            'id_foto' => $id_foto,
        ];

        $this->ModelFoto->DeleteDataFoto($data);
        session()->setFlashdata('delete', 'Foto Berhasil Dihapus !');
        return redirect()->to('Admin/Foto/tambahFoto/' . $id_album);
    }
}
