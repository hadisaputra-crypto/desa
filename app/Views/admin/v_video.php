<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Admin/Video/tambahData') ?>" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus"></i> Tambah
                </a>
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
                        <th>Video</th>
                        <th>Judul Video</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($video as $key => $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['embed_video'] ?></td>
                            <td><?= $d['judul_video'] ?></td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <button data-toggle="modal" data-target="#edit<?= $d['id_video'] ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></button>
                                    <a href="<?= base_url('Admin/Video/deleteData/' . $d['id_video']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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
                <h4 class="modal-title">Tambah Video</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('Admin/Video/insertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Judul Video</label>
                    <input name="judul_video" class="form-control" placeholder="Judul Video" required>
                </div>
                <div class="form-group">
                    <label>Embed Video</label>
                    <textarea name="embed_video" class="form-control" id="" rows="10" placeholder="Embed Video" required></textarea>
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


<?php foreach ($video as $key => $value) { ?>

    <div class="modal fade" id="edit<?= $value['id_video'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Aplikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Admin/Video/updateData/' . $value['id_video']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Video</label>
                        <input name="judul_video" value="<?= $value['judul_video'] ?>" class="form-control" placeholder="Judul Video" required>
                    </div>
                    <div class="form-group">
                        <label>Embed Video</label>
                        <textarea name="embed_video" class="form-control" id="" rows="10" placeholder="Embed Video" required><?= $value['embed_video'] ?></textarea>
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



