<?php

namespace App\Controllers;

class AuthLogin extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            
            // Contoh validasi sederhana - sesuaikan dengan database Anda
            if ($username === 'admin' && $password === 'password') {
                $userData = [
                    'id' => 1,
                    'username' => $username,
                    'nama' => 'Administrator BUMDes',
                    'role' => 'admin',
                    'logged_in' => true
                ];
                
                session()->set('user', $userData);
                return redirect()->to('/user/dashboard');
            } else {
                return redirect()->back()->with('error', 'Username atau password salah!');
            }
        }
        
        $db = \Config\Database::connect();
        $web = $db->table('tbl_web')->where('id', '1')->get()->getRowArray();
        
        $data = [
            'judul' => 'Login',
            'web' => $web
        ];
        
        return view('user/login', $data);
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
}