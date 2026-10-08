<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Atur Menu Admin Desa & Admin Dinas</h3>
    </div>
    <?php echo form_open('admin/setting/updatemenuroles') ?>
    <?= csrf_field() ?>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-sm">
          <thead class="bg-primary text-center">
            <tr>
              <th width="40">No</th>
              <th>Menu</th>
              <th width="200">Admin Desa</th>
              <th width="200">Admin Dinas</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($available_menus as $key => $m): ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><i class="<?= $m['icon'] ?> mr-2"></i><?= $m['label'] ?></td>
              <td class="text-center">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" name="level4[]" value="<?= $key ?>" id="l4_<?= $key ?>" <?= in_array($key, $menu_roles['4'] ?? []) ? 'checked' : '' ?>>
                  <label class="custom-control-label" for="l4_<?= $key ?>">Tampilkan</label>
                </div>
              </td>
              <td class="text-center">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" name="level5[]" value="<?= $key ?>" id="l5_<?= $key ?>" <?= in_array($key, $menu_roles['5'] ?? []) ? 'checked' : '' ?>>
                  <label class="custom-control-label" for="l5_<?= $key ?>">Tampilkan</label>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Simpan Pengaturan</button>
    </div>
    <?php echo form_close() ?>
  </div>
</div>
