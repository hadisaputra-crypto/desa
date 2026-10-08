<div class="max-w-3xl mx-auto">
    <div class="page-header mb-6">
        <h2 class="text-2xl font-bold text-biru-tua mb-1">Pengaturan Persentase SHU</h2>
        <p class="text-gray-600">Atur alokasi Sisa Hasil Usaha (SHU) BUMDes. Total persentase item aktif harus 100%.</p>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
        <i class="fas fa-check-circle mr-2"></i><?= session()->getFlashdata('pesan') ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
        <i class="fas fa-exclamation-circle mr-2"></i><?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= base_url('bumdes/shu/update') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-gray-700">Total Persentase (item aktif)</span>
                        <span id="total-persen" class="text-lg font-bold text-biru-utama"><?= number_format($total_persen, 2) ?>%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div id="total-bar" class="bg-biru-utama h-3 rounded-full transition-all" style="width: <?= min($total_persen, 100) ?>%"></div>
                    </div>
                </div>

                <div class="space-y-4" id="shu-rows">
                    <?php $i = 0; foreach ($settings as $s): ?>
                    <div class="shu-row <?= $s['aktif'] ? '' : 'opacity-60 bg-red-50' ?> grid grid-cols-1 md:grid-cols-12 gap-4 items-center bg-gray-50 rounded-lg p-4">
                        <input type="hidden" name="id_shu[]" value="<?= $s['id_shu'] ?>">
                        <div class="md:col-span-1 flex items-center">
                            <input type="checkbox" name="aktif[]" value="<?= $s['id_shu'] ?>" <?= $s['aktif'] ? 'checked' : '' ?> class="aktif-check w-4 h-4" title="Aktif / Nonaktif">
                        </div>
                        <div class="md:col-span-4">
                            <label class="block text-sm font-semibold text-gray-700"><?= $s['nama_alokasi'] ?></label>
                            <?php if ($s['is_custom']): ?>
                                <span class="text-xs text-biru-600 font-medium">Item khusus BUMDes</span>
                            <?php else: ?>
                                <span class="text-xs text-gray-400"><?= $s['aktif'] ? 'Default' : 'Nonaktif' ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <input type="number" name="persentase[]" step="0.01" min="0" max="100"
                                       data-idx="<?= $i ?>" data-nama="<?= $s['nama_alokasi'] ?>"
                                       class="persen-input w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                                       value="<?= old("persentase.$i", $s['persentase']) ?>">
                                <span class="text-gray-500 font-medium">%</span>
                            </div>
                        </div>
                        <div class="md:col-span-3">
                            <input type="text" name="keterangan[]" placeholder="Keterangan (opsional)"
                                   class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition"
                                   value="<?= old("keterangan.$i", $s['keterangan']) ?>">
                        </div>
                        <div class="md:col-span-1 text-right">
                            <?php if ($s['aktif']): ?>
                            <a href="<?= base_url('bumdes/shu/delete/' . $s['id_shu']) ?>" class="text-red-500 hover:text-red-700" title="Nonaktifkan / Hapus" onclick="return confirm('Nonaktifkan atau hapus item alokasi ini?')"><i class="fas fa-trash"></i></a>
                            <?php else: ?>
                            <a href="<?= base_url('bumdes/shu/reactivate/' . $s['id_shu']) ?>" class="text-green-500 hover:text-green-700" title="Aktifkan kembali"><i class="fas fa-undo"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php $i++; endforeach; ?>
                </div>

                <div class="flex gap-4 pt-6 border-t border-gray-100 mt-6">
                    <button type="submit" class="flex-1 bg-biru-utama text-white py-3 rounded-lg font-bold hover:bg-biru-tua transition shadow-lg">
                        <i class="fas fa-save mr-2"></i> Simpan Pengaturan SHU
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tambah Alokasi Baru -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden mt-6">
        <div class="p-8">
            <h3 class="text-lg font-bold text-biru-tua mb-4"><i class="fas fa-plus-circle mr-2 text-green-600"></i>Tambah Alokasi Baru</h3>
            <form action="<?= base_url('bumdes/shu/add') ?>" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <?= csrf_field() ?>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Alokasi</label>
                    <input type="text" name="nama_alokasi" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" placeholder="Contoh: Dana Cadangan">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan (opsional)</label>
                    <input type="text" name="keterangan" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-biru-utama focus:ring-2 focus:ring-biru-pastel transition" placeholder="Catatan">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 transition shadow-lg">
                        <i class="fas fa-plus mr-2"></i> Tambah
                    </button>
                </div>
            </form>
            <p class="text-xs text-gray-400 mt-3">Setelah ditambahkan, atur persentasenya pada form di atas agar total item aktif 100%.</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var inputs = document.querySelectorAll('.persen-input');
    var checks = document.querySelectorAll('.aktif-check');
    var totalEl = document.getElementById('total-persen');
    var barEl = document.getElementById('total-bar');
    var rows = document.querySelectorAll('.shu-row');

    function perRowEls(row) {
        var idx = [...document.querySelectorAll('.shu-row')].indexOf(row);
        var box = row.querySelector('.aktif-check');
        var num = row.querySelector('.persen-input');
        return { box: box, num: num };
    }

    function recalc() {
        var total = 0;
        document.querySelectorAll('.shu-row').forEach(function(row) {
            var e = perRowEls(row);
            if (e.box.checked) total += parseFloat(e.num.value) || 0;
        });
        totalEl.textContent = total.toFixed(2) + '%';
        barEl.style.width = Math.min(total, 100) + '%';
        if (Math.abs(total - 100) < 0.01) {
            totalEl.className = 'text-lg font-bold text-green-600';
            barEl.className = 'bg-green-500 h-3 rounded-full transition-all';
        } else {
            totalEl.className = 'text-lg font-bold text-biru-utama';
            barEl.className = 'bg-biru-utama h-3 rounded-full transition-all';
        }
    }
    inputs.forEach(function(inp) { inp.addEventListener('input', recalc); });
    checks.forEach(function(c) { c.addEventListener('change', recalc); });
    recalc();
});
</script>
