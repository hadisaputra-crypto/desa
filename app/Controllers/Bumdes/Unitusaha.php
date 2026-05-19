<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelUnitusaha;

class Unitusaha extends BaseController
{
    protected $ModelUnitusaha;
    
    public function __construct()
    {
        $this->ModelUnitusaha = new ModelUnitusaha();
    }
    
    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Unit Usaha',
            'subjudul' => 'Manajemen Unit Usaha BUMDes',
            'menu' => 'unitusaha',
            'submenu' => '',
            'active_menu' => 'unitusaha',
            'page' => 'user/v_unitusaha',
            'unit' => $this->ModelUnitusaha->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $data = [
            'judul' => 'Tambah Unit Usaha',
            'subjudul' => 'Form Tambah Unit Usaha',
            'menu' => 'unitusaha',
            'submenu' => '',
            'active_menu' => 'unitusaha',
            'page' => 'user/v_unitusaha_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_unit' => 'required',
        ])) {
            return redirect()->to('bumdes/unitusaha/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_unit' => $this->request->getPost('nama_unit'),
            'penanggung_jawab' => $this->request->getPost('penanggung_jawab'),
            'kontak' => $this->request->getPost('kontak'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => 'aktif',
            'id_bumdes' => session()->get('user')['id_bumdes'],
        ];

        $this->ModelUnitusaha->InsertData($data);
        return redirect()->to('bumdes/unitusaha')->with('pesan', 'Unit usaha berhasil ditambahkan!');
    }

    public function edit($id_unit)
    {
        $data = [
            'judul' => 'Edit Unit Usaha',
            'subjudul' => 'Form Edit Unit Usaha',
            'menu' => 'unitusaha',
            'submenu' => '',
            'active_menu' => 'unitusaha',
            'page' => 'user/v_unitusaha_form',
            'unit' => $this->ModelUnitusaha->DetailData($id_unit),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_unit)
    {
        if (!$this->validate([
            'nama_unit' => 'required',
        ])) {
            return redirect()->to('bumdes/unitusaha/edit/'.$id_unit)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_unit' => $id_unit,
            'nama_unit' => $this->request->getPost('nama_unit'),
            'penanggung_jawab' => $this->request->getPost('penanggung_jawab'),
            'kontak' => $this->request->getPost('kontak'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => $this->request->getPost('status'),
        ];

        $this->ModelUnitusaha->updateData($data);
        return redirect()->to('bumdes/unitusaha')->with('pesan', 'Unit usaha berhasil diperbarui!');
    }

    public function delete($id_unit)
    {
        $data = ['id_unit' => $id_unit];
        $this->ModelUnitusaha->DeleteData($data);
        return redirect()->to('bumdes/unitusaha')->with('pesan', 'Unit usaha berhasil dihapus!');
    }

    public function detail($id_unit)
    {
        $data = [
            'judul' => 'Detail Unit Usaha',
            'subjudul' => 'Informasi Detail Unit Usaha',
            'menu' => 'unitusaha',
            'submenu' => '',
            'active_menu' => 'unitusaha',
            'page' => 'user/v_unitusaha_detail',
            'unit' => $this->ModelUnitusaha->DetailData($id_unit),
        ];
        return view('pages/v_template_user', $data);
    }
}