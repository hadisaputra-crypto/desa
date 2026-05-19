<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUnitusaha extends Model
{
    protected $table = 'tbl_unit_usaha';
    protected $primaryKey = 'id_unit';

    public function AllData($id_bumdes = null)
    {
        $query = $this->db->table($this->table);
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function DetailData($id_unit)
    {
        return $this->where('id_unit', $id_unit)
            ->get()->getRowArray();
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_unit', $data['id_unit'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_unit', $data['id_unit'])
            ->delete();
    }
}
