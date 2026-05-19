<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <?= form_open_multipart('Admin/Layanan/updateData/' . $layanan['id_layanan_pusat']) ?>
        <?= csrf_field() ?>
        <div class="card-body">

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input name="nama_layanan" value="<?= $layanan['nama_layanan'] ?>" class="form-control" placeholder="Nama Layanan" required>
                        <p class="text-danger"><?= validation_show_error('nama_layanan') ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Instansi / Dinas Terkait</label>
                        <input name="instansi" value="<?= $layanan['instansi'] ?>" class="form-control" placeholder="Instansi" required>
                        <p class="text-danger"><?= validation_show_error('instansi') ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi Layanan</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control summernote"><?= $layanan['deskripsi'] ?></textarea>
                <p class="text-danger"><?= validation_show_error('deskripsi') ?></p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Persyaratan</label>
                        <textarea name="syarat" id="syarat" class="form-control summernote"><?= $layanan['syarat'] ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Prosedur / Alur</label>
                        <textarea name="prosedur" id="prosedur" class="form-control summernote"><?= $layanan['prosedur'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ganti Cover (Opsional)</label>
                        <input type="file" name="foto" id="preview_gambar" class="form-control" accept="image/*">
                        <p class="text-info small">Biarkan kosong jika tidak ingin mengubah foto.</p>
                        <p class="text-danger"><?= validation_show_error('foto') ?></p>
                    </div>
                </div>
                <div class="col-sm-6 text-center">
                    <label>Preview</label><br>
                    <img src="<?= $layanan['foto'] ? base_url('cover/' . $layanan['foto']) : base_url('cover/700x500.jpg') ?>" id="gambar_load" width="250px" class="img-thumbnail shadow-sm">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Perbarui</button>
            <a href="<?= base_url('Admin/Layanan') ?>" class="btn btn-default btn-flat">Batal</a>
        </div>
        <?= form_close() ?>
    </div>
</div>

<script>
    $(function() {
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

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
    });
</script>