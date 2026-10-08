<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua">Neraca Keuangan</h2>
    <button onclick="window.print()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center gap-2">
        <i class="fas fa-print"></i> Cetak
    </button>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Per Tanggal</label>
            <input type="date" name="tgl_sampai" value="<?= $tgl_sampai ?>" class="w-full px-3 py-2 rounded-lg border border-gray-200">
        </div>
        <div class="flex items-end">
            <button type="submit" class="bg-biru-utama text-white px-6 py-2 rounded-lg hover:bg-biru-tua transition">
                <i class="fas fa-filter"></i> Tampilkan
            </button>
        </div>
    </form>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 bg-blue-50 border-b border-gray-100">
            <h3 class="font-bold text-blue-800 text-lg">AKTIVA</h3>
        </div>
        <div class="p-4">
            <table class="w-full">
                <tr class="border-b border-gray-100">
                    <td class="py-3 text-gray-700">Kas</td>
                    <td class="py-3 text-right font-semibold">Rp <?= number_format($kas,0,',','.') ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-3 text-gray-700">Persediaan Barang</td>
                    <td class="py-3 text-right font-semibold">Rp <?= number_format($persediaan,0,',','.') ?></td>
                </tr>
            </table>
        </div>
        <div class="p-4 bg-blue-50 border-t border-gray-100">
            <div class="flex justify-between font-bold text-blue-800 text-lg">
                <span>Total Aktiva</span>
                <span>Rp <?= number_format($total_aktiva,0,',','.') ?></span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 bg-purple-50 border-b border-gray-100">
            <h3 class="font-bold text-purple-800 text-lg">PASIVA</h3>
        </div>
        <div class="p-4">
            <table class="w-full">
                <tr class="border-b border-gray-100">
                    <td class="py-3 text-gray-700">Modal</td>
                    <td class="py-3 text-right font-semibold">Rp <?= number_format($total_modal,0,',','.') ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-3 text-gray-700">Laba Ditahan</td>
                    <td class="py-3 text-right font-semibold <?= $laba >= 0 ? 'text-green-600' : 'text-red-600' ?>">Rp <?= number_format($laba,0,',','.') ?></td>
                </tr>
            </table>
        </div>
        <div class="p-4 bg-purple-50 border-t border-gray-100">
            <div class="flex justify-between font-bold text-purple-800 text-lg">
                <span>Total Pasiva</span>
                <span>Rp <?= number_format($total_pasiva,0,',','.') ?></span>
            </div>
        </div>
    </div>
</div>

<div class="mt-4 bg-white rounded-xl shadow-sm border border-gray-100 p-4">
    <div class="flex justify-between items-center text-sm">
        <span class="text-gray-500">Per Tanggal: <?= date('d/m/Y', strtotime($tgl_sampai)) ?></span>
        <span class="font-bold <?= abs($total_aktiva - $total_pasiva) < 100 ? 'text-green-600' : 'text-red-600' ?>">
            <?= abs($total_aktiva - $total_pasiva) < 100 ? '✓ Balance' : '✗ Selisih: Rp '.number_format(abs($total_aktiva - $total_pasiva),0,',','.') ?>
        </span>
    </div>
</div>

<style media="print">
    .page-header .btn, form, .top-navbar, .sidebar { display: none !important; }
    .main-content { margin-left: 0 !important; }
</style>
