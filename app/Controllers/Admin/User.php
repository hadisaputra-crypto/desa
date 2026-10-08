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
        helper('email');
    }

    public function getindex()
    {
        $db = \Config\Database::connect();
        $level_filter = $this->request->getGet('level');

        $builder = $db->table('tbl_user');
        if ($level_filter) {
            $builder->where('level', $level_filter);
        }
        $users = $builder->orderBy('id_user', 'ASC')->get()->getResultArray();

        $level_names = [
            1 => 'Super Admin',
            2 => 'Admin BUMDes',
            3 => 'Unit Usaha',
            4 => 'Admin Desa',
            5 => 'Admin Dinas',
        ];

        foreach ($users as &$u) {
            $u['level_nama'] = $level_names[$u['level']] ?? 'Tidak Diketahui';
            $u['bumdes_nama'] = '';
            if ($u['id_bumdes']) {
                $b = $db->table('tbl_bumdes')->where('id_bumdes', $u['id_bumdes'])->get()->getRowArray();
                $u['bumdes_nama'] = $b['nama_bumdes'] ?? '';
            }
        }

        $data = [
            'judul' => 'User',
            'subjudul' => 'Manajemen Pengguna',
            'menu' => 'akun',
            'submenu' => $level_filter ? 'filter' : 'semua',
            'page' => 'admin/v_user',
            'user' => $users,
            'level_filter' => $level_filter,
            'level_names' => $level_names,
        ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        try {
            $db = \Config\Database::connect();
            $level = $this->request->getPost('level');
            $nama = $this->request->getPost('nama_user');
            $username = $this->request->getPost('username');
            $passwordPlain = $this->request->getPost('password');
            $email = trim($this->request->getPost('email') ?? '');

            $data = [
                'nama_user' => $nama,
                'email' => $email ?: null,
                'username' => $username,
                'password' => sha1($passwordPlain),
                'level' => $level,
                'id_bumdes' => $this->request->getPost('id_bumdes') ?: null,
            ];

            $this->ModelUser->InsertData($data);
            
            $msg = 'Data Berhasil Ditambahkan!';
            if ($this->request->getPost('kirim_email') && $email) {
                $hasil = kirim_email_akun($email, $nama, $username, $passwordPlain, 'tambah');
                if ($hasil !== true) {
                    session()->setFlashdata('error', 'Data tersimpan, namun email gagal dikirim: ' . $hasil);
                } else {
                    $msg .= ' Email notifikasi telah dikirim.';
                }
            }
            
            if (!session()->getFlashdata('error')) {
                session()->setFlashdata('insert', $msg);
            }
            
            $redirect = 'Admin/User';
            if ($level) $redirect .= '?level=' . $level;
            return redirect()->to($redirect);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Tambah Data: ' . $e->getMessage());
        }
    }

    public function updateData($id_user)
    {
        try {
            $nama = $this->request->getPost('nama_user');
            $username = $this->request->getPost('username');
            $email = trim($this->request->getPost('email') ?? '');
            
            $data = [
                'id_user' => $id_user,
                'nama_user' => $nama,
                'email' => $email ?: null,
                'username' => $username,
                'level' => $this->request->getPost('level'),
                'id_bumdes' => $this->request->getPost('id_bumdes') ?: null,
            ];

            $this->ModelUser->updateData($data);
            
            $msg = 'Data Berhasil Diperbarui!';
            if ($this->request->getPost('kirim_email') && $email) {
                $hasil = kirim_email_akun($email, $nama, $username, '', 'edit');
                if ($hasil !== true) {
                    session()->setFlashdata('error', 'Data tersimpan, namun email gagal dikirim: ' . $hasil);
                } else {
                    $msg .= ' Email notifikasi telah dikirim.';
                }
            }
            
            if (!session()->getFlashdata('error')) {
                session()->setFlashdata('update', $msg);
            }
            
            return redirect()->to('Admin/User');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Update Data: ' . $e->getMessage());
        }
    }

    public function updatePassword($id_user)
    {
        try {
            $passwordPlain = $this->request->getPost('password');
            $data = [
                'id_user' => $id_user,
                'password' => sha1($passwordPlain),
            ];

            $this->ModelUser->updateData($data);
            
            $msg = 'Password Berhasil Diganti!';
            if ($this->request->getPost('kirim_email')) {
                $db = \Config\Database::connect();
                $user = $db->table('tbl_user')->where('id_user', $id_user)->get()->getRowArray();
                if ($user && $user['email']) {
                    $hasil = kirim_email_akun($user['email'], $user['nama_user'], $user['username'], $passwordPlain, 'edit');
                    if ($hasil !== true) {
                        session()->setFlashdata('error', 'Password diganti, namun email gagal dikirim: ' . $hasil);
                    } else {
                        $msg .= ' Email notifikasi telah dikirim.';
                    }
                }
            }
            
            if (!session()->getFlashdata('error')) {
                session()->setFlashdata('update', $msg);
            }
            
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
