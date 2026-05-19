<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelUser;


class User extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->ModelUser = new ModelUser;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'User',
                'subjudul'    => 'User',
                'menu' => 'user',
                'submenu' => '',
                'page' => 'admin/v_user',
                'user' => $this->ModelUser->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        try {
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => sha1($this->request->getPost('password')),
                'level' => $this->request->getPost('level'),
            ];

            $this->ModelUser->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan!');
            return redirect()->to('Admin/User');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Tambah Data: ' . $e->getMessage());
        }
    }

    public function updateData($id_user)
    {
        try {
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'level' => $this->request->getPost('level'),
            ];

            $this->ModelUser->updateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diperbarui!');
            return redirect()->to('Admin/User');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Update Data: ' . $e->getMessage());
        }
    }

    public function updatePassword($id_user)
    {
        try {
            $data = [
                'id_user' => $id_user,
                'password' => sha1($this->request->getPost('password')),
            ];

            $this->ModelUser->updateData($data);
            session()->setFlashdata('update', 'Password Berhasil Diganti!');
            return redirect()->to('Admin/User');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Ganti Password: ' . $e->getMessage());
        }
    }

    public function  deleteData($id_user)
    {
        try {
            $data = [
                'id_user' => $id_user,
            ];

            $this->ModelUser->DeleteData($data);
            session()->setFlashdata('delete', 'Data Berhasil Dihapus!');
            return redirect()->to('Admin/User');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Hapus Data: ' . $e->getMessage());
        }
    }
}
