<div class="col-md-12">
  <div class="row">
    <div class="col-md-12 mb-4">
      <div class="card card-outline card-primary">
        <div class="card-header"><h3 class="card-title">Grafik Keuangan BUMDes Tahun <?= date('Y') ?></h3></div>
        <div class="card-body">
          <canvas id="chartDinas" height="100"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="card card-outline card-primary">
    <div class="card-header"><h3 class="card-title">Daftar BUMDes Seluruh Desa</h3></div>
    <div class="card-body">
      <?php if (empty($bumdes)): ?>
        <div class="alert alert-info">Belum ada data BUMDes.</div>
      <?php else: ?>
        <div class="row">
          <?php foreach ($bumdes as $b): ?>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="card card-primary card-outline h-100">
              <div class="card-header">
                <h5 class="card-title font-weight-bold"><?= $b['nama_bumdes'] ?></h5>
                <small class="float-right text-muted"><?= $b['desa'] ?></small>
              </div>
              <div class="card-body py-2">
                <p class="mb-1"><i class="fas fa-map-marker-alt"></i> <?= $b['alamat'] ?: '-' ?></p>
                <p class="mb-1"><i class="fas fa-phone"></i> <?= $b['no_hp'] ?: '-' ?></p>
                <p class="mb-0"><i class="fas fa-envelope"></i> <?= $b['email'] ?: '-' ?></p>
              </div>
              <div class="card-footer bg-transparent border-top-0 text-center">
                <a href="<?= base_url('dinas/bumdes/detail/'.$b['id_bumdes']) ?>" class="btn btn-sm btn-primary"><i class="fas fa-building"></i> Detail</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
var ctx = document.getElementById('chartDinas').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= $chart_labels ?>,
        datasets: [
            { label: 'Pemasukan', data: <?= $chart_pemasukan ?>, backgroundColor: '#28a745', borderRadius: 4 },
            { label: 'Pengeluaran', data: <?= $chart_pengeluaran ?>, backgroundColor: '#dc3545', borderRadius: 4 }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: { y: { beginAtZero: true, ticks: { callback: function(v) { return 'Rp ' + v.toLocaleString('id-ID'); } } } }
    }
});
</script>
