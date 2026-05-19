<div class="col-md-12">
    <div class="card card-outline ">
       
        <?= form_open_multipart('Admin/Profil/updateStrukturOrganisasi') ?>
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
                <img src="<?= base_url('images/' . $profil['struktur_organisasi']) ?>" id="gambar_load" width="100%">
            </div>

            <div class="form-group">
                <!-- <label>Ganti Struktur Organisasi</label> -->
                <input type="file" name="struktur_organisasi" accept="image/*" class="form-control" id="preview_gambar">
                <p class="text-danger"><?= validation_show_error('visi_misi') ?></p>
            </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-save"></i> Simpan</button>
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