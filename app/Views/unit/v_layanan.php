<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('unit/layanan/create') ?>" class="bg-biru-utama text-white px-6 py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center gap-2 shadow-lg">
        <i class="fas fa-plus"></i> Tambah Layanan
    </a>
</div>

<?php if (session()->getFlashdata('pesan')): ?>
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6 shadow-sm rounded-r-lg">
        <p><?= session()->getFlashdata('pesan') ?></p>
    </div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-biru-pastel text-biru-tua">
                    <th class="p-4 font-semibold text-sm">No</th>
                    <th class="p-4 font-semibold text-sm">Nama Layanan</th>
                    <th class="p-4 font-semibold text-sm text-right">Harga</th>
                    <th class="p-4 font-semibold text-sm">Satuan</th>
                    <th class="p-4 font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $no=1; foreach ($layanan as $row): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-sm text-gray-600"><?= $no++ ?></td>
                    <td class="p-4 font-medium text-gray-900"><?= $row['nama_layanan'] ?></td>
                    <td class="p-4 text-sm text-gray-600 text-right"><?= number_format($row['harga'] ?? 0, 0, ',', '.') ?></td>
                    <td class="p-4 text-sm text-gray-600"><?= $row['satuan'] ?? '-' ?></td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-3">
                            <a href="<?= base_url('unit/layanan/detail/'.$row['id_layanan']) ?>" class="text-green-500 hover:text-green-700 transition p-2 hover:bg-green-50 rounded-lg">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('unit/layanan/edit/'.$row['id_layanan']) ?>" class="text-blue-500 hover:text-biru-tua transition p-2 hover:bg-blue-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('unit/layanan/delete/'.$row['id_layanan']) ?>" onclick="return confirm('Hapus layanan ini?')" class="text-red-500 hover:text-red-700 transition p-2 hover:bg-red-50 rounded-lg">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php if (empty($layanan)): ?>
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-400">Belum ada data layanan</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
