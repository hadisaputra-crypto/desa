<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua">Laporan SHU</h2>
    <button onclick="window.print()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center gap-2">
        <i class="fas fa-print"></i> Cetak
    </button>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
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

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="p-4 bg-blue-50 border-b border-gray-100">
        <h3 class="font-bold text-blue-700 text-lg">SHU PER UNIT USAHA</h3>
    </div>
    <div class="p-4">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200 text-left text-sm text-gray-500">
                    <th class="py-2">Unit Usaha</th>
                    <th class="py-2 text-right">Pemasukan</th>
                    <th class="py-2 text-right">Pengeluaran</th>
                    <th class="py-2 text-right">SHU</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($per_unit as $pu): ?>
                <tr class="border-b border-gray-50">
                    <td class="py-2 font-semibold text-gray-800"><?= $pu['nama_unit'] ?></td>
                    <td class="py-2 text-right text-green-600">Rp <?= number_format($pu['pemasukan'],0,',','.') ?></td>
                    <td class="py-2 text-right text-red-600">Rp <?= number_format($pu['pengeluaran'],0,',','.') ?></td>
                    <td class="py-2 text-right font-semibold text-<?= $pu['shu'] >= 0 ? 'green-600' : 'red-600' ?>">Rp <?= number_format($pu['shu'],0,',','.') ?></td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($per_unit)): ?>
                <tr><td class="py-4 text-center text-gray-400" colspan="4">Tidak ada transaksi pada periode ini</td></tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-gray-200">
                    <td class="py-2 font-bold">Total BUMDes</td>
                    <td class="py-2 text-right font-bold text-green-700">Rp <?= number_format($total_pemasukan,0,',','.') ?></td>
                    <td class="py-2 text-right font-bold text-red-700">Rp <?= number_format($total_pengeluaran,0,',','.') ?></td>
                    <td class="py-2 text-right font-bold text-<?= $total_shu >= 0 ? 'green-700' : 'red-700' ?>">Rp <?= number_format($total_shu,0,',','.') ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-4 bg-purple-50 border-b border-gray-100">
        <h3 class="font-bold text-purple-700 text-lg">ALOKASI SHU BUMDes</h3>
    </div>
    <div class="p-4">
        <div class="mb-4 p-4 bg-blue-50 rounded-lg text-center">
            <p class="text-3xl font-bold text-blue-700">Rp <?= number_format($total_shu,0,',','.') ?></p>
            <p class="text-sm text-gray-500 mt-1">Total SHU yang dialokasikan (per <?= date('d/m/Y', strtotime($tgl_awal)) ?> - <?= date('d/m/Y', strtotime($tgl_akhir)) ?>)</p>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200 text-left text-sm text-gray-500">
                    <th class="py-2">Peruntukan</th>
                    <th class="py-2 text-right">Persentase</th>
                    <th class="py-2 text-right">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alokasi as $a): ?>
                <tr class="border-b border-gray-50">
                    <td class="py-2 text-gray-800"><?= $a['nama_alokasi'] ?></td>
                    <td class="py-2 text-right font-semibold"><?= number_format($a['persentase'],2,',','.') ?>%</td>
                    <td class="py-2 text-right font-semibold text-purple-700">Rp <?= number_format($a['nilai'],0,',','.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-gray-200">
                    <td class="py-2 font-bold">Total</td>
                    <td class="py-2 text-right font-bold"><?= number_format(array_sum(array_column($alokasi, 'persentase')),2,',','.') ?>%</td>
                    <td class="py-2 text-right font-bold">Rp <?= number_format(array_sum(array_column($alokasi, 'nilai')),0,',','.') ?></td>
                </tr>
            </tfoot>
        </table>
        <p class="text-xs text-gray-400 mt-3"><i class="fas fa-cog mr-1"></i> Persentase dapat diubah melalui menu <strong>Pengaturan SHU</strong>.</p>
    </div>
</div>

<style media="print">
    .page-header .btn, form, .top-navbar, .sidebar { display: none !important; }
    .main-content { margin-left: 0 !important; }
</style>
