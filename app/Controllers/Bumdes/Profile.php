<?php


namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelHome;

class Profile extends BaseController
{
    public function __construct()
    {
       
        $this->ModelHome = new ModelHome();
    }
    
    public function getIndex()
    {
        
        if (!session()->get('user')) {
            return redirect()->to('Auth/Login');
        }

        $data =
            [
                'judul' => 'Profile',
                'subjudul'    => 'Profile',
                'menu' => 'profile',
                'submenu' => '',
                'active_menu' => 'profile',
                'page' => 'user/v_profile',
                

            ];
        return view('pages/v_template_user', $data);

        
    }
    
    
    public function updateProfile()
    {
        if ($this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email',
        ])) {
            $id_user = session()->get('id_user');
            $data = [
                'id_user'   => $id_user,
                'nama_user' => $this->request->getPost('nama'),
                'email'     => $this->request->getPost('email'),
                'telepon'   => $this->request->getPost('telepon'),
                'alamat'    => $this->request->getPost('alamat'),
            ];

            $modelUser = new \App\Models\ModelUser();
            $modelUser->updateData($data);

            // Update session
            $session = session()->get('user');
            $session['nama'] = $data['nama_user'];
            session()->set('user', $session);
            session()->set('nama_user', $data['nama_user']);

            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil. Periksa inputan Anda.');
        }
    }

    public function changePassword()
    {
        $id_user = session()->get('id_user');
        $current_password = $this->request->getPost('current_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        if ($new_password !== $confirm_password) {
            return redirect()->back()->with('error', 'Konfirmasi password baru tidak cocok!');
        }

        $modelUser = new \App\Models\ModelUser();
        $user = $modelUser->DetailData($id_user);

        if (sha1($current_password) !== $user['password']) {
            return redirect()->back()->with('error', 'Password saat ini salah!');
        }

        $data = [
            'id_user'  => $id_user,
            'password' => sha1($new_password)
        ];
        $modelUser->updateData($data);

        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }
}