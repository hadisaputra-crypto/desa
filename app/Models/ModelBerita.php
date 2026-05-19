<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    protected $table = 'tbl_berita';
    protected $primaryKey = 'id_berita';

    public function AllData()
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_kategori_berita', 'tbl_kategori_berita.id_kategori_berita=tbl_berita.id_kategori_berita', 'LEFT')
            ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
            ->orderBy('tbl_berita.id_berita', 'DESC')
            ->get()->getResultArray();
    }
    public function BeritaPerKategori($id_kategori_berita)
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_kategori_berita', 'tbl_kategori_berita.id_kategori_berita=tbl_berita.id_kategori_berita', 'LEFT')
            ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
            ->where('tbl_berita.id_kategori_berita', $id_kategori_berita)
            ->orderBy('id_berita', 'DESC')
            ->get()->getResultArray();
    }

    public function searchData($keyword)
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_kategori_berita', 'tbl_kategori_berita.id_kategori_berita=tbl_berita.id_kategori_berita', 'LEFT')
            ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
            ->like('judul_berita', $keyword)
            ->get()
            ->getResultArray();
    }

    public function RecentBerita()
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_kategori_berita', 'tbl_kategori_berita.id_kategori_berita=tbl_berita.id_kategori_berita', 'LEFT')
            ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
            ->orderBy('id_berita', 'DESC')
            ->limit(4)
            ->get()->getResultArray();
    }

    public function DetailData($id_berita)
    {
        return $this->db->table('tbl_berita')
            ->join('tbl_kategori_berita', 'tbl_kategori_berita.id_kategori_berita=tbl_berita.id_kategori_berita', 'LEFT')
            ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
            ->where('id_berita', $id_berita)
            ->get()->getRowArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_berita')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_berita')
            ->where('id_berita', $data['id_berita'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_berita')
            ->where('id_berita', $data['id_berita'])
            ->delete($data);
    }

    public function Hit($id_berita)
    {
        $berita = $this->db->table('tbl_berita')
            ->where('id_berita', $id_berita)
            ->get()->getRowArray();
        $view = $berita['view'] + 1;

        $data = [
            'id_berita' => $id_berita,
            'view' => $view
        ];

        $this->db->table('tbl_berita')
            ->where('id_berita', $data['id_berita'])
            ->update($data);
    }



    //===Kategori berita=========================
    public function AllDataKategori()
    {
        return $this->db->table('tbl_kategori_berita')
            ->get()->getResultArray();
    }

    public function AllDetailKategori($id_kategori_berita)
    {
        return $this->db->table('tbl_kategori_berita')
            ->where('id_kategori_berita', $id_kategori_berita)
            ->get()->getRowArray();
    }

    public function InsertDataKategori($data)
    {
        $this->db->table('tbl_kategori_berita')->insert($data);
    }

    public function DeleteDataKategori($data)
    {
        $this->db->table('tbl_kategori_berita')
            ->where('id_kategori_berita', $data['id_kategori_berita'])
            ->delete($data);
    }
    public function UpdateDataKategori($data)
    {
        $this->db->table('tbl_kategori_berita')
            ->where('id_kategori_berita', $data['id_kategori_berita'])
            ->update($data);
    }
}
