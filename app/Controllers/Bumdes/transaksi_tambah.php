<div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="page-title text-2xl lg:text-3xl font-bold text-hijau-tua">Tambah Transaksi Baru</h2>
            <p class="text-gray-600">Catat transaksi keuangan BUMDes</p>
        </div>
        <a href="<?= base_url('UserBumdes/transaksi') ?>" class="btn-secondary bg-gray-100 text-gray-700 px-6 py-3 rounded-lg no-underline font-semibold transition-all hover:bg-gray-200 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Tambah Transaksi -->
    <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8">
        <form action="<?= base_url('UserBumdes/transaksi/simpan') ?>" method="POST">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Jenis Transaksi <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-hijau-utama transition-all">
                            <input type="radio" name="jenis" value="pemasukan" class="mr-3 text-hijau-utama" required>
                            <div>
                                <div class="font-semibold text-green-600">Pemasukan</div>
                                <div class="text-sm text-gray-600">Uang masuk ke kas</div>
                            </div>
                        </label>
                        <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-hijau-utama transition-all">
                            <input type="radio" name="jenis" value="pengeluaran" class="mr-3 text-hijau-utama" required>
                            <div>
                                <div class="font-semibold text-red-600">Pengeluaran</div>
                                <div class="text-sm text-gray-600">Uang keluar dari kas</div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Tanggal Transaksi <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggal" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" value="<?= date('Y-m-d') ?>" required>
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Keterangan Transaksi <span class="text-red-500">*</span></label>
                <textarea name="keterangan" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" rows="3" placeholder="Deskripsikan transaksi secara detail..." required></textarea>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Jumlah <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                        <input type="number" name="jumlah" class="form-control w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="0" min="0" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Kategori</label>
                    <select name="kategori" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="">Pilih Kategori</option>
                        <option value="penjualan">Penjualan</option>
                        <option value="jasa">Jasa</option>
                        <option value="sewa">Sewa</option>
                        <option value="pembelian">Pembelian</option>
                        <option value="gaji">Gaji</option>
                        <option value="operasional">Operasional</option>
                        <option value="pemeliharaan">Pemeliharaan</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Metode Pembayaran</label>
                    <select name="metode_bayar" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all">
                        <option value="tunai">Tunai</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="qris">QRIS</option>
                        <option value="kredit">Kredit</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Dari/Kepada</label>
                    <input type="text" name="pihak" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="Nama pihak terkait">
                </div>

                <div class="form-group">
                    <label class="form-label block text-hijau-tua font-medium mb-2">Referensi</label>
                    <input type="text" name="referensi" class="form-control w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-hijau-utama focus:bg-white transition-all" placeholder="No. invoice/bukti">
                </div>
            </div>

            <div class="form-group mb-6">
                <label class="form-label block text-hijau-tua font-medium mb-2">Bukti Transaksi</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-hijau-utama transition-all cursor-pointer" onclick="document.getElementById('bukti_transaksi').click()">
                    <i class="fas fa-file-upload text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-600 mb-2">Upload bukti transaksi</p>
                    <p class="text-sm text-gray-500">PDF, JPG, PNG (Max. 5MB)</p>
                    <input type="file" name="bukti_transaksi" id="bukti_transaksi" class="hidden" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-hijau-utama text-white px-8 py-3 rounded-lg font-semibold hover:bg-hijau-tua transition-all flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>Simpan Transaksi</span>
                </button>
                <a href="<?= base_url('UserBumdes/transaksi') ?>" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <i class="fas fa-times"></i>
                    <span>Batal</span>
                </a>
            </div>
        </form>
    </div>
</div>