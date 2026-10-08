<?php

namespace App\Controllers\Dinas;

use App\Controllers\BaseController;
use App\Models\ModelShu;

class Shu extends BaseController
{
    protected $ModelShu;

    public function __construct()
    {
        $this->ModelShu = new ModelShu();
    }

    public function index()
    {
        $db = \Config\Database::connect();

        $all_bumdes = $db->table('tbl_bumdes')->orderBy('nama_bumdes', 'ASC')->get()->getResultArray();

        $bumdes = [];
        foreach ($all_bumdes as $b) {
            $b['total_persen'] = $this->ModelShu->getTotalPersen($b['id_bumdes']);
            $b['is_custom'] = $this->ModelShu->isCustomized($b['id_bumdes']);
            $bumdes[] = $b;
        }

        $data = [
            'judul' => 'Pengaturan SHU',
            'subjudul' => 'Alokasi SHU Seluruh BUMDes',
            'menu' => 'shu',
            'page' => 'desa/v_shu_list',
            'bumdes' => $bumdes,
            'desa' => 'Seluruh Desa',
            'readonly' => true,
        ];
        return view('pages/v_template_monitor', $data);
    }

    public function edit($id_bumdes)
    {
        $db = \Config\Database::connect();

        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $data = [
            'judul' => 'Detail Alokasi SHU',
            'subjudul' => $bumdes['nama_bumdes'],
            'menu' => 'shu',
            'page' => 'desa/v_shu_form',
            'bumdes' => $bumdes,
            'settings' => $this->ModelShu->getBumdesSettings($id_bumdes),
            'total_persen' => $this->ModelShu->getTotalPersen($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'readonly' => true,
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_monitor', $data);
    }
}
