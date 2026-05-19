<div class="col-md-12">
    <div class="card card-outline ">
       
        <?= form_open_multipart('Admin/Profil/updateVisiMisi') ?>
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
                <!-- <label>Visi Dan Misi</label> -->
                <textarea name="visi_misi" id="summernote"><?= $profil['visi_misi'] ?></textarea>
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
    $(function() {
        // Summernote
        $('#summernote').summernote({
            height: 350,
        })

    })
</script>