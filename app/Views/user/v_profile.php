<div class="space-y-6">
    

    <!-- Profile Content -->
    <div class="profile-content grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Informasi Pribadi -->
        <div class="profile-card bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="card-title text-xl font-semibold text-hijau-tua mb-4 pb-3 border-b-2 border-hijau-pastel">Informasi Pribadi</h3>
            
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('bumdes/profile/update') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-group mb-4">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="<?= $user['nama'] ?? 'Nama User' ?>" required>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Email</label>
                    <input type="email" name="email" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="<?= $user['email'] ?? 'user@bumdes.id' ?>" required>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Telepon</label>
                    <input type="tel" name="telepon" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="+62 812-3456-7890">
                </div>
                <div class="form-group mb-6">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Alamat</label>
                    <textarea name="alamat" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" rows="3">Jl. Desa No. 123, Kecamatan, Kabupaten</textarea>
                </div>
                <button type="submit" class="btn-primary bg-hijau-utama text-white px-6 py-3 rounded-lg font-semibold border-none cursor-pointer transition-all hover:bg-hijau-tua hover:-translate-y-1 w-full">Simpan Perubahan</button>
            </form>
        </div>

        <!-- Informasi Akun & Keamanan -->
        <div class="profile-card bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="card-title text-xl font-semibold text-hijau-tua mb-4 pb-3 border-b-2 border-hijau-pastel">Informasi Akun</h3>
            <div class="info-list space-y-3 mb-6">
                <div class="info-item flex justify-between items-center py-3 border-b border-gray-200">
                    <span class="info-label text-gray-600 font-medium">Username</span>
                    <span class="info-value text-hijau-tua font-semibold"><?= $user['username'] ?? 'user123' ?></span>
                </div>
                <div class="info-item flex justify-between items-center py-3 border-b border-gray-200">
                    <span class="info-label text-gray-600 font-medium">Role</span>
                    <span class="info-value text-hijau-tua font-semibold"><?= ucfirst($user['role'] ?? 'Anggota') ?></span>
                </div>
                <div class="info-item flex justify-between items-center py-3 border-b border-gray-200">
                    <span class="info-label text-gray-600 font-medium">Bergabung Sejak</span>
                    <span class="info-value text-hijau-tua font-semibold">15 Jan 2024</span>
                </div>
                <div class="info-item flex justify-between items-center py-3">
                    <span class="info-label text-gray-600 font-medium">Status</span>
                    <span class="info-value text-hijau-muda font-semibold">Aktif</span>
                </div>
            </div>

            <h3 class="card-title text-xl font-semibold text-hijau-tua mb-4 pb-3 border-b-2 border-hijau-pastel">Ubah Password</h3>
            <form action="<?= base_url('bumdes/profile/password') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="form-group mb-4">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Password Saat Ini</label>
                    <input type="password" name="current_password" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Masukkan password saat ini" required>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Password Baru</label>
                    <input type="password" name="new_password" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Masukkan password baru" required>
                </div>
                <div class="form-group mb-6">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Konfirmasi password baru" required>
                </div>
                <button type="submit" class="btn-primary bg-hijau-utama text-white px-6 py-3 rounded-lg font-semibold border-none cursor-pointer transition-all hover:bg-hijau-tua hover:-translate-y-1 w-full">Ubah Password</button>
            </form>
        </div>
    </div>
</div>