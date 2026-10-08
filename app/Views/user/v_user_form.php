<div class="max-w-xl mx-auto">
    <div class="page-header flex items-center gap-3 sm:gap-4 mb-6">
        <a href="<?= base_url('bumdes/user') ?>" class="text-biru-utama hover:text-biru-tua transition flex-shrink-0">
            <i class="fas fa-arrow-left text-lg sm:text-xl"></i>
        </a>
        <h2 class="text-xl sm:text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-4 sm:p-8">
            <?php if (session()->getFlashdata('email_error')): ?>
            <div class="mb-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg text-sm text-yellow-700 flex items-start gap-2">
                <i class="fas fa-exclamation-triangle mt-0.5 flex-shrink-0"></i>
                <span>Data tersimpan, namun email gagal dikirim: <?= session()->getFlashdata('email_error') ?></span>
            </div>
            <?php endif; ?>

            <form action="<?= isset($user) ? base_url('bumdes/user/update/'.$user['id_user']) : base_url('bumdes/user/store') ?>" method="POST">
                <?= csrf_field() ?>

                <!-- Nama -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_user"
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nama_user') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           value="<?= old('nama_user', $user['nama_user'] ?? '') ?>"
                           placeholder="Nama lengkap user">
                    <?php if ($validation->hasError('nama_user')): ?>
                    <p class="text-xs text-red-500 mt-1"><?= $validation->getError('nama_user') ?></p>
                    <?php endif; ?>
                </div>

                <!-- Username -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input type="text" name="username"
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('username') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           value="<?= old('username', $user['username'] ?? '') ?>"
                           placeholder="Username login">
                    <?php if ($validation->hasError('username')): ?>
                    <p class="text-xs text-red-500 mt-1"><?= $validation->getError('username') ?></p>
                    <?php endif; ?>
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                        <?= isset($user) ? '<span class="text-xs font-normal text-gray-400">(Kosongkan jika tidak ingin ganti)</span>' : '' ?>
                    </label>
                    <input type="password" name="password" id="passwordInput"
                           class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('password') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                           placeholder="Minimal 5 karakter">
                    <?php if ($validation->hasError('password')): ?>
                    <p class="text-xs text-red-500 mt-1"><?= $validation->getError('password') ?></p>
                    <?php endif; ?>
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                        <span class="text-xs font-normal text-gray-400">(untuk notifikasi akun)</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <input type="email" name="email" id="emailInput"
                               class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                               value="<?= old('email', $user['email'] ?? '') ?>"
                               placeholder="contoh@email.com">
                    </div>
                </div>

                <!-- Level -->
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Level Akses</label>
                    <select name="level" id="levelSelect"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                            onchange="toggleUnitField()">
                        <option value="2" <?= (old('level', $user['level'] ?? '') == 2) ? 'selected' : '' ?>>Operator (Akses BUMDes)</option>
                        <option value="3" <?= (old('level', $user['level'] ?? '') == 3) ? 'selected' : '' ?>>Unit Usaha (Akses Unit)</option>
                    </select>
                </div>

                <!-- Unit (muncul jika level 3) -->
                <div class="mb-5" id="unitField" style="<?= (old('level', $user['level'] ?? '') == 3) ? '' : 'display:none;' ?>">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Unit Usaha</label>
                    <select name="id_unit" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                        <option value="">Pilih Unit Usaha</option>
                        <?php foreach ($unit_list as $unit): ?>
                        <option value="<?= $unit['id_unit'] ?>"
                            <?= (old('id_unit', $user['id_unit'] ?? '') == $unit['id_unit']) ? 'selected' : '' ?>>
                            <?= esc($unit['nama_unit']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Checkbox Kirim Email -->
                <div class="mb-6 p-4 bg-blue-50 border border-blue-100 rounded-xl">
                    <label class="flex items-start gap-3 cursor-pointer select-none" for="kirimEmail">
                        <div class="flex-shrink-0 mt-0.5">
                            <input type="checkbox" name="kirim_email" id="kirimEmail" value="1"
                                   class="w-4 h-4 rounded accent-blue-700 cursor-pointer"
                                   <?= (!isset($user)) ? 'checked' : '' ?>>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-biru-tua flex items-center gap-1.5">
                                <i class="fas fa-paper-plane text-biru-utama"></i>
                                Kirim Notifikasi Email
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                <?= isset($user)
                                    ? 'Kirim email pemberitahuan perubahan akun ke pengguna.'
                                    : 'Kirim email berisi username &amp; password ke pengguna.' ?>
                            </p>
                            <p class="text-xs text-red-500 mt-1 items-center gap-1 hidden" id="emailWarn">
                                <i class="fas fa-exclamation-circle"></i>
                                Isi field <strong>Email</strong> terlebih dahulu agar notifikasi dapat dikirim.
                            </p>
                        </div>
                    </label>
                </div>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan User
                    </button>
                    <a href="<?= base_url('bumdes/user') ?>"
                       class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleUnitField() {
    var level = document.getElementById('levelSelect').value;
    document.getElementById('unitField').style.display = (level == '3') ? '' : 'none';
}

const cbx       = document.getElementById('kirimEmail');
const emailInp  = document.getElementById('emailInput');
const warnEl    = document.getElementById('emailWarn');

function checkEmailWarn() {
    if (cbx.checked && !emailInp.value.trim()) {
        warnEl.classList.remove('hidden');
        warnEl.classList.add('flex');
    } else {
        warnEl.classList.add('hidden');
        warnEl.classList.remove('flex');
    }
}

cbx.addEventListener('change', checkEmailWarn);
emailInp.addEventListener('input', checkEmailWarn);
checkEmailWarn();

document.querySelector('form').addEventListener('submit', function(e) {
    if (cbx.checked && !emailInp.value.trim()) {
        e.preventDefault();
        emailInp.classList.add('border-red-400');
        emailInp.focus();
        checkEmailWarn();
    }
});
</script>
