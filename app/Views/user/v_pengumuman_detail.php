<div class="max-w-4xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('bumdes/pengumuman') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <article class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <!-- Banner / Header -->
        <div class="h-48 bg-biru-pastel relative overflow-hidden flex items-center justify-center">
            <i class="fas fa-bullhorn text-biru-utama/10 text-9xl absolute -right-8 -top-8 rotate-12"></i>
            <div class="text-center relative z-10 p-8">
                <span class="px-4 py-1 bg-biru-utama text-white rounded-full text-xs font-bold uppercase tracking-widest mb-4 inline-block">Official Announcement</span>
                <h1 class="text-3xl font-black text-biru-tua"><?= $pengumuman['judul_pengumuman'] ?></h1>
            </div>
        </div>

        <div class="p-8 lg:p-12">
            <div class="flex items-center gap-6 mb-10 pb-8 border-b border-gray-100">
                <div class="flex items-center gap-3 text-gray-500">
                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-400">Tanggal Terbit</p>
                        <p class="text-sm font-bold text-gray-800"><?= date('d F Y', strtotime($pengumuman['tgl_pengumuman'])) ?></p>
                    </div>
                </div>
                <div class="flex items-center gap-3 text-gray-500">
                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div>
                        <p class="text-xs uppercase font-bold text-gray-400">Penulis</p>
                        <p class="text-sm font-bold text-gray-800">Admin BUMDes</p>
                    </div>
                </div>
            </div>

            <div class="prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed">
                <?= $pengumuman['isi_pengumuman'] ?>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
                <div class="flex gap-4">
                    <a href="<?= base_url('bumdes/pengumuman/edit/'.$pengumuman['id_pengumuman']) ?>" 
                       class="bg-biru-utama text-white px-8 py-3 rounded-xl font-bold hover:bg-biru-tua transition shadow-lg flex items-center gap-2">
                        <i class="fas fa-edit"></i> Edit Pengumuman
                    </a>
                </div>
                <button onclick="window.print()" class="text-gray-400 hover:text-biru-utama transition flex items-center gap-2 font-bold">
                    <i class="fas fa-print"></i> Cetak Halaman
                </button>
            </div>
        </div>
    </article>
</div>
