<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBlog;

class Blog extends BaseController
{
    public function __construct()
    {
        $this->ModelBlog = new ModelBlog;
    }

    public function index()
    {
        $data = [
            'judul' => 'Blog',
            'description' => 'Blog',
            'page' => 'v_blog',
            'blog' => $this->ModelBlog->paginate(8, 'blog'),
            'pager' => $this->ModelBlog->pager,
            'kategori' => $this->ModelBlog->AllDataKategori(),
            'recent' => $this->ModelBlog->AllDataBlog(),
        ];
        return view('v_template_front', $data);
    }

    public function Search()
    {
        $keyword = $this->request->getPost('keyword');

        if (!empty($keyword)) {
            // Lakukan pencarian berdasarkan kata kunci
            $data = [
                'judul' => 'Pencarian',
                'description' => '',
                'page' => 'v_blog_search',
                'keyword' => $this->request->getPost('keyword'),
                'blog' => $this->ModelBlog->Search($keyword),
                'kategori' => $this->ModelBlog->AllDataKategori(),
                'recent' => $this->ModelBlog->AllDataBlog(),
            ];
            return view('v_template_front', $data);
        } else {
            // Jika tidak ada kata kunci, tampilkan semua data
            $data = [
                'judul' => 'Pencarian',
                'description' => '',
                'page' => 'v_blog_search_kosong',
                'keyword' => $this->request->getPost('keyword'),
                'kategori' => $this->ModelBlog->AllDataKategori(),
                'recent' => $this->ModelBlog->AllDataBlog(),
            ];
            return view('v_template_front', $data);
        }
    }

    public function Detail($slug_blog)
    {
        $blog = $this->ModelBlog->DetailBlog($slug_blog);
        $this->ModelBlog->Hit($slug_blog);
        $data = [
            'judul' => 'Blog',
            'description' => $blog['judul_blog'],
            'page' => 'v_blog_detail',
            'blog' => $blog,
            'recent' => $this->ModelBlog->AllDataBlog(),
            'kategori' => $this->ModelBlog->AllDataKategori(),
        ];
        return view('v_template_front', $data);
    }
}
