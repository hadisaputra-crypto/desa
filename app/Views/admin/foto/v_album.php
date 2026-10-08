<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Admin/Foto/tambahAlbum') ?>" class="btn btn-primary btn-flat btn-sm">
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
                        <th width="250px">Cover</th>
                        <th>Nama Album</th>
                        <th>Jumlah Foto</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $db = \Config\Database::connect();
                    foreach ($album as $key => $d) {
                        $jml =   $db->table('tbl_foto')->where('id_album', $d['id_album'])->countAllResults();
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><img src="<?= base_url('foto/' . $d['cover_album']) ?>" width="250px"></td>
                            <td><?= $d['nama_album'] ?></td>
                            <td class="text-center"><span class="badge badge-primary"><?= $jml ?></span></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Admin/Foto/tambahFoto/' . $d['id_album']) ?>" class="btn btn-success btn-sm btn-flat"><i class="fas fa-plus"></i>Tambah Foto</a>
                                   

                                    <?php if ($jml == 0) { ?>
                                        <a href="<?= base_url('Admin/Foto/deleteAlbum/' . $d['id_album']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                                    <?php } ?>

                                </div>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p class="text-danger">Note : (* Sebelum Menghapus Album Foto Pastikan Seluruh Foto Pada Album Tersebut Telah Dikosongkan !</p>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
