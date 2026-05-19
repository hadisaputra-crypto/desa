<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    protected $table = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';

    public function AllData($id_bumdes = null)
    {
        $query = $this->db->table($this->table);
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->orderBy('tanggal', 'DESC')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function DetailData($id_transaksi)
    {
        return $this->where('id_transaksi', $id_transaksi)
            ->get()->getRowArray();
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_transaksi', $data['id_transaksi'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_transaksi', $data['id_transaksi'])
            ->delete();
    }
}
