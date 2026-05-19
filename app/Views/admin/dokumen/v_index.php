<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Admin/Dokumen/tambahData') ?>" class="btn btn-primary btn-flat btn-sm">
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
                        <th>Nama Dokumen</th>
                        <th>Ukuran File</th>
                        <th>File</th>
                        <th width="120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dokumen as $key => $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $d['nama_dokumen'] ?></td>
                            <td class="text-center"><?= number_format($d['ukuran_file'], 0) ?> KB</td>
                            <td class="text-center"><a href="<?= base_url('files/' . $d['file_dokumen']) ?>" target="_blank"><i class="fas fa-file-pdf fa-2x text-danger"></i></a></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Admin/Dokumen/deleteData/' . $d['id_dokumen']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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