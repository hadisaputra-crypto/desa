<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda copy extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_agenda')
            ->orderBy('id_agenda', 'DESC')
            ->get()->getResultArray();
    }

    public function Recent()
    {
        return $this->db->table('tbl_agenda')
            ->orderBy('id_agenda', 'DESC')
            ->limit(3)
            ->get()->getResultArray();
    }

    public function DetailData($id_agenda)
    {
        return $this->db->table('tbl_agenda')
            ->where('id_agenda', $id_agenda)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_agenda')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_agenda')
            ->where('id_agenda', $data['id_agenda'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_agenda')
            ->where('id_agenda', $data['id_agenda'])
            ->delete($data);
    }
}
