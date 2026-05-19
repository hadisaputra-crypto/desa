<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengumuman extends Model
{
    protected $table = 'tbl_pengumuman';
    protected $primaryKey = 'id_pengumuman';

    public function AllData($id_bumdes = null)
    {
        $query = $this->db->table($this->table);
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->orderBy('id_pengumuman', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailData($id_pengumuman)
    {
        return $this->where('id_pengumuman', $id_pengumuman)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function UpdateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_pengumuman', $data['id_pengumuman'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_pengumuman', $data['id_pengumuman'])
            ->delete();
    }
}
