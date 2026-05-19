<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Anggota extends BaseController
{
    protected $ModelAnggota;
    
    public function __construct()
    {
        $this->ModelAnggota = new ModelAnggota();
    }
    
    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Anggota',
            'subjudul' => 'Manajemen Anggota BUMDes',
            'menu' => 'anggota',
            'submenu' => '',
            'active_menu' => 'anggota',
            'page' => 'user/v_anggota',
            'anggota' => $this->ModelAnggota->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $data = [
            'judul' => 'Tambah Anggota',
            'subjudul' => 'Form Tambah Anggota',
            'menu' => 'anggota',
            'submenu' => '',
            'active_menu' => 'anggota',
            'page' => 'user/v_anggota_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_anggota' => 'required',
            'nik' => 'required|numeric',
        ])) {
            return redirect()->to('bumdes/anggota/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jabatan' => $this->request->getPost('jabatan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'id_bumdes' => session()->get('user')['id_bumdes'],
        ];

        $this->ModelAnggota->InsertData($data);
        return redirect()->to('bumdes/anggota')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($id_anggota)
    {
        $data = [
            'judul' => 'Edit Anggota',
            'subjudul' => 'Form Edit Anggota',
            'menu' => 'anggota',
            'submenu' => '',
            'active_menu' => 'anggota',
            'page' => 'user/v_anggota_form',
            'anggota' => $this->ModelAnggota->DetailData($id_anggota),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_anggota)
    {
        if (!$this->validate([
            'nama_anggota' => 'required',
        ])) {
            return redirect()->to('bumdes/anggota/edit/'.$id_anggota)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_anggota' => $id_anggota,
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jabatan' => $this->request->getPost('jabatan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $this->ModelAnggota->updateData($data);
        return redirect()->to('bumdes/anggota')->with('pesan', 'Data berhasil diperbarui!');
    }

    public function delete($id_anggota)
    {
        $data = ['id_anggota' => $id_anggota];
        $this->ModelAnggota->DeleteData($data);
        return redirect()->to('bumdes/anggota')->with('pesan', 'Data berhasil dihapus!');
    }

    public function detail($id_anggota)
    {
        $data = [
            'judul' => 'Detail Anggota',
            'subjudul' => 'Informasi Detail Anggota',
            'menu' => 'anggota',
            'submenu' => '',
            'active_menu' => 'anggota',
            'page' => 'user/v_anggota_detail',
            'anggota' => $this->ModelAnggota->DetailData($id_anggota),
        ];
        return view('pages/v_template_user', $data);
    }
}