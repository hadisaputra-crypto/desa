<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('bumdes/produk/create') ?>" 
       class="bg-biru-utama text-white px-6 py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center gap-2 shadow-lg">
        <i class="fas fa-plus"></i> Tambah Produk
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
                    <th class="p-4 font-semibold text-sm">Nama Produk</th>
                    <th class="p-4 font-semibold text-sm">Unit Usaha</th>
                    <th class="p-4 font-semibold text-sm text-right">Harga</th>
                    <th class="p-4 font-semibold text-sm text-center">Stok</th>
                    <th class="p-4 font-semibold text-sm text-center">Status</th>
                    <th class="p-4 font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $no=1; foreach ($produk as $row): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-sm text-gray-600"><?= $no++ ?></td>
                    <td class="p-4">
                        <div class="font-medium text-gray-900"><?= $row['nama_produk'] ?></div>
                        <div class="text-xs text-gray-400">ID: #PRO-<?= str_pad($row['id_produk'], 4, '0', STR_PAD_LEFT) ?></div>
                    </td>
                    <td class="p-4 text-sm text-gray-600">
                        <?= $row['nama_unit'] ?? '-' ?>
                    </td>
                    <td class="p-4 text-sm font-bold text-gray-700 text-right">
                        Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                    </td>
                    <td class="p-4 text-sm text-center">
                        <span class="px-2 py-1 rounded <?= ($row['stok'] ?? 0) > 5 ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' ?> text-xs font-medium">
                            <?= $row['stok'] ?? 0 ?> <?= $row['satuan'] ?? '' ?>
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <span class="px-2 py-1 rounded <?= ($row['status'] ?? 0) == 1 ? 'bg-blue-50 text-biru-utama' : 'bg-gray-100 text-gray-500' ?> text-xs font-bold uppercase">
                            <?= ($row['status'] ?? 0) == 1 ? 'Aktif' : 'Non-Aktif' ?>
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="<?= base_url('bumdes/produk/detail/'.$row['id_produk']) ?>" 
                               title="Detail"
                               class="text-green-500 hover:text-green-700 transition p-2 hover:bg-green-50 rounded-lg">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('bumdes/produk/edit/'.$row['id_produk']) ?>" 
                               title="Edit"
                               class="text-blue-500 hover:text-biru-tua transition p-2 hover:bg-blue-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('bumdes/produk/delete/'.$row['id_produk']) ?>" 
                               title="Hapus"
                               onclick="return confirm('Hapus produk ini?')" 
                               class="text-red-500 hover:text-red-700 transition p-2 hover:bg-red-50 rounded-lg">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
