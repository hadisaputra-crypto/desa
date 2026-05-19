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
        <?= form_open_multipart('Admin/Dokumen/insertData') ?>
        <div class="card-body">

            <div class="form-group">
                <label>Nama Dokumen</label>
                <input name="nama_dokumen" value="<?= old('nama_dokumen') ?>" maxlength="255" class="form-control" placeholder="Nama Dokumen">
                <p class="text-danger"><?= validation_show_error('nama_dokumen')  ?></p>
            </div>


            <div class="form-group">
                <label>File Dokumen</label>
                <input type="file" accept=".pdf" name="file_dokumen" class="form-control" required>
                <p class="text-success">Jenis File Dokumen Wajib .PDF dengan Max Ukuran 1500 KB </p>
                <p class="text-danger"><?= validation_show_error('file_dokumen') ?></p>
            </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
            <a href="<?= base_url('Admin/Dokumen') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
        </div>
    </div>

    <?php echo form_close() ?>
</div>

<!-- /.col-->