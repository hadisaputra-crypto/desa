<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelSetting;

class Setting extends BaseController
{

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting;
    }


    public function getLogo()
    {
        $data =
            [
                'judul' => 'Setting',
                'subjudul'    => 'Logo',
                'menu' => 'setting',
                'submenu' => 'logo',
                'page' => 'admin/setting/v_logo',
                'web' => $this->ModelSetting->Detail(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateLogo()
    {
        if ($this->validate([
            'logo' => [
                'label' => 'Logo Kampus',
                'rules' => 'max_size[logo,150]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 150 KB !',
                ]
            ]
        ])) {

            $web = $this->ModelSetting->Detail();
            $logo = $this->request->getFile('logo');
            if ($logo->getError() == 4) {
                $nama_file = $web['logo'];
            } else {
                # jika foto diganti
                $nama_file = $logo->getRandomName();
                $logo->move('logo', $nama_file);
            }
            $data = [
                'id' => '1',
                'logo'    => $nama_file,
            ];

            $this->ModelSetting->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Setting/Logo');
            //jika valid
        } else {
            return redirect()->to('Admin/Setting/Logo')->withInput();
        }
    }

    public function getHeader()
    {
        $data =
            [
                'judul' => 'Setting',
                'subjudul'    => 'Logo Header',
                'menu' => 'setting',
                'submenu' => 'header',
                'page' => 'admin/setting/v_header',
                'web' => $this->ModelSetting->Detail(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateHeader()
    {
        if ($this->validate([
            'logo_header' => [
                'label' => 'Logo Header',
                'rules' => 'max_size[logo_header,150]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 150 KB !',
                ]
            ]
        ])) {

            $web = $this->ModelSetting->Detail();
            $logo_header = $this->request->getFile('logo_header');
            if ($logo_header->getError() == 4) {
                $nama_file = $web['logo_header'];
            } else {
                # jika foto diganti
                $nama_file = $logo_header->getRandomName();
                $logo_header->move('logo', $nama_file);
            }
            $data = [
                'id' => '1',
                'logo_header'    => $nama_file,
            ];

            $this->ModelSetting->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Setting/Header');
            //jika valid
        } else {
            return redirect()->to('Admin/Setting/Header')->withInput();
        }
    }

    public function getLembaga()
    {
        $data =
            [
                'judul' => 'Setting',
                'subjudul'    => 'Data Lembaga',
                'menu' => 'setting',
                'submenu' => 'lembaga',
                'page' => 'admin/setting/v_kampus',
                'web' => $this->ModelSetting->Detail(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateKampus()
    {
        if ($this->validate([
            'nama_kampus' => [
                'label' => 'Nama Kampus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'telpon' => [
                'label' => 'Telpon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],

            'fb' => [
                'label' => 'Facebook',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'ig' => [
                'label' => 'Instagram',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'yt' => [
                'label' => 'Youtube',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'linkedin' => [
                'label' => 'LinkedIn',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'twitter' => [
                'label' => 'Twitter',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],

        ])) {
            $data = [
                'id' => '1',
                'nama_kampus' => $this->request->getPost('nama_kampus'),
                'alamat' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email'),
                'telpon' => $this->request->getPost('telpon'),
                'fb' => $this->request->getPost('fb'),
                'ig' => $this->request->getPost('ig'),
                'yt' => $this->request->getPost('yt'),
                'linkedin' => $this->request->getPost('linkedin'),
                'twitter' => $this->request->getPost('twitter'),
            ];

            $this->ModelSetting->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Setting/Lembaga');
            //jika valid
        } else {
            return redirect()->to('Admin/Setting/Lembaga')->withInput();
        }
    }

    public function getSambutan()
    {
        $data =
            [
                'judul' => 'Setting',
                'subjudul'    => 'Sambutan',
                'menu' => 'setting',
                'submenu' => 'sambutan',
                'page' => 'admin/setting/v_sambutan',
                'web' => $this->ModelSetting->Detail(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateSambutan()
    {
        if ($this->validate([
            'nama_pimpinan' => [
                'label' => 'Nama Pimpinan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'dipimpin_oleh' => [
                'label' => 'Dipimpin Oleh',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'kata_sambutan' => [
                'label' => 'Kata Sambutan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'foto_pimpinan' => [
                'label' => 'Logo Header',
                'rules' => 'max_size[foto_pimpinan,250]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 250 KB !',
                ]
            ]
        ])) {
            $web = $this->ModelSetting->Detail();
            $foto_pimpinan = $this->request->getFile('foto_pimpinan');
            if ($foto_pimpinan->getError() == 4) {
                $nama_file = $web['foto_pimpinan'];
            } else {
                # jika foto diganti
                $nama_file = $foto_pimpinan->getRandomName();
                $foto_pimpinan->move('foto', $nama_file);
            }
            $data = [
                'id' => '1',
                'nama_pimpinan' => $this->request->getPost('nama_pimpinan'),
                'dipimpin_oleh' => $this->request->getPost('dipimpin_oleh'),
                'kata_sambutan' => $this->request->getPost('kata_sambutan'),
                'foto_pimpinan'    => $nama_file,
            ];

            $this->ModelSetting->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Setting/Sambutan');
            //jika valid
        } else {
            return redirect()->to('Admin/Setting/Sambutan')->withInput();
        }
    }
}
