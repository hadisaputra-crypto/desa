<div class="max-w-4xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/transaksi') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-8 <?= $transaksi['tipe'] == 'pemasukan' ? 'bg-green-50' : 'bg-red-50' ?> border-b border-gray-100">
            <div class="flex justify-between items-center">
                <div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-2 inline-block <?= $transaksi['tipe'] == 'pemasukan' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' ?>">
                        <?= $transaksi['tipe'] ?>
                    </span>
                    <h1 class="text-3xl font-bold text-gray-900">Bukti Transaksi Digital</h1>
                    <p class="text-gray-500">ID Transaksi: #TRX-<?= str_pad($transaksi['id_transaksi'], 6, '0', STR_PAD_LEFT) ?></p>
                </div>
                <div class="text-right">
                    <p class="text-gray-500 text-sm mb-1">Tanggal Transaksi</p>
                    <p class="text-xl font-bold text-gray-800"><?= date('d F Y', strtotime($transaksi['tanggal'])) ?></p>
                </div>
            </div>
        </div>

        <div class="p-8">
            <div class="flex flex-col items-center py-12 border-b border-dashed border-gray-200">
                <p class="text-gray-400 text-lg mb-2">Total Nominal</p>
                <h2 class="text-5xl font-black <?= $transaksi['tipe'] == 'pemasukan' ? 'text-green-600' : 'text-red-600' ?>">
                    <?= $transaksi['tipe'] == 'pemasukan' ? '+' : '-' ?> Rp <?= number_format($transaksi['nominal'], 0, ',', '.') ?>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-8">
                <div>
                    <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Informasi Tambahan</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Kategori / Sumber</span>
                            <span class="text-gray-800 font-bold"><?= $transaksi['kategori'] ?: 'Umum' ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Dibuat Oleh</span>
                            <span class="text-gray-800 font-bold">Admin BUMDes</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Keterangan / Catatan</h3>
                    <p class="text-gray-700 italic bg-gray-50 p-4 rounded-xl border border-gray-100">
                        "<?= $transaksi['keterangan'] ?: 'Tidak ada catatan tambahan.' ?>"
                    </p>
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <button onclick="window.print()" class="flex-1 bg-biru-tua text-white py-4 rounded-xl font-bold hover:bg-black transition shadow-lg flex items-center justify-center gap-2">
                    <i class="fas fa-print"></i> Cetak Kwitansi
                </button>
                <a href="<?= base_url('bumdes/transaksi/edit/'.$transaksi['id_transaksi']) ?>" 
                   class="bg-gray-100 text-gray-600 px-8 py-4 rounded-xl font-bold hover:bg-gray-200 transition">
                    Edit Data
                </a>
            </div>
        </div>
        
        <div class="bg-gray-50 p-4 text-center text-gray-400 text-xs">
            Dicetak secara otomatis oleh Sistem Informasi BUMDes Terintegrasi
        </div>
    </div>
</div>
