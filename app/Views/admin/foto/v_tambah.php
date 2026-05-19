<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul ?>
            </h3>
        </div>
        <?= form_open_multipart('Admin/Foto/insertDataAlbum') ?>
        <div class="card-body">

            <div class="form-group">
                <label>Nama Album</label>
                <input name="nama_album" value="<?= old('nama_album') ?>" maxlength="255" class="form-control" placeholder="Nama Album">
                <p class="text-danger"><?= validation_show_error('nama_album') ?></p>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Cover Album</label>
                        <input type="file" accept="image/jpeg" name="cover_album" id="preview_gambar" class="form-control">
                        <p class="text-success">Cove