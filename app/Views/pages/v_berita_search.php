<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= base_url('images/bg-breadcrumb.jpg') ?>);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Search</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="javascript:void(0);">Berita</a></li>
                    <li>Search</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->


<!-- inner page banner END -->
<div class="content-area">
    <div class="container">
        <div class="row">

            <!-- left part start -->
            <div class="col-xl-9 col-lg-8">
                <div class="alert alert-success no-bg">Hasil Pencarian Dari "<b><?= $keyword ?></b>"</div>
                <!-- blog grid -->
                <div id="masonry" class="dlab-blog-grid-2 row">
                    <?php foreach ($berita as $key => $value) { ?>
                        <div class="post card-container col-lg-6 col-md-6 col-sm-12">
                            <div class="blog-post blog-grid blog-rounded bg-white shadow">
                                <div class="dlab-post-media dlab-img-effect">
                                    <a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>"><img src="<?= base_url('cover/' . $value['cover_berita']) ?>" alt="" /></a>
                                </div>
                                <div class="dlab-info p-a25">
                                    <div class="dlab-post-meta">
                                        <ul>
                                            <li class="post-author"> <i class="fa fa-user-circle"></i> By <a href="javascript:void(0);"><?= $value['nama_user'] ?></a> </li>
                                            <li class="post-tag"> <a href="<?= base_url('Berita/Kategori/' . $value['id_kategori_berita']) ?>"><i class="fa fa-list"></i> <?= $value['kategori_berita'] ?></a> </li>
                                        </ul>
                                    </div>
                                    <div class="dlab-post-title ">
                                        <h6 class="post-title"><a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>" class="text-primary"><?= substr($value['judul_berita'], 0, 40) ?></a></h6>
                                    </div>

                                    <div class="post-footer">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="fa fa-clock-o"></i> <strong><?= date('d M Y', strtotime($value['tgl_berita'])) ?> <?= $value['jam_berita'] ?></strong> </li>
                                                <li class="post-date"> <i class="fa fa-eye"></i> <strong><?= $value['view']  ?></strong> </li>
                                            </ul>
                                        </div>
                                        <!-- <ul class="dlab-social-icon dez-border">
                                            <li><a class="site-button facebook circle-sm fa fa-facebook" href="javascript:void(0);"></a></li>
                                            <li><a class="site-button twitter circle-sm fa fa-twitter " href="javascript:void(0);"></a></li>
                                            <li><a class="site-button linkedin circle-sm fa fa-linkedin " href="javascript:void(0);"></a></li>
                                            <li><a class="site-button instagram  circle-sm fa fa-instagram  " href="javascript:void(0);"></a></li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- blog grid END -->



            </div>
            <!-- left part start -->

            <!-- Side bar start -->
            <div class="col-xl-3 col-lg-4">
                <aside class="side-bar sticky-top">
                    <div class="widget">
                        <h5 class="widget-title style-1">Search</h5>
                        <div class="search-bx style-1">
                            <?php echo form_open('Berita/Pencarian') ?>
                            <div class="input-group">
                                <input name="keyword" class="form-control" placeholder="Enter your keywords...">
                                <span class="input-group-btn">
                                    <button type="submit" class="fa fa-search site-button sharp radius-no"></button>
                                </span>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    <div class="widget recent-posts-entry">
                        <h5 class="widget-title style-1">Recent Posts</h5>
                        <div class="widget-post-bx">
                            <?php foreach ($recent as $key => $value) { ?>
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media">
                                        <img src="<?= base_url('cover/' . $value['cover_berita']) ?>" width="200" height="143" alt="">
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="la la-clock"></i> <strong><?= date('d M Y', strtotime($value['tgl_berita'])) ?> <?= $value['jam_berita'] ?></strong> </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-header">
                                            <h6 class="post-title"><a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>" class="text-primary"><?= $value['judul_berita'] ?></a></h6>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                    </div>

                    <div class="widget widget_archive">
                        <h5 class="widget-title style-1">Categories List</h5>
                        <ul>
                            <?php
                            $db = \Config\Database::connect();
                            foreach ($kategori as $key => $value) {
                                $jml =  $db->table('tbl_berita')->where('id_kategori_berita', $value['id_kategori_berita'])->countAllResults()
                            ?>
                                <li><a href="<?= base_url('Berita/Kategori/' . $value['id_kategori_berita']) ?>"><?= $value['kategori_berita'] ?></a> (<?= $jml ?>)</li>
                            <?php } ?>

                        </ul>
                    </div>
                    <div class="widget widget_tag_cloud radius">
                        <h5 class="widget-title style-1">Tags</h5>
                        <div class="tagcloud">
                            <?php foreach ($kategori as $key => $value) { ?>
                                <a href="<?= base_url('Berita/Kategori/' . $value['id_kategori_berita']) ?>"><?= $value['kategori_berita'] ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </aside>
            </div>
            <!-- Side bar END -->
        </div>
    </div>
</div>