<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    protected $ModelKategori;
    
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }
    
    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Kategori Produk',
            'subjudul' => 'Manajemen Kategori Produk BUMDes',
            'menu' => 'kategori',
            'submenu' => '',
            'active_menu' => 'kategori',
            'page' => 'user/v_kategori',
            'kategori' => $this->ModelKategori->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $data = [
            'judul' => 'Tambah Kategori',
            'subjudul' => 'Form Tambah Kategori Baru',
            'menu' => 'kategori',
            'submenu' => '',
            'active_menu' => 'kategori',
            'page' => 'user/v_kategori_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => 'required',
        ])) {
            return redirect()->to('bumdes/kategori/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'id_bumdes' => session()->get('user')['id_bumdes'],
        ];

        $this->ModelKategori->InsertData($data);
        return redirect()->to('bumdes/kategori')->with('pesan', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id_kategori)
    {
        $data = [
            'judul' => 'Edit Kategori',
            'subjudul' => 'Form Edit Kategori',
            'menu' => 'kategori',
            'submenu' => '',
            'active_menu' => 'kategori',
            'page' => 'user/v_kategori_form',
            'kategori' => $this->ModelKategori->DetailData($id_kategori),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_kategori)
    {
        if (!$this->validate([
            'nama_kategori' => 'required',
        ])) {
            return redirect()->to('bumdes/kategori/edit/'.$id_kategori)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];

        $this->ModelKategori->updateData($data);
        return redirect()->to('bumdes/kategori')->with('pesan', 'Kategori berhasil diperbarui!');
    }

    public function delete($id_kategori)
    {
        $data = ['id_kategori' => $id_kategori];
        $this->ModelKategori->DeleteData($data);
        return redirect()->to('bumdes/kategori')->with('pesan', 'Kategori berhasil dihapus!');
    }
}