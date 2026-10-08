<div class="page-header mb-8">
    <h2 class="text-3xl font-bold text-biru-tua">Selamat Datang, <?= session()->get('user')['nama'] ?>!</h2>
    <p class="text-gray-500">Berikut adalah ringkasan unit usaha BUMDes Anda hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-biru-utama text-xl">
                <i class="fas fa-concierge-bell"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-gray-900"><?= number_format($total_layanan) ?></div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan</div>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600 text-xl">
                <i class="fas fa-box"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-gray-900"><?= number_format($total_produk) ?></div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Produk</div>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600 text-xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-gray-900"><?= number_format($total_anggota) ?></div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Anggota</div>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 text-xl">
                <i class="fas fa-store"></i>
            </div>
            <div>
                <div class="text-2xl font-bold text-gray-900"><?= number_format($total_unit) ?></div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Unit Usaha</div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    <div class="lg:col-span-2">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-bold text-biru-tua mb-4">Grafik Keuangan <?= date('Y') ?></h3>
            <canvas id="chartBumdes" height="200"></canvas>
        </div>
    </div>
    <div class="lg:col-span-1">
        <div class="bg-biru-utama p-8 rounded-2xl shadow-lg text-white relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md">
                        <i class="fas fa-user-circle text-4xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-xl"><?= session()->get('user')['nama'] ?></h4>
                        <p class="text-blue-100 text-sm italic">Administrator BUMDes</p>
                    </div>
                </div>
                <a href="<?= base_url('Auth/LogOut') ?>" class="block w-full py-3 bg-white text-biru-utama rounded-xl font-bold text-center hover:bg-blue-50 transition shadow-lg">
                    Keluar Sistem
                </a>
            </div>
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full"></div>
        </div>
    </div>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <a href="<?= base_url('bumdes/transaksi/create') ?>" class="group p-4 rounded-2xl bg-gray-50 hover:bg-biru-utama transition text-center">
        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:bg-blue-400 transition">
            <i class="fas fa-plus text-biru-utama group-hover:text-white"></i>
        </div>
        <span class="text-xs font-bold text-gray-600 group-hover:text-white">Transaksi</span>
    </a>
    <a href="<?= base_url('bumdes/produk/create') ?>" class="group p-4 rounded-2xl bg-gray-50 hover:bg-biru-utama transition text-center">
        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:bg-blue-400 transition">
            <i class="fas fa-box-open text-biru-utama group-hover:text-white"></i>
        </div>
        <span class="text-xs font-bold text-gray-600 group-hover:text-white">Produk Baru</span>
    </a>
    <a href="<?= base_url('bumdes/pengumuman/create') ?>" class="group p-4 rounded-2xl bg-gray-50 hover:bg-biru-utama transition text-center">
        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:bg-blue-400 transition">
            <i class="fas fa-bullhorn text-biru-utama group-hover:text-white"></i>
        </div>
        <span class="text-xs font-bold text-gray-600 group-hover:text-white">Pengumuman</span>
    </a>
    <a href="<?= base_url('bumdes/anggota/create') ?>" class="group p-4 rounded-2xl bg-gray-50 hover:bg-biru-utama transition text-center">
        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:bg-blue-400 transition">
            <i class="fas fa-user-plus text-biru-utama group-hover:text-white"></i>
        </div>
        <span class="text-xs font-bold text-gray-600 group-hover:text-white">Anggota</span>
    </a>
</div>

<script>
var ctx = document.getElementById('chartBumdes').getContext('2d');
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
