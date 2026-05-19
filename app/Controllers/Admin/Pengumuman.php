<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelPengumuman;


class Pengumuman extends BaseController
{

    public function __construct()
    {
        $this->ModelPengumuman = new ModelPengumuman;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Pengumuman',
                'subjudul'    => 'Pengumuman',
                'menu' => 'pengumuman',
                'submenu' => 'pengumuman',
                'page' => 'admin/pengumuman/v_index',
                'pengumuman' => $this->ModelPengumuman->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Pengumuman',
                'subjudul'    => 'Tambah Pengumuman',
                'menu' => 'pengumuman',
                'submenu' => 'pengumuman',
                'page' => 'admin/pengumuman/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'judul_pengumuman' => [
                'label' => 'Judul Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'isi_pengumuman' => [
                'label' => 'Isi Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],

        ])) {
            $data = [
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'isi_pengumuman' => $this->request->getPost('isi_pengumuman'),
            ];

            $this->ModelPengumuman->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Pengumuman');
            //jika valid
        } else {
            return redirect()->to('Admin/Pengumuman/tambahData')->withInput();
        }
    }

    public function  deleteData($id_pengumuman)
    {
        $data = [
            'id_pengumuman' => $id_pengumuman,
        ];

        $this->ModelPengumuman->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !');
        return redirect()->to('Admin/Pengumuman');
    }

    public function editData($id_pengumuman)
    {
        $data =
            [
                'judul' => 'Pengumuman',
                'subjudul'    => 'Pengumuman',
                'menu' => 'pengumuman',
                'submenu' => 'pengumuman',
                'page' => 'admin/pengumuman/v_edit',
                'pengumuman' => $this->ModelPengumuman->DetailData($id_pengumuman),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_pengumuman)
    {
        if ($this->validate([
            'judul_pengumuman' => [
                'label' => 'Judul Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'isi_pengumuman' => [
                'label' => 'Isi Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])) {
            $data = [
                'id_pengumuman' => $id_pengumuman,
                'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
                'isi_pengumuman' => $this->request->getPost('isi_pengumuman'),
            ];

            $this->ModelPengumuman->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Update !');
            return redirect()->to('Admin/Pengumuman');
            //jika valid
        } else {
            return redirect()->to('Admin/Pengumuman/editData/' . $id_pengumuman)->withInput();
        }
    }
}
