<div class="col-md-12">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-shop mr-2"></i><?= $bumdes['nama_bumdes'] ?></h3>
          <div class="card-tools">
            <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/beranda" class="btn btn-default btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-sm table-borderless">
            <tr><td width="150"><strong>Alamat</strong></td><td>: <?= $bumdes['alamat'] ?: '-' ?></td></tr>
            <tr><td><strong>Desa</strong></td><td>: <?= $bumdes['desa'] ?></td></tr>
            <tr><td><strong>Kecamatan</strong></td><td>: <?= $bumdes['kecamatan'] ?></td></tr>
            <tr><td><strong>Kabupaten</strong></td><td>: <?= $bumdes['kabupaten'] ?></td></tr>
            <tr><td><strong>No. HP</strong></td><td>: <?= $bumdes['no_hp'] ?: '-' ?></td></tr>
            <tr><td><strong>Email</strong></td><td>: <?= $bumdes['email'] ?: '-' ?></td></tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box bg-info">
        <span class="info-box-icon"><i class="fas fa-exchange-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Transaksi Tahun Ini</span>
          <span class="info-box-number"><?= number_format($total_transaksi['total']) ?></span>
          <span class="info-box-text">Pemasukan: Rp <?= number_format($total_transaksi['pemasukan'],0,',','.') ?></span>
          <span class="info-box-text">Pengeluaran: Rp <?= number_format($total_transaksi['pengeluaran'],0,',','.') ?></span>
        </div>
      </div>
      <div class="btn-group-vertical w-100">
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/kas/<?= $bumdes['id_bumdes'] ?>" class="btn btn-info btn-flat"><i class="fas fa-book mr-2"></i> Buku Kas</a>
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/labarugi/<?= $bumdes['id_bumdes'] ?>" class="btn btn-success btn-flat"><i class="fas fa-chart-line mr-2"></i> Laba Rugi</a>
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/neraca/<?= $bumdes['id_bumdes'] ?>" class="btn btn-purple btn-flat" style="background:#6f42c1;color:#fff"><i class="fas fa-balance-scale mr-2"></i> Neraca</a>
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/shu/<?= $bumdes['id_bumdes'] ?>" class="btn btn-indigo btn-flat" style="background:#3949ab;color:#fff"><i class="fas fa-percentage mr-2"></i> Laporan SHU</a>
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/shu/edit/<?= $bumdes['id_bumdes'] ?>" class="btn btn-warning btn-flat"><i class="fas fa-cog mr-2"></i> <?= session()->get('level') == 4 ? 'Atur' : 'Lihat' ?> Alokasi SHU</a>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card card-outline card-success">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-store mr-2"></i>Unit Usaha</h3>
        </div>
        <div class="card-body">
          <?php if (empty($unit)): ?>
            <div class="alert alert-info">Belum ada unit usaha.</div>
          <?php else: ?>
            <div class="row">
              <?php foreach ($unit as $u): ?>
              <div class="col-md-4 col-sm-6 mb-3">
                <div class="card card-outline card-warning h-100">
                  <div class="card-header">
                    <h5 class="card-title font-weight-bold"><?= $u['nama_unit'] ?></h5>
                  </div>
                  <div class="card-body py-2">
                    <p class="mb-1"><i class="fas fa-user-tie"></i> <?= $u['penanggung_jawab'] ?: '-' ?></p>
                    <p class="mb-0"><i class="fas fa-phone"></i> <?= $u['kontak'] ?: '-' ?></p>
                    <?php if ($u['deskripsi']): ?>
                    <p class="mb-0 text-muted small mt-2"><em><?= $u['deskripsi'] ?></em></p>
                    <?php endif; ?>
                  </div>
                  <div class="card-footer text-center p-2">
                    <span class="badge <?= $u['status'] == 'aktif' ? 'badge-success' : 'badge-danger' ?>"><?= strtoupper($u['status']) ?></span>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-box mr-2"></i>Produk per Unit Usaha</h3>
        </div>
        <div class="card-body">
          <?php if (empty($produk)): ?>
            <div class="alert alert-info">Belum ada produk.</div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Unit Usaha</th>
                    <th>Nama Produk</th>
                    <th class="text-right">Harga</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($produk as $p): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td class="font-weight-bold"><?= $p['nama_unit'] ?: 'Tanpa Unit' ?></td>
                    <td><?= $p['nama_produk'] ?></td>
                    <td class="text-right">Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                    <td class="text-center"><?= $p['stok'] ?> <?= $p['satuan'] ?></td>
                    <td class="text-center">
                      <span class="badge <?= $p['status'] == 1 ? 'badge-success' : 'badge-secondary' ?>"><?= $p['status'] == 1 ? 'Aktif' : 'Non-Aktif' ?></span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
