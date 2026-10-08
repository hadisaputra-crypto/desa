<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    protected $table = 'tbl_web';
    protected $primaryKey = 'id';

    public function Profil()
    {
        return $this->db->table('tbl_web')->where('id', '1')->get()->getRowArray();
    }

    public function Lembaga()
    {
        return $this->db->table('tbl_lembaga')->get()->getResultArray();
    }

    public function Slider()
    {
        return $this->db->table('tbl_slider')
            ->orderBy('id_slider', 'DESC')
            ->limit(5)
            ->get()->getResultArray();
    }

    public function Foto()
    {
        return $this->db->table('tbl_foto')
            ->orderBy('id_foto', 'DESC')
            ->limit(8)
            ->get()->getResultArray();
    }

    public function Pengumuman()
    {
        return $this->db->table('tbl_pengumuman')
            ->orderBy('id_pengumuman', 'DESC')
            ->limit(4)
            ->get()->getResultArray();
    }

    public function TotalBerita()
    {
        return $this->db->table('tbl_berita')->countAllResults();
    }

    public function TotalUser($id_bumdes = null)
    {
        $query = $this->db->table('tbl_user');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->countAllResults();
    }

    public function TotalPengumuman($id_bumdes = null)
    {
        $query = $this->db->table('tbl_pengumuman');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->countAllResults();
    }

    public function TotalLayanan($id_bumdes = null)
    {
        $query = $this->db->table('tbl_layanan');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->countAllResults();
    }

    public function TotalAnggota($id_bumdes = null)
    {
        $query = $this->db->table('tbl_anggota');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->countAllResults();
    }

    public function TotalUnitUsaha($id_bumdes = null)
    {
        $query = $this->db->table('tbl_unit_usaha');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->countAllResults();
    }

    public function TotalProduk($id_bumdes = null)
    {
        $query = $this->db->table('tbl_produk');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->countAllResults();
    }

    public function TotalAnggotaByUnit($id_unit)
    {
        return $this->db->table('tbl_anggota')->where('id_unit', $id_unit)->countAllResults();
    }

    public function TotalProdukByUnit($id_unit)
    {
        return $this->db->table('tbl_produk')->where('id_unit', $id_unit)->countAllResults();
    }

    public function TotalTransaksiByUnit($id_unit)
    {
        return $this->db->table('tbl_transaksi')->where('id_unit', $id_unit)->countAllResults();
    }

    public function TotalLayananByUnit($id_unit)
    {
        return $this->db->table('tbl_layanan')->where('id_unit', $id_unit)->countAllResults();
    }

    public function TotalTeam()
    {
        return $this->db->table('tbl_team')->countAllResults();
    }

    public function TotalAgenda()
    {
        return $this->db->table('tbl_agenda')->countAllResults();
    }

    public function TotalLembaga()
    {
        return $this->db->table('tbl_lembaga')->countAllResults();
    }

    public function TotalDokumen()
    {
        return $this->db->table('tbl_dokumen')->countAllResults();
    }

    public function TotalAlbum()
    {
        return $this->db->table('tbl_album')->countAllResults();
    }

    public function TotalVideo()
    {
        return $this->db->table('tbl_video')->countAllResults();
    }

    public function TotalSlider()
    {
        return $this->db->table('tbl_slider')->countAllResults();
    }

    public function TotalBumdes()
    {
        return $this->db->table('tbl_bumdes')->countAllResults();
    }

    public function TotalTransaksi($id_bumdes = null)
    {
        $query = $this->db->table('tbl_transaksi');
        if ($id_bumdes !== null) {
            $query->where('id_bumdes', $id_bumdes);
        }
        return $query->countAllResults();
    }

    public function AllPengumuman()
    {
        return $this->db->table('tbl_pengumuman')
            ->orderBy('id_pengumuman', 'DESC')
            ->get()->getResultArray();
    }

    public function AllDokumen()
    {
        return $this->db->table('tbl_dokumen')
            ->orderBy('id_dokumen', 'DESC')
            ->get()->getResultArray();
    }

    public function AllFoto()
    {
        return $this->db->table('tbl_foto')
            ->orderBy('id_foto', 'DESC')
            ->get()->getResultArray();
    }

    public function AllVideo()
    {
        return $this->db->table('tbl_video')
            ->orderBy('id_video', 'DESC')
            ->get()->getResultArray();
    }

    public function AllAlbum()
    {
        return $this->db->table('tbl_album')
            ->orderBy('id_album', 'DESC')
            ->get()->getResultArray();
    }

    public function getFotoByAlbum($id_album)
    {
        return $this->db->table('tbl_foto')
            ->where('id_album', $id_album)
            ->get()->getResultArray();
    }

    public function getAlbumDetail($id_album)
    {
        return $this->db->table('tbl_album')
            ->where('id_album', $id_album)
            ->get()->getRowArray();
    }

    public function getPengumumanDetail($id_pengumuman)
    {
        return $this->db->table('tbl_pengumuman')
            ->where('id_pengumuman', $id_pengumuman)
            ->get()->getRowArray();
    }
}
