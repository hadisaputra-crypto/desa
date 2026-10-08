<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data BUMDes</h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/bumdes/tambahData') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible hiden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered table-sm" id="example1">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">NO</th>
                        <th>Nama BUMDes</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Email</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($bumdes as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['nama_bumdes'] ?></td>
                            <td><?= $row['desa'] ?></td>
                            <td><?= $row['kecamatan'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kelola
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('admin/bumdes/anggota/' . $row['id_bumdes']) ?>"><i class="fas fa-users mr-2"></i> Anggota</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/bumdes/layanan/' . $row['id_bumdes']) ?>"><i class="fas fa-hand-holding-heart mr-2"></i> Layanan</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/bumdes/produk/' . $row['id_bumdes']) ?>"><i class="fas fa-box mr-2"></i> Produk</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/bumdes/transaksi/' . $row['id_bumdes']) ?>"><i class="fas fa-exchange-alt mr-2"></i> Transaksi</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/bumdes/unitusaha/' . $row['id_bumdes']) ?>"><i class="fas fa-industry mr-2"></i> Unit Usaha</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/bumdes/user/' . $row['id_bumdes']) ?>"><i class="fas fa-user-cog mr-2"></i> Pengguna</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-warning" href="<?= base_url('admin/bumdes/editData/' . $row['id_bumdes']) ?>"><i class="fas fa-edit mr-2"></i> Edit BUMDes</a>
                                        <a class="dropdown-item text-danger" href="<?= base_url('admin/bumdes/deleteData/' . $row['id_bumdes']) ?>" onclick="return confirm('Hapus BUMDes ini?')"><i class="fas fa-trash mr-2"></i> Hapus BUMDes</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


