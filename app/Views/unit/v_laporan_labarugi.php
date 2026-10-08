<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua">Laporan Laba / Rugi Unit</h2>
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

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 bg-green-50 border-b border-gray-100">
            <h3 class="font-bold text-green-700 text-lg">PENDAPATAN</h3>
        </div>
        <div class="p-4">
            <table class="w-full">
                <?php foreach ($pendapatan as $p): ?>
                <tr class="border-b border-gray-50">
                    <td class="py-2 text-gray-700"><?= $p['kategori'] ?></td>
                    <td class="py-2 text-right font-semibold text-green-600">Rp <?= number_format($p['total'],0,',','.') ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="p-4 bg-green-50 border-t border-gray-100">
            <div class="flex justify-between font-bold text-green-800">
                <span>Total Pendapatan</span>
                <span>Rp <?= number_format($total_pendapatan,0,',','.') ?></span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 bg-red-50 border-b border-gray-100">
            <h3 class="font-bold text-red-700 text-lg">BEBAN</h3>
        </div>
        <div class="p-4">
            <table class="w-full">
                <?php foreach ($beban as $b): ?>
                <tr class="border-b border-gray-50">
                    <td class="py-2 text-gray-700"><?= $b['kategori'] ?></td>
                    <td class="py-2 text-right font-semibold text-red-600">Rp <?= number_format($b['total'],0,',','.') ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="p-4 bg-red-50 border-t border-gray-100">
            <div class="flex justify-between font-bold text-red-800">
                <span>Total Beban</span>
                <span>Rp <?= number_format($total_beban,0,',','.') ?></span>
            </div>
        </div>
    </div>
</div>

<div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 text-center">
        <p class="text-lg font-bold <?= $laba_bersih >= 0 ? 'text-green-600' : 'text-red-600' ?>">
            <?= $laba_bersih >= 0 ? 'LABA BERSIH' : 'RUGI BERSIH' ?>: Rp <?= number_format(abs($laba_bersih),0,',','.') ?>
        </p>
    </div>
</div>

<style media="print">
    .page-header .btn, form, .top-navbar, .sidebar { display: none !important; }
    .main-content { margin-left: 0 !important; }
</style>
