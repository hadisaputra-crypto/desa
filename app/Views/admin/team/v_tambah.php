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
    <?= form_open_multipart('Admin/Team/insertData') ?>
    <div class="card-body">

      <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <label>Nama</label>
            <input name="nama_team" value="<?= old('nama_dosen') ?>" maxlength="255" class="form-control" placeholder="Nama Dosen">
            <p class="text-danger"><?= validation_show_error('nama_dosen')  ?></p>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label>Jabatan</label>
            <input name="jabatan" value="<?= old('jabatan') ?>" maxlength="255" class="form-control" placeholder="Jabatan">
            <p class="text-danger"><?= validation_show_error('jabatan')  ?></p>
          </div>
        </div>

      </div>


      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Foto</label>
            <input type="file" accept="image/JPEG" name="foto_team" id="preview_gambar" class="form-control">
            <p class="text-success">Resolusi Ukuran Wajib 500x620</p>
            <p class="text-danger"><?= validation_show_error('foto_team') ?></p>
          </div>
        </div>

        <div class="col-sm-8">
          <div class="form-group">
            <label>Preview</label><br>
            <img src="<?= base_url('foto/600x620.jpg') ?>" id="gambar_load" width="200px" height="100%" style="border: 2px solid;">
          </div>
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
      <a href="<?= base_url('Admin/Team') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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