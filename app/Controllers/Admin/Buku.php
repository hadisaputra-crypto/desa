<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelBuku;

class Buku extends BaseController
{

    public function __construct()
    {
        $this->ModelBuku = new ModelBuku;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Buku',
                'subjudul'    => 'Buku',
                'menu' => 'buku',
                'submenu' => '',
                'page' => 'admin/buku/v_index',
                'buku' => $this->ModelBuku->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Buku',
                'subjudul'    => 'Tambah Buku',
                'menu' => 'buku',
                'submenu' => 'buku',
                'page' => 'admin/buku/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'judul_buku' => [
                'label' => 'Judul Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'isbn' => [
                'label' => 'ISBN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'penulis_buku' => [
                'label' => 'Penulis Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'penerbit_buku' => [
                'label' => 'Penerbit Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'deskripsi_buku' => [
                'label' => 'Deskripsi Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'harga_buku' => [
                'label' => 'Harga Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'halaman_buku' => [
                'label' => 'Halaman Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],           
            'tgl_terbit' => [
                'label' => 'Tanggal Terbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_buku' => [
                'label' => 'Cover Buku',
                'rules' => 'uploaded[cover_buku]|max_size[cover_buku,1024]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ]
        ])) {
            $cover_playlist = $this->request->getFile('cover_buku');
            $nama_file = $cover_playlist->getRandomName();
            $cover_playlist->move('cover', $nama_file);
            $data = [
                'judul_buku' => $this->request->getPost('judul_buku'),
                'slug_buku' => url_title($this->request->getPost('judul_buku')),
                'isbn' => $this->request->getPost('isbn'),
                'penulis_buku' => $this->request->getPost('penulis_buku'),
                'penerbit_buku' => $this->request->getPost('penerbit_buku'),
                'tgl_terbit' => $this->request->getPost('tgl_terbit'),
                'deskripsi_buku' => $this->request->getPost('deskripsi_buku'),
                'halaman_buku' => $this->request->getPost('halaman_buku'),
                'harga_buku' => $this->request->getPost('harga_buku'),
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d'),
                'cover_buku'    => $nama_file,
            ];

            $this->ModelBuku->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('Admin/Buku');
            //jika valid
        } else {
            return redirect()->to('Admin/Buku/tambahData')->withInput();
        }
    }

    public function  deleteData($id_buku)
    {
        $data = [
            'id_buku' => $id_buku,
        ];

        $this->ModelBuku->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Ditambahkan');
        return redirect()->to('Admin/Buku');
    }

    public function geteditData($id_buku)
    {
        $data =
            [
                'judul' => 'Client',
                'subjudul'    => 'Edit Client',
                'menu' => 'client',
                'submenu' => 'client',
                'page' => 'admin/buku/v_edit',
                'buku' => $this->ModelBuku->DetailData($id_buku),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_buku)
    {
        if ($this->validate([
            'judul_buku' => [
                'label' => 'Judul Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'isbn' => [
                'label' => 'ISBN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'penulis_buku' => [
                'label' => 'Penulis Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'penerbit_buku' => [
                'label' => 'Penerbit Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'deskripsi_buku' => [
                'label' => 'Deskripsi Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'harga_buku' => [
                'label' => 'Harga Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'halaman_buku' => [
                'label' => 'Halaman Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tgl_terbit' => [
                'label' => 'Tanggal Terbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_buku' => [
                'label' => 'Cover Buku',
                'rules' => 'max_size[cover_buku,1024]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max Boleh 1024 KB !',
                ]
            ]
        ])) {

            $buku = $this->ModelBuku->DetailData($id_buku);
            $cover_buku = $this->request->getFile('cover_buku');
            if ($cover_buku->getError() == 4) {
                $nama_file = $buku['cover_buku'];
            } else {
                # jika foto diganti
                $nama_file = $cover_buku->getRandomName();
                $cover_buku->move('cover', $nama_file);
            }
            $data = [
                'id_buku' => $id_buku,
                'judul_buku' => $this->request->getPost('judul_buku'),
                'slug_buku' => url_title($this->request->getPost('judul_buku')),
                'isbn' => $this->request->getPost('isbn'),
                'penulis_buku' => $this->request->getPost('penulis_buku'),
                'penerbit_buku' => $this->request->getPost('penerbit_buku'),
                'tgl_terbit' => $this->request->getPost('tgl_terbit'),
                'deskripsi_buku' => $this->request->getPost('deskripsi_buku'),
                'halaman_buku' => $this->request->getPost('halaman_buku'),
                'harga_buku' => $this->request->getPost('harga_buku'),
                'update_at' => date('Y-m-d'),
                'cover_buku'    => $nama_file,
            ];

            $this->ModelBuku->updateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Buku');
            //jika valid
        } else {
            return redirect()->to('Admin/Buku/editData/' . $id_buku)->withInput();
        }
    }
}
