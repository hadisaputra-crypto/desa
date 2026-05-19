<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">
        <?= $subjudul ?>
      </h3>
    </div>
    <?= form_open_multipart('Admin/Pengumuman/updateData/' . $pengumuman['id_pengumuman']) ?>
    <div class="card-body">

      <div class="form-group">
        <label>Judul Pengumuman</label>
        <input name="judul_pengumuman" value="<?= $pengumuman['judul_pengumuman'] ?>" maxlength="255" class="form-control" placeholder="Judul Pengumuman">
        <p class="text-danger"><?= validation_show_error('judul_pengumuman') ?></p>
      </div>


      <div class="form-group">
        <label>Isi Pengumuman</label>
        <textarea name="isi_pengumuman" id="summernote"> <?= $pengumuman['isi_pengumuman'] ?></textarea>
        <p class="text-danger"><?= validation_show_error('isi_pengumuman') ?></p>
      </div>


    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
      <a href="<?= base_url('Admin/Pengumuman') ?>" class="btn btn-success btn-flat btn-sm">Kembali</a>
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
    //Initialize Select2 Elements
    $('.select2').select2();
    //Initialize Select2 Elements
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });
</script>