<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelApp extends Model
{


    public function AllData()
    {
        return $this->db->table('tbl_app')
            ->get()->getResultArray();
    }


    public function InsertData($data)
    {
        $this->db->table('tbl_app')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_app')
            ->where('id_app', $data['id_app'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_app')
            ->where('id_app', $data['id_app'])
            ->delete($data);
    }
}
