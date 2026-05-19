<!-- 1. Menggunakan layout/template.php -->
<?= $this->extend('layout/template') ?>

<!-- 2. Mendefinisikan bagian 'content' -->
<?= $this->section('content') ?>

    <main>
        <!-- HANYA Section Rencana -->
        <section id="rencana" class="py-16 bg-[#F7F2EC]">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold section-title">Rencana Aksi dan Anggaran</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Detail linimasa implementasi dan alokasi dana.</p>
                </div>

                <div class="grid lg:grid-cols-5 gap-12">
                    <div class="lg:col-span-3">
                        <h3 class="text-xl font-semibold mb-6 text-[#4A4035]">Linimasa Kegiatan (1 Tahun)</h3>
                        <div class="relative border-l-2 border-dashed border-[#D4BBA2] pl-8">
                            <div class="timeline-item mb-8">
                                <h4 class="font-semibold text-lg">Bulan 1-3: Riset & Perancangan</h4>
                            </div>
                            <div class="timeline-item mb-8">
                                <h4 class="font-semibold text-lg">Bulan 4-7: Pengembangan Platform</h4>
                            </div>
                            <div class="timeline-item mb-8">
                                <h4 class="font-semibold text-lg">Bulan 8-10: Uji Coba & Pelatihan</h4>
                            </div>
                            <div class="timeline-item">
                                <h4 class="font-semibold text-lg">Bulan 11-12: Evaluasi & Pelaporan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <h3 class="text-xl font-semibold text-center mb-6 text-[#4A4035]">Alokasi Anggaran</h3>
                        <div class="chart-container" style="height: 320px; max-height: 350px;">
                            <canvas id="anggaranChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?= $this->endSection() ?><!-- Menutup bagian 'content' -->


<!-- 3. Mendefinisikan bagian 'scripts' HANYA untuk halaman Rencana -->
<?= $this->section('scripts') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chartFontColor = '#312A21';

            // Chart Anggaran
            const anggaranCtx = document.getElementById('anggaranChart');
            if (anggaranCtx) {
                const anggaranData = {
                    labels: ['Pengembangan Sistem', 'Riset & Analisis', 'Pelatihan & Sosialisasi', 'Publikasi & Laporan'],
                    datasets: [{
                        label: 'Alokasi Dana', data: [20000000, 10000000, 15000000, 5000000],
                        backgroundColor: ['#8C6A46', '#A88F72', '#C4B39E', '#D4BBA2'], hoverOffset: 4
                    }]
                };
                new Chart(anggaranCtx.getContext('2d'), {
                    type: 'doughnut', data: anggaranData,
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        plugins: {
                            legend: { position: 'bottom', labels: { color: chartFontColor } },
                            tooltip: {
                                callbacks: {
                                    label: (context) => {
                                        let label = context.label || '';
                                        if (label) { label += ': '; }
                                        if (context.parsed !== null) {
                                            label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(context.parsed);
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
<?= $this->endSection() ?><!-- Menutup bagian 'scripts' -->