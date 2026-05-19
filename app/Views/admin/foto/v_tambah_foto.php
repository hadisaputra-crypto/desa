<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $album['nama_album'] ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Admin/Foto') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-backward"></i> Kembali
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

            if (session()->get('delete')) {
                echo '<div class="alert alert-danger">';
                echo session()->get('delete');
                echo '</div>';
            }

            ?>

            <?php echo form_open_multipart('Admin/Foto/uploadFoto/' . $album['id_album']) ?>
            <Label>Upload Foto</Label>
            <div class="row">
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="file" name="file_foto" accept="image/jpeg" class="form-control" required>
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info btn-flat">Upload</button>
                        </span>

                    </div>
                    <p class="text-danger"><?= validation_show_error('file_foto') ?></p>
                </div>
            </div>

            <?php echo form_close() ?>

            <hr>
            <div class="row">
                <?php foreach ($foto as $key => $value) { ?>
                    <div class="col-sm-3">
                        <img src="<?= base_url('foto/' . $value['file_foto']) ?>" width="100%" height="180px">
                        <a href="<?= base_url('Admin/Foto/deleteFoto/' . $value['id_album'] . '/' . $value['id_foto']) ?>" class="btn btn-block btn-danger btn-sm" onclick="return confirm('Yakin Hapus Foto..?')">Delete</a>
                        <hr>
                    </div>
                <?php  } ?>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>