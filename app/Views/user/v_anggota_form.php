<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/anggota') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($anggota) ? base_url('bumdes/anggota/update/'.$anggota['id_anggota']) : base_url('bumdes/anggota/store') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_anggota" 
                               class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_anggota') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('nama_anggota', $anggota['nama_anggota'] ?? '') ?>"
                               placeholder="Masukkan nama lengkap">
                        <?php if ($validation->hasError('nama_anggota')): ?>
                            <p class="text-red-500 text-xs mt-1"><?= $validation->getError('nama_anggota') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIK</label>
                        <input type="text" name="nik" 
                               class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nik') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('nik', $anggota['nik'] ?? '') ?>"
                               placeholder="16 digit NIK">
                        <?php if ($validation->hasError('nik')): ?>
                            <p class="text-red-500 text-xs mt-1"><?= $validation->getError('nik') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                            <option value="L" <?= (old('jenis_kelamin', $anggota['jenis_kelamin'] ?? '') == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= (old('jenis_kelamin', $anggota['jenis_kelamin'] ?? '') == 'P') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                        <input type="text" name="jabatan" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('jabatan', $anggota['jabatan'] ?? '') ?>"
                               placeholder="Contoh: Ketua, Sekretaris">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor HP / WA</label>
                        <input type="text" name="no_hp" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('no_hp', $anggota['no_hp'] ?? '') ?>"
                               placeholder="0812xxxx">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" 
                                  class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                                  placeholder="Alamat lengkap"><?= old('alamat', $anggota['alamat'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan Data
                    </button>
                    <a href="<?= base_url('bumdes/anggota') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
