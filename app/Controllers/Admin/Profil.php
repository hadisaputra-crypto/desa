<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelProfil;

class Profil extends BaseController
{

    public function __construct()
    {
        $this->ModelProfil = new ModelProfil;
    }

    public function getTentang()
    {
        $data =
            [
                'judul' => 'Profil',
                'subjudul'    => 'About Us',
                'menu' => 'profil',
                'submenu' => 'sejarah',
                'page' => 'admin/profil/v_tentang',
                'profil' => $this->ModelProfil->Profil(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateAbout()
    {
        if ($this->validate([
            'tentang' => [
                'label' => 'Tentang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
        ])) {
            $data = [
                'id' => '1',
                'tentang' => $this->request->getPost('tentang'),
            ];
            $this->ModelProfil->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('Admin/Profil/Tentang');
            //jika valid
        } else {
            return redirect()->to('Admin/Profil/Tentang')->withInput();
        }
    }


    public function getVisiMisi()
    {
        $data =
            [
                'judul' => 'Profil',
                'subjudul'    => 'Visi Dan Misi',
                'menu' => 'profil',
                'submenu' => 'visimisi',
                'page' => 'admin/profil/v_visi_misi',
                'profil' => $this->ModelProfil->Profil(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateVisiMisi()
    {
        if ($this->validate([
            'visi_misi' => [
                'label' => 'Visi Dan Misi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
        ])) {
            $data = [
                'id' => '1',
                'visi_misi' => $this->request->getPost('visi_misi'),
            ];

            $this->ModelProfil->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('Admin/Profil/VisiMisi');
            //jika valid
        } else {
            return redirect()->to('Admin/Profil/VisiMisi')->withInput();
        }
    }

    public function getStrukturOrganisasi()
    {
        $data =
            [
                'judul' => 'Profil',
                'subjudul'    => 'Struktur Organisasi',
                'menu' => 'profil',
                'submenu' => 'struktur',
                'page' => 'admin/profil/v_struktur_organisasi',
                'profil' => $this->ModelProfil->Profil(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateStrukturOrganisasi()
    {
        if ($this->validate([
            'struktur_organisasi' => [
                'label' => 'Logo Lembaga',
                'rules' => 'max_size[struktur_organisasi,1500]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 1500 KB !',
                ]
            ]
        ])) {

            $profil = $this->ModelProfil->Profil();
            $struktur_organisasi = $this->request->getFile('struktur_organisasi');
            if ($struktur_organisasi->getError() == 4) {
                $nama_file = $profil['struktur_organisasi'];
            } else {
                # jika foto diganti
                $nama_file = $struktur_organisasi->getRandomName();
                $struktur_organisasi->move('images', $nama_file);
            }
            $data = [
                'id' => '1',
                'struktur_organisasi'    => $nama_file,
            ];

            $this->ModelProfil->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Profil/StrukturOrganisasi');
            //jika valid
        } else {
            return redirect()->to('Admin/Profil/StrukturOrganisasi')->withInput();
        }
    }
}
