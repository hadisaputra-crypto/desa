<div class="max-w-xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('unit/transaksi') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= isset($transaksi) ? base_url('unit/transaksi/update/'.$transaksi['id_transaksi']) : base_url('unit/transaksi/store') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tipe</label>
                    <select name="tipe" id="tipe" class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('tipe') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                        <option value="pemasukan" <?= (old('tipe', $transaksi['tipe'] ?? '') == 'pemasukan') ? 'selected' : '' ?>>Pemasukan</option>
                        <option value="pengeluaran" <?= (old('tipe', $transaksi['tipe'] ?? '') == 'pengeluaran') ? 'selected' : '' ?>>Pengeluaran</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select name="kategori" id="kategori" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori_pemasukan as $k): ?>
                        <option value="<?= $k['nama_kategori'] ?>" data-tipe="pemasukan" <?= (old('kategori', $transaksi['kategori'] ?? '') == $k['nama_kategori']) ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                        <?php foreach ($kategori_pengeluaran as $k): ?>
                        <option value="<?= $k['nama_kategori'] ?>" data-tipe="pengeluaran" <?= (old('kategori', $transaksi['kategori'] ?? '') == $k['nama_kategori']) ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nominal</label>
                    <input type="number" name="nominal" class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('nominal') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" value="<?= old('nominal', $transaksi['nominal'] ?? '') ?>">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="tanggal" class="w-full px-4 py-3 rounded-lg border <?= $validation->hasError('tanggal') ? 'border-red-500' : 'border-gray-200' ?> focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" value="<?= old('tanggal', $transaksi['tanggal'] ?? date('Y-m-d')) ?>">
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"><?= old('keterangan', $transaksi['keterangan'] ?? '') ?></textarea>
                </div>

                <div class="flex gap-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                    <a href="<?= base_url('unit/transaksi') ?>" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('tipe').addEventListener('change', function() {
    var tipe = this.value;
    var opts = document.querySelectorAll('#kategori option');
    var found = false;
    opts.forEach(function(opt) {
        if (opt.value === '') return;
        if (opt.getAttribute('data-tipe') === tipe) {
            opt.style.display = '';
            if (!found) {
                opt.selected = true;
                found = true;
            }
        } else {
            opt.style.display = 'none';
        }
    });
    if (!found) document.getElementById('kategori').value = '';
});

var evt = new Event('change');
document.getElementById('tipe').dispatchEvent(evt);
</script>
