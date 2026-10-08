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
            <?php

            if (session()->get('insert')) {
                echo '<div class="alert alert-success">';
                echo session()->get('insert');
                echo '</div>';
            }

            if (session()->get('update')) {
                echo '<div class="alert alert-primary">';
                echo session()->get('update');
                echo '</div>';
            }

            if (session()->get('delete')) {
                echo '<div class="alert alert-danger">';
                echo session()->get('delete');
                echo '</div>';
            }

            ?>
            <table class="table table-bordered table-sm" id="example1">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">NO</th>
                        <th>Nama App</th>
                        <th>URL</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($app as $key => $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['nama_app'] ?></td>
                            <td class="text-center">
                                <a href="<?= $d['url_app'] ?>" target="_blank"><?= $d['url_app'] ?></a><br>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <button data-toggle="modal" data-target="#edit<?= $d['id_app'] ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></button>
                                    <a href="<?= base_url('Admin/App/deleteData/' . $d['id_app']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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
            <?php echo form_open('Admin/App/insertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Aplikasi</label>
                    <input name="nama_app" class="form-control" placeholder="Nama Aplikasi" required>
                </div>
                <div class="form-group">
                    <label>Url Aplikasi</label>
                    <input name="url_app" class="form-control" placeholder="URL Aplikasi" required>
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

<?php foreach ($app as $key => $value) { ?>

    <div class="modal fade" id="edit<?= $value['id_app'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Aplikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Admin/App/updateData/' . $value['id_app']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Aplikasi</label>
                        <input name="nama_app" value="<?= $value['nama_app'] ?>" class="form-control" placeholder="Nama Aplikasi" required>
                    </div>
                    <div class="form-group">
                        <label>Url Aplikasi</label>
                        <input name="url_app" value="<?= $value['url_app'] ?>" class="form-control" placeholder="URL Aplikasi" required>
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
