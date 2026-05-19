<div class="col-md-6">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Informasi Pribadi</h3>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('update')) : ?>
                <div class="alert alert-primary alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> Berhasil!</h5>
                    <?= session()->getFlashdata('update') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php echo form_open('Admin/Profile/updateProfile') ?>
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Nama User</label>
                <input name="nama_user" value="<?= $user['nama_user'] ?>" class="form-control" placeholder="Nama User" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input name="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <input class="form-control" value="<?= $user['level'] == 1 ? 'Admin' : 'User' ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary btn-flat">Simpan Perubahan</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Password</h3>
        </div>
        <div class="card-body">
            <?php echo form_open('Admin/Profile/changePassword') ?>
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control" placeholder="Password Baru" required>
            </div>
            <button type="submit" class="btn btn-warning btn-flat">Ubah Password</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
