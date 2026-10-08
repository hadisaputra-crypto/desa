<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Laporan Data Transaksi BUMDes</h3>
            <div class="card-tools">
                <button onclick="window.print()" class="btn btn-success btn-flat btn-sm">
                    <i class="fas fa-print"></i> Cetak / PDF
                </button>
                <a href="<?= base_url('admin/bumdes/transaksi' . ($id_bumdes ? '/' . $id_bumdes : '')) ?>" class="btn btn-secondary btn-flat btn-sm">
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
                    $total_pemasukan = 0;
                    $total_pengeluaran = 0;
                    foreach ($transaksi as $row) : 
                        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $row['id_bumdes'])->get()->getRowArray();
                        if ($row['tipe'] == 'pemasukan') {
                            $total_pemasukan += $row['nominal'];
                        } else {
                            $total_pengeluaran += $row['nominal'];
                        }
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
                <tfoot>
                    <tr class="bg-gray">
                        <th colspan="4" class="text-center font-weight-bold">TOTAL PEMASUKAN</th>
                        <th class="text-right font-weight-bold text-success"><?= number_format($total_pemasukan, 0, ',', '.') ?></th>
                        <th></th>
                    </tr>
                    <tr class="bg-gray">
                        <th colspan="4" class="text-center font-weight-bold">TOTAL PENGELUARAN</th>
                        <th class="text-right font-weight-bold text-danger"><?= number_format($total_pengeluaran, 0, ',', '.') ?></th>
                        <th></th>
                    </tr>
                    <tr class="bg-gray">
                        <th colspan="4" class="text-center font-weight-bold">SALDO</th>
                        <th class="text-right font-weight-bold"><?= number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.') ?></th>
                        <th></th>
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

