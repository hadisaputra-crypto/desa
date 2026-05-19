<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelLayanan;

class Layanan extends BaseController
{
    protected $ModelLayanan;
    
    public function __construct()
    {
        $this->ModelLayanan = new ModelLayanan();
    }
    
    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Layanan',
            'subjudul' => 'Manajemen Layanan BUMDes',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'user/v_layanan',
            'layanan' => $this->ModelLayanan->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $data = [
            'judul' => 'Tambah Layanan',
            'subjudul' => 'Form Tambah Layanan Baru',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'user/v_layanan_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_layanan' => 'required',
        ])) {
            return redirect()->to('bumdes/layanan/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'id_bumdes' => session()->get('user')['id_bumdes'],
        ];

        $this->ModelLayanan->InsertData($data);
        return redirect()->to('bumdes/layanan')->with('pesan', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id_layanan)
    {
        $data = [
            'judul' => 'Edit Layanan',
            'subjudul' => 'Form Edit Layanan',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'user/v_layanan_form',
            'layanan' => $this->ModelLayanan->DetailData($id_layanan),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_layanan)
    {
        if (!$this->validate([
            'nama_layanan' => 'required',
        ])) {
            return redirect()->to('bumdes/layanan/edit/'.$id_layanan)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_layanan' => $id_layanan,
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $this->ModelLayanan->updateData($data);
        return redirect()->to('bumdes/layanan')->with('pesan', 'Layanan berhasil diperbarui!');
    }

    public function delete($id_layanan)
    {
        $data = ['id_layanan' => $id_layanan];
        $this->ModelLayanan->DeleteData($data);
        return redirect()->to('bumdes/layanan')->with('pesan', 'Layanan berhasil dihapus!');
    }

    public function detail($id_layanan)
    {
        $data = [
            'judul' => 'Detail Layanan',
            'subjudul' => 'Informasi Detail Layanan',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'user/v_layanan_detail',
            'layanan' => $this->ModelLayanan->DetailData($id_layanan),
        ];
        return view('pages/v_template_user', $data);
    }
}