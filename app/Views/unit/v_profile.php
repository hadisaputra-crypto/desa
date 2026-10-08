<div class="max-w-xl mx-auto">
    <h2 class="text-2xl font-bold text-biru-tua mb-6"><?= $judul ?></h2>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6 shadow-sm rounded-r-lg">
            <p><?= session()->getFlashdata('pesan') ?></p>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden mb-6">
        <div class="p-6 bg-gradient-to-r from-biru-tua to-biru-utama text-white">
            <h3 class="text-lg font-bold">Update Profile</h3>
        </div>
        <div class="p-8">
            <form action="<?= base_url('unit/profile/update') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_user" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" value="<?= session()->get('user')['nama'] ?>">
                </div>
                <button type="submit" class="w-full bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                    <i class="fas fa-save mr-2"></i> Perbarui Profile
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6 bg-gradient-to-r from-biru-tua to-biru-utama text-white">
            <h3 class="text-lg font-bold">Ganti Password</h3>
        </div>
        <div class="p-8">
            <form action="<?= base_url('unit/profile/password') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                    <input type="password" name="password" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" placeholder="Masukkan password baru">
                </div>
                <button type="submit" class="w-full bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                    <i class="fas fa-key mr-2"></i> Ganti Password
                </button>
            </form>
        </div>
    </div>
</div>
