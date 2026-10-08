<div class="page-header flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('bumdes/user/create') ?>" 
       class="bg-biru-utama text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center justify-center gap-2 shadow-lg text-sm sm:text-base">
        <i class="fas fa-plus"></i> Tambah User
    </a>
</div>

<?php if (session()->getFlashdata('pesan')): ?>
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4 shadow-sm rounded-r-lg">
        <p><?= session()->getFlashdata('pesan') ?></p>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('email_error')): ?>
    <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 mb-6 shadow-sm rounded-r-lg flex items-start gap-2">
        <i class="fas fa-exclamation-triangle mt-0.5 flex-shrink-0"></i>
        <p>Data tersimpan, namun email gagal dikirim: <span class="font-medium"><?= session()->getFlashdata('email_error') ?></span></p>
    </div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-biru-pastel text-biru-tua">
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">No</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Nama User</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Username</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Email</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm text-center whitespace-nowrap">Level</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Unit</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm text-center whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php
                $db = \Config\Database::connect();
                $no=1; foreach ($users as $row):
                    $unit = $db->table('tbl_unit_usaha')->where('id_unit', ($row['id_unit'] ?? 0))->get()->getRowArray();
                ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= $no++ ?></td>
                    <td class="p-3 sm:p-4">
                        <div class="font-medium text-gray-900 whitespace-nowrap"><?= esc($row['nama_user']) ?></div>
                    </td>
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= esc($row['username']) ?></td>
                    <td class="p-3 sm:p-4 text-sm text-gray-500 whitespace-nowrap">
                        <?php if (!empty($row['email'])): ?>
                            <a href="mailto:<?= esc($row['email']) ?>" class="text-biru-utama hover:underline">
                                <?= esc($row['email']) ?>
                            </a>
                        <?php else: ?>
                            <span class="text-gray-300 text-xs italic">-</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-3 sm:p-4 text-center whitespace-nowrap">
                        <span class="px-2 py-1 rounded text-xs font-bold uppercase 
                            <?= $row['level'] == 1 ? 'bg-purple-50 text-purple-600' : ($row['level'] == 3 ? 'bg-green-50 text-green-600' : 'bg-blue-50 text-biru-utama') ?>">
                            <?= $row['level'] == 1 ? 'Admin' : ($row['level'] == 3 ? 'Unit' : 'Operator') ?>
                        </span>
                    </td>
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= esc($unit['nama_unit'] ?? '-') ?></td>
                    <td class="p-4 text-center">
                        <div class="flex justify-center gap-3">
                            <a href="<?= base_url('bumdes/user/edit/'.$row['id_user']) ?>" 
                               class="text-blue-500 hover:text-biru-tua transition p-2 hover:bg-blue-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('bumdes/user/delete/'.$row['id_user']) ?>" 
                               onclick="return confirm('Hapus user ini?')" 
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
