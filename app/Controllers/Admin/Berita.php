<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelBerita;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Berita',
                'subjudul'    => 'Data Berita',
                'menu' => 'berita',
                'submenu' => 'berita',
                'page' => 'admin/berita/v_index',
                'berita' => $this->ModelBerita->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Berita',
                'subjudul'    => 'Tambah Berita',
                'menu' => 'berita',
                'submenu' => 'berita',
                'page' => 'admin/berita/v_tambah',
                'kategori' => $this->ModelBerita->AllDataKategori(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'judul_berita' => [
                'label' => 'Judul berita',
                'rules' => 'required|',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'id_kategori_berita' => [
                'label' => 'Kategori Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'isi_berita' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_berita' => [
                'label' => 'Cover Berita',
                'rules' => 'uploaded[cover_berita]|max_size[cover_berita,1600]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max Boleh 1600 KB !',
                ]
            ]
        ])) {
            $cover_berita = $this->request->getFile('cover_berita');
            $nama_file = $cover_berita->getRandomName();
            $cover_berita->move('cover', $nama_file);
            $data = [
                'judul_berita' => $this->request->getPost('judul_berita'),
                'isi_berita' => $this->request->getPost('isi_berita'),
                'slug_berita' => url_title($this->request->getPost('judul_berita')),
                'id_kategori_berita' => $this->request->getPost('id_kategori_berita'),
                'tgl_berita' => date('Y-m-d'),
                'jam_berita' => date('H:i:s'),
                'id_user' => session()->get('id_user'),
                'cover_berita'    => $nama_file,
            ];

            $this->ModelBerita->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Berita');
            //jika valid
        } else {
            return redirect()->to('Admin/Berita/tambahData')->withInput();
        }
    }

    public function geteditData($id_berita)
    {
        $data =
            [
                'judul' => 'berita',
                'subjudul'    => 'Edit berita',
                'menu' => 'berita',
                'submenu' => 'berita',
                'page' => 'admin/berita/v_edit',
                'kategori' => $this->ModelBerita->AllDataKategori(),
                'berita' => $this->ModelBerita->DetailData($id_berita),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_berita)
    {
        if ($this->validate([
            'judul_berita' => [
                'label' => 'Judul berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'id_kategori_berita' => [
                'label' => 'Kategori Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'isi_berita' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_berita' => [
                'label' => 'Cover Berita',
                'rules' => 'max_size[cover_berita,500]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {
            $berita = $this->ModelBerita->DetailData($id_berita);
            $cover_berita = $this->request->getFile('cover_berita');
            if ($cover_berita->getError() == 4) {
                $nama_file = $berita['cover_berita'];
            } else {
                # jika foto diganti
                $nama_file = $cover_berita->getRandomName();
                $cover_berita->move('cover', $nama_file);
            }

            $data = [
                'id_berita'   => $id_berita,
                'judul_berita' => $this->request->getPost('judul_berita'),
                'isi_berita' => $this->request->getPost('isi_berita'),
                'slug_berita' => url_title($this->request->getPost('judul_berita')),
                'id_kategori_berita' => $this->request->getPost('id_kategori_berita'),
                'id_user' => session()->get('id_user'),
                'cover_berita'    => $nama_file,
            ];

            $this->ModelBerita->UpdateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Berita');
            //jika valid
        } else {
            return redirect()->to('Admin/Berita/editData/' . $id_berita)->withInput();
        }
    }


    public function deleteData($id_berita)
    {
        $data = [
            'id_berita' => $id_berita,
        ];

        $this->ModelBerita->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete !');
        return redirect()->to('Admin/Berita');
    }


    //===Kategori berita======================================================

    public function getKategori()
    {
        $data =
            [
                'judul' => 'Berita',
                'subjudul'    => 'Kategori Berita',
                'menu' => 'berita',
                'submenu' => 'kategori',
                'page' => 'admin/berita/v_kategori',
                'kategori' => $this->ModelBerita->AllDataKategori(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function getinsertDataKategori()
    {
        $data = [
            'slug_kategori_berita' => url_title($this->request->getPost('kategori_berita')),
            'kategori_berita' => $this->request->getPost('kategori_berita'),
        ];

        $this->ModelBerita->InsertDataKategori($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('Admin/Berita/Kategori');
    }

    public function updateDataKategori($id_kategori_berita)
    {
        $data = [
            'id_kategori_berita' => $id_kategori_berita,
            'slug_kategori_berita' => url_title($this->request->getPost('kategori_berita')),
            'kategori_berita' => $this->request->getPost('kategori_berita'),
        ];

        $this->ModelBerita->UpdateDataKategori($data);
        session()->setFlashdata('update', 'Data Berhasil Diupdate !!');
        return redirect()->to('Admin/Berita/Kategori');
    }

    public function deleteDataKategori($id_kategori_berita)
    {
        $data = [
            'id_kategori_berita' => $id_kategori_berita,
        ];

        $this->ModelBerita->DeleteDataKategori($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !');
        return redirect()->to('Admin/Berita/Kategori');
    }
}
