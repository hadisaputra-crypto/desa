<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            if (session()->get('insert')) {
                echo '<div class="alert alert-success">';
                echo session()->get('insert');
                echo '</div>';
            }

            if (session()->get('update')) {
                echo '<div class="alert alert-primary">';
                echo session()->get('update');
                echo '</div>';
            }

            if (session()->get('delete')) {
                echo '<div class="alert alert-danger">';
                echo session()->get('delete');
                echo '</div>';
            }

            ?>
            <table class="table table-bordered table-sm" id="example1">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">NO</th>
                        <th>Kategori Berita</th>

                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $key => $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['kategori_berita'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button data-toggle="modal" data-target="#edit<?= $d['id_kategori_berita'] ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></button>
                                    <a href="<?= base_url('Admin/Berita/deleteDataKategori/' . $d['id_kategori_berita']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                                </div>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>



<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Admin/Berita/insertDataKategori') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kategori Berita</label>
                    <input name="kategori_berita" class="form-control" placeholder="Kategori Berita" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<?php foreach ($kategori as $key => $value) { ?>

    <div class="modal fade" id="edit<?= $value['id_kategori_berita'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Admin/Berita/updateDataKategori/' . $value['id_kategori_berita']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori Berita</label>
                        <input name="kategori_berita" value="<?= $value['kategori_berita'] ?>" class="form-control" required>
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>