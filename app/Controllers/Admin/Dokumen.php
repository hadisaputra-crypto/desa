<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelDokumen;

class Dokumen extends BaseController
{

    public function __construct()
    {
        $this->ModelDokumen = new ModelDokumen;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Dokumen',
                'subjudul'    => 'Data Dokumen',
                'menu' => 'dokumen',
                'submenu' => 'dokumen',
                'page' => 'admin/dokumen/v_index',
                'dokumen' => $this->ModelDokumen->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Dokumen',
                'subjudul'    => 'Tambah Dokumen',
                'menu' => 'dokumen',
                'submenu' => 'dokumen',
                'page' => 'admin/dokumen/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_dokumen' => [
                'label' => 'Nama Dokumen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'file_dokumen' => [
                'label' => 'File Dokumen',
                'rules' => 'max_size[file_dokumen,1500]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Max Boleh 1500 KB !',
                ]
            ]
        ])) {
            $file_dokumen = $this->request->getFile('file_dokumen');
            $nama_file = $file_dokumen->getRandomName();
            $ukuran = $file_dokumen->getSizeByUnit('kb');
            $file_dokumen->move('files', $nama_file);

            $data = [
                'nama_dokumen' => $this->request->getPost('nama_dokumen'),
                'ukuran_file' => $ukuran,
                'file_dokumen'    => $nama_file,
            ];

            $this->ModelDokumen->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Dokumen');
            //jika valid
        } else {
            return redirect()->to('Admin/Dokumen/tambahData')->withInput();
        }
    }

    public function deleteData($id_dokumen)
    {
        $data = [
            'id_dokumen' => $id_dokumen,
        ];

        $this->ModelDokumen->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !');
        return redirect()->to('Admin/Dokumen');
    }
}
