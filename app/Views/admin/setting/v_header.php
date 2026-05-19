<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul ?>
            </h3>
        </div>
        <?= form_open_multipart('Admin/Setting/updateHeader') ?>
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
                <img src="<?= base_url('logo/' . $web['logo_header']) ?>" id="gambar_load" width="450px">
            </div>

            <div class="form-group">
                <label>Ganti Logo</label>
                <input type="file" name="logo_header" accept="image/png" class="form-control" id="preview_gambar">
                <p class="text-success">Header Logo Wajib Format .PNG Max Ukuran 150 KB Dengan Resolusi 800px x 224px!!</p>
                <p class="text-danger"><?= validation_show_error('logo_header') ?></p>
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