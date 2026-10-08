<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelShu extends Model
{
    protected $table = 'tbl_settings_shu';
    protected $primaryKey = 'id_shu';

    // Baris default (id_bumdes NULL) dipakai sebagai template. Saat sebuah BUMDes
    // pertama kali diakses dan belum punya data sendiri, baris default dikloning
    // menjadi milik bumdes tersebut. Selanjutnya BUMDes mengelola daftarnya sendiri:
    // boleh menambah item custom, menonaktifkan item turunan default, atau menghapus
    // item custom.
    private function ensureSeeded($id_bumdes)
    {
        $db = \Config\Database::connect();

        $count = $db->table($this->table)->where('id_bumdes', $id_bumdes)->countAllResults();
        if ($count > 0) {
            return;
        }

        $defaults = $db->table($this->table)
            ->where('id_bumdes IS NULL')
            ->orderBy('id_shu', 'ASC')
            ->get()->getResultArray();

        $urutan = 1;
        foreach ($defaults as $d) {
            $db->table($this->table)->insert([
                'id_bumdes' => $id_bumdes,
                'id_referensi' => $d['id_shu'],
                'nama_alokasi' => $d['nama_alokasi'],
                'persentase' => $d['persentase'],
                'keterangan' => $d['keterangan'],
                'aktif' => 1,
                'urutan' => $urutan++,
            ]);
        }
    }

    public function getBumdesSettings($id_bumdes)
    {
        $db = \Config\Database::connect();
        $this->ensureSeeded($id_bumdes);

        $rows = $db->table($this->table)
            ->where('id_bumdes', $id_bumdes)
            ->orderBy('aktif', 'DESC')
            ->orderBy('urutan', 'ASC')
            ->orderBy('id_shu', 'ASC')
            ->get()->getResultArray();

        $settings = [];
        foreach ($rows as $r) {
            $settings[] = [
                'id_shu' => (int)$r['id_shu'],
                'nama_alokasi' => $r['nama_alokasi'],
                'persentase' => (float)$r['persentase'],
                'keterangan' => $r['keterangan'],
                'aktif' => (int)$r['aktif'],
                'is_custom' => $r['id_referensi'] === null || $r['id_referensi'] === '',
            ];
        }

        return $settings;
    }

    public function getTotalPersen($id_bumdes)
    {
        $settings = $this->getBumdesSettings($id_bumdes);
        $aktif = array_filter($settings, function ($s) {
            return $s['aktif'] === 1;
        });
        return array_sum(array_column($aktif, 'persentase'));
    }

    // BUMDes dianggap "dikustomisasi" bila memiliki item tambahan (id_referensi NULL)
    // atau menonaktifkan salah satu item turunan default.
    public function isCustomized($id_bumdes)
    {
        $db = \Config\Database::connect();
        $this->ensureSeeded($id_bumdes);

        $custom = $db->table($this->table)
            ->where('id_bumdes', $id_bumdes)
            ->where('id_referensi IS NULL')
            ->countAllResults();

        if ($custom > 0) {
            return true;
        }

        $nonaktif = $db->table($this->table)
            ->where('id_bumdes', $id_bumdes)
            ->where('aktif', 0)
            ->countAllResults();

        return $nonaktif > 0;
    }

    // Tambah item custom baru (id_referensi NULL)
    public function addItem($id_bumdes, $nama, $keterangan = '')
    {
        $db = \Config\Database::connect();
        $this->ensureSeeded($id_bumdes);

        $maxUrutan = $db->table($this->table)
            ->where('id_bumdes', $id_bumdes)
            ->selectMax('urutan')
            ->get()->getRowArray()['urutan'];

        return $db->table($this->table)->insert([
            'id_bumdes' => $id_bumdes,
            'id_referensi' => null,
            'nama_alokasi' => $nama,
            'persentase' => 0,
            'keterangan' => $keterangan,
            'aktif' => 1,
            'urutan' => ((int)$maxUrutan) + 1,
        ]);
    }

    // Hapus / nonaktifkan baris milik bumdes.
    // - Item custom (id_referensi NULL) dihapus permanen.
    // - Item turunan default (id_referensi NOT NULL) dinonaktifkan (aktif=0).
    public function deleteItem($id_bumdes, $id_shu)
    {
        $db = \Config\Database::connect();

        $row = $db->table($this->table)
            ->where('id_bumdes', $id_bumdes)
            ->where('id_shu', $id_shu)
            ->get()->getRowArray();

        if (!$row) {
            return false;
        }

        if ($row['id_referensi'] === null || $row['id_referensi'] === '') {
            $db->table($this->table)->where('id_shu', $id_shu)->delete();
        } else {
            $db->table($this->table)
                ->where('id_shu', $id_shu)
                ->update(['aktif' => 0]);
        }
        return true;
    }

    // Aktivasi kembali item yang dinonaktifkan
    public function reActivate($id_bumdes, $id_shu)
    {
        $db = \Config\Database::connect();

        return $db->table($this->table)
            ->where('id_bumdes', $id_bumdes)
            ->where('id_shu', $id_shu)
            ->update(['aktif' => 1]);
    }

    // Simpan perubahan persentase & keterangan semua baris aktif.
    // $rows: array of ['id_shu' => baris bumdes, 'persentase' => x, 'keterangan' => y]
    public function saveBumdesSettings($id_bumdes, $rows)
    {
        $db = \Config\Database::connect();

        foreach ($rows as $row) {
            $id = isset($row['id_shu']) ? (int)$row['id_shu'] : 0;
            $persentase = isset($row['persentase']) ? (float)$row['persentase'] : 0;
            $keterangan = isset($row['keterangan']) ? $row['keterangan'] : '';

            $db->table($this->table)
                ->where('id_bumdes', $id_bumdes)
                ->where('id_shu', $id)
                ->update([
                    'persentase' => $persentase,
                    'keterangan' => $keterangan,
                ]);
        }
    }
}
