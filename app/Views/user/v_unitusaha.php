<div class="page-header flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('bumdes/unitusaha/create') ?>" 
       class="bg-biru-utama text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center justify-center gap-2 shadow-lg text-sm sm:text-base">
        <i class="fas fa-plus"></i> Tambah Unit Usaha
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
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">No</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Nama Unit</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Penanggung Jawab</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Kontak</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm text-center whitespace-nowrap">Status</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm text-center whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $no=1; foreach($unit as $row): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= $no++ ?></td>
                    <td class="p-3 sm:p-4 font-medium text-gray-900 whitespace-nowrap"><?= esc($row['nama_unit']) ?></td>
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= esc($row['penanggung_jawab']) ?></td>
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= esc($row['kontak']) ?></td>
                    <td class="p-3 sm:p-4 text-center whitespace-nowrap">
                        <span class="px-2 py-1 rounded text-xs font-semibold text-white <?= ($row['status'] ?? 'aktif') == 'aktif' ? 'bg-green-500' : 'bg-red-500' ?>">
                            <?= ucfirst(esc($row['status'] ?? 'aktif')) ?>
                        </span>
                    </td>
                    <td class="p-3 sm:p-4 text-center whitespace-nowrap">
                        <div class="flex justify-center gap-1 sm:gap-2">
                            <a href="<?= base_url('bumdes/unitusaha/detail/'.$row['id_unit']) ?>" 
                               title="Detail"
                               class="text-green-500 hover:text-green-700 transition p-2 hover:bg-green-50 rounded-lg">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('bumdes/unitusaha/edit/'.$row['id_unit']) ?>" 
                               title="Edit"
                               class="text-blue-500 hover:text-biru-tua transition p-2 hover:bg-blue-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('bumdes/unitusaha/delete/'.$row['id_unit']) ?>" 
                               title="Hapus"
                               onclick="return confirm('Hapus unit usaha ini?')" 
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
