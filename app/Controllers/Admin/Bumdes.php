<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelHome;

class Bumdes extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getindex()
    {
        $data = [
            'judul' => 'BUMDes',
            'subjudul' => 'Manajemen BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'list',
            'page' => 'admin/v_bumdes',
            'bumdes' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data = [
            'judul' => 'Tambah BUMDes',
            'subjudul' => 'Form Tambah BUMDes Baru',
            'menu' => 'bumdes',
            'submenu' => 'list',
            'page' => 'admin/bumdes/v_tambah',
        ];
        return view('pages/v_template_back', $data);
    }

    public function insertData()
    {
        $data = [
            'nama_bumdes' => $this->request->getPost('nama_bumdes'),
            'alamat' => $this->request->getPost('alamat'),
            'desa' => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'provinsi' => $this->request->getPost('provinsi'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->table('tbl_bumdes')->insert($data);
        session()->setFlashdata('pesan', 'BUMDes Berhasil Ditambahkan!');
        return redirect()->to('admin/bumdes');
    }

    public function geteditData($id_bumdes)
    {
        $data = [
            'judul' => 'Edit BUMDes',
            'subjudul' => 'Form Edit Data BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'list',
            'page' => 'admin/bumdes/v_edit',
            'bumdes' => $this->db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_bumdes)
    {
        $data = [
            'nama_bumdes' => $this->request->getPost('nama_bumdes'),
            'alamat' => $this->request->getPost('alamat'),
            'desa' => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'provinsi' => $this->request->getPost('provinsi'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->update($data);
        session()->setFlashdata('pesan', 'BUMDes Berhasil Diperbarui!');
        return redirect()->to('admin/bumdes');
    }

    public function deleteData($id_bumdes)
    {
        $this->db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->delete();
        session()->setFlashdata('pesan', 'BUMDes Berhasil Dihapus!');
        return redirect()->to('admin/bumdes');
    }

    public function anggota($id_bumdes = null)
    {
        $model = new \App\Models\ModelAnggota();
        $data = [
            'judul' => 'Anggota BUMDes',
            'subjudul' => 'Data Anggota per BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'anggota',
            'page' => 'admin/bumdes/v_anggota',
            'anggota' => $model->AllData($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function tambahAnggota($id_bumdes = null)
    {
        $data = [
            'judul' => 'Tambah Anggota',
            'subjudul' => 'Form Tambah Anggota BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'anggota',
            'page' => 'admin/bumdes/v_anggota_tambah',
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function insertAnggota()
    {
        $model = new \App\Models\ModelAnggota();
        $data = [
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jabatan' => $this->request->getPost('jabatan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'id_bumdes' => $this->request->getPost('id_bumdes'),
        ];
        $model->InsertData($data);
        session()->setFlashdata('pesan', 'Data Anggota Berhasil Ditambahkan!');
        return redirect()->to('admin/bumdes/anggota/' . $data['id_bumdes']);
    }

    public function editAnggota($id_anggota)
    {
        $model = new \App\Models\ModelAnggota();
        $anggota = $model->DetailData($id_anggota);
        $data = [
            'judul' => 'Edit Anggota',
            'subjudul' => 'Form Edit Anggota BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'anggota',
            'page' => 'admin/bumdes/v_anggota_edit',
            'anggota' => $anggota,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function updateAnggota($id_anggota)
    {
        $model = new \App\Models\ModelAnggota();
        $data = [
            'id_anggota' => $id_anggota,
            'nama_anggota' => $this->request->getPost('nama_anggota'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jabatan' => $this->request->getPost('jabatan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'id_bumdes' => $this->request->getPost('id_bumdes'),
        ];
        $model->updateData($data);
        session()->setFlashdata('pesan', 'Data Anggota Berhasil Diperbarui!');
        return redirect()->to('admin/bumdes/anggota/' . $data['id_bumdes']);
    }

    public function deleteAnggota($id_anggota)
    {
        $model = new \App\Models\ModelAnggota();
        $anggota = $model->DetailData($id_anggota);
        $id_bumdes = $anggota['id_bumdes'];
        $model->DeleteData(['id_anggota' => $id_anggota]);
        session()->setFlashdata('pesan', 'Data Anggota Berhasil Dihapus!');
        return redirect()->to('admin/bumdes/anggota/' . $id_bumdes);
    }

    public function layanan($id_bumdes = null)
    {
        $model = new \App\Models\ModelLayanan();
        $data = [
            'judul' => 'Layanan BUMDes',
            'subjudul' => 'Data Layanan per BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'layanan',
            'page' => 'admin/bumdes/v_layanan',
            'layanan' => $model->AllData($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function tambahLayanan($id_bumdes = null)
    {
        $data = [
            'judul' => 'Tambah Layanan',
            'subjudul' => 'Form Tambah Layanan BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'layanan',
            'page' => 'admin/bumdes/v_layanan_tambah',
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function insertLayanan()
    {
        $model = new \App\Models\ModelLayanan();
        $data = [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'satuan' => $this->request->getPost('satuan'),
            'id_bumdes' => $this->request->getPost('id_bumdes'),
        ];
        $model->InsertData($data);
        session()->setFlashdata('pesan', 'Data Layanan Berhasil Ditambahkan!');
        return redirect()->to('admin/bumdes/layanan/' . $data['id_bumdes']);
    }

    public function editLayanan($id_layanan)
    {
        $model = new \App\Models\ModelLayanan();
        $layanan = $model->DetailData($id_layanan);
        $data = [
            'judul' => 'Edit Layanan',
            'subjudul' => 'Form Edit Layanan BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'layanan',
            'page' => 'admin/bumdes/v_layanan_edit',
            'layanan' => $layanan,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function updateLayanan($id_layanan)
    {
        $model = new \App\Models\ModelLayanan();
        $data = [
            'id_layanan' => $id_layanan,
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'satuan' => $this->request->getPost('satuan'),
            'id_bumdes' => $this->request->getPost('id_bumdes'),
        ];
        $model->updateData($data);
        session()->setFlashdata('pesan', 'Data Layanan Berhasil Diperbarui!');
        return redirect()->to('admin/bumdes/layanan/' . $data['id_bumdes']);
    }

    public function deleteLayanan($id_layanan)
    {
        $model = new \App\Models\ModelLayanan();
        $layanan = $model->DetailData($id_layanan);
        $id_bumdes = $layanan['id_bumdes'];
        $model->DeleteData(['id_layanan' => $id_layanan]);
        session()->setFlashdata('pesan', 'Data Layanan Berhasil Dihapus!');
        return redirect()->to('admin/bumdes/layanan/' . $id_bumdes);
    }

    public function transaksi($id_bumdes = null)
    {
        $model = new \App\Models\ModelTransaksi();
        $data = [
            'judul' => 'Transaksi BUMDes',
            'subjudul' => 'Data Transaksi per BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'transaksi',
            'page' => 'admin/bumdes/v_transaksi',
            'transaksi' => $model->AllData($id_bumdes),
            'id_bumdes' => $id_bumdes,
        ];
        return view('pages/v_template_back', $data);
    }

    public function produk($id_bumdes = null)
    {
        $model = new \App\Models\ModelProduk();
        $data = [
            'judul' => 'Produk BUMDes',
            'subjudul' => 'Data Produk per BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'produk',
            'page' => 'admin/bumdes/v_produk',
            'produk' => $model->AllData($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function cetakProduk($id_bumdes = null)
    {
        $model = new \App\Models\ModelProduk();
        $data = [
            'judul' => 'Cetak Laporan Produk',
            'subjudul' => 'Laporan Data Produk BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'produk',
            'page' => 'admin/bumdes/v_produk_cetak',
            'produk' => $model->AllData($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function cetakTransaksi($id_bumdes = null)
    {
        $model = new \App\Models\ModelTransaksi();
        $data = [
            'judul' => 'Cetak Laporan Transaksi',
            'subjudul' => 'Laporan Data Transaksi BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'transaksi',
            'page' => 'admin/bumdes/v_transaksi_cetak',
            'transaksi' => $model->AllData($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function unitusaha($id_bumdes = null)
    {
        $model = new \App\Models\ModelUnitusaha();
        $data = [
            'judul' => 'Unit Usaha BUMDes',
            'subjudul' => 'Data Unit Usaha per BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'unitusaha',
            'page' => 'admin/bumdes/v_unitusaha',
            'unit' => $model->AllData($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function tambahUnit($id_bumdes = null)
    {
        $data = [
            'judul' => 'Tambah Unit Usaha',
            'subjudul' => 'Form Tambah Unit Usaha BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'unitusaha',
            'page' => 'admin/bumdes/v_unit_tambah',
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function insertUnit()
    {
        $model = new \App\Models\ModelUnitusaha();
        $data = [
            'nama_unit' => $this->request->getPost('nama_unit'),
            'penanggung_jawab' => $this->request->getPost('penanggung_jawab'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => $this->request->getPost('status'),
            'id_bumdes' => $this->request->getPost('id_bumdes'),
        ];
        $model->InsertData($data);
        session()->setFlashdata('pesan', 'Data Unit Usaha Berhasil Ditambahkan!');
        return redirect()->to('admin/bumdes/unitusaha/' . $data['id_bumdes']);
    }

    public function editUnit($id_unit)
    {
        $model = new \App\Models\ModelUnitusaha();
        $unit = $model->DetailData($id_unit);
        $data = [
            'judul' => 'Edit Unit Usaha',
            'subjudul' => 'Form Edit Unit Usaha BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'unitusaha',
            'page' => 'admin/bumdes/v_unit_edit',
            'unit' => $unit,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function updateUnit($id_unit)
    {
        $model = new \App\Models\ModelUnitusaha();
        $data = [
            'id_unit' => $id_unit,
            'nama_unit' => $this->request->getPost('nama_unit'),
            'penanggung_jawab' => $this->request->getPost('penanggung_jawab'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => $this->request->getPost('status'),
            'id_bumdes' => $this->request->getPost('id_bumdes'),
        ];
        $model->updateData($data);
        session()->setFlashdata('pesan', 'Data Unit Usaha Berhasil Diperbarui!');
        return redirect()->to('admin/bumdes/unitusaha/' . $data['id_bumdes']);
    }

    public function user($id_bumdes = null)
    {
        $data = [
            'judul' => 'User BUMDes',
            'subjudul' => 'Manajemen Pengguna BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'user',
            'page' => 'admin/bumdes/v_user',
            'id_bumdes' => $id_bumdes,
            'user' => $id_bumdes ? $this->db->table('tbl_user')->where('id_bumdes', $id_bumdes)->get()->getResultArray() : $this->db->table('tbl_user')->where('level', 2)->get()->getResultArray(),
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function tambahUser($id_bumdes = null)
    {
        $data = [
            'judul' => 'Tambah User',
            'subjudul' => 'Buat Akun Pengelola BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'user',
            'page' => 'admin/bumdes/v_user_tambah',
            'id_bumdes' => $id_bumdes,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function insertUser()
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => sha1($this->request->getPost('password')),
            'level' => 2, // BUMDes User
            'id_bumdes' => $this->request->getPost('id_bumdes'),
            'create_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s')
        ];
        $this->db->table('tbl_user')->insert($data);
        session()->setFlashdata('pesan', 'Akun User Berhasil Dibuat!');
        return redirect()->to('admin/bumdes/user/' . $data['id_bumdes']);
    }

    public function editUser($id_user)
    {
        $user = $this->db->table('tbl_user')->where('id_user', $id_user)->get()->getRowArray();
        $data = [
            'judul' => 'Edit User',
            'subjudul' => 'Update Akun Pengelola BUMDes',
            'menu' => 'bumdes',
            'submenu' => 'user',
            'page' => 'admin/bumdes/v_user_edit',
            'user' => $user,
            'bumdes_list' => $this->db->table('tbl_bumdes')->get()->getResultArray(),
        ];
        return view('pages/v_template_back', $data);
    }

    public function updateUser($id_user)
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'id_bumdes' => $this->request->getPost('id_bumdes'),
            'update_at' => date('Y-m-d H:i:s')
        ];
        
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = sha1($password);
        }

        $this->db->table('tbl_user')->where('id_user', $id_user)->update($data);
        session()->setFlashdata('pesan', 'Akun User Berhasil Diperbarui!');
        return redirect()->to('admin/bumdes/user/' . $data['id_bumdes']);
    }

    public function deleteUser($id_user)
    {
        $user = $this->db->table('tbl_user')->where('id_user', $id_user)->get()->getRowArray();
        $id_bumdes = $user['id_bumdes'];
        $this->db->table('tbl_user')->where('id_user', $id_user)->delete();
        session()->setFlashdata('pesan', 'Akun User Berhasil Dihapus!');
        return redirect()->to('admin/bumdes/user/' . $id_bumdes);
    }
}
