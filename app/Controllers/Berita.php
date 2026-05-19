<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBerita;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita;
    }

    public function getindex()
    {
        $data = [
            'judul' => 'Berita',
            'description' => 'Berita',
            'page' => 'pages/v_berita',
            'berita' => $this->ModelBerita->paginate(6, 'berita'),
            'pager' => $this->ModelBerita->pager,
            'kategori' => $this->ModelBerita->AllDataKategori(),
            'recent' => $this->ModelBerita->RecentBerita(),
        ];
        return view('pages/v_template_front', $data);
    }

    public function Detail($id_berita)
    {
        
        $this->ModelBerita->Hit($id_berita);
        $berita = $this->ModelBerita->DetailData($id_berita);
        $data = [
            'judul' => 'Berita',
            'description' => $berita['judul_berita'],
            'page' => 'v_berita_detail',
            'kategori' => $this->ModelBerita->AllDataKategori(),
            'recent' => $this->ModelBerita->RecentBerita(),
            'berita' => $berita,
        ];
        return view('v_template_front', $data);
    }

    public function Pencarian()
    {

        $keyword = $this->request->getPost('keyword');

        $data = [
            'judul' => 'Pencarian',
            'description' => '',
            'page' => 'v_berita_search',
            'keyword' => $keyword,
            'berita' => $this->ModelBerita->searchData($keyword),
            'kategori' => $this->ModelBerita->AllDataKategori(),
            'recent' => $this->ModelBerita->RecentBerita(),
        ];
        return view('v_template_front', $data);
    }

    public function Kategori($id_kategori_berita)
    {
        $data = [
            'judul' => 'Berita',
            'description' => 'Berita',
            'page' => 'v_berita_kategori',
            'berita' => $this->ModelBerita->BeritaPerKategori($id_kategori_berita),
            'kategori_berita' => $this->ModelBerita->AllDetailKategori($id_kategori_berita),
            'pager' => $this->ModelBerita->pager,
            'kategori' => $this->ModelBerita->AllDataKategori(),
            'recent' => $this->ModelBerita->RecentBerita(),
        ];
        return view('v_template_front', $data);
    }
}
