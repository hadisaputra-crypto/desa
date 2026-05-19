<div class="max-w-4xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/layanan') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="bg-gradient-to-r from-biru-utama to-biru-tua p-12 text-white text-center">
            <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center text-4xl mb-6 mx-auto backdrop-blur-md border border-white/30">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
            <h1 class="text-4xl font-bold mb-4"><?= $layanan['nama_layanan'] ?></h1>
            <div class="flex justify-center gap-2">
                <span class="px-4 py-1 bg-white/10 rounded-full text-sm backdrop-blur-sm border border-white/20">Layanan Unggulan</span>
            </div>
        </div>

        <div class="p-12">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-gray-900 font-bold text-xl mb-6 flex items-center gap-2">
                    <i class="fas fa-info-circle text-biru-utama"></i> Deskripsi Layanan
                </h3>
                <div class="prose prose-blue max-w-none text-gray-600 leading-relaxed text-lg italic">
                    <?= $layanan['deskripsi'] ?: 'Belum ada rincian deskripsi untuk layanan ini.' ?>
                </div>

                <div class="mt-12 p-8 bg-blue-50 rounded-2xl border border-blue-100 flex items-start gap-6">
                    <div class="w-12 h-12 bg-biru-utama text-white rounded-xl flex items-center justify-center shrink-0 shadow-lg">
                        <i class="fas fa-headset text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-biru-tua font-bold text-lg mb-1">Butuh Informasi Lebih Lanjut?</h4>
                        <p class="text-biru-utama/70">Hubungi kantor BUMDes untuk konsultasi terkait layanan ini.</p>
                    </div>
                </div>

                <div class="mt-12 flex gap-4">
                    <a href="<?= base_url('bumdes/layanan/edit/'.$layanan['id_layanan']) ?>" 
                       class="flex-1 bg-biru-utama text-white py-4 rounded-xl font-bold hover:bg-biru-tua transition shadow-lg text-center">
                        Edit Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
