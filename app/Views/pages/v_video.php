<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= base_url('images/bg-breadcrumb.jpg') ?>);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Video</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="javascript:void(0);">Gallery</a></li>
                    <li>Video</li>
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
                <h4>Video</h4>
            </div>

            <div class="row">
                <?php foreach ($video as $key => $value) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                        <div class="dlab-box p-a20 border-1">
                            <?= $value['embed_video'] ?>
                            <div class="dlab-info">
                                <h6 class="dlab-title m-t20"><a href="#" class="text-primary"><?= $value['judul_video'] ?></a></h6>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>
    </div>
</div>