<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        <?= $subjudul ?>
      </h3>
    </div>

    <?php echo form_open_multipart('Admin/Agenda/insertData') ?>
    <div class="card-body">
      <div class="form-group">
        <label>Nama Agenda</label>
        <input name="nama_agenda" value="<?= old('nama_agenda') ?>" maxlength="255" class="form-control" placeholder="Nama Agenda">
        <p class="text-danger"><?= validation_show_error('nama_agenda') ?></p>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <label>Tanggal Mulai</label>
          <input type="date" name="tgl_mulai" value="<?= old('tgl_mulai') ?>" maxlength="255" class="form-control">
          <p class="text-danger"><?= validation_show_error('tgl_mulai') ?></p>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tgl_selesai" value="<?= old('tgl_selesai') ?>" maxlength="255" class="form-control">
            <p class="text-danger"><?= validation_show_error('tgl_selesai') ?></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Lokasi</label>
            <input name="lokasi" value="<?= old('lokasi') ?>" maxlength="255" class="form-control" placeholder="Lokasi">
            <p class="text-danger"><?= validation_show_error('lokasi') ?></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="isi_agenda" id="summernote"></textarea>
        <p class="text-danger"><?= validation_show_error('isi_berita') ?></p>
      </div>


      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Cover Agenda</label>
            <input type="file" accept="image/JPEG" name="cover_agenda" id="preview_gambar" class="form-control">
            <p class="text-success">Ukuran Gambar wajib 700x500</p>
            <p class="text-danger"><?= validation_show_error('cover_agenda') ?></p>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label>Preview</label><br>
            <img src="<?= base_url('cover/700x500.jpg') ?>" id="gambar_load" width="400px" height="100%" style="border: 2px solid;">
          </div>
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
      <a href="<?= base_url('Admin/Agenda') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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

<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>