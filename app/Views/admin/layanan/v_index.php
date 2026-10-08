<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('Admin/Layanan/tambahData') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"></i> Tambah Layanan
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('insert')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    <?= session()->getFlashdata('insert') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('update')) : ?>
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> Updated!</h5>
                    <?= session()->getFlashdata('update') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('delete')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Deleted!</h5>
                    <?= session()->getFlashdata('delete') ?>
                </div>
            <?php endif; ?>

            <table class="table table-bordered table-striped table-sm" id="example1">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">NO</th>
                        <th>Cover</th>
                        <th>Nama Layanan</th>
                        <th>Instansi/Dinas</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($layanan as $key => $d) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center">
                                <?php if ($d['foto']) : ?>
                                    <img src="<?= base_url('cover/' . $d['foto']) ?>" width="100px" class="img-thumbnail">
                                <?php else : ?>
                                    <span class="text-muted small">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?= $d['nama_layanan'] ?></strong>
                            </td>
                            <td><?= $d['instansi'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('Admin/Layanan/editData/' . $d['id_layanan_pusat']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('Admin/Layanan/deleteData/' . $d['id_layanan_pusat']) ?>" onclick="return confirm('Yakin Hapus Data..?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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
