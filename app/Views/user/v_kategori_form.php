<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/kategori') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($kategori) ? base_url('bumdes/kategori/update/'.$kategori['id_kategori']) : base_url('bumdes/kategori/store') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" name="nama_kategori" 
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_kategori') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           value="<?= old('nama_kategori', $kategori['nama_kategori'] ?? '') ?>"
                           placeholder="Contoh: Makanan, Kerajinan, Jasa">
                    <?php if ($validation->hasError('nama_kategori')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('nama_kategori') ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan Kategori
                    </button>
                    <a href="<?= base_url('bumdes/kategori') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
