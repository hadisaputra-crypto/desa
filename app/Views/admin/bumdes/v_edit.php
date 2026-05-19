<div class="col-md-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <form action="<?= base_url('admin/bumdes/updateData/' . $bumdes['id_bumdes']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama BUMDes</label>
                    <input type="text" name="nama_bumdes" class="form-control" value="<?= $bumdes['nama_bumdes'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $bumdes['email'] ?>">
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= $bumdes['no_hp'] ?>">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Desa</label>
                            <input type="text" name="desa" class="form-control" value="<?= $bumdes['desa'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" value="<?= $bumdes['kecamatan'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kabupaten</label>
                            <input type="text" name="kabupaten" class="form-control" value="<?= $bumdes['kabupaten'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" value="<?= $bumdes['provinsi'] ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" rows="3"><?= $bumdes['alamat'] ?></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/bumdes') ?>" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
