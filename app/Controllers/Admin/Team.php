<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelTeam;

class Team extends BaseController
{
    public function __construct()
    {
        $this->ModelTeam = new ModelTeam;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Team',
                'subjudul'    => 'Data Team',
                'menu' => 'team',
                'submenu' => 'team',
                'page' => 'admin/team/v_index',
                'team' => $this->ModelTeam->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Team',
                'subjudul'    => 'Tambah Team',
                'menu' => 'team',
                'submenu' => 'team',
                'page' => 'admin/team/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        if ($this->validate([

            'nama_team' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jabatan' => [
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'foto_team' => [
                'label' => 'Foto Team',
                'rules' => 'uploaded[foto_team]|max_size[foto_team,500]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {
            $foto_team = $this->request->getFile('foto_team');
            $nama_file = $foto_team->getRandomName();
            $foto_team->move('foto', $nama_file);
            $data = [
                'nama_team' => $this->request->getPost('nama_team'),
                'jabatan' => $this->request->getPost('jabatan'),
                'foto_team'    => $nama_file,
            ];

            $this->ModelTeam->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Team');
            //jika valid
        } else {
            return redirect()->to('Admin/Team/tambahData')->withInput();
        }
    }

    public function geteditData($id_dosen)
    {
        $data =
            [
                'judul' => 'Team',
                'subjudul'    => 'Edit Team',
                'menu' => 'team',
                'submenu' => 'team',
                'page' => 'admin/team/v_edit',
                'team' => $this->ModelTeam->DetailData($id_dosen),
            ];
        return view('v_template_back', $data);
    }

    public function updateData($id_team)
    {
        if ($this->validate([
            'nama_team' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'jabatan' => [
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'foto_team' => [
                'label' => 'Foto Team',
                'rules' => 'max_size[foto_team,500]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {
            $team = $this->ModelTeam->DetailData($id_team);
            $foto_team = $this->request->getFile('foto_team');
            if ($foto_team->getError() == 4) {
                $nama_file = $team['foto_team'];
            } else {
                # jika foto diganti
                $nama_file = $foto_team->getRandomName();
                $foto_team->move('foto', $nama_file);
            }

            $data = [
                'id_team'   => $id_team,
                'nama_team' => $this->request->getPost('nama_team'),
                'jabatan' => $this->request->getPost('jabatan'),
                'foto_team'    => $nama_file,
            ];

            $this->ModelTeam->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Team');
            //jika valid
        } else {
            return redirect()->to('Admin/Team/editData/' . $id_team)->withInput();
        }
    }


    public function deleteData($id_team)
    {
        $data = [
            'id_team' => $id_team,
        ];

        $this->ModelTeam->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete !');
        return redirect()->to('Admin/Team');
    }
}
