<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('unit/layanan') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <table class="w-full">
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600 w-40">Nama Layanan</td>
                    <td class="py-4 text-gray-900"><?= $layanan['nama_layanan'] ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Harga</td>
                    <td class="py-4 text-gray-900">Rp <?= number_format($layanan['harga'] ?? 0, 0, ',', '.') ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Satuan</td>
                    <td class="py-4 text-gray-900"><?= $layanan['satuan'] ?? '-' ?></td>
                </tr>
                <tr>
                    <td class="py-4 font-semibold text-gray-600">Deskripsi</td>
                    <td class="py-4 text-gray-900"><?= $layanan['deskripsi'] ?? '-' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
