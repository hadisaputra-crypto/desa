<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?> <?= $id_bumdes ? '(BUMDes ID: '.$id_bumdes.')' : '(Semua BUMDes)' ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/bumdes/transaksi/cetak/' . $id_bumdes) ?>" class="btn btn-success btn-flat btn-sm">
                    <i class="fas fa-print"></i> Cetak Laporan
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm" id="example1">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">NO</th>
                        <th>BUMDes</th>
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $db = \Config\Database::connect();
                    $no = 1;
                    foreach ($transaksi as $row) : 
                        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $row['id_bumdes'])->get()->getRowArray();
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $bumdes['nama_bumdes'] ?? 'Unknown' ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td class="text-center">
                                <span class="badge badge-<?= ($row['tipe'] == 'pemasukan') ? 'success' : 'danger' ?>">
                                    <?= ucfirst($row['tipe']) ?>
                                </span>
                            </td>
                            <td class="text-right"><?= number_format($row['nominal'] ?? 0, 0, ',', '.') ?></td>
                            <td><?= $row['keterangan'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

