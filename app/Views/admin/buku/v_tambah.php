<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        <?= $subjudul ?>
      </h3>
    </div>
    <?php
    $validasi = \Config\Services::validation();
    ?>
    <?= form_open_multipart('Admin/Buku/insertData') ?>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <label>Judul Buku</label>
            <input name="judul_buku" value="<?= old('judul_buku') ?>" maxlength="255" class="form-control" placeholder="Judul Buku">
            <p class="text-danger"><?= isset($error['judul_buku']) == isset($error['judul_buku']) ? validation_show_error('judul_buku') : '' ?></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>ISBN</label>
            <input name="isbn" value="<?= old('isbn') ?>" maxlength="15" class="form-control" placeholder="ISBN">
            <p class="text-danger"><?= isset($error['isbn']) == isset($error['isbn']) ? validation_show_error('isbn') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Penulis Buku</label>
            <input name="penulis_buku" value="<?= old('penulis_buku') ?>" maxlength="255" class="form-control" placeholder="Penulis Buku">
            <p class="text-danger"><?= isset($error['penulis_buku']) == isset($error['penulis_buku']) ? validation_show_error('penulis_buku') : '' ?></p>
          </div>
        </div>
        
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Penerbit Buku</label>
            <input name="penerbit_buku" value="<?= old('penerbit_buku') ?>" maxlength="255" class="form-control" placeholder="Penerbit Buku">
            <p class="text-danger"><?= isset($error['penerbit_buku']) == isset($error['penerbit_buku']) ? validation_show_error('penerbit_buku') : '' ?></p>
          </div>
        </div>
        <div class="col-sm-6">
          <label>Tanggal Terbit</label>
          <input type="date" name="tgl_terbit" value="<?= old('tgl_terbit') ?>" class="form-control">
          <p class="text-danger"><?= isset($error['tgl_terbit']) == isset($error['tgl_terbit']) ? validation_show_error('tgl_terbit') : '' ?></p>
        </div>
      </div>

      <div class="form-group">
        <label>Deskripsi Buku</label>
        <textarea name="deskripsi_buku" class="form-control" rows="5" placeholder="Deskripsi Buku"><?= old('deskripsi_buku') ?></textarea>
        <p class="text-danger"><?= isset($error['deskripsi_buku']) == isset($error['deskripsi_buku']) ? validation_show_error('deskripsi_buku') : '' ?></p>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Halaman</label>
            <input type="number" name="halaman_buku" value="<?= old('halaman_buku') ?>" min="0" class="form-control">
            <p class="text-danger"><?= isset($error['halaman_buku']) == isset($error['halaman_buku']) ? validation_show_error('halaman_buku') : '' ?></p>
          </div>
        </div>
        <div class="col-sm-6">
          <label>Harga Buku</label>
          <input type="number" name="harga_buku" value="<?= old('harga_buku') ?>" class="form-control">
          <p class="text-danger"><?= isset($error['harga_buku']) == isset($error['harga_buku']) ? validation_show_error('harga_buku') : '' ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Cover Buku</label>
            <input type="file" accept="image/*" name="cover_buku" id="preview_gambar" class="form-control">
            <p class="text-danger"><?= isset($error['cover_buku']) == isset($error['cover']) ? validation_show_error('cover_buku') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-8">
          <div class="form-group">
            <label>Preview Cover</label><br>
            <img src="" id="gambar_load" width="100px">
          </div>
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
      <a href="<?= base_url('Admin/Buku') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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