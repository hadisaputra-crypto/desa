<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= base_url('images/bg-breadcrumb.jpg') ?>);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Team</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="javascript:void(0);">Akademik</a></li>
                    <li>Team</li>
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
                <h4>Team</h4>
            </div>
            <div class="row">
                <?php foreach ($team as $key => $value) { ?>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="dlab-box m-b30 dlab-team1">
                            <div class="dlab-media">
                                <a href="#">
                                    <img style="height: 360px;" src="<?= base_url('foto/' . $value['foto_team']) ?>">
                                </a>
                            </div>
                            <div class="dlab-info">
                                <h6><a href="#"><?= $value['nama_team'] ?></a></h6>
                                <span class="dlab-position"><?= $value['jabatan'] ?></span>
                                <ul class="dlab-social-icon dez-border">
                                    <li>
                                        <h6></h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>