<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua">Buku Kas Unit Usaha</h2>
    <button onclick="window.print()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center gap-2">
        <i class="fas fa-print"></i> Cetak
    </button>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Awal</label>
            <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>" class="w-full px-3 py-2 rounded-lg border border-gray-200">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Akhir</label>
            <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>" class="w-full px-3 py-2 rounded-lg border border-gray-200">
        </div>
        <div class="flex items-end">
            <button type="submit" class="bg-biru-utama text-white px-6 py-2 rounded-lg hover:bg-biru-tua transition w-full">
                <i class="fas fa-filter"></i> Filter
            </button>
        </div>
    </form>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-4 bg-gray-50 border-b border-gray-100">
        <p class="text-sm text-gray-600">Periode: <?= date('d/m/Y', strtotime($tgl_awal)) ?> - <?= date('d/m/Y', strtotime($tgl_akhir)) ?></p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-biru-pastel text-biru-tua">
                    <th class="p-3 font-semibold text-sm">No</th>
                    <th class="p-3 font-semibold text-sm">Tanggal</th>
                    <th class="p-3 font-semibold text-sm">Uraian</th>
                    <th class="p-3 font-semibold text-sm text-right">Penerimaan</th>
                    <th class="p-3 font-semibold text-sm text-right">Pengeluaran</th>
                    <th class="p-3 font-semibold text-sm text-right">Saldo</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php
                $saldo = 0;
                $no = 1;
                foreach ($transaksi as $row):
                    if ($row['tipe'] == 'pemasukan' || $row['tipe'] == 'modal') {
                        $saldo += $row['nominal'];
                        $penerimaan = $row['nominal'];
                        $pengeluaran = 0;
                    } else {
                        $saldo -= $row['nominal'];
                        $penerimaan = 0;
                        $pengeluaran = $row['nominal'];
                    }
                ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 text-sm text-gray-600"><?= $no++ ?></td>
                    <td class="p-3 text-sm"><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                    <td class="p-3 text-sm"><?= $row['kategori'] ?>: <?= $row['keterangan'] ?></td>
                    <td class="p-3 text-sm text-right text-green-600"><?= $penerimaan ? number_format($penerimaan,0,',','.') : '-' ?></td>
                    <td class="p-3 text-sm text-right text-red-600"><?= $pengeluaran ? number_format($pengeluaran,0,',','.') : '-' ?></td>
                    <td class="p-3 text-sm text-right font-semibold"><?= number_format($saldo,0,',','.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<style media="print">
    .page-header .btn, form, .top-navbar, .sidebar { display: none !important; }
    .main-content { margin-left: 0 !important; }
</style>
