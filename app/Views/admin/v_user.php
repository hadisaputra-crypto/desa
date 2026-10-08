<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul ?>
                <?php if ($level_filter): ?>
                    <small class="text-muted">(Filter: <?= $level_names[$level_filter] ?? 'Level ' . $level_filter ?>)</small>
                <?php endif; ?>
            </h3>

            <div class="card-tools">
                <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('insert')) : ?>
                <div class="alert alert-success alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    <?= session()->getFlashdata('insert') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('update')) : ?>
                <div class="alert alert-primary alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> Update!</h5>
                    <?= session()->getFlashdata('update') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('delete')) : ?>
                <div class="alert alert-danger alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Deleted!</h5>
                    <?= session()->getFlashdata('delete') ?>
                </div>
            <?php endif; ?>

            <table class="table table-bordered table-sm" id="example1">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">NO</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>BUMDes</th>
                        <th width="250px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['nama_user'] ?></td>
                            <td><?= $d['username'] ?></td>
                            <td><?= $d['email'] ?: '-' ?></td>
                            <td class="text-center">
                                <?php if ($d['level'] == 1): ?><span class="badge badge-danger">Super Admin</span>
                                <?php elseif ($d['level'] == 2): ?><span class="badge badge-info">Admin BUMDes</span>
                                <?php elseif ($d['level'] == 3): ?><span class="badge badge-secondary">Unit Usaha</span>
                                <?php elseif ($d['level'] == 4): ?><span class="badge badge-success">Admin Desa</span>
                                <?php elseif ($d['level'] == 5): ?><span class="badge badge-warning">Admin Dinas</span>
                                <?php else: ?><span class="badge badge-dark">Tidak Diketahui</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $d['bumdes_nama'] ?: '-' ?></td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#ganti<?= $d['id_user'] ?>" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-lock"></i> Ganti Password</button>
                                <div class="btn-group">
                                    <button data-toggle="modal" data-target="#edit<?= $d['id_user'] ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></button>
                                    <a href="<?= base_url('Admin/User/deleteData/' . $d['id_user']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Admin/User/insertData') ?>
            <?= csrf_field() ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama User</label>
                    <input name="nama_user" class="form-control" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" placeholder="Username" required>
                    <p class="text-danger mb-0"><small>(Terdiri dari huruf kecil dan tidak boleh ada spasi)</small></p>
                </div>
                <div class="form-group">
                    <label>Email (Opsional)</label>
                    <input type="email" name="email" class="form-control" placeholder="contoh@email.com">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <input name="password" id="pass_tambah" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="var i=document.getElementById('pass_tambah');i.type=i.type==='password'?'text':'password';this.classList.toggle('fa-eye-slash')" style="cursor:pointer">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control" id="level_tambah">
                        <option value="2">Admin BUMDes</option>
                        <option value="3">Unit Usaha</option>
                        <option value="4">Admin Desa</option>
                        <option value="5">Admin Dinas</option>
                        <option value="1">Super Admin</option>
                    </select>
                </div>
                <div class="form-group" id="bumdes_group_tambah">
                    <label>BUMDes</label>
                    <select name="id_bumdes" class="form-control">
                        <option value="">-- Pilih BUMDes --</option>
                        <?php
                        $db = \Config\Database::connect();
                        $all_bumdes = $db->table('tbl_bumdes')->get()->getResultArray();
                        foreach ($all_bumdes as $b) {
                            echo '<option value="' . $b['id_bumdes'] . '">' . $b['nama_bumdes'] . ' - ' . $b['desa'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="kirim_email_tambah" name="kirim_email" value="1" checked>
                        <label for="kirim_email_tambah" class="custom-control-label">Kirim Notifikasi Email</label>
                        <p class="text-muted mb-0"><small>Kirim email berisi username & password ke pengguna (Email harus diisi).</small></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<?php foreach ($user as $d) { ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit<?= $d['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Admin/User/updateData/' . $d['id_user']) ?>
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input name="nama_user" value="<?= $d['nama_user'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $d['username'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email (Opsional)</label>
                        <input type="email" name="email" value="<?= $d['email'] ?>" class="form-control" placeholder="contoh@email.com">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control level_edit" data-id="<?= $d['id_user'] ?>">
                            <option value="2" <?= $d['level'] == 2 ? 'selected' : '' ?>>Admin BUMDes</option>
                            <option value="3" <?= $d['level'] == 3 ? 'selected' : '' ?>>Unit Usaha</option>
                            <option value="4" <?= $d['level'] == 4 ? 'selected' : '' ?>>Admin Desa</option>
                            <option value="5" <?= $d['level'] == 5 ? 'selected' : '' ?>>Admin Dinas</option>
                            <option value="1" <?= $d['level'] == 1 ? 'selected' : '' ?>>Super Admin</option>
                        </select>
                    </div>
                    <div class="form-group bumdes_edit" id="bumdes_edit_<?= $d['id_user'] ?>">
                        <label>BUMDes</label>
                        <select name="id_bumdes" class="form-control">
                            <option value="">-- Pilih BUMDes --</option>
                            <?php foreach ($all_bumdes as $b) {
                                $sel = ($b['id_bumdes'] == $d['id_bumdes']) ? 'selected' : '';
                                echo '<option value="' . $b['id_bumdes'] . '" ' . $sel . '>' . $b['nama_bumdes'] . ' - ' . $b['desa'] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="kirim_email_edit_<?= $d['id_user'] ?>" name="kirim_email" value="1">
                            <label for="kirim_email_edit_<?= $d['id_user'] ?>" class="custom-control-label">Kirim Notifikasi Email</label>
                            <p class="text-muted mb-0"><small>Kirim email pemberitahuan perubahan akun ke pengguna (Email harus diisi).</small></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <!-- Modal Ganti Password -->
    <div class="modal fade" id="ganti<?= $d['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ganti Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Admin/User/updatePassword/' . $d['id_user']) ?>
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input value="<?= $d['nama_user'] ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <div class="input-group">
                            <input name="password" id="pass_ganti_<?= $d['id_user'] ?>" class="form-control" placeholder="Password Baru" required>
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="var i=document.getElementById('pass_ganti_<?= $d['id_user'] ?>');i.type=i.type==='password'?'text':'password';this.classList.toggle('fa-eye-slash')" style="cursor:pointer">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="kirim_email_pass_<?= $d['id_user'] ?>" name="kirim_email" value="1">
                            <label for="kirim_email_pass_<?= $d['id_user'] ?>" class="custom-control-label">Kirim Notifikasi Email</label>
                            <p class="text-muted mb-0"><small>Kirim email pemberitahuan password baru ke pengguna (User harus memiliki email).</small></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<script>
$(function() {
    function toggleBumdes(level, prefix) {
        var show = (level == '2' || level == '3' || level == '4');
        $('#' + prefix + '_group_tambah, .' + prefix + '_edit').toggle(show);
    }

    $('#level_tambah').on('change', function() {
        toggleBumdes(this.value, 'bumdes');
    });
    toggleBumdes($('#level_tambah').val(), 'bumdes');

    $('.level_edit').on('change', function() {
        var id = $(this).data('id');
        var show = ($(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4');
        $('#bumdes_edit_' + id).toggle(show);
    });
    $('.level_edit').each(function() {
        var id = $(this).data('id');
        var show = ($(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4');
        $('#bumdes_edit_' + id).toggle(show);
    });
});
</script>
