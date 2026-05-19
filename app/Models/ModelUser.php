<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';

    public function AllData($id_bumdes = null)
    {
        $query = $this->db->table($this->table)->orderBy('id_user', 'ASC');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->get()->getResultArray();
    }

    public function DetailData($id_user)
    {
        return $this->where('id_user', $id_user)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_user', $data['id_user'])
            ->delete();
    }
}
