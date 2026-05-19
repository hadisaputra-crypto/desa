<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use App\Models\ModelSetting;

class Auth extends BaseController
{

  public function __construct()
  {
    $this->ModelAuth = new ModelAuth();
    $this->ModelSetting = new ModelSetting();
  }

  public function getlogin()
  {
    $data = [
      'judul' => 'Login',
      'subjudul' => '',
      'web' => $this->ModelSetting->Detail(),
    ];
    return view('user/v_login', $data);

    
  }

  public function postceklogin()
  {
    if ($this->validate([
      'username' => [
        'label' => 'Username',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak Boleh Kosong',
        ]
      ]
    ])) {
      $username = $this->request->getPost('username');
      $password = sha1($this->request->getPost('password'));


      $cek = $this->ModelAuth->LoginUser($username, $password);
      if ($cek) {

        // Tentukan role berdasarkan level di database
        $role = 'user'; // default
        if ($cek['level'] == 1) {
            $role = 'admin';
        } elseif ($cek['level'] == 2) {
            $role = 'user';
        }

        $userData = [
            'id_user'  => $cek['id_user'],
            'username' => $username,
            'nama'     => $cek['nama_user'],
            'role'     => $role,           // 'admin' atau 'user'
            'level'    => $cek['level'],
            'id_bumdes'=> $cek['id_bumdes'],
            'logged_in'=> true
        ];
        session()->set('user', $userData);
        // Set individual keys for compatibility
        session()->set('id_user', $cek['id_user']);
        session()->set('nama_user', $cek['nama_user']);
        session()->set('level', $cek['level']);
        session()->set('id_bumdes', $cek['id_bumdes']);
        session()->set('logged_in', true);

        if ($cek['level'] == 1) {
              // Admin
              return redirect()->to('admin/dashboard');
          } elseif ($cek['level'] == 2) {
              // User BUMDes
              return redirect()->to('bumdes/beranda');
          } else {
              return redirect()->to('login')->with('error', 'Level tidak dikenali!');
        }

      } else {
        // session()->setFlashdata('pesan', 'Username Atau Password Salah');
        // return redirect()->to('Auth/Login');
        return redirect()->back()->with('error', 'Username atau password salah!');
      }

      //jika valid
    } else {
      return redirect()->to('Auth/Login')->withInput();
    }

    //return "tes cek login";
  }

  public function getLogOut()
  {
    session()->destroy();
    return redirect()->to('Auth/Login');
  }
}
