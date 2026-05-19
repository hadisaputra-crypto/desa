<?php


namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelHome;

class Settings extends BaseController
{
    public function __construct()
    {
        // Cek apakah user sudah login
        // if (!session()->get('user')) {
        //     return redirect()->to('/login');
        // }
        $this->ModelHome = new ModelHome();
    }
    
    public function getIndex()
    {
        

        $data =
            [
                'judul' => 'Pengaturan',
                'subjudul'    => 'Pengaturan',
                'menu' => 'pengaturan',
                'submenu' => '',
                'page' => 'user/v_settings',
                'active_menu' => 'settings',
                'total_layanan' => $this->ModelHome->TotalLayanan(),
                

            ];
        return view('pages/v_template_user', $data);

        
    }
    
    
    
    // Tambahkan method lainnya sesuai kebutuhan
}