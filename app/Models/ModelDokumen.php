<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDokumen extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_dokumen')
            ->orderBy('id_dokumen', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailData($id_dokumen)
    {
        return $this->db->table('tbl_dokumen')
            ->where('id_dokumen', $id_dokumen)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_dokumen')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_dokumen')
            ->where('id_dokumen', $data['id_dokumen'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_dokumen')
            ->where('id_dokumen', $data['id_dokumen'])
            ->delete($data);
    }
}
