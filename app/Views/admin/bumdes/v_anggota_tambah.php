<div class="col-md-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <form action="<?= base_url('admin/bumdes/anggota/insert') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label>BUMDes</label>
                    <select name="id_bumdes" class="form-control" required>
                        <option value="">-- Pilih BUMDes --</option>
                        <?php foreach ($bumdes_list as $b) : ?>
                            <option value="<?= $b['id_bumdes'] ?>" <?= ($id_bumdes == $b['id_bumdes']) ? 'selected' : '' ?>><?= $b['nama_bumdes'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota" required>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" class="form-control" placeholder="NIK" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="No HP">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('admin/bumdes/anggota/' . $id_bumdes) ?>" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
