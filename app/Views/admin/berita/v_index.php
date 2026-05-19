<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Admin/Berita/tambahData') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
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
                        <th width="200px">Cover Berita</th>
                        <th>Judul Berita</th>
                        <th>Kategori</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($berita as $key => $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><img src="<?= base_url('cover/' . $d['cover_berita']) ?>" width="200px"></td>
                            <td><?= $d['judul_berita'] ?></td>
                            <td><?= $d['kategori_berita'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Admin/Berita/editData/' . $d['id_berita']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('Admin/Berita/deleteData/' . $d['id_berita']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "paging": true,
            "searching": true,
            "autoWidth": false,
        });
    });
</script>