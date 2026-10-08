<?php

namespace App\Controllers\Unit;
use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Produk extends BaseController
{
    protected $ModelProduk;
    protected $ModelKategori;

    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $id_unit = session()->get('user')['id_unit'];
        $data = [
            'judul' => 'Produk',
            'subjudul' => 'Data Produk Unit Usaha',
            'menu' => 'produk',
            'submenu' => '',
            'active_menu' => 'produk',
            'page' => 'unit/v_produk',
            'produk' => $this->ModelProduk->AllDataByUnit($id_unit),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function create()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Tambah Produk',
            'subjudul' => 'Form Tambah Produk',
            'menu' => 'produk',
            'submenu' => '',
            'active_menu' => 'produk',
            'page' => 'unit/v_produk_form',
            'kategori' => $this->ModelKategori->AllData($id_bumdes),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
        ])) {
            return redirect()->to('unit/produk/create')->withInput()->with('validation', $this->validator);
        }

        $user = session()->get('user');
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok') ?: 0,
            'id_bumdes' => $user['id_bumdes'],
            'id_unit' => $user['id_unit'],
        ];

        $this->ModelProduk->InsertData($data);
        return redirect()->to('unit/produk')->with('pesan', 'Produk berhasil ditambahkan!');
    }

    public function edit($id_produk)
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Edit Produk',
            'subjudul' => 'Form Edit Produk',
            'menu' => 'produk',
            'submenu' => '',
            'active_menu' => 'produk',
            'page' => 'unit/v_produk_form',
            'produk' => $this->ModelProduk->DetailData($id_produk),
            'kategori' => $this->ModelKategori->AllData($id_bumdes),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function update($id_produk)
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
        ])) {
            return redirect()->to('unit/produk/edit/'.$id_produk)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok') ?: 0,
        ];

        $this->ModelProduk->updateData($data);
        return redirect()->to('unit/produk')->with('pesan', 'Produk berhasil diperbarui!');
    }

    public function delete($id_produk)
    {
        $data = ['id_produk' => $id_produk];
        $this->ModelProduk->DeleteData($data);
        return redirect()->to('unit/produk')->with('pesan', 'Produk berhasil dihapus!');
    }

    public function detail($id_produk)
    {
        $data = [
            'judul' => 'Detail Produk',
            'subjudul' => 'Informasi Detail Produk',
            'menu' => 'produk',
            'submenu' => '',
            'active_menu' => 'produk',
            'page' => 'unit/v_produk_detail',
            'produk' => $this->ModelProduk->DetailData($id_produk),
        ];
        return view('pages/v_template_unit', $data);
    }
}
