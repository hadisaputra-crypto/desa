<?php

namespace App\Controllers\Admin;

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
        $data =
            [
                'judul' => 'Agenda',
                'subjudul'    => 'Data Agenda',
                'menu' => 'agenda',
                'submenu' => 'agenda',
                'page' => 'admin/agenda/v_index',
                'agenda' => $this->ModelAgenda->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Agenda',
                'subjudul'    => 'Tambah Agenda',
                'menu' => 'agenda',
                'submenu' => 'agenda',
                'page' => 'admin/agenda/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'nama_agenda' => [
                'label' => 'Nama Agenda',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                    'is_unique' => '{field} Sudah Ada !',
                ]
            ],
            'tgl_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tgl_selesai' => [
                'label' => 'Tanggal Selesai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'lokasi' => [
                'label' => 'Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_agenda' => [
                'label' => 'Cover Agenda',
                'rules' => 'uploaded[cover_agenda]|max_size[cover_agenda,500]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {
            $cover_agenda = $this->request->getFile('cover_agenda');
            $nama_file = $cover_agenda->getRandomName();
            $cover_agenda->move('cover', $nama_file);
            $data = [
                'nama_agenda' => $this->request->getPost('nama_agenda'),
                'isi_agenda' => $this->request->getPost('isi_agenda'),
                'tgl_mulai' => $this->request->getPost('tgl_mulai'),
                'tgl_selesai' => $this->request->getPost('tgl_selesai'),
                'lokasi' => $this->request->getPost('lokasi'),
                'tgl_post' => date('Y-m-d'),
                'cover_agenda'    => $nama_file,
            ];

            $this->ModelAgenda->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Agenda');
            //jika valid
        } else {
            return redirect()->to('Admin/Agenda/tambahData')->withInput();
        }
    }

    public function geteditData($id_agenda)
    {
        $data =
            [
                'judul' => 'Agenda',
                'subjudul'    => 'Data Agenda',
                'menu' => 'agenda',
                'submenu' => 'agenda',
                'page' => 'admin/agenda/v_edit',
                'agenda' => $this->ModelAgenda->DetailData($id_agenda),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_agenda)
    {
        if ($this->validate([
            'nama_agenda' => [
                'label' => 'Nama Agenda',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                    'is_unique' => '{field} Sudah Ada !',
                ]
            ],
            'tgl_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tgl_selesai' => [
                'label' => 'Tanggal Selesai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'lokasi' => [
                'label' => 'Lokasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_agenda' => [
                'label' => 'Cover Agenda',
                'rules' => 'max_size[cover_agenda,500]',
                'errors' => [                    
                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {
            $agenda = $this->ModelAgenda->DetailData($id_agenda);
            $cover_agenda = $this->request->getFile('cover_agenda');
            if ($cover_agenda->getError() == 4) {
                $nama_file = $agenda['cover_agenda'];
            } else {
                # jika foto diganti
                $nama_file = $cover_agenda->getRandomName();
                $cover_agenda->move('cover', $nama_file);
            }

            $data = [
                'id_agenda'   => $id_agenda,
                'nama_agenda' => $this->request->getPost('nama_agenda'),
                'isi_agenda' => $this->request->getPost('isi_agenda'),
                'tgl_mulai' => $this->request->getPost('tgl_mulai'),
                'tgl_selesai' => $this->request->getPost('tgl_selesai'),
                'lokasi' => $this->request->getPost('lokasi'),
                'tgl_post' => date('Y-m-d'),
                'cover_agenda'    => $nama_file,
            ];

            $this->ModelAgenda->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Agenda');
            //jika valid
        } else {
            return redirect()->to('Admin/Agenda/editData/' . $id_agenda)->withInput();
        }
    }


    public function deleteData($id_agenda)
    {
        $data = [
            'id_agenda' => $id_agenda,
        ];

        $this->ModelAgenda->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete !');
        return redirect()->to('Admin/Agenda');
    }
}
