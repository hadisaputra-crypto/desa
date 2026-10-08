<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?> <?= $id_bumdes ? '(BUMDes ID: '.$id_bumdes.')' : '(Semua BUMDes)' ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('admin/bumdes/unitusaha/tambah/' . $id_bumdes) ?>" class="btn btn-primary btn-flat btn-sm">
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
                        <th>BUMDes</th>
                        <th>Nama Unit</th>
                        <th>Penanggung Jawab</th>
                        <th>Status</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $db = \Config\Database::connect();
                    $no = 1;
                    foreach ($unit as $row) : 
                        $bumdes = $db->table('tbl_bumdes')->where('id_bumdes', $row['id_bumdes'])->get()->getRowArray();
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $bumdes['nama_bumdes'] ?? 'Unknown' ?></td>
                            <td><?= $row['nama_unit'] ?></td>
                            <td><?= $row['penanggung_jawab'] ?? '-' ?></td>
                            <td class="text-center">
                                <span class="badge badge-<?= ($row['status'] == 1) ? 'success' : 'danger' ?>">
                                    <?= ($row['status'] == 1) ? 'Aktif' : 'Non-Aktif' ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/bumdes/unitusaha/edit/' . $row['id_unit']) ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/bumdes/unitusaha/delete/' . $row['id_unit']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus unit usaha ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

