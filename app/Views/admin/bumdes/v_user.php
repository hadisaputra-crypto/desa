<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?> <?= $id_bumdes ? '(BUMDes ID: '.$id_bumdes.')' : '(Semua BUMDes)' ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/bumdes/user/tambah/' . $id_bumdes) ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"></i> Tambah User
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
                        <th>BUMDes</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $db = \Config\Database::connect();
                    $no = 1;
                    foreach ($user as $row) : 
                        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $row['id_bumdes'])->get()->getRowArray();
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $bumdes['nama_bumdes'] ?? 'Global / Admin' ?></td>
                            <td><?= $row['nama_user'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/bumdes/user/edit/' . $row['id_user']) ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/bumdes/user/delete/' . $row['id_user']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus user ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
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
