<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Laba / Rugi</h3>
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
      <div class="row">
        <div class="col-md-6">
          <div class="card card-success card-outline">
            <div class="card-header"><h5 class="card-title">Pendapatan</h5></div>
            <div class="card-body p-0">
              <table class="table table-sm">
                <?php foreach ($pendapatan as $p): ?>
                <tr><td><?= $p['kategori'] ?></td><td class="text-right">Rp <?= number_format($p['total'],0,',','.') ?></td></tr>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="card-footer"><strong>Total: Rp <?= number_format($total_pendapatan,0,',','.') ?></strong></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-danger card-outline">
            <div class="card-header"><h5 class="card-title">Beban</h5></div>
            <div class="card-body p-0">
              <table class="table table-sm">
                <?php foreach ($beban as $b): ?>
                <tr><td><?= $b['kategori'] ?></td><td class="text-right">Rp <?= number_format($b['total'],0,',','.') ?></td></tr>
                <?php endforeach; ?>
              </table>
            </div>
            <div class="card-footer"><strong>Total: Rp <?= number_format($total_beban,0,',','.') ?></strong></div>
          </div>
        </div>
      </div>
      <div class="alert <?= $laba_bersih >= 0 ? 'alert-success' : 'alert-danger' ?> text-center">
        <strong><?= $laba_bersih >= 0 ? 'LABA BERSIH' : 'RUGI BERSIH' ?>: Rp <?= number_format(abs($laba_bersih),0,',','.') ?></strong>
      </div>
    </div>
  </div>
</div>
