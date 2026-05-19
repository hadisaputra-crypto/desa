<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        <?= $subjudul ?>
      </h3>
    </div>

    <?php echo form_open_multipart('Admin/Berita/insertData') ?>
    <div class="card-body">

      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <label>Judul</label>
            <input name="judul_berita" value="<?= old('judul_berita') ?>" maxlength="255" class="form-control" placeholder="Judul">
            <p class="text-danger"><?= validation_show_error('judul_berita') ?></p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Kategori Berita</label>
            <select name="id_kategori_berita" class="form-control">
              <option value="">--Pilih Kategori--</option>
              <?php foreach ($kategori as $key => $value) { ?>
                <option value="<?= $value['id_kategori_berita'] ?>"><?= $value['kategori_berita'] ?></option>
              <?php } ?>
            </select>
            <p class="text-danger"><?= validation_show_error('id_kategori_berita') ?></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Isi berita</label>
        <textarea name="isi_berita" id="summernote"></textarea>
        <p class="text-danger"><?= validation_show_error('isi_berita') ?></p>
      </div>


      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label>Cover berita</label>
            <input type="file" accept="image/*" name="cover_berita" id="preview_gambar" class="form-control">
            <p class="text-success">Ukuran Gambar Wajin 700x500</p>
            <p class="text-danger"><?= validation_show_error('cover_berita') ?></p>
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
      <a href="<?= base_url('Admin/Berita') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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