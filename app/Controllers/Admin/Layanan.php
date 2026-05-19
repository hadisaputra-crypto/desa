<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelLayananPusat;

class Layanan extends BaseController
{
    public function __construct()
    {
        $this->ModelLayanan = new ModelLayananPusat;
        $this->helpers = ['form'];
    }

    public function getindex()
    {
        $data = [
            'judul' => 'Layanan Pusat',
            'subjudul' => 'Daftar Layanan Umum/Dinas',
            'menu' => 'layanan',
            'submenu' => 'layanan',
            'page' => 'admin/layanan/v_index',
            'layanan' => $this->ModelLayanan->AllData(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data = [
            'judul' => 'Layanan Pusat',
            'subjudul' => 'Tambah Layanan Umum',
            'menu' => 'layanan',
            'submenu' => 'layanan',
            'page' => 'admin/layanan/v_tambah',
        ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'nama_layanan' => 'required',
            'instansi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]',
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $foto->move('cover', $nama_file);

            $data = [
                'nama_layanan' => $this->request->getPost('nama_layanan'),
                'instansi' => $this->request->getPost('instansi'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'syarat' => $this->request->getPost('syarat'),
                'prosedur' => $this->request->getPost('prosedur'),
                'foto' => $nama_file,
            ];

            $this->ModelLayanan->InsertData($data);
            session()->setFlashdata('insert', 'Layanan Pusat Berhasil Ditambahkan!');
            return redirect()->to('Admin/Layanan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Silakan lengkapi data dengan benar.');
        }
    }

    public function geteditData($id_layanan)
    {
        $data = [
            'judul' => 'Layanan Pusat',
            'subjudul' => 'Edit Layanan Umum',
            'menu' => 'layanan',
            'submenu' => 'layanan',
            'page' => 'admin/layanan/v_edit',
            'layanan' => $this->ModelLayanan->DetailData($id_layanan),
        ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_layanan)
    {
        if ($this->validate([
            'nama_layanan' => 'required',
            'instansi' => 'required',
            'deskripsi' => 'required',
        ])) {
            $layanan = $this->ModelLayanan->DetailData($id_layanan);
            $foto = $this->request->getFile('foto');
            
            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $nama_file = $foto->getRandomName();
                $foto->move('cover', $nama_file);
                if ($layanan['foto'] && file_exists('cover/' . $layanan['foto'])) {
                    unlink('cover/' . $layanan['foto']);
                }
            } else {
                $nama_file = $layanan['foto'];
            }

            $data = [
                'id_layanan_pusat' => $id_layanan,
                'nama_layanan' => $this->request->getPost('nama_layanan'),
                'instansi' => $this->request->getPost('instansi'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'syarat' => $this->request->getPost('syarat'),
                'prosedur' => $this->request->getPost('prosedur'),
                'foto' => $nama_file,
            ];

            $this->ModelLayanan->updateData($data);
            session()->setFlashdata('update', 'Layanan Pusat Berhasil Diperbarui!');
            return redirect()->to('Admin/Layanan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Silakan lengkapi data dengan benar.');
        }
    }

    public function deleteData($id_layanan)
    {
        $layanan = $this->ModelLayanan->DetailData($id_layanan);
        if ($layanan['foto'] && file_exists('cover/' . $layanan['foto'])) {
            unlink('cover/' . $layanan['foto']);
        }
        
        $data = ['id_layanan_pusat' => $id_layanan];
        $this->ModelLayanan->DeleteData($data);
        session()->setFlashdata('delete', 'Layanan Pusat Berhasil Dihapus!');
        return redirect()->to('Admin/Layanan');
    }
}
