<?php $is_readonly = !empty($readonly); $base = $is_readonly ? 'dinas' : 'desa'; ?>
<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-percentage mr-2"></i><?= $is_readonly ? 'Detail' : 'Edit' ?> Alokasi SHU - <?= $bumdes['nama_bumdes'] ?></h3>
      <div class="card-tools">
        <a href="<?= base_url($base) ?>/shu" class="btn btn-default btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <?php if (session()->getFlashdata('pesan')): ?>
      <div class="alert alert-success"><i class="fas fa-check-circle mr-2"></i><?= session()->getFlashdata('pesan') ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><i class="fas fa-exclamation-circle mr-2"></i><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= base_url($base) ?>/shu/update/<?= $id_bumdes ?>" method="POST">
        <?= csrf_field() ?>

        <div class="row mb-4">
          <div class="col-md-6">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-percent"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Persentase (item aktif)</span>
                <span class="info-box-number" id="total-persen"><?= number_format($total_persen, 2, ',', '.') ?>%</span>
                <div class="progress mt-2" style="height:8px">
                  <div id="total-bar" class="progress-bar bg-success" style="width: <?= min($total_persen, 100) ?>%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="4%" class="text-center">Aktif</th>
              <th width="33%">Peruntukan Alokasi</th>
              <th width="18%" class="text-center">Persentase (%)</th>
              <th>Keterangan</th>
              <th width="8%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; foreach ($settings as $s): ?>
            <tr class="<?= $s['aktif'] ? '' : 'table-danger' ?>">
              <input type="hidden" name="id_shu[]" value="<?= $s['id_shu'] ?>">
              <td class="text-center align-middle">
                <input type="checkbox" name="aktif[]" value="<?= $s['id_shu'] ?>" <?= $s['aktif'] ? 'checked' : '' ?> class="aktif-check" <?= $is_readonly ? 'disabled' : '' ?>>
              </td>
              <td class="align-middle">
                <strong><?= $s['nama_alokasi'] ?></strong>
                <?php if ($s['is_custom']): ?>
                  <span class="badge badge-info ml-1">Custom</span>
                <?php elseif (!$s['aktif']): ?>
                  <span class="badge badge-secondary ml-1">Nonaktif</span>
                <?php endif; ?>
              </td>
              <td>
                <div class="input-group">
                  <input type="number" name="persentase[]" step="0.01" min="0" max="100" data-idx="<?= $i ?>"
                         class="form-control text-right persen-input" <?= $is_readonly ? 'readonly' : '' ?>
                         value="<?= old("persentase.$i", $s['persentase']) ?>">
                  <div class="input-group-append"><span class="input-group-text">%</span></div>
                </div>
              </td>
              <td>
                <input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan (opsional)" <?= $is_readonly ? 'readonly' : '' ?>
                       value="<?= old("keterangan.$i", $s['keterangan']) ?>">
              </td>
              <td class="text-center align-middle">
                <?php if (!$is_readonly): ?>
                  <?php if ($s['aktif']): ?>
                  <a href="<?= base_url($base) ?>/shu/delete/<?= $id_bumdes ?>/<?= $s['id_shu'] ?>" class="text-danger" title="Nonaktifkan / Hapus" onclick="return confirm('Nonaktifkan atau hapus item alokasi ini?')"><i class="fas fa-trash"></i></a>
                  <?php else: ?>
                  <a href="<?= base_url($base) ?>/shu/reactivate/<?= $id_bumdes ?>/<?= $s['id_shu'] ?>" class="text-success" title="Aktifkan kembali"><i class="fas fa-undo"></i></a>
                  <?php endif; ?>
                <?php else: ?>
                  <span class="text-muted">-</span>
                <?php endif; ?>
              </td>
            </tr>
            <?php $i++; endforeach; ?>
          </tbody>
        </table>

        <div class="row mt-3">
          <div class="col-md-12">
            <?php if ($is_readonly): ?>
            <a href="<?= base_url($base) ?>/shu" class="btn btn-default btn-flat"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
            <?php else: ?>
            <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save mr-1"></i> Simpan Alokasi</button>
            <a href="<?= base_url($base) ?>/shu" class="btn btn-default btn-flat">Batal</a>
            <?php endif; ?>
          </div>
        </div>
      </form>

      <?php if (!$is_readonly): ?>
      <hr>
      <h5><i class="fas fa-plus-circle text-success mr-1"></i>Tambah Alokasi Baru</h5>
      <form action="<?= base_url($base) ?>/shu/add/<?= $id_bumdes ?>" method="POST" class="form-inline">
        <?= csrf_field() ?>
        <input type="text" name="nama_alokasi" required class="form-control mr-2 mb-1" placeholder="Nama alokasi" style="min-width:220px">
        <input type="text" name="keterangan" class="form-control mr-2 mb-1" placeholder="Keterangan (opsional)">
        <button type="submit" class="btn btn-success btn-flat mb-1"><i class="fas fa-plus mr-1"></i> Tambah</button>
      </form>
      <small class="text-muted">Setelah ditambahkan, atur persentasenya agar total item aktif 100%.</small>
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var totalEl = document.getElementById('total-persen');
    var barEl = document.getElementById('total-bar');

    function recalc() {
        var total = 0;
        document.querySelectorAll('tr').forEach(function(row) {
            var box = row.querySelector('.aktif-check');
            var num = row.querySelector('.persen-input');
            if (box && num && box.checked) total += parseFloat(num.value) || 0;
        });
        totalEl.textContent = total.toFixed(2).replace('.', ',') + '%';
        barEl.style.width = Math.min(total, 100) + '%';
        if (Math.abs(total - 100) < 0.01) {
            totalEl.className = 'info-box-number text-success';
            barEl.className = 'progress-bar bg-success';
        } else {
            totalEl.className = 'info-box-number text-danger';
            barEl.className = 'progress-bar bg-danger';
        }
    }
    document.querySelectorAll('.persen-input').forEach(function(inp) { inp.addEventListener('input', recalc); });
    document.querySelectorAll('.aktif-check').forEach(function(c) { c.addEventListener('change', recalc); });
    recalc();
});
</script>
