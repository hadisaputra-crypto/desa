<div class="breadcrumb-row-premium">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-nav-list">
                <li class="breadcrumb-nav-item">
                    <a href="<?= base_url() ?>" class="breadcrumb-nav-link">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item">
                    <span class="breadcrumb-nav-text">Informasi</span>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text">Berita</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-head text-center m-t50">
    <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;">Warta BUMDes Kerinci</h2>
    <div class="dlab-separator-outer">
        <div class="dlab-separator bg-primary style-skew"></div>
    </div>
    <p class="sub-title">Update terkini mengenai kegiatan, produk, dan perkembangan ekonomi desa.</p>
</div>

<!-- inner page banner END -->
<div class="content-area">
    <div class="container">
        <div class="row">

            <!-- left part start -->
            <div class="col-xl-9 col-lg-8">

                <!-- blog grid -->
                <div id="masonry" class="dlab-blog-grid-2 row">
                    <?php foreach ($berita as $key => $value) { ?>
                        <div class="post card-container col-lg-6 col-md-6 col-sm-12 m-b30">
                            <div class="news-premium-card h-100">
                                <div class="news-img">
                                    <a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>">
                                        <img src="<?= base_url('cover/' . $value['cover_berita']) ?>" alt="<?= $value['judul_berita'] ?>">
                                    </a>
                                    <div class="news-date">
                                        <span><?= date('d', strtotime($value['tgl_berita'])) ?></span>
                                        <strong><?= date('M', strtotime($value['tgl_berita'])) ?></strong>
                                    </div>
                                </div>
                                <div class="news-body">
                                    <div class="news-meta">
                                        <ul>
                                            <li><i class="fa fa-user-circle"></i> <?= $value['nama_user'] ?></li>
                                            <li><i class="fa fa-tag"></i> <?= $value['kategori_berita'] ?></li>
                                        </ul>
                                    </div>
                                    <h5 class="news-title">
                                        <a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>">
                                            <?= $value['judul_berita'] ?>
                                        </a>
                                    </h5>
                                    <p class="news-excerpt">
                                        <?= substr(strip_tags($value['isi_berita']), 0, 120) ?>...
                                    </p>
                                    <div class="news-footer-meta d-flex justify-content-between align-items-center">
                                        <span class="view-count"><i class="fa fa-eye"></i> <?= $value['view'] ?></span>
                                        <a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>" class="btn-premium-outline btn-sm">Baca Selengkapnya <i class="fa fa-arrow-right m-l10"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- blog grid END -->

                <!-- Pagination -->

                <div class="pagination-bx rounded-sm primary clearfix col-md-12">
                    <?= $pager->links('berita', 'default_full') ?>
                </div>
                <!-- Pagination END -->

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