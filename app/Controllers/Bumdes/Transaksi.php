<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelTransaksi;
use App\Models\ModelKategoriTransaksi;
use App\Models\ModelUnitusaha;

class Transaksi extends BaseController
{
    protected $ModelTransaksi;
    protected $ModelKategoriTransaksi;
    protected $ModelUnitusaha;
    
    public function __construct()
    {
        $this->ModelTransaksi = new ModelTransaksi();
        $this->ModelKategoriTransaksi = new ModelKategoriTransaksi();
        $this->ModelUnitusaha = new ModelUnitusaha();
    }
    
    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Transaksi',
            'subjudul' => 'Manajemen Transaksi Keuangan BUMDes',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'user/v_transaksi',
            'transaksi' => $this->ModelTransaksi->AllDataByBumdesJoinUnit($id_bumdes),
        ];
        return view('pages/v_template_user', $data);
    }
    
    public function create()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Tambah Transaksi',
            'subjudul' => 'Form Tambah Transaksi Keuangan',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'user/v_transaksi_form',
            'unit' => $this->ModelUnitusaha->getByBumdes($id_bumdes),
            'validation' => \Config\Services::validation(),
            'kategori_pemasukan' => $this->ModelKategoriTransaksi->getByBumdes($id_bumdes, 'pemasukan'),
            'kategori_pengeluaran' => $this->ModelKategoriTransaksi->getByBumdes($id_bumdes, 'pengeluaran'),
            'kategori_modal' => $this->ModelKategoriTransaksi->getByBumdes($id_bumdes, 'modal'),
        ];
        return view('pages/v_template_user', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'tanggal' => 'required',
            'nominal' => 'required|numeric',
            'tipe' => 'required|in_list[pemasukan,pengeluaran,modal]',
        ])) {
            return redirect()->to('bumdes/transaksi/create')->withInput()->with('validation', $this->validator);
        }

        $id_unit = $this->request->getPost('id_unit');
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'kategori' => $this->request->getPost('kategori'),
            'tipe' => $this->request->getPost('tipe'),
            'nominal' => $this->request->getPost('nominal'),
            'id_unit' => $id_unit ?: null,
            'id_bumdes' => session()->get('user')['id_bumdes'],
        ];

        $this->ModelTransaksi->InsertData($data);
        return redirect()->to('bumdes/transaksi')->with('pesan', 'Transaksi berhasil dicatat!');
    }

    public function edit($id_transaksi)
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $data = [
            'judul' => 'Edit Transaksi',
            'subjudul' => 'Form Edit Transaksi',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'user/v_transaksi_form',
            'transaksi' => $this->ModelTransaksi->DetailData($id_transaksi),
            'unit' => $this->ModelUnitusaha->getByBumdes($id_bumdes),
            'validation' => \Config\Services::validation(),
            'kategori_pemasukan' => $this->ModelKategoriTransaksi->getByBumdes($id_bumdes, 'pemasukan'),
            'kategori_pengeluaran' => $this->ModelKategoriTransaksi->getByBumdes($id_bumdes, 'pengeluaran'),
            'kategori_modal' => $this->ModelKategoriTransaksi->getByBumdes($id_bumdes, 'modal'),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update($id_transaksi)
    {
        if (!$this->validate([
            'tanggal' => 'required',
            'nominal' => 'required|numeric',
        ])) {
            return redirect()->to('bumdes/transaksi/edit/'.$id_transaksi)->withInput()->with('validation', $this->validator);
        }

        $id_unit = $this->request->getPost('id_unit');
        $data = [
            'id_transaksi' => $id_transaksi,
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'kategori' => $this->request->getPost('kategori'),
            'tipe' => $this->request->getPost('tipe'),
            'nominal' => $this->request->getPost('nominal'),
            'id_unit' => $id_unit ?: null,
        ];

        $this->ModelTransaksi->updateData($data);
        return redirect()->to('bumdes/transaksi')->with('pesan', 'Transaksi berhasil diperbarui!');
    }

    public function delete($id_transaksi)
    {
        $data = ['id_transaksi' => $id_transaksi];
        $this->ModelTransaksi->DeleteData($data);
        return redirect()->to('bumdes/transaksi')->with('pesan', 'Transaksi berhasil dihapus!');
    }

    public function detail($id_transaksi)
    {
        $data = [
            'judul' => 'Detail Transaksi',
            'subjudul' => 'Informasi Detail Transaksi',
            'menu' => 'transaksi',
            'submenu' => '',
            'active_menu' => 'transaksi',
            'page' => 'user/v_transaksi_detail',
            'transaksi' => $this->ModelTransaksi->DetailData($id_transaksi),
        ];
        return view('pages/v_template_user', $data);
    }
}