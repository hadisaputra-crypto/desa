<div class="max-w-4xl mx-auto">
    <div class="page-header flex items-center gap-3 sm:gap-4 mb-6">
        <a href="<?= base_url('bumdes/unitusaha') ?>" class="text-biru-utama hover:text-biru-tua transition flex-shrink-0">
            <i class="fas fa-arrow-left text-lg sm:text-xl"></i>
        </a>
        <h2 class="text-xl sm:text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="bg-biru-tua p-5 sm:p-8 text-white relative overflow-hidden">
            <!-- Decorative Icon -->
            <i class="fas fa-store text-white/10 text-7xl sm:text-9xl absolute -right-4 -bottom-4"></i>
            
            <div class="relative z-10">
                <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-3 inline-block backdrop-blur-sm">Unit Usaha BUMDes</span>
                <h1 class="text-2xl sm:text-4xl font-bold mb-2"><?= $unit['nama_unit'] ?></h1>
                <p class="text-blue-100 text-base sm:text-lg flex items-center gap-2">
                    <i class="fas fa-user-tie"></i> PJ: <?= $unit['penanggung_jawab'] ?>
                </p>
            </div>
        </div>

        <div class="p-5 sm:p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-12">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Informasi Kontak</h3>
                        <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-white text-biru-utama rounded-full flex items-center justify-center shadow-sm">
                                    <i class="fab fa-whatsapp text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-xs font-medium">Nomor Telepon / HP</p>
                                    <p class="text-gray-900 font-bold text-lg"><?= $unit['kontak'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Keterangan Unit</h3>
                        <p class="text-gray-600 leading-relaxed bg-gray-50 p-6 rounded-2xl border border-gray-100 italic">
                            "<?= ($unit['deskripsi'] ?? $unit['keterangan'] ?? 'Belum ada deskripsi untuk unit usaha ini.') ?>"
                        </p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Status Operasional</h3>
                        <div class="p-6 rounded-2xl border-2 <?= $unit['status'] == 'aktif' ? 'border-green-100 bg-green-50' : 'border-red-100 bg-red-50' ?> flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 rounded-full animate-pulse <?= $unit['status'] == 'aktif' ? 'bg-green-500' : 'bg-red-500' ?>"></div>
                                <span class="text-lg font-bold <?= $unit['status'] == 'aktif' ? 'text-green-700' : 'text-red-700' ?> uppercase">
                                    <?= $unit['status'] ?>
                                </span>
                            </div>
                            <i class="fas <?= $unit['status'] == 'aktif' ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500' ?> text-3xl"></i>
                        </div>
                    </div>

                    <div class="bg-biru-pastel rounded-2xl p-6 border border-blue-100">
                        <h4 class="text-biru-tua font-bold mb-2 flex items-center gap-2">
                            <i class="fas fa-chart-line"></i> Peforma Unit
                        </h4>
                        <p class="text-biru-utama text-sm">Unit ini berkontribusi aktif dalam pendapatan desa melalui pengelolaan potensi lokal yang berkelanjutan.</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-gray-100 flex flex-col sm:flex-row gap-3">
                <a href="<?= base_url('bumdes/unitusaha/edit/'.$unit['id_unit']) ?>" 
                   class="flex-1 sm:flex-none bg-biru-utama text-white px-6 sm:px-8 py-3 rounded-xl font-bold hover:bg-biru-tua transition shadow-lg flex items-center justify-center gap-2">
                    <i class="fas fa-edit"></i> Edit Unit Usaha
                </a>
                <a href="<?= base_url('bumdes/unitusaha') ?>" 
                   class="flex-1 sm:flex-none bg-gray-100 text-gray-600 px-6 sm:px-8 py-3 rounded-xl font-bold hover:bg-gray-200 transition text-center flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
