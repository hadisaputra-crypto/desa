<!-- 1. Menggunakan layout/template.php -->
<?= $this->extend('layout/template') ?>

<!-- 2. Mendefinisikan bagian 'content' -->
<?= $this->section('content') ?>

    <main>
        <!-- HANYA Section Dampak -->
        <section id="dampak" class="py-16">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold section-title">Dampak & Proyeksi</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Indikator kinerja yang ditargetkan setelah implementasi platform selama satu tahun.</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <h3 class="text-xl font-semibold text-center mb-4 text-[#4A4035]">Peningkatan Kapasitas SDM (%)</h3>
                        <div class="chart-container">
                            <canvas id="kapasitasChart"></canvas>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <h3 class="text-xl font-semibold text-center mb-4 text-[#4A4035]">Proyeksi Pertumbuhan Ekonomi Desa</h3>
                        <div class="chart-container">
                            <canvas id="ekonomiChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?= $this->endSection() ?><!-- Menutup bagian 'content' -->


<!-- 3. Mendefinisikan bagian 'scripts' HANYA untuk halaman Dampak -->
<?= $this->section('scripts') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chartFontColor = '#312A21';

            // Chart Kapasitas
            const kapasitasCtx = document.getElementById('kapasitasChart');
            if (kapasitasCtx) {
                const kapasitasData = {
                    labels: ['Literasi Digital', 'Manajemen Keuangan', 'Teknik Pasca-Panen', 'Akses Pemasaran'],
                    datasets: [
                        { label: 'Sebelum', data: [25, 30, 20, 15], backgroundColor: '#D4BBA2', borderColor: '#C8A988', borderWidth: 1 },
                        { label: 'Target Sesudah', data: [75, 70, 65, 60], backgroundColor: '#8C6A46', borderColor: '#7A5C3D', borderWidth: 1 }
                    ]
                };
                new Chart(kapasitasCtx.getContext('2d'), {
                    type: 'bar', data: kapasitasData,
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        plugins: { legend: { position: 'bottom', labels: { color: chartFontColor } }, tooltip: { callbacks: { label: (context) => `${context.dataset.label}: ${context.raw}%` } } },
                        scales: { y: { beginAtZero: true, max: 100, ticks: { color: chartFontColor, callback: (value) => value + '%' }, grid: { color: '#EAE5E0' } }, x: { ticks: { color: chartFontColor }, grid: { display: false } } }
                    }
                });
            }

            // Chart Ekonomi
            const ekonomiCtx = document.getElementById('ekonomiChart');
            if (ekonomiCtx) {
                const ekonomiData = {
                    labels: ['Tahun 0', 'Tahun 1', 'Tahun 2 (Proyeksi)', 'Tahun 3 (Proyeksi)'],
                    datasets: [{ label: 'Rata-rata Pendapatan BUMDes (Juta Rp)', data: [120, 125, 150, 185], fill: true, backgroundColor: 'rgba(140, 106, 70, 0.2)', borderColor: '#8C6A46', tension: 0.3 }]
                };
                new Chart(ekonomiCtx.getContext('2d'), {
                    type: 'line', data: ekonomiData,
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: { y: { beginAtZero: true, ticks: { color: chartFontColor }, grid: { color: '#EAE5E0' } }, x: { ticks: { color: chartFontColor }, grid: { display: false } } }
                    }
                });
            }
        });
    </script>
<?= $this->endSection() ?><!-- Menutup bagian 'scripts' -->