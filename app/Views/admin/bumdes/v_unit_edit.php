<div class="col-md-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <form action="<?= base_url('admin/bumdes/unitusaha/update/' . $unit['id_unit']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label>BUMDes</label>
                    <select name="id_bumdes" class="form-control" required>
                        <option value="">-- Pilih BUMDes --</option>
                        <?php foreach ($bumdes_list as $b) : ?>
                            <option value="<?= $b['id_bumdes'] ?>" <?= ($unit['id_bumdes'] == $b['id_bumdes']) ? 'selected' : '' ?>><?= $b['nama_bumdes'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Unit Usaha</label>
                    <input type="text" name="nama_unit" class="form-control" value="<?= $unit['nama_unit'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Penanggung Jawab</label>
                    <input type="text" name="penanggung_jawab" class="form-control" value="<?= $unit['penanggung_jawab'] ?>">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" <?= ($unit['status'] == 1) ? 'selected' : '' ?>>Aktif</option>
                        <option value="0" <?= ($unit['status'] == 0) ? 'selected' : '' ?>>Non-Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"><?= $unit['keterangan'] ?></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/bumdes/unitusaha/' . $unit['id_bumdes']) ?>" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
