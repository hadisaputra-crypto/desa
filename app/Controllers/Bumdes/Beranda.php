<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelHome;

class Beranda extends BaseController
{
    protected $ModelHome;
    
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }
    
    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->to('Auth/Login');
        }

        $id_bumdes = session()->get('user')['id_bumdes'];
        
        $data = [
            'judul' => 'Beranda',
            'subjudul' => 'Dashboard BUMDes',
            'menu' => 'beranda',
            'submenu' => '',
            'active_menu' => 'beranda',
            'page' => 'user/v_beranda',
            'total_layanan' => $this->ModelHome->TotalLayanan($id_bumdes),
            'total_pengumuman' => $this->ModelHome->TotalPengumuman($id_bumdes),
            'total_anggota' => $this->ModelHome->TotalAnggota($id_bumdes),
            'total_unit' => $this->ModelHome->TotalUnitUsaha($id_bumdes),
            'total_produk' => $this->ModelHome->TotalProduk($id_bumdes),
            'total_user' => $this->ModelHome->TotalUser($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
}