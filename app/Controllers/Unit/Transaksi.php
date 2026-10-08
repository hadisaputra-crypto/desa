<?php

namespace App\Controllers\Unit;
use App\Controllers\BaseController;
use App\Models\ModelTransaksi;
use App\Models\ModelKategoriTransaksi;

class Transaksi extends BaseController
{
    protected $ModelTransaksi;
    protected $ModelKategoriTransaksi;

    public function __construct()
    {
        $this->ModelTransaksi = new ModelTransaksi();
        $this->ModelKategoriTransaksi = new ModelKategoriTransaksi();
    }

    public function index()
    {
        $id_unit = session()->get('user')['id_unit'];
        $data = [
            'judul' => 'Transaksi',
            'subjudul' => 'Data Transaksi Unit Usaha',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'unit/v_transaksi',
            'transaksi' => $this->ModelTransaksi->AllDataByUnit($id_unit),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function create()
    {
        $id_unit = session()->get('user')['id_unit'];
        $data = [
            'judul' => 'Tambah Transaksi',
            'subjudul' => 'Form Tambah Transaksi',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'unit/v_transaksi_form',
            'validation' => \Config\Services::validation(),
            'kategori_pemasukan' => $this->ModelKategoriTransaksi->getByUnit($id_unit, 'pemasukan'),
            'kategori_pengeluaran' => $this->ModelKategoriTransaksi->getByUnit($id_unit, 'pengeluaran'),
            'kategori_modal' => $this->ModelKategoriTransaksi->getByUnit($id_unit, 'modal'),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'tipe' => 'required|in_list[pemasukan,pengeluaran]',
            'nominal' => 'required|numeric',
            'tanggal' => 'required',
        ])) {
            return redirect()->to('unit/transaksi/create')->withInput()->with('validation', $this->validator);
        }

        $user = session()->get('user');
        $data = [
            'id_bumdes' => $user['id_bumdes'],
            'id_unit' => $user['id_unit'],
            'id_user' => $user['id_user'],
            'tipe' => $this->request->getPost('tipe'),
            'kategori' => $this->request->getPost('kategori'),
            'nominal' => $this->request->getPost('nominal'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->ModelTransaksi->InsertData($data);
        return redirect()->to('unit/transaksi')->with('pesan', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id_transaksi)
    {
        $id_unit = session()->get('user')['id_unit'];
        $data = [
            'judul' => 'Edit Transaksi',
            'subjudul' => 'Form Edit Transaksi',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'unit/v_transaksi_form',
            'transaksi' => $this->ModelTransaksi->DetailData($id_transaksi),
            'validation' => \Config\Services::validation(),
            'kategori_pemasukan' => $this->ModelKategoriTransaksi->getByUnit($id_unit, 'pemasukan'),
            'kategori_pengeluaran' => $this->ModelKategoriTransaksi->getByUnit($id_unit, 'pengeluaran'),
            'kategori_modal' => $this->ModelKategoriTransaksi->getByUnit($id_unit, 'modal'),
        ];
        return view('pages/v_template_unit', $data);
    }

    public function update($id_transaksi)
    {
        if (!$this->validate([
            'tipe' => 'required|in_list[pemasukan,pengeluaran]',
            'nominal' => 'required|numeric',
            'tanggal' => 'required',
        ])) {
            return redirect()->to('unit/transaksi/edit/'.$id_transaksi)->withInput()->with('validation', $this->validator);
        }

        $data = [
            'id_transaksi' => $id_transaksi,
            'tipe' => $this->request->getPost('tipe'),
            'kategori' => $this->request->getPost('kategori'),
            'nominal' => $this->request->getPost('nominal'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->ModelTransaksi->updateData($data);
        return redirect()->to('unit/transaksi')->with('pesan', 'Transaksi berhasil diperbarui!');
    }

    public function delete($id_transaksi)
    {
        $data = ['id_transaksi' => $id_transaksi];
        $this->ModelTransaksi->DeleteData($data);
        return redirect()->to('unit/transaksi')->with('pesan', 'Transaksi berhasil dihapus!');
    }

    public function detail($id_transaksi)
    {
        $data = [
            'judul' => 'Detail Transaksi',
            'subjudul' => 'Informasi Detail Transaksi',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'unit/v_transaksi_detail',
            'transaksi' => $this->ModelTransaksi->DetailData($id_transaksi),
        ];
        return view('pages/v_template_unit', $data);
    }
}
