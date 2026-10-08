<?php
$db = \Config\Database::connect();
$kategori = $db->table('tbl_kategori')->where('id_kategori', $produk['id_kategori'])->get()->getRowArray();
?>
<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('unit/produk') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <table class="w-full">
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600 w-40">Nama Produk</td>
                    <td class="py-4 text-gray-900"><?= $produk['nama_produk'] ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Kategori</td>
                    <td class="py-4 text-gray-900"><?= $kategori['nama_kategori'] ?? '-' ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Harga</td>
                    <td class="py-4 text-gray-900">Rp <?= number_format($produk['harga'] ?? 0, 0, ',', '.') ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Stok</td>
                    <td class="py-4 text-gray-900"><?= $produk['stok'] ?? 0 ?></td>
                </tr>
                <tr>
                    <td class="py-4 font-semibold text-gray-600">Deskripsi</td>
                    <td class="py-4 text-gray-900"><?= $produk['deskripsi'] ?? '-' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
