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

    public function AllDataByUnit($id_unit)
    {
        return $this->db->table($this->table)
            ->where('id_unit', $id_unit)
            ->orderBy('tanggal', 'DESC')
            ->get()->getResultArray();
    }

    public function AllDataByBumdesJoinUnit($id_bumdes)
    {
        return $this->db->table($this->table)
            ->select('tbl_transaksi.*, tbl_unit_usaha.nama_unit')
            ->join('tbl_unit_usaha', 'tbl_unit_usaha.id_unit = tbl_transaksi.id_unit', 'left')
            ->where('tbl_transaksi.id_bumdes', $id_bumdes)
            ->orderBy('tbl_transaksi.tanggal', 'DESC')
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
