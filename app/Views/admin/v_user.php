<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->get('user') && isset(session()->get('user')['error'])) : ?>
                <div class="alert alert-danger alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    <?= session()->get('user')['error'] ?>
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
                        <th>Level</th>
                        <th width="250px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['nama_user'] ?></td>
                            <td><?= $d['username'] ?></td>
                            <td class="text-center"><?= $d['level'] == 1 ? 'Admin' : 'User' ?></td>
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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Aplikasi</h4>
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
                    <p class="text-danger">(Terdiri dari huruf kecil dan tidak boleh ada spasi)</p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2" selected>User</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($user as $key => $d) { ?>

    <div class="modal fade" id="edit<?= $d['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Aplikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Admin/User/updateData/' . $d['id_user']) ?>
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input name="nama_user" value="<?= $d['nama_user'] ?>" class="form-control" placeholder="Nama User" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $d['username'] ?>" class="form-control" placeholder="Username" required>
                        <p class="text-danger">(Terdiri dari huruf kecil dan tidak boleh ada spasi)</p>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="<?= $d['level'] ?>"><?= $d['level'] == '1' ? 'Admin' : 'User' ?></option>
                            <option value="1">Admin</option>
                            <option value="2" selected>User</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


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
                        <input name="nama_user" value="<?= $d['nama_user'] ?>" class="form-control" placeholder="Nama User" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input name="password" class="form-control" placeholder="Password Baru" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


<?php } ?>