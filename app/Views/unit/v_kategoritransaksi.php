<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('unit/kategoritransaksi/create') ?>" class="bg-biru-utama text-white px-6 py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center gap-2 shadow-lg">
        <i class="fas fa-plus"></i> Tambah Kategori
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
                    <th class="p-4 font-semibold text-sm">Nama Kategori</th>
                    <th class="p-4 font-semibold text-sm">Tipe</th>
                    <th class="p-4 font-semibold text-sm">Sumber</th>
                    <th class="p-4 font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $no=1; foreach ($kategori as $row): ?>
                <?php $is_default = is_null($row['id_unit']); ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-sm text-gray-600"><?= $no++ ?></td>
                    <td class="p-4 font-medium text-gray-900"><?= $row['nama_kategori'] ?></td>
                    <td class="p-4 text-sm">
                        <?php if ($row['tipe'] == 'pemasukan'): ?>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Pemasukan</span>
                        <?php elseif ($row['tipe'] == 'pengeluaran'): ?>
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Pengeluaran</span>
                        <?php else: ?>
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">Modal</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 text-sm">
                        <?php if ($is_default): ?>
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Default BUMDes</span>
                        <?php else: ?>
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Khusus Unit</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 text-center">
                        <?php if ($is_default): ?>
                            <span class="text-gray-400 text-xs italic">Read-only</span>
                        <?php else: ?>
                            <div class="flex justify-center gap-3">
                                <a href="<?= base_url('unit/kategoritransaksi/edit/'.$row['id_kat_trans']) ?>" class="text-blue-500 hover:text-biru-tua transition p-2 hover:bg-blue-50 rounded-lg">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('unit/kategoritransaksi/delete/'.$row['id_kat_trans']) ?>" onclick="return confirm('Hapus kategori transaksi ini?')" class="text-red-500 hover:text-red-700 transition p-2 hover:bg-red-50 rounded-lg">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php if (empty($kategori)): ?>
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-400">Belum ada data kategori transaksi</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
