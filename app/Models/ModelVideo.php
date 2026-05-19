<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelVideo extends Model
{


    public function AllData()
    {
        return $this->db->table('tbl_video')
            ->orderBy('id_video', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailData($id_video)
    {
        return $this->db->table('tbl_video')
            ->where('id_video', $id_video)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_video')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_video')
            ->where('id_video', $data['id_video'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_video')
            ->where('id_video', $data['id_video'])
            ->delete($data);
    }
}
