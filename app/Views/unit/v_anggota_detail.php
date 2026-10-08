<div class="max-w-2xl mx-auto">
    <div class="page-header flex items-center gap-4 mb-6">
        <a href="<?= base_url('unit/anggota') ?>" class="text-biru-utama hover:text-biru-tua transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
        <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <table class="w-full">
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600 w-40">Nama</td>
                    <td class="py-4 text-gray-900"><?= $anggota['nama_anggota'] ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">NIK</td>
                    <td class="py-4 text-gray-900"><?= $anggota['nik'] ?? '-' ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Jenis Kelamin</td>
                    <td class="py-4 text-gray-900"><?= $anggota['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">Jabatan</td>
                    <td class="py-4 text-gray-900"><?= $anggota['jabatan'] ?? '-' ?></td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4 font-semibold text-gray-600">No. HP</td>
                    <td class="py-4 text-gray-900"><?= $anggota['no_hp'] ?? '-' ?></td>
                </tr>
                <tr>
                    <td class="py-4 font-semibold text-gray-600">Alamat</td>
                    <td class="py-4 text-gray-900"><?= $anggota['alamat'] ?? '-' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
