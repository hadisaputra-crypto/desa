<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{
    protected $table = 'tbl_anggota';
    protected $primaryKey = 'id_anggota';

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

    public function DetailData($id_anggota)
    {
        return $this->where('id_anggota', $id_anggota)
            ->get()->getRowArray();
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_anggota', $data['id_anggota'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_anggota', $data['id_anggota'])
            ->delete();
    }
}
