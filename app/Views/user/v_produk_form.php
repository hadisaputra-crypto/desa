<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/produk') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($produk) ? base_url('bumdes/produk/update/'.$produk['id_produk']) : base_url('bumdes/produk/store') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk</label>
                        <input type="text" name="nama_produk" 
                               class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_produk') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('nama_produk', $produk['nama_produk'] ?? '') ?>"
                               placeholder="Masukkan nama produk">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <select name="id_kategori" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id_kategori'] ?>" <?= (old('id_kategori', $produk['id_kategori'] ?? '') == $k['id_kategori']) ? 'selected' : '' ?>>
                                <?= $k['nama_kategori'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Unit Usaha</label>
                        <select name="id_unit" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                            <option value="">-- Pilih Unit Usaha --</option>
                            <?php foreach ($unit as $u): ?>
                            <option value="<?= $u['id_unit'] ?>" <?= (old('id_unit', $produk['id_unit'] ?? '') == $u['id_unit']) ? 'selected' : '' ?>>
                                <?= $u['nama_unit'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" 
                               class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('harga') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('harga', $produk['harga'] ?? '') ?>"
                               placeholder="Contoh: 15000">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Stok</label>
                        <input type="number" name="stok" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('stok', $produk['stok'] ?? '0') ?>">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Satuan</label>
                        <input type="text" name="satuan" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('satuan', $produk['satuan'] ?? 'pcs') ?>"
                               placeholder="Contoh: pcs, kg, box">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Produk</label>
                        <input type="file" name="foto" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                        <?php if (isset($produk['foto']) && $produk['foto'] != ''): ?>
                            <div class="mt-2">
                                <p class="text-xs text-gray-500 mb-1">Foto Saat Ini:</p>
                                <img src="<?= base_url('produk/' . $produk['foto']) ?>" class="w-32 h-32 object-cover rounded-lg border">
                            </div>
                        <?php endif; ?>
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, JPEG, PNG. Maks: 2MB</p>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" 
                                  class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                                  placeholder="Deskripsi singkat produk"><?= old('deskripsi', $produk['deskripsi'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan Produk
                    </button>
                    <a href="<?= base_url('bumdes/produk') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
