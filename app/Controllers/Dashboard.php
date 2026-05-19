<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    /**
     * Menampilkan halaman dasbor utama.
     */
    public function index(): string
    {
        // Data bisa dikirim ke view dari sini,
        // tapi untuk saat ini kita hanya memuat view.
        $data = [
            'title' => 'Dasbor Inovasi BUMDes'
        ];

        return view('dashboard/index', $data);
    }
}