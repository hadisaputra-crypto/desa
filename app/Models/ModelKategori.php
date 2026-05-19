<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';

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

    public function DetailData($id_kategori)
    {
        return $this->where('id_kategori', $id_kategori)
            ->get()->getRowArray();
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_kategori', $data['id_kategori'])
            ->delete();
    }
}
