<div class="max-w-4xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/produk') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <!-- Product Image / Placeholder -->
            <div class="bg-gray-100 flex items-center justify-center p-12">
                <div class="text-center">
                    <i class="fas fa-box-open text-8xl text-gray-300 mb-4"></i>
                    <p class="text-gray-400 italic">Belum ada foto produk</p>
                </div>
            </div>

            <!-- Product Info -->
            <div class="p-8 lg:p-12">
                <div class="mb-6">
                    <span class="px-3 py-1 bg-blue-50 text-biru-utama rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block">
                        <?= $produk['nama_kategori'] ?? 'Tanpa Kategori' ?>
                    </span>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2"><?= $produk['nama_produk'] ?></h1>
                    <p class="text-3xl font-bold text-biru-utama">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <p class="text-gray-400 text-xs mb-1">Stok Tersedia</p>
                        <p class="text-lg font-bold text-gray-800"><?= $produk['stok'] ?> <?= $produk['satuan'] ?></p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <p class="text-gray-400 text-xs mb-1">Status</p>
                        <p class="text-lg font-bold <?= $produk['status'] == 1 ? 'text-green-600' : 'text-red-600' ?>">
                            <?= $produk['status'] == 1 ? 'Aktif' : 'Non-Aktif' ?>
                        </p>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-gray-900 font-bold mb-2">Deskripsi Produk</h3>
                    <p class="text-gray-600 leading-relaxed">
                        <?= $produk['deskripsi'] ?: 'Tidak ada deskripsi untuk produk ini.' ?>
                    </p>
                </div>

                <div class="flex gap-4 pt-6 border-t border-gray-100">
                    <a href="<?= base_url('bumdes/produk/edit/'.$produk['id_produk']) ?>" 
                       class="flex-1 bg-biru-utama text-white py-3 rounded-xl font-bold hover:bg-biru-tua transition shadow-lg text-center">
                        <i class="fas fa-edit mr-2"></i> Edit Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
