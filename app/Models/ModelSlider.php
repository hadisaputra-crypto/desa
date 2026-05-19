<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSlider extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_slider')
            ->orderBy('id_slider', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailData($id_slider)
    {
        return $this->db->table('tbl_slider')
            ->where('id_slider', $id_slider)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_slider')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_slider')
            ->where('id_slider', $data['id_slider'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_slider')
            ->where('id_slider', $data['id_slider'])
            ->delete($data);
    }
}
