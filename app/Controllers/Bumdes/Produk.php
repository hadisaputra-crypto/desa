<?php

namespace App\Controllers\Bumdes;
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
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Produk',
            'subjudul' => 'Manajemen Produk BUMDes',
            'menu' => 'produk',
            'submenu' => '',
            'active_menu' => 'produk',
            'page' => 'user/v_produk',
            'produk' => $this->ModelProduk->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Tambah Produk',
            'subjudul' => 'Form Tambah Produk Baru',
            'menu' => 'produk',
            'submenu' => '',
            'active_menu' => 'produk',
            'page' => 'user/v_produk_form',
            'kategori' => $this->ModelKategori->AllData($id_bumdes),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('bumdes/produk/create')->withInput()->with('validation', $this->validator);
        }

        $foto = $this->request->getFile('foto');
        $nama_foto = "";
        if ($foto->getError() != 4) {
            $nama_foto = $foto->getRandomName();
            $foto->move('produk', $nama_foto);
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'satuan' => $this->request->getPost('satuan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $nama_foto,
            'id_bumdes' => session()->get('user')['id_bumdes'],
            'status' => 1
        ];

        $this->ModelProduk->InsertData($data);
        return redirect()->to('bumdes/produk')->with('pesan', 'Produk berhasil ditambahkan!');
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
            'page' => 'user/v_produk_form',
            'produk' => $this->ModelProduk->DetailData($id_produk),
            'kategori' => $this->ModelKategori->AllData($id_bumdes),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_produk)
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('bumdes/produk/edit/'.$id_produk)->withInput()->with('validation', $this->validator);
        }

        $produk = $this->ModelProduk->DetailData($id_produk);
        $foto = $this->request->getFile('foto');
        
        if ($foto->getError() == 4) {
            $nama_foto = $produk['foto'];
        } else {
            $nama_foto = $foto->getRandomName();
            $foto->move('produk', $nama_foto);
            if ($produk['foto'] != "" && file_exists('produk/' . $produk['foto'])) {
                unlink('produk/' . $produk['foto']);
            }
        }

        $data = [
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'satuan' => $this->request->getPost('satuan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $nama_foto,
            'status' => $this->request->getPost('status'),
        ];

        $this->ModelProduk->updateData($data);
        return redirect()->to('bumdes/produk')->with('pesan', 'Produk berhasil diperbarui!');
    }

    public function delete($id_produk)
    {
        $data = ['id_produk' => $id_produk];
        $this->ModelProduk->DeleteData($data);
        return redirect()->to('bumdes/produk')->with('pesan', 'Produk berhasil dihapus!');
    }

    public function detail($id_produk)
    {
        $data = [
            'judul' => 'Detail Produk',
            'subjudul' => 'Informasi Detail Produk',
            'menu' => 'produk',
            'submenu' => '',
            'active_menu' => 'produk',
            'page' => 'user/v_produk_detail',
            'produk' => $this->ModelProduk->DetailData($id_produk),
        ];
        return view('pages/v_template_user', $data);
    }
}