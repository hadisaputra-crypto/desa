<?php

namespace App\Controllers\Unit;
use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function getIndex()
    {
        $data = [
            'judul' => 'Profile',
            'subjudul' => 'Pengaturan Profile',
            'menu' => 'profile',
            'submenu' => '',
            'active_menu' => 'profile',
            'page' => 'unit/v_profile',
        ];
        return view('pages/v_template_unit', $data);
    }

    public function updateProfile()
    {
        $id_user = session()->get('user')['id_user'];
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
        ];
        $this->db->table('tbl_user')->where('id_user', $id_user)->update($data);
        return redirect()->to('unit/profile')->with('pesan', 'Profile berhasil diperbarui!');
    }

    public function changePassword()
    {
        $id_user = session()->get('user')['id_user'];
        $password = sha1($this->request->getPost('password'));
        $this->db->table('tbl_user')->where('id_user', $id_user)->update(['password' => $password]);
        return redirect()->to('unit/profile')->with('pesan', 'Password berhasil diubah!');
    }
}
