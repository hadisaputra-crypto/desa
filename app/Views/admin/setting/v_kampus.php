<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul ?>
            </h3>
        </div>
        <?= form_open_multipart('Admin/Setting/updateKampus') ?>
        <?= csrf_field() ?>
        <div class="card-body">
            <?php
            if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-primary">';
                echo session()->getFlashdata('update');
                echo '</div>';
            }
            ?>
            <div class="form-group">
                <label>Nama Lembaga</label>
                <input name="nama_kampus" value="<?= $web['nama_kampus'] ?>" maxlength="255" class="form-control">
                <p class="text-danger"><?= validation_show_error('nama_kampus') ?></p>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="<?= $web['alamat'] ?>" maxlength="255" class="form-control">
                <p class="text-danger"><?= validation_show_error('alamat') ?></p>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Telpon</label>
                        <input name="telpon" value="<?= $web['telpon'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('telpon') ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input name="email" value="<?= $web['email'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('email') ?></p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input name="fb" value="<?= $web['fb'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('fb') ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Youtube</label>
                        <input name="yt" value="<?= $web['yt'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('yt') ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Instagram</label>
                        <input name="ig" value="<?= $web['ig'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('ig') ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Twitter</label>
                        <input name="twitter" value="<?= $web['twitter'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('twitter') ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>LinkedIn</label>
                        <input name="linkedin" value="<?= $web['linkedin'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('linkedin') ?></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
        </div>
    </div>

    <?php echo form_close() ?>
</div>

<!-- /.col-->


<script>
    $(function() {
        // Summernote
        $('#summernote').summernote({
            height: 350,
        })

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>