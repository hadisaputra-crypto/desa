<div class="col-md-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <form action="<?= base_url('admin/bumdes/insertData') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama BUMDes</label>
                    <input type="text" name="nama_bumdes" class="form-control" placeholder="Nama BUMDes" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="No HP">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Desa</label>
                            <input type="text" name="desa" class="form-control" placeholder="Desa">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kabupaten</label>
                            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('admin/bumdes') ?>" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
