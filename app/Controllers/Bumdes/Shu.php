<?php

namespace App\Controllers\Bumdes;
use App\Controllers\BaseController;
use App\Models\ModelShu;
use App\Models\ModelUnitusaha;
use App\Models\ModelTransaksi;

class Shu extends BaseController
{
    protected $ModelShu;
    protected $ModelUnitusaha;
    protected $ModelTransaksi;

    public function __construct()
    {
        $this->ModelShu = new ModelShu();
        $this->ModelUnitusaha = new ModelUnitusaha();
        $this->ModelTransaksi = new ModelTransaksi();
    }

    public function index()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];

        $data = [
            'judul' => 'Pengaturan SHU',
            'subjudul' => 'Alokasi Sisa Hasil Usaha BUMDes',
            'menu' => 'shu',
            'submenu' => '',
            'active_menu' => 'shu',
            'page' => 'user/v_shu',
            'settings' => $this->ModelShu->getBumdesSettings($id_bumdes),
            'total_persen' => $this->ModelShu->getTotalPersen($id_bumdes),
            'id_bumdes' => $id_bumdes,
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/v_template_user', $data);
    }

    public function update()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];

        $id_shu = $this->request->getPost('id_shu');
        $persentase = $this->request->getPost('persentase');
        $keterangan = $this->request->getPost('keterangan');
        $aktif = $this->request->getPost('aktif');

        if (!is_array($persentase) || empty($persentase)) {
            return redirect()->to('bumdes/shu')->with('error', 'Tidak ada data alokasi yang dikirim.');
        }

        $aktifMap = is_array($aktif) ? array_flip($aktif) : [];

        $total = 0;
        foreach ($persentase as $i => $p) {
            if (isset($aktifMap[$id_shu[$i] ?? ''])) {
                $total += (float)$p;
            }
        }

        if (abs($total - 100) > 0.01) {
            return redirect()->to('bumdes/shu')->withInput()->with('error', 'Total persentase alokasi aktif harus 100%. Saat ini: ' . number_format($total, 2) . '%');
        }

        $rows = [];
        foreach ($persentase as $i => $p) {
            $rows[] = [
                'id_shu' => $id_shu[$i] ?? 0,
                'persentase' => $p,
                'keterangan' => $keterangan[$i] ?? '',
            ];
        }

        $this->ModelShu->saveBumdesSettings($id_bumdes, $rows);
        return redirect()->to('bumdes/shu')->with('pesan', 'Pengaturan persentase SHU berhasil disimpan.');
    }

    public function add()
    {
        $id_bumdes = session()->get('user')['id_bumdes'];

        $nama = $this->request->getPost('nama_alokasi');
        $keterangan = $this->request->getPost('keterangan');

        if (empty(trim($nama))) {
            return redirect()->to('bumdes/shu')->with('error', 'Nama alokasi tidak boleh kosong.');
        }

        $this->ModelShu->addItem($id_bumdes, trim($nama), $keterangan ?? '');
        return redirect()->to('bumdes/shu')->with('pesan', 'Alokasi "' . trim($nama) . '" berhasil ditambahkan. Silakan atur persentasenya agar total 100%.');
    }

    public function delete($id_shu)
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $this->ModelShu->deleteItem($id_bumdes, $id_shu);
        return redirect()->to('bumdes/shu')->with('pesan', 'Alokasi berhasil dinonaktifkan/dihapus.');
    }

    public function reactivate($id_shu)
    {
        $id_bumdes = session()->get('user')['id_bumdes'];
        $this->ModelShu->reActivate($id_bumdes, $id_shu);
        return redirect()->to('bumdes/shu')->with('pesan', 'Alokasi berhasil diaktifkan kembali.');
    }
}
