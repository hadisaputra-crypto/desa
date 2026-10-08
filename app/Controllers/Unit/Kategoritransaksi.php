<?php

namespace App\Controllers\Unit;
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
        $user = session()->get('user');
        $id_unit = $user['id_unit'];
        $id_bumdes = $user['id_bumdes'];

        $kategori = $this->ModelKategoriTransaksi->getByUnit($id_unit);

        $data = [
            'judul' => 'Kategori Transaksi',
            'subjudul' => 'Data Kategori Transaksi Unit Usaha',
            'menu' => 'kategoritransaksi',
            'submenu' => '',
            'active_menu' => 'kategoritransaksi',
            'page' => 'unit/v_kategoritransaksi',
            'kategori' => $kategori,
            'id_bumdes' => $id_bumdes,
        ];
        return view('pages/v_template_unit', $data);
    }

    public function create()
    {
        $data = [
            'judul' => 'Tambah Kategori',
            'subjudul' => 'Form Tambah Kategori Transaksi',
            'menu' => 'kategoritransaksi',
            'submenu' => '',
            'active_menu' => 'kategoritransaksi',
            'page' => 'unit/v_kategoritransaksi_form',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => 'required',
            'tipe' => 'required',
        ])) {
            return redirect()->to('unit/kategoritransaksi/create')->withInput()->with('validation', $this->validator);
        }

        $user = session()->get('user');
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'tipe' => $this->request->getPost('tipe'),
            'id_bumdes' => $user['id_bumdes'],
            'id_unit' => $user['id_unit'],
        ];

        $this->ModelKategoriTransaksi->InsertData($data);
        return redirect()->to('unit/kategoritransaksi')->with('pesan', 'Kategori transaksi berhasil ditambahkan!');
    }

    public function edit($id_kat_trans)
    {
        $data = [
            'judul' => 'Edit Kategori',
            'subjudul' => 'Form Edit Kategori Transaksi',
            'menu' => 'kategoritransaksi',
            'submenu' => '',
            'active_menu' => 'kategoritransaksi',
            'page' => 'unit/v_kategoritransaksi_form',
            'kategori' => $this->ModelKategoriTransaksi->DetailData($id_kat_trans),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function update($id_kat_trans)
    {
        if (!$this->validate([
            'nama_kategori' => 'required',
            'tipe' => 'required',
        ])) {
            return redirect()->to('unit/kategoritransaksi/edit/'.$id_kat_trans)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_kat_trans' => $id_kat_trans,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'tipe' => $this->request->getPost('tipe'),
        ];

        $this->ModelKategoriTransaksi->updateData($data);
        return redirect()->to('unit/kategoritransaksi')->with('pesan', 'Kategori transaksi berhasil diperbarui!');
    }

    public function delete($id_kat_trans)
    {
        $data = ['id_kat_trans' => $id_kat_trans];
        $this->ModelKategoriTransaksi->DeleteData($data);
        return redirect()->to('unit/kategoritransaksi')->with('pesan', 'Kategori transaksi berhasil dihapus!');
    }
}
