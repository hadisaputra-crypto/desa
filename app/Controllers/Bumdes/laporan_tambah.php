<div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="page-title text-2xl lg:text-3xl font-bold text-hijau-tua">Generate Laporan Baru</h2>
            <p class="text-gray-600">Buat laporan keuangan BUMDes</p>
        </div>
        <a href="<?= base_url('UserBumdes/laporan') ?>" class="btn-secondary bg-gray-100 text-gray-700 px-6 py-3 rounded-lg no-underline font-semibold transition-all hover:bg-gray-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Generate Laporan -->
    <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
        <form action="<?= base_url('UserBumdes/laporan/generate') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Jenis Laporan <span class="text-red-500">*</span></label>
                    <select name="jenis_laporan" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" required>
                        <option value="">Pilih Jenis Laporan</option>
                        <option value="harian">Laporan Harian</option>
                        <option value="mingguan">Laporan Mingguan</option>
                        <option value="bulanan">Laporan Bulanan</option>
                        <option value="tahunan">Laporan Tahunan</option>
                        <option value="arus_kas">Laporan Arus Kas</option>
                        <option value="labarugi">Laporan Laba Rugi</option>
                        <option value="neraca">Neraca</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Format Laporan</label>
                    <select name="format" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Periode Mulai <span class="text-red-500">*</span></label>
                    <input type="date" name="periode_mulai" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" required>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Periode Selesai <span class="text-red-500">*</span></label>
                    <input type="date" name="periode_selesai" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" required>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Kategori Transaksi</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="pemasukan" class="text-hijau-utama" checked>
                        <span>Pemasukan</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="pengeluaran" class="text-hijau-utama" checked>
                        <span>Pengeluaran</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="investasi" class="text-hijau-utama">
                        <span>Investasi</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="operasional" class="text-hijau-utama" checked>
                        <span>Operasional</span>
                    </label>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Detail Laporan</label>
                <div class="space-y-3 bg-gray-50 p-4 rounded-lg">
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="ringkasan" class="text-hijau-utama" checked>
                            <span>Ringkasan Eksekutif</span>
                        </div>
                    </label>
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="transaksi" class="text-hijau-utama" checked>
                            <span>Detail Transaksi</span>
                        </div>
                    </label>
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="grafik" class="text-hijau-utama" checked>
                            <span>Grafik dan Chart</span>
                        </div>
                    </label>
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="analisis" class="text-hijau-utama">
                            <span>Analisis Trend</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Keterangan Tambahan</label>
                <textarea name="keterangan" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" rows="3" placeholder="Tambahkan catatan atau keterangan khusus..."></textarea>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex items-start gap-3">
                    <i class="fas fa-info-circle text-blue-500 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-blue-800 mb-1">Informasi Laporan</h4>
                        <p class="text-blue-700 text-sm">Laporan akan memproses semua data transaksi dalam periode yang dipilih. Proses ini mungkin memerlukan waktu beberapa menit tergantung jumlah
                            <div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="page-title text-2xl lg:text-3xl font-bold text-hijau-tua">Generate Laporan Baru</h2>
            <p class="text-gray-600">Buat laporan keuangan BUMDes</p>
        </div>
        <a href="<?= base_url('UserBumdes/laporan') ?>" class="btn-secondary bg-gray-100 text-gray-700 px-6 py-3 rounded-lg no-underline font-semibold transition-all hover:bg-gray-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Generate Laporan -->
    <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
        <form action="<?= base_url('UserBumdes/laporan/generate') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Jenis Laporan <span class="text-red-500">*</span></label>
                    <select name="jenis_laporan" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" required>
                        <option value="">Pilih Jenis Laporan</option>
                        <option value="harian">Laporan Harian</option>
                        <option value="mingguan">Laporan Mingguan</option>
                        <option value="bulanan">Laporan Bulanan</option>
                        <option value="tahunan">Laporan Tahunan</option>
                        <option value="arus_kas">Laporan Arus Kas</option>
                        <option value="labarugi">Laporan Laba Rugi</option>
                        <option value="neraca">Neraca</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Format Laporan</label>
                    <select name="format" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="pdf">PDF</option>
                        <option value="excel">Excel</option>
                        <option value="csv">CSV</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Periode Mulai <span class="text-red-500">*</span></label>
                    <input type="date" name="periode_mulai" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" required>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Periode Selesai <span class="text-red-500">*</span></label>
                    <input type="date" name="periode_selesai" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" required>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Kategori Transaksi</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="pemasukan" class="text-hijau-utama" checked>
                        <span>Pemasukan</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="pengeluaran" class="text-hijau-utama" checked>
                        <span>Pengeluaran</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="investasi" class="text-hijau-utama">
                        <span>Investasi</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="kategori[]" value="operasional" class="text-hijau-utama" checked>
                        <span>Operasional</span>
                    </label>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Detail Laporan</label>
                <div class="space-y-3 bg-gray-50 p-4 rounded-lg">
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="ringkasan" class="text-hijau-utama" checked>
                            <span>Ringkasan Eksekutif</span>
                        </div>
                    </label>
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="transaksi" class="text-hijau-utama" checked>
                            <span>Detail Transaksi</span>
                        </div>
                    </label>
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="grafik" class="text-hijau-utama" checked>
                            <span>Grafik dan Chart</span>
                        </div>
                    </label>
                    <label class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="detail[]" value="analisis" class="text-hijau-utama">
                            <span>Analisis Trend</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Keterangan Tambahan</label>
                <textarea name="keterangan" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" rows="3" placeholder="Tambahkan catatan atau keterangan khusus..."></textarea>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex items-start gap-3">
                    <i class="fas fa-info-circle text-blue-500 text-xl mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-blue-800 mb-1">Informasi Laporan</h4>
                        <p class="text-blue-700 text-sm">Laporan akan memproses semua data transaksi dalam periode yang dipilih. Proses ini mungkin memerlukan waktu beberapa menit tergantung jumlah data transaksi. Pastikan periode yang dipilih sudah benar sebelum melanjutkan.</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-end">
                <button type="reset" class="btn-secondary bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-semibold transition-all hover:bg-gray-200 flex items-center justify-center gap-2">
                    <i class="fas fa-redo"></i>
                    <span>Reset Form</span>
                </button>
                <button type="submit" class="btn-primary bg-hijau-utama text-white px-8 py-3 rounded-lg font-semibold transition-all hover:bg-hijau-tua flex items-center justify-center gap-2">
                    <i class="fas fa-file-download"></i>
                    <span>Generate Laporan</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Loading Modal -->
<div id="loadingModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4">
        <div class="flex flex-col items-center gap-4">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-hijau-utama"></div>
            <h3 class="text-lg font-semibold text-gray-800">Sedang Memproses Laporan</h3>
            <p class="text-gray-600 text-center text-sm">Laporan Anda sedang dibuat. Harap tunggu sebentar...</p>
        </div>
    </div>
</div>

<script>
// Form validation and loading modal
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const loadingModal = document.getElementById('loadingModal');
    
    form.addEventListener('submit', function(e) {
        // Basic validation
        const jenisLaporan = form.querySelector('[name="jenis_laporan"]').value;
        const periodeMulai = form.querySelector('[name="periode_mulai"]').value;
        const periodeSelesai = form.querySelector('[name="periode_selesai"]').value;
        
        if (!jenisLaporan || !periodeMulai || !periodeSelesai) {
            e.preventDefault();
            alert('Harap lengkapi semua field yang wajib diisi!');
            return;
        }
        
        // Date validation
        if (new Date(periodeMulai) > new Date(periodeSelesai)) {
            e.preventDefault();
            alert('Periode mulai tidak boleh lebih besar dari periode selesai!');
            return;
        }
        
        // Show loading modal
        loadingModal.classList.remove('hidden');
    });
    
    // Auto set date ranges based on report type
    const jenisLaporanSelect = form.querySelector('[name="jenis_laporan"]');
    const periodeMulaiInput = form.querySelector('[name="periode_mulai"]');
    const periodeSelesaiInput = form.querySelector('[name="periode_selesai"]');
    
    jenisLaporanSelect.addEventListener('change', function() {
        const today = new Date();
        let startDate = new Date();
        let endDate = new Date();
        
        switch(this.value) {
            case 'harian':
                startDate = today;
                endDate = today;
                break;
            case 'mingguan':
                startDate = new Date(today.setDate(today.getDate() - 7));
                endDate = new Date();
                break;
            case 'bulanan':
                startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                break;
            case 'tahunan':
                startDate = new Date(today.getFullYear(), 0, 1);
                endDate = new Date(today.getFullYear(), 11, 31);
                break;
        }
        
        if (this.value !== '') {
            periodeMulaiInput.valueAsDate = startDate;
            periodeSelesaiInput.valueAsDate = endDate;
        }
    });
});
</script>