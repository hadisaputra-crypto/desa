<div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header">
        <h2 class="page-title text-2xl lg:text-3xl font-bold text-hijau-tua mb-2">Laporan Keuangan</h2>
        <p class="text-gray-600">Monitor dan analisis performa keuangan BUMDes</p>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="stat-card bg-white p-6 rounded-2xl shadow-lg border-t-4 border-green-500 text-center">
            <div class="stat-icon w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-green-600 text-2xl">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="stat-number text-3xl font-bold text-hijau-tua mb-2">Rp 25,4Jt</div>
            <div class="stat-label text-gray-600 text-sm">Total Pemasukan</div>
        </div>
        <div class="stat-card bg-white p-6 rounded-2xl shadow-lg border-t-4 border-red-500 text-center">
            <div class="stat-icon w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-red-600 text-2xl">
                <i class="fas fa-arrow-up"></i>
            </div>
            <div class="stat-number text-3xl font-bold text-hijau-tua mb-2">Rp 8,7Jt</div>
            <div class="stat-label text-gray-600 text-sm">Total Pengeluaran</div>
        </div>
        <div class="stat-card bg-white p-6 rounded-2xl shadow-lg border-t-4 border-blue-500 text-center">
            <div class="stat-icon w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-blue-600 text-2xl">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-number text-3xl font-bold text-hijau-tua mb-2">Rp 16,7Jt</div>
            <div class="stat-label text-gray-600 text-sm">Laba Bersih</div>
        </div>
        <div class="stat-card bg-white p-6 rounded-2xl shadow-lg border-t-4 border-purple-500 text-center">
            <div class="stat-icon w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-purple-600 text-2xl">
                <i class="fas fa-percentage"></i>
            </div>
            <div class="stat-number text-3xl font-bold text-hijau-tua mb-2">65%</div>
            <div class="stat-label text-gray-600 text-sm">Profit Margin</div>
        </div>
    </div>

    <!-- Report Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Laporan Bulanan -->
        <div class="bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-xl font-semibold text-hijau-tua mb-4">Laporan Bulanan</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-all cursor-pointer">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-pdf text-red-500 text-xl"></i>
                        <div>
                            <div class="font-semibold">Laporan Maret 2024</div>
                            <div class="text-sm text-gray-600">Generated: 01 Apr 2024</div>
                        </div>
                    </div>
                    <button class="text-hijau-utama hover:text-hijau-tua transition-colors">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-all cursor-pointer">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-excel text-green-500 text-xl"></i>
                        <div>
                            <div class="font-semibold">Laporan Februari 2024</div>
                            <div class="text-sm text-gray-600">Generated: 01 Mar 2024</div>
                        </div>
                    </div>
                    <button class="text-hijau-utama hover:text-hijau-tua transition-colors">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
            </div>
            <button class="w-full mt-4 bg-hijau-utama text-white py-3 rounded-lg font-semibold hover:bg-hijau-tua transition-all flex items-center justify-center gap-2">
                <i class="fas fa-plus"></i>
                <span>Generate Laporan Baru</span>
            </button>
        </div>

        <!-- Grafik Ringkasan -->
        <div class="bg-white p-6 rounded-2xl shadow-lg">
            <h3 class="text-xl font-semibold text-hijau-tua mb-4">Ringkasan Keuangan</h3>
            <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                <div class="text-center text-gray-500">
                    <i class="fas fa-chart-bar text-4xl mb-2 opacity-50"></i>
                    <p>Grafik Keuangan</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-center p-3 bg-green-50 rounded-lg">
                    <div class="text-green-600 font-semibold">+15%</div>
                    <div class="text-sm text-gray-600">Growth</div>
                </div>
                <div class="text-center p-3 bg-blue-50 rounded-lg">
                    <div class="text-blue-600 font-semibold">42</div>
                    <div class="text-sm text-gray-600">Transaksi</div>
                </div>
            </div>
        </div>
    </div>
</div>