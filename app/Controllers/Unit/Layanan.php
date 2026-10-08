<?php

namespace App\Controllers\Unit;
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
        $id_unit = session()->get('user')['id_unit'];
        $data = [
            'judul' => 'Layanan / Jasa',
            'subjudul' => 'Data Layanan Unit Usaha',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'unit/v_layanan',
            'layanan' => $this->ModelLayanan->AllDataByUnit($id_unit),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function create()
    {
        $data = [
            'judul' => 'Tambah Layanan',
            'subjudul' => 'Form Tambah Layanan',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'unit/v_layanan_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_layanan' => 'required',
        ])) {
            return redirect()->to('unit/layanan/create')->withInput()->with('validation', $this->validator);
        }

        $user = session()->get('user');
        $data = [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga') ?: 0,
            'satuan' => $this->request->getPost('satuan'),
            'id_bumdes' => $user['id_bumdes'],
            'id_unit' => $user['id_unit'],
        ];

        $this->ModelLayanan->InsertData($data);
        return redirect()->to('unit/layanan')->with('pesan', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id_layanan)
    {
        $data = [
            'judul' => 'Edit Layanan',
            'subjudul' => 'Form Edit Layanan',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'unit/v_layanan_form',
            'layanan' => $this->ModelLayanan->DetailData($id_layanan),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function update($id_layanan)
    {
        if (!$this->validate([
            'nama_layanan' => 'required',
        ])) {
            return redirect()->to('unit/layanan/edit/'.$id_layanan)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_layanan' => $id_layanan,
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga') ?: 0,
            'satuan' => $this->request->getPost('satuan'),
        ];

        $this->ModelLayanan->updateData($data);
        return redirect()->to('unit/layanan')->with('pesan', 'Layanan berhasil diperbarui!');
    }

    public function delete($id_layanan)
    {
        $data = ['id_layanan' => $id_layanan];
        $this->ModelLayanan->DeleteData($data);
        return redirect()->to('unit/layanan')->with('pesan', 'Layanan berhasil dihapus!');
    }

    public function detail($id_layanan)
    {
        $data = [
            'judul' => 'Detail Layanan',
            'subjudul' => 'Informasi Detail Layanan',
            'menu' => 'layanan',
            'submenu' => '',
            'active_menu' => 'layanan',
            'page' => 'unit/v_layanan_detail',
            'layanan' => $this->ModelLayanan->DetailData($id_layanan),
        ];
        return view('pages/v_template_unit', $data);
    }
}
