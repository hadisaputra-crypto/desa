<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-blue-50 text-biru-utama rounded-lg">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Anggota</p>
                <p class="text-2xl font-bold text-gray-800"><?= $total_anggota ?></p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                <i class="fas fa-box text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Produk</p>
                <p class="text-2xl font-bold text-gray-800"><?= $total_produk ?></p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg">
                <i class="fas fa-exchange-alt text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Transaksi</p>
                <p class="text-2xl font-bold text-gray-800"><?= $total_transaksi ?></p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                <i class="fas fa-handshake text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Layanan</p>
                <p class="text-2xl font-bold text-gray-800"><?= $total_layanan ?></p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-bold text-biru-tua mb-4">Grafik Keuangan <?= date('Y') ?></h3>
        <canvas id="chartUnit" height="200"></canvas>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 text-center">
        <i class="fas fa-store text-6xl text-biru-pastel mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Selamat Datang di Panel Unit Usaha</h3>
        <p class="text-gray-500">Kelola anggota, produk, transaksi, dan layanan unit usaha Anda di sini.</p>
    </div>
</div>

<script>
var ctx = document.getElementById('chartUnit').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets: [
            { label: 'Pemasukan', data: <?= $chart_pemasukan ?>, backgroundColor: '#22c55e', borderRadius: 4 },
            { label: 'Pengeluaran', data: <?= $chart_pengeluaran ?>, backgroundColor: '#ef4444', borderRadius: 4 }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: { y: { beginAtZero: true, ticks: { callback: function(v) { return 'Rp ' + v.toLocaleString('id-ID'); } } } }
    }
});
</script>
