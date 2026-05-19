<div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="page-title text-2xl lg:text-3xl font-bold text-hijau-tua">Buat Pengumuman Baru</h2>
            <p class="text-gray-600">Bagikan informasi penting kepada anggota BUMDes</p>
        </div>
        <a href="<?= base_url('UserBumdes/pengumuman') ?>" class="btn-secondary bg-gray-100 text-gray-700 px-6 py-3 rounded-lg no-underline font-semibold transition-all hover:bg-gray-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Tambah Pengumuman -->
    <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
        <form action="<?= base_url('UserBumdes/pengumuman/simpan') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Judul Pengumuman <span class="text-red-500">*</span></label>
                <input type="text" name="judul_pengumuman" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Masukkan judul pengumuman yang menarik" required>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Isi Pengumuman <span class="text-red-500">*</span></label>
                <textarea name="isi_pengumuman" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" rows="8" placeholder="Tulis isi pengumuman secara detail..." required></textarea>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Kategori</label>
                    <select name="kategori" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="umum">Umum</option>
                        <option value="keuangan">Keuangan</option>
                        <option value="kegiatan">Kegiatan</option>
                        <option value="penting">Penting</option>
                        <option value="lowongan">Lowongan</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Status</label>
                    <select name="status" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="published">Publikasikan</option>
                        <option value="draft">Simpan sebagai Draft</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Tanggal Publikasi</label>
                    <input type="datetime-local" name="tanggal_publikasi" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="<?= date('Y-m-d\TH:i') ?>">
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Tanggal Kadaluarsa</label>
                    <input type="date" name="tanggal_kadaluarsa" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Lampiran</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-hijau-utama transition-all cursor-pointer" onclick="document.getElementById('lampiran').click()">
                    <i class="fas fa-paperclip text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-600 mb-2">Klik untuk menambahkan lampiran</p>
                    <p class="text-sm text-gray-500">PDF, DOC, DOCX, XLS, XLSX (Max. 10MB)</p>
                    <input type="file" name="lampiran" id="lampiran" class="hidden" accept=".pdf,.doc,.docx,.xls,.xlsx">
                </div>
                <div id="file-preview" class="mt-3 hidden">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <i class="fas fa-file text-gray-400"></i>
                        <span id="file-name" class="text-sm"></span>
                        <button type="button" onclick="hapusFile()" class="ml-auto text-red-500 hover:text-red-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Target Penerima</label>
                <div class="space-y-2">
                    <label class="flex items-center gap-3">
                        <input type="radio" name="target" value="semua" class="text-hijau-utama" checked>
                        <span>Semua Anggota</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="radio" name="target" value="pengurus" class="text-hijau-utama">
                        <span>Pengurus Saja</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="radio" name="target" value="tertentu" class="text-hijau-utama">
                        <span>Anggota Tertentu</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-hijau-utama text-white px-8 py-3 rounded-lg font-semibold hover:bg-hijau-tua transition-all flex items-center gap-2">
                    <i class="fas fa-paper-plane"></i>
                    <span>Publikasikan</span>
                </button>
                <button type="submit" name="draft" value="1" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>Simpan Draft</span>
                </button>
                <a href="<?= base_url('UserBumdes/pengumuman') ?>" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// File preview
document.getElementById('lampiran').addEventListener('change', function(e) {
    const filePreview = document.getElementById('file-preview');
    const fileName = document.getElementById('file-name');
    
    if (this.files && this.files[0]) {
        fileName.textContent = this.files[0].name;
        filePreview.classList.remove('hidden');
    }
});

function hapusFile() {
    document.getElementById('lampiran').value = '';
    document.getElementById('file-preview').classList.add('hidden');
}
</script>