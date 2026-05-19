<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul ?>
            </h3>
        </div>
        <?php
        $error = validation_errors();
        ?>
        <?= form_open_multipart('Admin/Lembaga/updateData/' . $lembaga['id_lembaga']) ?>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Lembaga</label>
                <input name="nama_lembaga" value="<?= $lembaga['nama_lembaga'] ?>" maxlength="255" class="form-control" placeholder="Nama Lembaga">
                <p class="text-danger"><?= validation_show_error('nama_lembaga')  ?></p>
            </div>

            <div class="form-group">
                <label>Url Lembaga</label>
                <input name="url_lembaga" value="<?= $lembaga['url_lembaga'] ?>" maxlength="255" class="form-control" placeholder="URL Lembaga">
                <p class="text-success">Isi Dengan Tanda <b>#</b> Jika Url Tidak Ada !!</p>
                <p class="text-danger"><?= validation_show_error('url_lembaga')  ?></p>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Logo Lembaga</label>
                        <input type="file" accept="image/*" name="logo_lembaga" id="preview_gambar" class="form-control">
                        <p class="text-danger"><?= validation_show_error('logo_lembaga') ?></p>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Preview Logo</label><br>
                        <img src="<?= base_url('logo/' . $lembaga['logo_lembaga']) ?>" id="gambar_load" width="200px" height="100%" style="border: 2px solid;">
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
            <a href="<?= base_url('Admin/Lembaga') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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