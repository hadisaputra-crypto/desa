<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelPengumuman;

class Pengumuman extends BaseController
{
    protected $ModelPengumuman;
    
    public function __construct()
    {
        $this->ModelPengumuman = new ModelPengumuman();
    }
    
    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Pengumuman',
            'subjudul' => 'Manajemen Pengumuman BUMDes',
            'menu' => 'pengumuman',
            'submenu' => '',
            'active_menu' => 'pengumuman',
            'page' => 'user/v_pengumuman',
            'pengumuman' => $this->ModelPengumuman->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $data = [
            'judul' => 'Tambah Pengumuman',
            'subjudul' => 'Form Tambah Pengumuman Baru',
            'menu' => 'pengumuman',
            'submenu' => '',
            'active_menu' => 'pengumuman',
            'page' => 'user/v_pengumuman_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
        ])) {
            return redirect()->to('bumdes/pengumuman/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
            'isi_pengumuman' => $this->request->getPost('isi_pengumuman'),
            'tgl_pengumuman' => date('Y-m-d'),
            'id_bumdes' => session()->get('user')['id_bumdes'],
        ];

        $this->ModelPengumuman->InsertData($data);
        return redirect()->to('bumdes/pengumuman')->with('pesan', 'Pengumuman berhasil dipublikasikan!');
    }

    public function edit($id_pengumuman)
    {
        $data = [
            'judul' => 'Edit Pengumuman',
            'subjudul' => 'Form Edit Pengumuman',
            'menu' => 'pengumuman',
            'submenu' => '',
            'active_menu' => 'pengumuman',
            'page' => 'user/v_pengumuman_form',
            'pengumuman' => $this->ModelPengumuman->DetailData($id_pengumuman),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_pengumuman)
    {
        if (!$this->validate([
            'judul_pengumuman' => 'required',
        ])) {
            return redirect()->to('bumdes/pengumuman/edit/'.$id_pengumuman)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_pengumuman' => $id_pengumuman,
            'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
            'isi_pengumuman' => $this->request->getPost('isi_pengumuman'),
        ];

        $this->ModelPengumuman->UpdateData($data);
        return redirect()->to('bumdes/pengumuman')->with('pesan', 'Pengumuman berhasil diperbarui!');
    }

    public function delete($id_pengumuman)
    {
        $data = ['id_pengumuman' => $id_pengumuman];
        $this->ModelPengumuman->DeleteData($data);
        return redirect()->to('bumdes/pengumuman')->with('pesan', 'Pengumuman berhasil dihapus!');
    }

    public function detail($id_pengumuman)
    {
        $data = [
            'judul' => 'Detail Pengumuman',
            'subjudul' => 'Informasi Detail Pengumuman',
            'menu' => 'pengumuman',
            'submenu' => '',
            'active_menu' => 'pengumuman',
            'page' => 'user/v_pengumuman_detail',
            'pengumuman' => $this->ModelPengumuman->DetailData($id_pengumuman),
        ];
        return view('pages/v_template_user', $data);
    }
}