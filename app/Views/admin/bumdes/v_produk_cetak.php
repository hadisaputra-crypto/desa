<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Data Produk BUMDes</h3>
            <div class="card-tools">
                <button onclick="window.print()" class="btn btn-success btn-flat btn-sm">
                    <i class="fas fa-print"></i> Cetak / PDF
                </button>
                <a href="<?= base_url('admin/bumdes/produk' . ($id_bumdes ? '/' . $id_bumdes : '')) ?>" class="btn btn-secondary btn-flat btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
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
                    $total_harga = 0;
                    $total_stok = 0;
                    foreach ($produk as $row) : 
                        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $row['id_bumdes'])->get()->getRowArray();
                        $kategori = $db->table('tbl_kategori')->where('id_kategori', $row['id_kategori'])->get()->getRowArray();
                        $total_harga += $row['harga'] ?? 0;
                        $total_stok += $row['stok'] ?? 0;
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
                <tfoot>
                    <tr class="bg-gray">
                        <th colspan="4" class="text-center font-weight-bold">TOTAL</th>
                        <th class="text-right font-weight-bold"><?= number_format($total_harga, 0, ',', '.') ?></th>
                        <th class="text-center font-weight-bold"><?= $total_stok ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<style media="print">
    .main-header, .main-sidebar, .card-tools, .btn { display: none !important; }
    .content-wrapper { margin-left: 0 !important; }
    .card { border: none !important; }
    .card-header { background: #1565c0 !important; color: #fff !important; }
</style>

