<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= base_url('images/bg-breadcrumb.jpg') ?>);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Area Download</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="javascript:void(0);">Information</a></li>
                    <li>Download</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->


<!-- contact area -->
<div class="content-block">
    <div class="section-full content-inner">
        <div class="container">
            <div class="sort-title clearfix text-center">
                <h4>Download</h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered" id="example" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Ukuran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dokumen as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['nama_dokumen'] ?></td>
                                    <td class="text-center"><?= number_format($value['ukuran_file'], 0) ?> KB</td>
                                    <td class="text-center">
                                        <a href="<?= base_url('files/' . $value['file_dokumen']) ?>" class="btn-premium-solid btn-sm"><i class="fa fa-download"></i> Download</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>