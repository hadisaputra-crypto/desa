<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelLembaga;

class Lembaga extends BaseController
{

    public function __construct()
    {
        $this->ModelLembaga = new ModelLembaga;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Lembaga',
                'subjudul'    => 'Kerjasama',
                'menu' => 'lembaga',
                'submenu' => 'lembaga',
                'page' => 'admin/lembaga/v_index',
                'lembaga' => $this->ModelLembaga->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Lembaga',
                'subjudul'    => 'Tambah Lembaga',
                'menu' => 'lembaga',
                'submenu' => 'lembaga',
                'page' => 'admin/lembaga/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_lembaga' => [
                'label' => 'Nama Lembaga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'url_lembaga' => [
                'label' => 'Url Lembaga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'logo_lembaga' => [
                'label' => 'Logo Lembaga',
                'rules' => 'uploaded[logo_lembaga]|max_size[logo_lembaga,1024]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ]
        ])) {
            $logo_lembaga = $this->request->getFile('logo_lembaga');
            $nama_file = $logo_lembaga->getRandomName();
            $logo_lembaga->move('logo', $nama_file);
            $data = [
                'nama_lembaga' => $this->request->getPost('nama_lembaga'),
                'url_lembaga' => $this->request->getPost('url_lembaga'),
                'logo_lembaga'    => $nama_file,
            ];

            $this->ModelLembaga->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Lembaga');
            //jika valid
        } else {
            return redirect()->to('Admin/Lembaga/tambahData')->withInput();
        }
    }

    public function deleteData($id_lembaga)
    {
        $data = [
            'id_lembaga' => $id_lembaga,
        ];

        $this->ModelLembaga->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !');
        return redirect()->to('Admin/Lembaga');
    }

    public function geteditData($id_lembaga)
    {
        $data =
            [
                'judul' => 'Lembaga',
                'subjudul'    => 'Edit Lembaga',
                'menu' => 'lembaga',
                'submenu' => 'lembaga',
                'page' => 'admin/lembaga/v_edit',
                'lembaga' => $this->ModelLembaga->DetailData($id_lembaga),

            ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_lembaga)
    {
        if ($this->validate([
            'nama_lembaga' => [
                'label' => 'Nama Lembaga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'url_lembaga' => [
                'label' => 'Url Lembaga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'logo_lembaga' => [
                'label' => 'Logo Lembaga',
                'rules' => 'max_size[logo_lembaga,1024]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ]
        ])) {

            $lembaga = $this->ModelLembaga->DetailData($id_lembaga);
            $logo_lembaga = $this->request->getFile('logo_lembaga');
            if ($logo_lembaga->getError() == 4) {
                $nama_file = $lembaga['logo_lembaga'];
            } else {
                # jika foto diganti
                $nama_file = $logo_lembaga->getRandomName();
                $logo_lembaga->move('logo', $nama_file);
            }
            $data = [
                'id_lembaga' => $id_lembaga,
                'nama_lembaga' => $this->request->getPost('nama_lembaga'),
                'url_lembaga' => $this->request->getPost('url_lembaga'),
                'logo_lembaga'    => $nama_file,
            ];

            $this->ModelLembaga->updateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Lembaga');
            //jika valid
        } else {
            return redirect()->to('Admin/Lembaga/editData/' . $id_lembaga)->withInput();
        }
    }
}
