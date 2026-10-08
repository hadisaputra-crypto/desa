<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Buku Kas</h3>
      <div class="card-tools">
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/beranda" class="btn btn-default btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
        <button onclick="window.print()" class="btn btn-default btn-sm btn-flat"><i class="fas fa-print"></i> Cetak</button>
      </div>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-12">
          <form method="GET" class="form-inline">
            <label class="mr-2">Periode:</label>
            <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>" class="form-control form-control-sm mr-2">
            <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>" class="form-control form-control-sm mr-2">
            <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-filter"></i> Filter</button>
          </form>
        </div>
      </div>
      <table class="table table-bordered table-sm">
        <thead class="bg-primary text-center">
          <tr><th>No</th><th>Tanggal</th><th>Uraian</th><th>Penerimaan</th><th>Pengeluaran</th><th>Saldo</th></tr>
        </thead>
        <tbody>
          <?php $saldo = 0; $no = 1; foreach ($transaksi as $row):
            if ($row['tipe'] == 'pemasukan' || $row['tipe'] == 'modal') {
              $saldo += $row['nominal']; $p = number_format($row['nominal'],0,',','.'); $q = '-';
            } else {
              $saldo -= $row['nominal']; $p = '-'; $q = number_format($row['nominal'],0,',','.');
            }
          ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
            <td><?= $row['kategori'] ?>: <?= $row['keterangan'] ?></td>
            <td class="text-right text-success"><?= $p ?></td>
            <td class="text-right text-danger"><?= $q ?></td>
            <td class="text-right font-weight-bold"><?= number_format($saldo,0,',','.') ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
