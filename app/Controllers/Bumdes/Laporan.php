<?php


namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelHome;

class Laporan extends BaseController
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
                'judul' => 'Laporan',
                'subjudul'    => 'Laporan',
                'menu' => 'laporan',
                'submenu' => '',
                'active_menu' => 'laporan',
                'page' => 'user/v_laporan',
                'total_layanan' => $this->ModelHome->TotalLayanan(),
                

            ];
        return view('pages/v_template_user', $data);

        
    }
    
    
    
    // Tambahkan method lainnya sesuai kebutuhan
}