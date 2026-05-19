<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function getIndex()
    {
        $id_user = session()->get('id_user');
        $data = [
            'judul' => 'Profile',
            'subjudul' => 'Profil Saya',
            'menu' => 'profile_user',
            'submenu' => '',
            'page' => 'admin/v_profile',
            'user' => $this->ModelUser->DetailData($id_user),
        ];
        return view('pages/v_template_back', $data);
    }

    public function updateProfile()
    {
        if ($this->validate([
            'nama_user' => 'required',
            'username' => 'required',
        ])) {
            $id_user = session()->get('id_user');
            $data = [
                'id_user'   => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'username'  => $this->request->getPost('username'),
            ];

            $this->ModelUser->updateData($data);

            // Update session
            $session = session()->get('user');
            $session['nama'] = $data['nama_user'];
            $session['username'] = $data['username'];
            session()->set('user', $session);
            session()->set('nama_user', $data['nama_user']);

            session()->setFlashdata('update', 'Profil berhasil diperbarui!');
            return redirect()->to('Admin/Profile');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil.');
        }
    }

    public function changePassword()
    {
        $id_user = session()->get('id_user');
        $password = $this->request->getPost('password');
        
        $data = [
            'id_user'  => $id_user,
            'password' => sha1($password)
        ];
        $this->ModelUser->updateData($data);

        session()->setFlashdata('update', 'Password berhasil diubah!');
        return redirect()->to('Admin/Profile');
    }
}
