<?php

namespace App\Controllers;

/**
 * Controller Pages
 *
 * Mengelola semua halaman statis seperti beranda, fitur, dll.
 * Menggantikan Dashboard.php
 */
class Pages extends BaseController
{
    /**
     * Menampilkan halaman Beranda
     */
    public function index(): string
    {
        $data = [
            'title' => 'Beranda - Inovasi BUMDes',
            'page'  => 'beranda' // Untuk menandai navigasi aktif
        ];

        return view('pages/beranda', $data);
    }

    /**
     * Menampilkan halaman Fitur
     */
    public function fitur(): string
    {
        $data = [
            'title' => 'Fitur Platform - Inovasi BUMDes',
            'page'  => 'fitur'
        ];

        return view('pages/fitur', $data);
    }

    /**
     * Menampilkan halaman Dampak
     */
    public function dampak(): string
    {
        $data = [
            'title' => 'Dampak & Proyeksi - Inovasi BUMDes',
            'page'  => 'dampak'
        ];

        return view('pages/dampak', $data);
    }

    /**
     * Menampilkan halaman Rencana Aksi
     */
    public function rencana(): string
    {
        $data = [
            'title' => 'Rencana Aksi - Inovasi BUMDes',
            'page'  => 'rencana'
        ];

        return view('pages/rencana', $data);
    }
}