<div class="max-w-xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('unit/produk') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($produk) ? base_url('unit/produk/update/'.$produk['id_produk']) : base_url('unit/produk/store') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_produk') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" value="<?= old('nama_produk', $produk['nama_produk'] ?? '') ?>">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="id_kategori" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $kat): ?>
                        <option value="<?= $kat['id_kategori'] ?>" <?= (old('id_kategori', $produk['id_kategori'] ?? '') == $kat['id_kategori']) ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Harga</label>
                    <input type="number" name="harga" class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('harga') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" value="<?= old('harga', $produk['harga'] ?? '') ?>">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stok</label>
                    <input type="number" name="stok" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" value="<?= old('stok', $produk['stok'] ?? '') ?>">
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"><?= old('deskripsi', $produk['deskripsi'] ?? '') ?></textarea>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                    <a href="<?= base_url('unit/produk') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
