<!-- 1. Menggunakan layout/template.php -->
<?= $this->extend('layout/template') ?>

<!-- 2. Mendefinisikan bagian 'content' -->
<?= $this->section('content') ?>

    <main>
        <!-- HANYA Section Beranda & Masalah -->
        <section id="beranda" class="pt-20 pb-12 md:pb-20 bg-[#F7F2EC]">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-3xl md:text-5xl font-bold section-title mb-4 leading-tight">Inovasi Digital BUMDes: Platform Terintegrasi</h1>
                <p class="text-lg md:text-xl text-gray-700 max-w-3xl mx-auto">Solusi lengkap yang menghubungkan edukasi modern, pemasaran digital, dan pendampingan ahli untuk memperkuat BUMDes dan petani Kerinci.</p>
            </div>
        </section>

        <section id="masalah" class="py-16">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold section-title">Masalah yang Kami Atasi</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Meningkatkan akses pasar, literasi digital, dan kualitas hasil panen melalui teknologi.</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                        <span class="text-3xl mb-2 block">&#x1F4B8;</span>
                        <h3 class="font-semibold text-lg text-[#4A4035] mb-2">Harga Jual Rendah</h3>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                         <span class="text-3xl mb-2 block">&#x1F4BB;</span>
                        <h3 class="font-semibold text-lg text-[#4A4035] mb-2">Gap Digital</h3>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                        <span class="text-3xl mb-2 block">&#x1F33E;</span>
                        <h3 class="font-semibold text-lg text-[#4A4035] mb-2">Kualitas Panen Tidak Optimal</h3>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?= $this->endSection() ?><!-- Menutup bagian 'content' -->

<!-- Halaman ini tidak memerlukan skrip khusus -->
<?= $this->section('scripts') ?>
<?= $this->endSection() ?>