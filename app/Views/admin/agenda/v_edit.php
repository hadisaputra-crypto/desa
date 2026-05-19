<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul ?>
            </h3>
        </div>

        <?php echo form_open_multipart('Admin/Agenda/updateData/' . $agenda['id_agenda']) ?>
        <div class="card-body">
            <div class="form-group">
                <label>Nama Agenda</label>
                <input name="nama_agenda" value="<?= $agenda['nama_agenda'] ?>" maxlength="255" class="form-control" placeholder="Nama Agenda">
                <p class="text-danger"><?= validation_show_error('nama_agenda') ?></p>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" value="<?= $agenda['tgl_mulai'] ?>" maxlength="255" class="form-control">
                    <p class="text-danger"><?= validation_show_error('tgl_mulai') ?></p>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nama Selesai</label>
                        <input type="date" name="tgl_selesai" value="<?= $agenda['tgl_selesai'] ?>" maxlength="255" class="form-control">
                        <p class="text-danger"><?= validation_show_error('tgl_selesai') ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input name="lokasi" value="<?= $agenda['lokasi'] ?>" maxlength="255" class="form-control" placeholder="Lokasi">
                        <p class="text-danger"><?= validation_show_error('lokasi') ?></p>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="isi_agenda" id="summernote"><?= $agenda['isi_agenda'] ?></textarea>
                <p class="text-danger"><?= validation_show_error('isi_agenda') ?></p>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Cover Agenda</label>
                        <input type="file" accept="image/JPEG" name="cover_agenda" id="preview_gambar" class="form-control">
                        <p class="text-danger"><?= validation_show_error('cover_agenda') ?></p>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Preview Cover</label><br>
                        <img src="<?= base_url('cover/' . $agenda['cover_agenda']) ?>" id="gambar_load" width="550px">
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