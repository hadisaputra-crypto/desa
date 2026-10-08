<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?> <?= $id_bumdes ? '(BUMDes ID: '.$id_bumdes.')' : '(Semua BUMDes)' ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/bumdes/produk/cetak/' . $id_bumdes) ?>" class="btn btn-success btn-flat btn-sm">
                    <i class="fas fa-print"></i> Cetak Laporan
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Data produk bersifat <strong>read-only</strong>. Kelola produk melalui panel BUMDes masing-masing.
            </div>
            <table class="table table-bordered table-sm" id="example1">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">NO</th>
                        <th>BUMDes</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $db = \Config\Database::connect();
                    $no = 1;
                    foreach ($produk as $row) : 
                        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $row['id_bumdes'])->get()->getRowArray();
                        $kategori = $db->table('tbl_kategori')->where('id_kategori', $row['id_kategori'])->get()->getRowArray();
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $bumdes['nama_bumdes'] ?? 'Unknown' ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><?= $kategori['nama_kategori'] ?? '-' ?></td>
                            <td class="text-right"><?= number_format($row['harga'] ?? 0, 0, ',', '.') ?></td>
                            <td class="text-center"><?= $row['stok'] ?? 0 ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

