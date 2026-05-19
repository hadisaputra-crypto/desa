<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('bumdes/kategori/create') ?>" 
       class="bg-biru-utama text-white px-6 py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center gap-2 shadow-lg">
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
                    <th class="p-4 font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $no=1; foreach ($kategori as $row): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-sm text-gray-600"><?= $no++ ?></td>
                    <td class="p-4">
                        <div class="font-medium text-gray-900"><?= $row['nama_kategori'] ?></div>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="<?= base_url('bumdes/kategori/edit/'.$row['id_kategori']) ?>" 
                               title="Edit"
                               class="text-blue-500 hover:text-biru-tua transition p-2 hover:bg-blue-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('bumdes/kategori/delete/'.$row['id_kategori']) ?>" 
                               title="Hapus"
                               onclick="return confirm('Hapus kategori ini?')" 
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
