<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda extends Model
{
    protected $table = 'tbl_agenda';
    protected $primaryKey = 'id_agenda';

    public function AllData()
    {
        return $this->db->table($this->table)
            ->orderBy('id_agenda', 'DESC')
            ->get()->getResultArray();
    }

    public function Recent()
    {
        return $this->db->table($this->table)
            ->orderBy('id_agenda', 'DESC')
            ->limit(3)
            ->get()->getResultArray();
    }

    public function DetailData($id_agenda)
    {
        return $this->where('id_agenda', $id_agenda)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table($this->table)->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table($this->table)
            ->where('id_agenda', $data['id_agenda'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table($this->table)
            ->where('id_agenda', $data['id_agenda'])
            ->delete();
    }
}
