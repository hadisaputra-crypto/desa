<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFoto extends Model
{

    // Album
    public function AllDataAlbum()
    {
        return $this->db->table('tbl_album')
            ->orderBy('id_album', 'DESC')
            ->get()->getResultArray();
    }

    public function DetailAlbum($id_album)
    {
        return $this->db->table('tbl_album')
            ->where('id_album', $id_album)
            ->get()->getRowArray();
    }

    public function AllDataPerAlbum($id_album)
    {
        return $this->db->table('tbl_foto')
            ->where('id_album', $id_album)
            ->get()->getResultArray();
    }

    public function DeleteDataAlbum($data)
    {
        $this->db->table('tbl_album')
            ->where('id_album', $data['id_album'])
            ->delete($data);
    }


    // Foto
    public function InsertDataFoto($data)
    {
        $this->db->table('tbl_foto')->insert($data);
    }


    public function DeleteDataFoto($data)
    {
        $this->db->table('tbl_foto')
            ->where('id_foto', $data['id_foto'])
            ->delete($data);
    }
}
