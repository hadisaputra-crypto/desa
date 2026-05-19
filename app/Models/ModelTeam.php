<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTeam extends Model
{
    protected $table = 'tbl_team';
    protected $primaryKey = 'id_team';

    public function AllData()
    {
        return $this->db->table($this->table)
            ->orderBy('id_team', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailData($id_team)
    {
        return $this->where('id_team', $id_team)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table($this->table)->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table($this->table)
            ->where('id_team', $data['id_team'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table($this->table)
            ->where('id_team', $data['id_team'])
            ->delete();
    }
}
