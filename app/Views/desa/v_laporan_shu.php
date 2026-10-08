<?php $base = session()->get('level') == 4 ? 'desa' : 'dinas'; ?>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-percentage mr-2"></i>Laporan SHU - <?= $bumdes['nama_bumdes'] ?></h3>
      <div class="card-tools">
        <a href="<?= base_url($base) ?>/bumdes/detail/<?= $bumdes['id_bumdes'] ?>" class="btn btn-default btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
        <button onclick="window.print()" class="btn btn-default btn-sm btn-flat"><i class="fas fa-print"></i> Cetak</button>
      </div>
    </div>
    <div class="card-body">
      <form method="GET" class="form-inline mb-3">
        <label class="mr-2">Periode:</label>
        <input type="date" name="tgl_awal" value="<?= $tgl_awal ?>" class="form-control form-control-sm mr-2">
        <input type="date" name="tgl_akhir" value="<?= $tgl_akhir ?>" class="form-control form-control-sm mr-2">
        <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-filter"></i> Filter</button>
      </form>

      <div class="card card-outline card-info">
        <div class="card-header"><h5 class="card-title">SHU Per Unit Usaha</h5></div>
        <div class="card-body p-0">
          <table class="table table-sm table-striped table-bordered mb-0">
            <thead>
              <tr>
                <th>Unit Usaha</th>
                <th class="text-right">Pemasukan</th>
                <th class="text-right">Pengeluaran</th>
                <th class="text-right">SHU</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($per_unit as $pu): ?>
              <tr>
                <td><?= $pu['nama_unit'] ?></td>
                <td class="text-right text-success">Rp <?= number_format($pu['pemasukan'],0,',','.') ?></td>
                <td class="text-right text-danger">Rp <?= number_format($pu['pengeluaran'],0,',','.') ?></td>
                <td class="text-right font-weight-bold <?= $pu['shu'] >= 0 ? 'text-success' : 'text-danger' ?>">Rp <?= number_format($pu['shu'],0,',','.') ?></td>
              </tr>
              <?php endforeach; ?>
              <?php if (empty($per_unit)): ?>
              <tr><td colspan="4" class="text-center text-muted">Tidak ada transaksi pada periode ini.</td></tr>
              <?php endif; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Total BUMDes</th>
                <th class="text-right">Rp <?= number_format($total_pemasukan,0,',','.') ?></th>
                <th class="text-right">Rp <?= number_format($total_pengeluaran,0,',','.') ?></th>
                <th class="text-right <?= $total_shu >= 0 ? 'text-success' : 'text-danger' ?>">Rp <?= number_format($total_shu,0,',','.') ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

      <div class="card card-outline card-purple" style="border-color:#6f42c1">
        <div class="card-header" style="background:#6f42c1;color:#fff"><h5 class="card-title">Alokasi SHU</h5></div>
        <div class="card-body">
          <div class="text-center mb-3 p-3 bg-light rounded">
            <div class="display-4 font-weight-bold text-primary">Rp <?= number_format($total_shu,0,',','.') ?></div>
            <small>Total SHU dialokasikan (<?= date('d/m/Y', strtotime($tgl_awal)) ?> - <?= date('d/m/Y', strtotime($tgl_akhir)) ?>)</small>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>Peruntukan</th>
                <th class="text-right">Persentase</th>
                <th class="text-right">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alokasi as $a): ?>
              <tr>
                <td><?= $a['nama_alokasi'] ?></td>
                <td class="text-right"><?= number_format($a['persentase'],2,',','.') ?>%</td>
                <td class="text-right font-weight-bold">Rp <?= number_format($a['nilai'],0,',','.') ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Total</th>
                <th class="text-right"><?= number_format(array_sum(array_column($alokasi, 'persentase')),2,',','.') ?>%</th>
                <th class="text-right">Rp <?= number_format(array_sum(array_column($alokasi, 'nilai')),0,',','.') ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
