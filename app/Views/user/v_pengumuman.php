<div class="page-header flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-biru-tua"><?= $judul ?></h2>
    <a href="<?= base_url('bumdes/pengumuman/create') ?>" 
       class="bg-biru-utama text-white px-6 py-3 rounded-lg font-semibold hover:bg-biru-tua transition flex items-center gap-2 shadow-lg">
        <i class="fas fa-plus"></i> Tambah Pengumuman
    </a>
</div>

<?php if (session()->getFlashdata('pesan')): ?>
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6 shadow-sm rounded-r-lg">
        <p><?= session()->getFlashdata('pesan') ?></p>
    </div>
<?php endif; ?>

<div class="space-y-4">
    <?php if (!empty($pengumuman)): ?>
        <?php foreach ($pengumuman as $item): ?>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 transition-all hover:shadow-md">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold text-biru-utama bg-blue-50 px-2 py-1 rounded">PENGUMUMAN</span>
                            <span class="text-xs text-gray-400">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                <?= date('d M Y', strtotime($item['tgl_pengumuman'])) ?>
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2"><?= $item['judul_pengumuman'] ?></h3>
                        <div class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                            <?= strip_tags($item['isi_pengumuman']) ?>
                        </div>
                    </div>
                    
                    <div class="flex gap-2 shrink-0">
                        <a href="<?= base_url('bumdes/pengumuman/detail/'.$item['id_pengumuman']) ?>" 
                           title="Detail"
                           class="p-2 text-green-500 hover:bg-green-50 rounded-lg transition">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= base_url('bumdes/pengumuman/edit/'.$item['id_pengumuman']) ?>" 
                           title="Edit"
                           class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('bumdes/pengumuman/delete/'.$item['id_pengumuman']) ?>" 
                           title="Hapus"
                           onclick="return confirm('Hapus pengumuman ini?')" 
                           class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="text-center py-20 bg-white rounded-xl border border-dashed border-gray-300">
            <i class="fas fa-bullhorn text-5xl text-gray-200 mb-4"></i>
            <p class="text-gray-400">Belum ada pengumuman.</p>
        </div>
    <?php endif; ?>
</div>