<div class="col-md-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <form action="<?= base_url('admin/bumdes/layanan/update/' . $layanan['id_layanan']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label>BUMDes</label>
                    <select name="id_bumdes" class="form-control" required>
                        <option value="">-- Pilih BUMDes --</option>
                        <?php foreach ($bumdes_list as $b) : ?>
                            <option value="<?= $b['id_bumdes'] ?>" <?= ($layanan['id_bumdes'] == $b['id_bumdes']) ? 'selected' : '' ?>><?= $b['nama_bumdes'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control" value="<?= $layanan['nama_layanan'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $layanan['harga'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="<?= $layanan['satuan'] ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"><?= $layanan['deskripsi'] ?></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/bumdes/layanan/' . $layanan['id_bumdes']) ?>" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
