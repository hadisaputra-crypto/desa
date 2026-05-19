<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDownload extends Model
{


    public function AllData()
    {
        return $this->db->table('tbl_file')
            ->orderBy('id_file', 'ASC')
            ->get()->getResultArray();
    }

    public function DetailData($id_file)
    {
        return $this->db->table('tbl_file')
            ->where('id_file', $id_file)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_file')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_file')
            ->where('id_file', $data['id_file'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_file')
            ->where('id_file', $data['id_file'])
            ->delete($data);
    }
}
