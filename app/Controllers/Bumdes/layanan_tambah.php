<div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="page-title text-2xl lg:text-3xl font-bold text-hijau-tua">Tambah Layanan Baru</h2>
            <p class="text-gray-600">Buat layanan baru untuk BUMDes</p>
        </div>
        <a href="<?= base_url('UserBumdes/layanan') ?>" class="btn-secondary bg-gray-100 text-gray-700 px-6 py-3 rounded-lg no-underline font-semibold transition-all hover:bg-gray-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Tambah Layanan -->
    <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
        <form action="<?= base_url('UserBumdes/layanan/simpan') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Nama Layanan <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_layanan" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Masukkan nama layanan" required>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Kategori Layanan</label>
                    <select name="kategori" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="">Pilih Kategori</option>
                        <option value="pertanian">Pertanian</option>
                        <option value="perdagangan">Perdagangan</option>
                        <option value="jasa">Jasa</option>
                        <option value="simpan-pinjam">Simpan Pinjam</option>
                        <option value="wisata">Wisata</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Deskripsi Layanan <span class="text-red-500">*</span></label>
                <textarea name="deskripsi_layanan" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" rows="5" placeholder="Deskripsikan layanan secara detail..." required></textarea>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Harga Layanan</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                        <input type="number" name="harga" class="form-control w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="0">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Status</label>
                    <select name="status" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Ikon Layanan</label>
                    <select name="icon" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="fa-handshake">🤝 Handshake</option>
                        <option value="fa-seedling">🌱 Pertanian</option>
                        <option value="fa-store">🏪 Toko</option>
                        <option value="fa-money-bill">💰 Keuangan</option>
                        <option value="fa-tree">🌳 Wisata</option>
                        <option value="fa-tools">🛠️ Jasa</option>
                    </select>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Gambar Layanan</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-hijau-utama transition-all cursor-pointer" onclick="document.getElementById('cover_layanan').click()">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-600 mb-2">Klik untuk upload gambar</p>
                    <p class="text-sm text-gray-500">PNG, JPG, JPEG (Max. 2MB)</p>
                    <input type="file" name="cover_layanan" id="cover_layanan" class="hidden" accept="image/*">
                </div>
                <div id="image-preview" class="mt-3 hidden">
                    <img id="preview" class="max-w-xs rounded-lg shadow-md">
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Persyaratan Layanan</label>
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <input type="text" name="persyaratan[]" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Tambahkan persyaratan">
                        <button type="button" onclick="tambahPersyaratan()" class="bg-green-500 text-white p-3 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div id="persyaratan-container" class="space-y-2 mt-2"></div>
            </div>

            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-hijau-utama text-white px-8 py-3 rounded-lg font-semibold hover:bg-hijau-tua transition-all flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>Simpan Layanan</span>
                </button>
                <a href="<?= base_url('UserBumdes/layanan') ?>" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// Preview image
document.getElementById('cover_layanan').addEventListener('change', function(e) {
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('image-preview');
    
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        
        reader.readAsDataURL(this.files[0]);
    }
});

// Tambah persyaratan
function tambahPersyaratan() {
    const container = document.getElementById('persyaratan-container');
    const newInput = document.createElement('div');
    newInput.className = 'flex items-center gap-3';
    newInput.innerHTML = `
        <input type="text" name="persyaratan[]" class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Tambahkan persyaratan">
        <button type="button" onclick="hapusPersyaratan(this)" class="bg-red-500 text-white p-3 rounded-lg hover:bg-red-600 transition-all">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(newInput);
}

// Hapus persyaratan
function hapusPersyaratan(button) {
    button.parentElement.remove();
}
</script>