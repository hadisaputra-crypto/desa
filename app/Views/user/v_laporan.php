<div class="space-y-6">
    <div class="page-header">
        <h2 class="text-2xl font-bold text-biru-tua mb-2">Pusat Laporan</h2>
        <p class="text-gray-600">Pilih jenis laporan yang ingin dilihat</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <a href="<?= base_url('bumdes/laporan/kas') ?>" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition text-center block">
            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-blue-600 text-3xl">
                <i class="fas fa-book"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Buku Kas</h3>
            <p class="text-sm text-gray-500">Laporan penerimaan dan pengeluaran kas dengan saldo berjalan</p>
        </a>

        <a href="<?= base_url('bumdes/laporan/labarugi') ?>" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition text-center block">
            <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-green-600 text-3xl">
                <i class="fas fa-chart-line"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Laba / Rugi</h3>
            <p class="text-sm text-gray-500">Ringkasan pendapatan dan beban untuk mengetahui laba/rugi</p>
        </a>

        <a href="<?= base_url('bumdes/laporan/neraca') ?>" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition text-center block">
            <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-purple-600 text-3xl">
                <i class="fas fa-balance-scale"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Neraca</h3>
            <p class="text-sm text-gray-500">Posisi keuangan: Aktiva vs Pasiva</p>
        </a>

        <a href="<?= base_url('bumdes/laporan/shu') ?>" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition text-center block">
            <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mx-auto mb-4 text-indigo-600 text-3xl">
                <i class="fas fa-percentage"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Laporan SHU</h3>
            <p class="text-sm text-gray-500">Sisa Hasil Usaha per unit dan alokasinya</p>
        </a>
    </div>
</div>
