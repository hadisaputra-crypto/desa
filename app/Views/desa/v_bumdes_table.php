<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-shop mr-2"></i>Daftar BUMDes</h3>
    </div>
    <div class="card-body">
      <?php if (empty($bumdes)): ?>
        <div class="alert alert-info">Belum ada data BUMDes.</div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm" id="tableBumdes">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama BUMDes</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($bumdes as $b): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td class="font-weight-bold"><?= $b['nama_bumdes'] ?></td>
                <td><?= $b['desa'] ?></td>
                <td><?= $b['kecamatan'] ?></td>
                <td><?= $b['alamat'] ?: '-' ?></td>
                <td>
                  <?php if ($b['no_hp']): ?><i class="fas fa-phone mr-1"></i><?= $b['no_hp'] ?><br><?php endif; ?>
                  <?php if ($b['email']): ?><i class="fas fa-envelope mr-1"></i><?= $b['email'] ?><?php endif; ?>
                </td>
                <td class="text-nowrap whitespace-nowrap">
                  <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/bumdes/detail/<?= $b['id_bumdes'] ?>" class="btn btn-sm btn-primary" title="Detail"><i class="fas fa-building"></i></a>
                  <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/kas/<?= $b['id_bumdes'] ?>" class="btn btn-sm btn-info" title="Buku Kas"><i class="fas fa-book"></i></a>
                  <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/labarugi/<?= $b['id_bumdes'] ?>" class="btn btn-sm btn-success" title="Laba Rugi"><i class="fas fa-chart-line"></i></a>
                  <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/neraca/<?= $b['id_bumdes'] ?>" class="btn btn-sm btn-warning" title="Neraca"><i class="fas fa-balance-scale"></i></a>
                  <a href="<?= base_url(session()->get('level') == 4 ? 'desa' : 'dinas') ?>/laporan/shu/<?= $b['id_bumdes'] ?>" class="btn btn-sm btn-indigo" style="background:#3949ab;color:#fff" title="Laporan SHU"><i class="fas fa-percentage"></i></a>
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

<script>
$(document).ready(function() {
    $('#tableBumdes').DataTable({
        responsive: true,
        autoWidth: false,
        language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
        columnDefs: [
            { orderable: false, targets: -1 }
        ]
    });
});
</script>
