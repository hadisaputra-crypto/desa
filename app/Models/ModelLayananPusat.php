<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelLayananPusat extends Model
{
    protected $table = 'tbl_layanan_pusat';
    protected $primaryKey = 'id_layanan_pusat';

    public function AllData()
    {
        return $this->db->table($this->table)->get()->getResultArray();
    }

    public function DetailData($id_layanan_pusat)
    {
        return $this->where('id_layanan_pusat', $id_layanan_pusat)->get()->getRowArray();
    }
}
