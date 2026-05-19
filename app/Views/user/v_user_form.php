<div class="max-w-xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/user') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($user) ? base_url('bumdes/user/update/'.$user['id_user']) : base_url('bumdes/user/store') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_user" 
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_user') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           value="<?= old('nama_user', $user['nama_user'] ?? '') ?>"
                           placeholder="Nama lengkap user">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" 
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('username') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           value="<?= old('username', $user['username'] ?? '') ?>"
                           placeholder="Username login">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password <?= isset($user) ? '<span class="text-xs font-normal text-gray-400">(Kosongkan jika tidak ingin ganti)</span>' : '' ?></label>
                    <input type="password" name="password" 
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('password') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           placeholder="Minimal 5 karakter">
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Level Akses</label>
                    <select name="level" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                        <option value="1" <?= (old('level', $user['level'] ?? '') == 1) ? 'selected' : '' ?>>Admin (Akses Penuh)</option>
                        <option value="2" <?= (old('level', $user['level'] ?? '') == 2) ? 'selected' : '' ?>>Operator (Akses BUMDes)</option>
                    </select>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan User
                    </button>
                    <a href="<?= base_url('bumdes/user') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
