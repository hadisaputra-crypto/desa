<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    protected $table = 'tbl_produk';
    protected $primaryKey = 'id_produk';

    public function AllData($id_bumdes = null)
    {
        $query = $this->db->table($this->table);
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function DetailData($id_produk)
    {
        return $this->where('id_produk', $id_produk)
            ->get()->getRowArray();
    }

    public function updateData($data)
    {
        return $this->db->table($this->table)
            ->where('id_produk', $data['id_produk'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table($this->table)
            ->where('id_produk', $data['id_produk'])
            ->delete();
    }

    public function AllDataFront()
    {
        return $this->db->table($this->table)
            ->join('tbl_bumdes', 'tbl_bumdes.id_bumdes = tbl_produk.id_bumdes', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left')
            ->where('tbl_produk.status', 1)
            ->orderBy('id_produk', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailDataFront($id_produk)
    {
        return $this->db->table($this->table)
            ->join('tbl_bumdes', 'tbl_bumdes.id_bumdes = tbl_produk.id_bumdes', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left')
            ->where('id_produk', $id_produk)
            ->get()->getRowArray();
    }
}
