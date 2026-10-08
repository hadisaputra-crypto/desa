<?php

namespace App\Controllers\Desa;

use App\Controllers\BaseController;
use App\Models\ModelShu;

class Shu extends BaseController
{
    protected $ModelShu;

    public function __construct()
    {
        $this->ModelShu = new ModelShu();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $user = session()->get('user');

        $bumdes_saya = $db->table('tbl_bumdes')->where('id_bumdes', $user['id_bumdes'])->get()->getRowArray();
        $desa = $bumdes_saya['desa'] ?? '';

        $all_bumdes = $db->table('tbl_bumdes')->where('desa', $desa)->get()->getResultArray();

        $bumdes = [];
        foreach ($all_bumdes as $b) {
            $b['total_persen'] = $this->ModelShu->getTotalPersen($b['id_bumdes']);
            $b['is_custom'] = $this->ModelShu->isCustomized($b['id_bumdes']);
            $bumdes[] = $b;
        }

        $data = [
            'judul' => 'Pengaturan SHU',
            'subjudul' => 'Alokasi SHU se-Desa ' . $desa,
            'menu' => 'shu',
            'page' => 'desa/v_shu_list',
            'bumdes' => $bumdes,
            'desa' => $desa,
        ];
        return view('pages/v_template_monitor', $data);
    }

    public function edit($id_bumdes)
    {
        $db = \Config\Database::connect();
        $user = session()->get('user');

        $bumdes_saya = $db->table('tbl_bumdes')->where('id_bumdes', $user['id_bumdes'])->get()->getRowArray();
        $desa = $bumdes_saya['desa'] ?? '';

        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes || $bumdes['desa'] !== $desa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $data = [
            'judul' => 'Edit Alokasi SHU',
            'subjudul' => $bumdes['nama_bumdes'],
            'menu' => 'shu',
            'page' => 'desa/v_shu_form',
            'bumdes' => $bumdes,
            'settings' => $this->ModelShu->getBumdesSettings($id_bumdes),
            'total_persen' => $this->ModelShu->getTotalPersen($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_monitor', $data);
    }

    public function update($id_bumdes)
    {
        $db = \Config\Database::connect();
        $user = session()->get('user');

        $bumdes_saya = $db->table('tbl_bumdes')->where('id_bumdes', $user['id_bumdes'])->get()->getRowArray();
        $desa = $bumdes_saya['desa'] ?? '';

        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes || $bumdes['desa'] !== $desa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $id_shu = $this->request->getPost('id_shu');
        $persentase = $this->request->getPost('persentase');
        $aktif = $this->request->getPost('aktif');

        if (!is_array($persentase) || empty($persentase)) {
            return redirect()->to("desa/shu/edit/$id_bumdes")->with('error', 'Tidak ada data alokasi yang dikirim.');
        }

        $aktifMap = is_array($aktif) ? array_flip($aktif) : [];

        $total = 0;
        foreach ($persentase as $i => $p) {
            if (isset($aktifMap[$id_shu[$i] ?? ''])) {
                $total += (float)$p;
            }
        }

        if (abs($total - 100) > 0.01) {
            return redirect()->to("desa/shu/edit/$id_bumdes")->withInput()->with('error', 'Total persentase alokasi aktif harus 100%. Saat ini: ' . number_format($total, 2) . '%');
        }

        $keterangan = $this->request->getPost('keterangan');
        $rows = [];
        foreach ($persentase as $i => $p) {
            $rows[] = [
                'id_shu' => $id_shu[$i] ?? 0,
                'persentase' => $p,
                'keterangan' => $keterangan[$i] ?? '',
            ];
        }

        $this->ModelShu->saveBumdesSettings($id_bumdes, $rows);
        return redirect()->to('desa/shu')->with('pesan', 'Alokasi SHU ' . $bumdes['nama_bumdes'] . ' berhasil diperbarui.');
    }

    public function add($id_bumdes)
    {
        $db = \Config\Database::connect();
        $user = session()->get('user');

        $bumdes_saya = $db->table('tbl_bumdes')->where('id_bumdes', $user['id_bumdes'])->get()->getRowArray();
        $desa = $bumdes_saya['desa'] ?? '';

        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes || $bumdes['desa'] !== $desa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $nama = $this->request->getPost('nama_alokasi');
        if (empty(trim($nama))) {
            return redirect()->to("desa/shu/edit/$id_bumdes")->with('error', 'Nama alokasi tidak boleh kosong.');
        }

        $this->ModelShu->addItem($id_bumdes, trim($nama), $this->request->getPost('keterangan') ?? '');
        return redirect()->to("desa/shu/edit/$id_bumdes")->with('pesan', 'Alokasi "' . trim($nama) . '" berhasil ditambahkan.');
    }

    public function delete($id_bumdes, $id_shu)
    {
        $db = \Config\Database::connect();
        $user = session()->get('user');

        $bumdes_saya = $db->table('tbl_bumdes')->where('id_bumdes', $user['id_bumdes'])->get()->getRowArray();
        $desa = $bumdes_saya['desa'] ?? '';

        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes || $bumdes['desa'] !== $desa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $this->ModelShu->deleteItem($id_bumdes, $id_shu);
        return redirect()->to("desa/shu/edit/$id_bumdes")->with('pesan', 'Alokasi berhasil dinonaktifkan/dihapus.');
    }

    public function reactivate($id_bumdes, $id_shu)
    {
        $db = \Config\Database::connect();
        $user = session()->get('user');

        $bumdes_saya = $db->table('tbl_bumdes')->where('id_bumdes', $user['id_bumdes'])->get()->getRowArray();
        $desa = $bumdes_saya['desa'] ?? '';

        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $id_bumdes)->get()->getRowArray();
        if (!$bumdes || $bumdes['desa'] !== $desa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('BUMDes tidak ditemukan');
        }

        $this->ModelShu->reActivate($id_bumdes, $id_shu);
        return redirect()->to("desa/shu/edit/$id_bumdes")->with('pesan', 'Alokasi berhasil diaktifkan kembali.');
    }
}
