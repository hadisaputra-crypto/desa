<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLayanan extends Model
{
    protected $table = 'tbl_layanan';
    protected $primaryKey = 'id_layanan';

    public function AllData($id_bumdes = null)
    {
        $query = $this->db->table($this->table);
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->get()->getResultArray();
    }

    public function AllDataByUnit($id_unit)
    {
        return $this->db->table($this->table)
            ->where('id_unit', $id_unit)
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function DetailData($id_layanan)
    {
        return $this->where('id_layanan', $id_layanan)
            ->get()->getRowArray();
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_layanan', $data['id_layanan'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_layanan', $data['id_layanan'])
            ->delete();
    }
}
