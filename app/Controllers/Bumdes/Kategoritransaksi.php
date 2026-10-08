<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelKategoriTransaksi;

class Kategoritransaksi extends BaseController
{
    protected $ModelKategoriTransaksi;

    public function __construct()
    {
        $this->ModelKategoriTransaksi = new ModelKategoriTransaksi();
    }

    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Kategori Transaksi',
            'subjudul' => 'Manajemen Kategori Transaksi BUMDes',
            'menu' => 'kategoritransaksi',
            'submenu' => '',
            'active_menu' => 'kategoritransaksi',
            'page' => 'user/v_kategoritransaksi',
            'kategori' => $this->ModelKategoriTransaksi->getByBumdes($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }

    public function create()
    {
        $data = [
            'judul' => 'Tambah Kategori Transaksi',
            'subjudul' => 'Form Tambah Kategori Transaksi Baru',
            'menu' => 'kategoritransaksi',
            'submenu' => '',
            'active_menu' => 'kategoritransaksi',
            'page' => 'user/v_kategoritransaksi_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => 'required',
            'tipe' => 'required|in_list[pemasukan,pengeluaran,modal]',
        ])) {
            return redirect()->to('bumdes/kategoritransaksi/create')->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'tipe' => $this->request->getPost('tipe'),
            'id_bumdes' => session()->get('user')['id_bumdes'],
            'id_unit' => null,
        ];

        $this->ModelKategoriTransaksi->InsertData($data);
        return redirect()->to('bumdes/kategoritransaksi')->with('pesan', 'Kategori transaksi berhasil ditambahkan!');
    }

    public function edit($id_kat_trans)
    {
        $data = [
            'judul' => 'Edit Kategori Transaksi',
            'subjudul' => 'Form Edit Kategori Transaksi',
            'menu' => 'kategoritransaksi',
            'submenu' => '',
            'active_menu' => 'kategoritransaksi',
            'page' => 'user/v_kategoritransaksi_form',
            'kategori' => $this->ModelKategoriTransaksi->DetailData($id_kat_trans),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_kat_trans)
    {
        if (!$this->validate([
            'nama_kategori' => 'required',
            'tipe' => 'required|in_list[pemasukan,pengeluaran,modal]',
        ])) {
            return redirect()->to('bumdes/kategoritransaksi/edit/'.$id_kat_trans)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_kat_trans' => $id_kat_trans,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'tipe' => $this->request->getPost('tipe'),
        ];

        $this->ModelKategoriTransaksi->updateData($data);
        return redirect()->to('bumdes/kategoritransaksi')->with('pesan', 'Kategori transaksi berhasil diperbarui!');
    }

    public function delete($id_kat_trans)
    {
        $data = ['id_kat_trans' => $id_kat_trans];
        $this->ModelKategoriTransaksi->DeleteData($data);
        return redirect()->to('bumdes/kategoritransaksi')->with('pesan', 'Kategori transaksi berhasil dihapus!');
    }
}
