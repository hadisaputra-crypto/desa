<div class="col-md-6">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <form action="<?= base_url('admin/bumdes/user/update/' . $user['id_user']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label>BUMDes</label>
                    <select name="id_bumdes" class="form-control" required>
                        <option value="">-- Pilih BUMDes --</option>
                        <?php foreach ($bumdes_list as $b) : ?>
                            <option value="<?= $b['id_bumdes'] ?>" <?= ($user['id_bumdes'] == $b['id_bumdes']) ? 'selected' : '' ?>><?= $b['nama_bumdes'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Pengguna (Full Name)</label>
                    <input type="text" name="nama_user" class="form-control" value="<?= $user['nama_user'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Password (Kosongkan jika tidak diganti)</label>
                    <input type="password" name="password" class="form-control" placeholder="Password baru">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Akun</button>
                <a href="<?= base_url('admin/bumdes/user/' . $user['id_bumdes']) ?>" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
