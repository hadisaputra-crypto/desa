<div class="max-w-4xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/pengumuman') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($pengumuman) ? base_url('bumdes/pengumuman/update/'.$pengumuman['id_pengumuman']) : base_url('bumdes/pengumuman/store') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Pengumuman</label>
                    <input type="text" name="judul_pengumuman" 
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('judul_pengumuman') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition font-bold"
                           value="<?= old('judul_pengumuman', $pengumuman['judul_pengumuman'] ?? '') ?>"
                           placeholder="Masukkan judul pengumuman yang menarik">
                    <?php if ($validation->hasError('judul_pengumuman')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('judul_pengumuman') ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Pengumuman</label>
                    <textarea name="isi_pengumuman" id="editor" rows="10" 
                              class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('isi_pengumuman') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                              placeholder="Tuliskan isi pengumuman di sini..."><?= old('isi_pengumuman', $pengumuman['isi_pengumuman'] ?? '') ?></textarea>
                    <?php if ($validation->hasError('isi_pengumuman')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('isi_pengumuman') ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-bullhorn mr-2"></i> Publikasikan
                    </button>
                    <a href="<?= base_url('bumdes/pengumuman') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
