<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Neraca Keuangan</h3>
      <div class="card-tools">
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/beranda" class="btn btn-default btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
        <button onclick="window.print()" class="btn btn-default btn-sm btn-flat"><i class="fas fa-print"></i> Cetak</button>
      </div>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-12">
          <form method="GET" class="form-inline">
            <label class="mr-2">Per Tanggal:</label>
            <input type="date" name="tgl_sampai" value="<?= $tgl_sampai ?>" class="form-control form-control-sm mr-2">
            <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-filter"></i> Tampilkan</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-info card-outline">
            <div class="card-header"><h5 class="card-title">Aktiva</h5></div>
            <div class="card-body p-0">
              <table class="table table-sm">
                <tr><td>Kas</td><td class="text-right">Rp <?= number_format($kas,0,',','.') ?></td></tr>
                <tr><td>Persediaan Barang</td><td class="text-right">Rp <?= number_format($persediaan,0,',','.') ?></td></tr>
              </table>
            </div>
            <div class="card-footer"><strong>Total Aktiva: Rp <?= number_format($total_aktiva,0,',','.') ?></strong></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-purple card-outline">
            <div class="card-header"><h5 class="card-title">Pasiva</h5></div>
            <div class="card-body p-0">
              <table class="table table-sm">
                <tr><td>Modal</td><td class="text-right">Rp <?= number_format($total_modal,0,',','.') ?></td></tr>
                <tr><td>Laba Ditahan</td><td class="text-right <?= $laba >= 0 ? 'text-success' : 'text-danger' ?>">Rp <?= number_format($laba,0,',','.') ?></td></tr>
              </table>
            </div>
            <div class="card-footer"><strong>Total Pasiva: Rp <?= number_format($total_pasiva,0,',','.') ?></strong></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
