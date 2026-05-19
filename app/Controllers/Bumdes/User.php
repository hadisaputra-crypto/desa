<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;
    
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }
    
    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Manajemen User',
            'subjudul' => 'Kelola Pengguna Sistem',
            'menu' => 'user',
            'submenu' => '',
            'active_menu' => 'user',
            'page' => 'user/v_user',
            'users' => $this->ModelUser->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $data = [
            'judul' => 'Tambah User',
            'subjudul' => 'Form Tambah User Baru',
            'menu' => 'user',
            'submenu' => '',
            'active_menu' => 'user',
            'page' => 'user/v_user_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_user' => 'required',
            'username' => 'required|is_unique[tbl_user.username]',
            'password' => 'required|min_length[5]',
        ])) {
            return redirect()->to('bumdes/user/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level') ?: 2,
            'id_bumdes' => session()->get('user')['id_bumdes'],
        ];

        $this->ModelUser->InsertData($data);
        return redirect()->to('bumdes/user')->with('pesan', 'User berhasil ditambahkan!');
    }

    public function edit($id_user)
    {
        $data = [
            'judul' => 'Edit User',
            'subjudul' => 'Ubah Data User',
            'menu' => 'user',
            'submenu' => '',
            'active_menu' => 'user',
            'page' => 'user/v_user_form',
            'user' => $this->ModelUser->DetailData($id_user),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_user)
    {
        if (!$this->validate([
            'nama_user' => 'required',
            'username' => "required|is_unique[tbl_user.username,id_user,$id_user]",
        ])) {
            return redirect()->to('bumdes/user/edit/'.$id_user)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level') ?: 2,
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = sha1($this->request->getPost('password'));
        }

        $this->ModelUser->updateData($data);
        return redirect()->to('bumdes/user')->with('pesan', 'User berhasil diperbarui!');
    }

    public function delete($id_user)
    {
        $data = ['id_user' => $id_user];
        $this->ModelUser->DeleteData($data);
        return redirect()->to('bumdes/user')->with('pesan', 'User berhasil dihapus!');
    }
}