<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('unit/transaksi') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <table class="w-full">
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600 w-40">Tipe</td>
                    <td class="py-4">
                        <span class="px-2 py-1 rounded text-xs font-bold uppercase <?= $transaksi['tipe'] == 'pemasukan' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' ?>">
                            <?= $transaksi['tipe'] ?>
                        </span>
                    </td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Kategori</td>
                    <td class="py-4 text-gray-900"><?= $transaksi['kategori'] ?? '-' ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Nominal</td>
                    <td class="py-4 text-gray-900">Rp <?= number_format($transaksi['nominal'] ?? 0, 0, ',', '.') ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Tanggal</td>
                    <td class="py-4 text-gray-900"><?= $transaksi['tanggal'] ?></td>
                </tr>
                <tr>
                    <td class="py-4 font-semibold text-gray-600">Keterangan</td>
                    <td class="py-4 text-gray-900"><?= $transaksi['keterangan'] ?? '-' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
