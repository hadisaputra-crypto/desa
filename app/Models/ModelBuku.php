<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_buku')          
            ->orderBy('id_buku', 'DESC')
            ->get()->getResultArray();
    }

    public function detailBuku($slug_buku)
    {
        return $this->db->table('tbl_buku')         
            ->where('slug_buku', $slug_buku)
            ->get()->getRowArray();
    }

    public function DetailData($id_buku)
    {
        return $this->db->table('tbl_buku')
            ->where('id_buku', $id_buku)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_buku')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('tbl_buku')
            ->where('id_buku', $data['id_buku'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_buku')
            ->where('id_buku', $data['id_buku'])
            ->delete($data);
    }

    public function JumlahData()
    {
        return $this->db->table('tbl_buku')->countAll();
    }

    //Kategori Buku
    public function AllDataKategori()
    {
        return $this->db->table('tbl_kategori_buku')
            ->get()->getResultArray();
    }
}
