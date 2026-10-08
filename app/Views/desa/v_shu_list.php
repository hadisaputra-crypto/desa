<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-percentage mr-2"></i>Pengaturan Alokasi SHU BUMDes</h3>
      <div class="card-tools">
        <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/beranda" class="btn btn-default btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <?php if (session()->getFlashdata('pesan')): ?>
      <div class="alert alert-success"><i class="fas fa-check-circle mr-2"></i><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><i class="fas fa-exclamation-circle mr-2"></i><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <p class="text-muted">Pilih BUMDes untuk mengatur persentase alokasi Sisa Hasil Usaha (SHU) miliknya. Persentase total harus 100%.</p>

      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama BUMDes</th>
            <th>Desa</th>
            <th class="text-center">Status Alokasi</th>
            <th class="text-center">Total Persen</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($bumdes as $b): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td class="font-weight-bold"><?= $b['nama_bumdes'] ?></td>
            <td><?= $b['desa'] ?></td>
            <td class="text-center">
              <?php if ($b['is_custom']): ?>
                <span class="badge badge-info">Dikustomisasi</span>
              <?php else: ?>
                <span class="badge badge-secondary">Mengikuti Default</span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <span class="badge <?= abs($b['total_persen'] - 100) < 0.01 ? 'badge-success' : 'badge-danger' ?>"><?= number_format($b['total_persen'], 2, ',', '.') ?>%</span>
            </td>
            <td class="text-center">
              <?php if (!empty($readonly)): ?>
              <a href="<?= base_url('dinas') ?>/shu/edit/<?= $b['id_bumdes'] ?>" class="btn btn-info btn-sm btn-flat"><i class="fas fa-eye mr-1"></i> Lihat</a>
              <?php else: ?>
              <a href="<?= base_url('desa') ?>/shu/edit/<?= $b['id_bumdes'] ?>" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-edit mr-1"></i> Atur Alokasi</a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php if (empty($bumdes)): ?>
          <tr><td colspan="6" class="text-center text-muted">Belum ada BUMDes di desa ini.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
