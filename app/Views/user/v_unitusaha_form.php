<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/unitusaha') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($unit) ? base_url('bumdes/unitusaha/update/'.$unit['id_unit']) : base_url('bumdes/unitusaha/store') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Unit Usaha</label>
                        <input type="text" name="nama_unit" 
                               class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_unit') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('nama_unit', $unit['nama_unit'] ?? '') ?>"
                               placeholder="Contoh: Toko Sembako, Pengolahan Air">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('penanggung_jawab', $unit['penanggung_jawab'] ?? '') ?>"
                               placeholder="Nama pengelola unit">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kontak</label>
                        <input type="text" name="kontak" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('kontak', $unit['kontak'] ?? '') ?>"
                               placeholder="Nomor telepon/WA">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                            <option value="aktif" <?= (old('status', $unit['status'] ?? '') == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                            <option value="non-aktif" <?= (old('status', $unit['status'] ?? '') == 'non-aktif') ? 'selected' : '' ?>>Non-Aktif</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="3" 
                                  class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                                  placeholder="Keterangan tambahan..."><?= old('keterangan', $unit['keterangan'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan Unit Usaha
                    </button>
                    <a href="<?= base_url('bumdes/unitusaha') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
