<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelUser;
use App\Models\ModelUnitusaha;

class User extends BaseController
{
    protected $ModelUser;
    protected $ModelUnitusaha;
    protected $helpers = ['email'];

    public function __construct()
    {
        $this->ModelUser     = new ModelUser();
        $this->ModelUnitusaha = new ModelUnitusaha();
        helper('email');
    }

    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul'       => 'Manajemen User',
            'subjudul'    => 'Kelola Pengguna Sistem',
            'menu'        => 'user',
            'submenu'     => '',
            'active_menu' => 'user',
            'page'        => 'user/v_user',
            'users'       => $this->ModelUser->AllData($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }

    public function create()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul'       => 'Tambah User',
            'subjudul'    => 'Form Tambah User Baru',
            'menu'        => 'user',
            'submenu'     => '',
            'active_menu' => 'user',
            'page'        => 'user/v_user_form',
            'unit_list'   => $this->ModelUnitusaha->getByBumdes($id_bumdes),
            'validation'  => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_user' => 'required',
            'username'  => 'required|is_unique[tbl_user.username]',
            'password'  => 'required|min_length[5]',
        ])) {
            return redirect()->to('bumdes/user/create')->withInput()->with('validation', $this->validator);
        }

        $level        = $this->request->getPost('level') ?: 2;
        $passwordPlain = $this->request->getPost('password');
        $email        = trim($this->request->getPost('email') ?? '');
        $nama         = $this->request->getPost('nama_user');
        $username     = $this->request->getPost('username');

        $data = [
            'nama_user' => $nama,
            'email'     => $email ?: null,
            'username'  => $username,
            'password'  => sha1($passwordPlain),
            'level'     => $level,
            'id_bumdes' => session()->get('user')['id_bumdes'],
            'id_unit'   => ($level == 3) ? $this->request->getPost('id_unit') : null,
        ];

        $this->ModelUser->InsertData($data);

        // Kirim email jika dicentang dan email terisi
        if ($this->request->getPost('kirim_email') && $email) {
            $hasil = kirim_email_akun($email, $nama, $username, $passwordPlain, 'tambah');
            if ($hasil !== true) {
                return redirect()->to('bumdes/user')->with('pesan', 'User berhasil ditambahkan!')->with('email_error', $hasil);
            }
        }

        return redirect()->to('bumdes/user')->with('pesan', 'User berhasil ditambahkan!' . ($email && $this->request->getPost('kirim_email') ? ' Email notifikasi telah dikirim.' : ''));
    }

    public function edit($id_user)
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul'       => 'Edit User',
            'subjudul'    => 'Ubah Data User',
            'menu'        => 'user',
            'submenu'     => '',
            'active_menu' => 'user',
            'page'        => 'user/v_user_form',
            'user'        => $this->ModelUser->DetailData($id_user),
            'unit_list'   => $this->ModelUnitusaha->getByBumdes($id_bumdes),
            'validation'  => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_user)
    {
        if (!$this->validate([
            'nama_user' => 'required',
            'username'  => "required|is_unique[tbl_user.username,id_user,{$id_user}]",
        ])) {
            return redirect()->to('bumdes/user/edit/'.$id_user)->withInput()->with('validation', $this->validator);
        }

        $level        = $this->request->getPost('level') ?: 2;
        $passwordPlain = $this->request->getPost('password');
        $email        = trim($this->request->getPost('email') ?? '');
        $nama         = $this->request->getPost('nama_user');
        $username     = $this->request->getPost('username');

        $data = [
            'id_user'  => $id_user,
            'nama_user'=> $nama,
            'email'    => $email ?: null,
            'username' => $username,
            'level'    => $level,
            'id_unit'  => ($level == 3) ? $this->request->getPost('id_unit') : null,
        ];

        if ($passwordPlain) {
            $data['password'] = sha1($passwordPlain);
        }

        $this->ModelUser->updateData($data);

        // Kirim email jika dicentang dan email terisi
        if ($this->request->getPost('kirim_email') && $email) {
            $hasil = kirim_email_akun($email, $nama, $username, $passwordPlain ?: '', 'edit');
            if ($hasil !== true) {
                return redirect()->to('bumdes/user')->with('pesan', 'User berhasil diperbarui!')->with('email_error', $hasil);
            }
        }

        return redirect()->to('bumdes/user')->with('pesan', 'User berhasil diperbarui!' . ($email && $this->request->getPost('kirim_email') ? ' Email notifikasi telah dikirim.' : ''));
    }

    public function delete($id_user)
    {
        $data = ['id_user' => $id_user];
        $this->ModelUser->DeleteData($data);
        return redirect()->to('bumdes/user')->with('pesan', 'User berhasil dihapus!');
    }
}