<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul ?>
            </h3>
        </div>
        <?= form_open_multipart('Admin/Setting/updateSambutan') ?>
        <?= csrf_field() ?>
        <div class="card-body">
            <?php
            if (session()->getFlashdata('update')) {
                echo '<div class="alert alert-primary">';
                echo session()->getFlashdata('update');
                echo '</div>';
            }
            ?>

            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <img src="<?= base_url('foto/' . $web['foto_pimpinan']) ?>" id="gambar_load" width="100%">
                    </div>
                    <input type="file" name="foto_pimpinan" accept="image/jpeg" class="form-control" id="preview_gambar">
                    <p class="text-danger"><?= validation_show_error('foto_pimpinan') ?></p>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Pimpinan</label>
                                <input name="nama_pimpinan" value="<?= $web['nama_pimpinan'] ?>" maxlength="255" class="form-control">
                                <p class="text-danger"><?= validation_show_error('nama_pimpinan') ?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Dipimpin Oleh</label>
                                <input name="dipimpin_oleh" value="<?= $web['dipimpin_oleh'] ?>" maxlength="255" class="form-control">
                                <p class="text-danger"><?= validation_show_error('dipimpin_oleh') ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kata Sambutanh</label>
                        <textarea name="kata_sambutan" rows="5" class="form-control" id="summernote"><?= $web['kata_sambutan'] ?></textarea>
                        <p class="text-danger"><?= validation_show_error('kata_sambutan') ?></p>
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
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    })
</script>



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