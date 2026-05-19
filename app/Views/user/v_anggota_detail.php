<div class="max-w-4xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/anggota') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="bg-biru-utama p-8 text-white">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center text-5xl backdrop-blur-sm border-4 border-white/30">
                    <i class="fas fa-user"></i>
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-bold mb-1"><?= $anggota['nama_anggota'] ?></h1>
                    <p class="text-blue-100 text-lg"><?= $anggota['jabatan'] ?></p>
                    <div class="mt-4 flex flex-wrap justify-center md:justify-start gap-4">
                        <span class="bg-white/20 px-4 py-1 rounded-full text-sm backdrop-blur-sm">
                            <i class="fas fa-id-card mr-2"></i> <?= $anggota['nik'] ?>
                        </span>
                        <span class="bg-white/20 px-4 py-1 rounded-full text-sm backdrop-blur-sm">
                            <i class="fas fa-venus-mars mr-2"></i> <?= $anggota['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-4">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-blue-50 text-biru-utama rounded-lg flex items-center justify-center shrink-0">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs">Nomor HP / WhatsApp</p>
                                <p class="text-gray-800 font-semibold"><?= $anggota['no_hp'] ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-blue-50 text-biru-utama rounded-lg flex items-center justify-center shrink-0">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs">Alamat Lengkap</p>
                                <p class="text-gray-800 font-semibold leading-relaxed"><?= $anggota['alamat'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-4">Status & Aktivitas</h3>
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <div class="flex justify-between mb-4">
                            <span class="text-gray-500">Tanggal Bergabung</span>
                            <span class="text-gray-800 font-bold"><?= date('d M Y', strtotime($anggota['created_at'] ?? 'now')) ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500">Status Keanggotaan</span>
                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-xs font-bold uppercase">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-gray-100 flex gap-4">
                <a href="<?= base_url('bumdes/anggota/edit/'.$anggota['id_anggota']) ?>" 
                   class="bg-biru-utama text-white px-6 py-3 rounded-xl font-bold hover:bg-biru-tua transition shadow-lg flex items-center gap-2">
                    <i class="fas fa-edit"></i> Edit Profil
                </a>
                <button onclick="window.print()" class="bg-gray-100 text-gray-600 px-6 py-3 rounded-xl font-bold hover:bg-gray-200 transition flex items-center gap-2">
                    <i class="fas fa-print"></i> Cetak PDF
                </button>
            </div>
        </div>
    </div>
</div>
