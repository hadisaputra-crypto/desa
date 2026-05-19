<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Admin/Buku/tambahData') ?>" class="btn btn-primary btn-flat btn-sm">
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
            <table class="table table-bordered table-sm">
                <tr class="text-center bg-primary">
                    <th width="50px">NO</th>
                    <th>Cover</th>
                    <th>Buku</th>
                    <th width="120px">Aksi</th>
                </tr>

                <?php $no = 1;
                foreach ($buku as $key => $d) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><img src="<?= base_url('cover/' . $d['cover_buku']) ?>" width="100px"></td>
                        <td>
                            <p>
                                <b><?= $d['judul_buku'] ?></b><br>
                                ISBN : <?= $d['isbn'] ?> <br>
                                Penulis : <?= $d['penulis_buku'] ?><br>
                                Penerbit : <?= $d['penerbit_buku'] ?><br>
                                Harga : Rp. <?= number_format($d['harga_buku'], 0) ?>.-<br>
                            </p>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?= base_url('Admin/Buku/editData/' . $d['id_buku']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= base_url('Admin/Buku/deleteData/' . $d['id_buku']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>