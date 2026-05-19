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
        <?= form_open_multipart('Admin/Slider/updateData/' . $slider['id_slider']) ?>
        <div class="card-body">

            <div class="form-group">
                <label>Judul Slider</label>
                <input name="judul_slider" value="<?= $slider['judul_slider'] ?>" maxlength="255" class="form-control" placeholder="Judul Slider">
                <p class="text-danger"><?= validation_show_error('judul_slider')  ?></p>
            </div>

            <div class="form-group">
                <label>Url Terkait</label>
                <input name="url_slider" value="<?= $slider['url_slider'] ?>" maxlength="255" class="form-control" placeholder="URL Terkait">
                <p class="text-success">Beri Tanda <b>"#"</b> jika Url Tidak Ada !</p>
                <p class="text-danger"><?= validation_show_error('url_slider')  ?></p>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Cover Silder</label>
                        <input type="file" accept="image/jpeg" name="cover_slider" id="preview_gambar" class="form-control">
                        <p class="text-success">Cover Wajib Format .JPG Max Ukuran 500 KB Dengan Resolusi 1920x766px !</p>
                        <p class="text-danger"><?= validation_show_error('cover_slider') ?></p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Preview</label><br>
                        <img src="<?= base_url('cover/' . $slider['cover_slider']) ?>" id="gambar_load" width="400px" height="100%" style="border: 2px solid;">
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
            <a href="<?= base_url('Admin/Slider') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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