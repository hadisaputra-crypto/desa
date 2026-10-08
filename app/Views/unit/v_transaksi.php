<div class="page-header flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('unit/transaksi/create') ?>" class="bg-biru-utama text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center justify-center gap-2 shadow-lg text-sm sm:text-base">
        <i class="fas fa-plus"></i> Tambah Transaksi
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
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Tanggal</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm text-center whitespace-nowrap">Tipe</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm text-right whitespace-nowrap">Nominal</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm whitespace-nowrap">Keterangan</th>
                    <th class="p-3 sm:p-4 font-semibold text-sm text-center whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php
                $total_pemasukan = 0;
                $total_pengeluaran = 0;
                $no=1; foreach ($transaksi as $row):
                    if ($row['tipe'] == 'pemasukan') $total_pemasukan += $row['nominal'];
                    else $total_pengeluaran += $row['nominal'];
                ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= $no++ ?></td>
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= $row['tanggal'] ?></td>
                    <td class="p-3 sm:p-4 text-center whitespace-nowrap">
                        <span class="px-2 py-1 rounded text-xs font-bold uppercase <?= $row['tipe'] == 'pemasukan' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' ?>">
                            <?= $row['tipe'] ?>
                        </span>
                    </td>
                    <td class="p-3 sm:p-4 text-sm text-gray-600 text-right whitespace-nowrap"><?= number_format($row['nominal'] ?? 0, 0, ',', '.') ?></td>
                    <td class="p-3 sm:p-4 text-sm text-gray-600 whitespace-nowrap"><?= $row['keterangan'] ?? '-' ?></td>
                    <td class="p-3 sm:p-4 text-center whitespace-nowrap">
                        <div class="flex justify-center gap-3">
                            <a href="<?= base_url('unit/transaksi/detail/'.$row['id_transaksi']) ?>" class="text-green-500 hover:text-green-700 transition p-2 hover:bg-green-50 rounded-lg">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('unit/transaksi/edit/'.$row['id_transaksi']) ?>" class="text-blue-500 hover:text-biru-tua transition p-2 hover:bg-blue-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('unit/transaksi/delete/'.$row['id_transaksi']) ?>" onclick="return confirm('Hapus transaksi ini?')" class="text-red-500 hover:text-red-700 transition p-2 hover:bg-red-50 rounded-lg">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php if (empty($transaksi)): ?>
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">Belum ada data transaksi</td>
                </tr>
                <?php endif; ?>
            </tbody>
            <tfoot class="bg-gray-50">
                <tr>
                    <td colspan="3" class="p-3 font-semibold text-gray-700">Total Pemasukan</td>
                    <td class="p-3 font-semibold text-green-600 text-right"><?= number_format($total_pemasukan, 0, ',', '.') ?></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3" class="p-3 font-semibold text-gray-700">Total Pengeluaran</td>
                    <td class="p-3 font-semibold text-red-600 text-right"><?= number_format($total_pengeluaran, 0, ',', '.') ?></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="3" class="p-3 font-semibold text-gray-700">Saldo</td>
                    <td class="p-3 font-semibold text-biru-utama text-right"><?= number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.') ?></td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
