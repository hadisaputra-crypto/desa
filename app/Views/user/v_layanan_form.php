<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/layanan') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($layanan) ? base_url('bumdes/layanan/update/'.$layanan['id_layanan']) : base_url('bumdes/layanan/store') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Layanan</label>
                    <input type="text" name="nama_layanan" 
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_layanan') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           value="<?= old('nama_layanan', $layanan['nama_layanan'] ?? '') ?>"
                           placeholder="Contoh: Sewa Alat, Jasa Angkut">
                    <?php if ($validation->hasError('nama_layanan')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('nama_layanan') ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Layanan</label>
                    <textarea name="deskripsi" rows="4" 
                              class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                              placeholder="Jelaskan detail layanan ini..."><?= old('deskripsi', $layanan['deskripsi'] ?? '') ?></textarea>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan Layanan
                    </button>
                    <a href="<?= base_url('bumdes/layanan') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
