<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLembaga extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_lembaga')          
            ->orderBy('id_lembaga', 'DESC')
            ->get()->getResultArray();
    }

    public function AllDataLembaga()
    {
        return $this->db->table('tbl_lembaga')         
            ->orderBy('tbl_lembaga.id_jenis_lembaga', 'ASC')
            ->get()->getResultArray();
    }



    public function InsertData($data)
    {
        $this->db->table('tbl_lembaga')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_lembaga')
            ->where('id_lembaga', $data['id_lembaga'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_lembaga')
            ->where('id_lembaga', $data['id_lembaga'])
            ->delete($data);
    }

    public function DetailData($id_lembaga)
    {
        return $this->db->table('tbl_lembaga')
            ->where('id_lembaga', $id_lembaga)
            ->get()->getRowArray();
    }
}
