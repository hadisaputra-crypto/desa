<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelLayanan;
use App\Models\ModelBerita;
use App\Models\ModelAgenda;
use App\Models\ModelTeam;
use App\Models\ModelProduk;
use App\Models\ModelLayananPusat;


class Home extends BaseController
{

    public function __construct()
    {

        $this->ModelHome = new ModelHome();
        $this->ModelLayanan = new ModelLayanan();
        $this->ModelTeam = new ModelTeam();
        $this->ModelBerita = new ModelBerita();
        $this->ModelAgenda = new ModelAgenda();
        $this->ModelProduk = new ModelProduk();
        $this->ModelLayananPusat = new ModelLayananPusat();
    }

    public function getindex()
    {
        $data = [
            'judul' => 'Home',
            'description' => 'Anan Publisher',
            'page' => 'pages/v_home',
            'lembaga' => $this->ModelHome->Lembaga(),
            'slider' => $this->ModelHome->Slider(),
            'layanan' => $this->ModelLayananPusat->AllData(),
            'profil' => $this->ModelHome->Profil(),
            'foto' => $this->ModelHome->Foto(),
            'pengumuman' => $this->ModelHome->Pengumuman(),
            'agenda' => $this->ModelAgenda->Recent(),
            'team' => $this->ModelTeam->AllData(),
            'berita' => $this->ModelBerita->RecentBerita(),
            'total_berita' => $this->ModelHome->TotalBerita(),
            'total_team' => $this->ModelHome->TotalTeam(),
            'total_agenda' => $this->ModelHome->TotalAgenda(),
            'total_pengumuman' => $this->ModelHome->TotalPengumuman(),
            'total_layanan' => $this->ModelHome->TotalLayanan(),
            'produk_unggulan' => $this->ModelProduk->AllDataFront(), // We can limit this later
        ];
        return view('pages/v_template_front', $data);
    }

    public function getTentang()
    {
        $data = [
            'judul' => 'About US',
            'description' => 'About US',
            'page' => 'pages/v_tentang',
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getVisiMisi()
    {
        $data = [
            'judul' => 'Visi Dan Misi',
            'description' => 'Visi Dan Misi',
            'page' => 'pages/v_visi_misi',
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getStrukturOrganisasi()
    {
        $data = [
            'judul' => 'Struktur Organisasi',
            'description' => 'Struktur Organisasi',
            'page' => 'pages/v_struktur_organisasi',
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function Contact()
    {
        $data = [
            'judul' => 'Contact',
            'description' => 'Contact',
            'page' => 'pages/v_contact',
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getAgenda()
    {
        $data = [
            'judul' => 'Agenda',
            'description' => 'Agenda Desa',
            'page' => 'pages/v_agenda',
            'agenda' => $this->ModelAgenda->AllData(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getAgendaDetail($id_agenda)
    {
        $data = [
            'judul' => 'Detail Agenda',
            'description' => 'Detail Agenda Desa',
            'page' => 'pages/v_agenda_detail',
            'agenda' => $this->ModelAgenda->DetailData($id_agenda),
            'recent' => $this->ModelAgenda->Recent(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getPengumuman()
    {
        $data = [
            'judul' => 'Pengumuman',
            'description' => 'Pengumuman Desa',
            'page' => 'pages/v_pengumuman',
            'pengumuman' => $this->ModelHome->AllPengumuman(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getPengumumanDetail($id_pengumuman)
    {
        $data = [
            'judul' => 'Detail Pengumuman',
            'description' => 'Detail Pengumuman Desa',
            'page' => 'pages/v_pengumuman_detail',
            'pengumuman' => $this->ModelHome->getPengumumanDetail($id_pengumuman),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getBerita()
    {
        $data = [
            'judul' => 'Berita',
            'description' => 'Berita Desa',
            'page' => 'pages/v_berita',
            'berita' => $this->ModelBerita->join('tbl_kategori_berita', 'tbl_kategori_berita.id_kategori_berita=tbl_berita.id_kategori_berita', 'LEFT')
                                          ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
                                          ->orderBy('id_berita', 'DESC')
                                          ->paginate(6, 'berita'),
            'pager' => $this->ModelBerita->pager,
            'recent' => $this->ModelBerita->RecentBerita(),
            'kategori' => $this->ModelBerita->AllDataKategori(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getBeritaDetail($id_berita)
    {
        $this->ModelBerita->Hit($id_berita);
        $data = [
            'judul' => 'Detail Berita',
            'description' => 'Detail Berita Desa',
            'page' => 'pages/v_berita_detail',
            'berita' => $this->ModelBerita->DetailData($id_berita),
            'recent' => $this->ModelBerita->RecentBerita(),
            'kategori' => $this->ModelBerita->AllDataKategori(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getLayanan()
    {
        $data = [
            'judul' => 'Layanan',
            'description' => 'Layanan Desa',
            'page' => 'pages/v_layanan',
            'layanan' => $this->ModelLayananPusat->AllData(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getLayananDetail($id_layanan)
    {
        $data = [
            'judul' => 'Detail Layanan',
            'description' => 'Detail Layanan Desa',
            'page' => 'pages/v_layanan_detail',
            'layanan' => $this->ModelLayananPusat->DetailData($id_layanan),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getDownload()
    {
        $data = [
            'judul' => 'Download',
            'description' => 'Download Dokumen Desa',
            'page' => 'pages/v_download',
            'dokumen' => $this->ModelHome->AllDokumen(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getAlbumFoto()
    {
        $data = [
            'judul' => 'Gallery Foto',
            'description' => 'Gallery Foto Desa',
            'page' => 'pages/v_album_foto',
            'album' => $this->ModelHome->AllAlbum(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getFoto($id_album)
    {
        $album = $this->ModelHome->getAlbumDetail($id_album);
        $data = [
            'judul' => 'Gallery Foto: ' . ($album['nama_album'] ?? 'Album'),
            'description' => 'Gallery Foto Desa',
            'page' => 'pages/v_foto',
            'album' => $album,
            'foto' => $this->ModelHome->getFotoByAlbum($id_album),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getVideo()
    {
        $data = [
            'judul' => 'Gallery Video',
            'description' => 'Gallery Video Desa',
            'page' => 'pages/v_video',
            'video' => $this->ModelHome->AllVideo(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getPasar()
    {
        $data = [
            'judul' => 'Pasar Desa',
            'description' => 'Produk Unggulan BUMDes',
            'page' => 'pages/v_pasar',
            'produk' => $this->ModelProduk->AllDataFront(),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function getPasarDetail($id_produk)
    {
        $data = [
            'judul' => 'Detail Produk',
            'description' => 'Detail Produk BUMDes',
            'page' => 'pages/v_pasar_detail',
            'produk' => $this->ModelProduk->DetailDataFront($id_produk),
            'profil' => $this->ModelHome->Profil(),
        ];
        return view('pages/v_template_front', $data);
    }
}
