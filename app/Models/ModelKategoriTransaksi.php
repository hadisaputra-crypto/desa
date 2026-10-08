<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategoriTransaksi extends Model
{
    protected $table = 'tbl_kategori_transaksi';
    protected $primaryKey = 'id_kat_trans';

    public function getByBumdes($id_bumdes, $tipe = null)
    {
        $query = $this->db->table($this->table)
            ->where('id_bumdes', $id_bumdes)
            ->where('id_unit', null);
        if ($tipe) {
            $query->where('tipe', $tipe);
        }
        return $query->get()->getResultArray();
    }

    public function getByUnit($id_unit, $tipe = null)
    {
        $unit = $this->db->table('tbl_unit_usaha')
            ->where('id_unit', $id_unit)
            ->get()->getRowArray();
        $id_bumdes = $unit['id_bumdes'];

        // BUMDes defaults + unit-specific
        $query = $this->db->table($this->table)
            ->groupStart()
                ->where('id_bumdes', $id_bumdes)->where('id_unit', null)
                ->orWhere('id_unit', $id_unit)
            ->groupEnd();
        if ($tipe) {
            $query->where('tipe', $tipe);
        }
        return $query->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function DetailData($id_kat_trans)
    {
        return $this->where('id_kat_trans', $id_kat_trans)
            ->get()->getRowArray();
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_kat_trans', $data['id_kat_trans'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_kat_trans', $data['id_kat_trans'])
            ->delete();
    }
}
