<!-- inner page banner -->
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
                    <a href="<?= base_url('Berita') ?>" class="breadcrumb-nav-link">
                        Berita
                    </a>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text">Detail</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner-1 bg-white">
    <div class="container">
        <div class="row">
            <!-- Left part start -->
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="blog-post blog-single sidebar news-detail-premium">
                    <div class="dlab-post-title">
                        <h1 class="post-title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem; line-height: 1.2;">
                            <?= $berita['judul_berita'] ?>
                        </h1>
                    </div>
                    
                    <div class="dlab-post-meta m-b30">
                        <ul class="d-flex align-items-center">
                            <li class="post-author m-r20"> <i class="fa fa-user-circle text-primary"></i> <span class="m-l5"><?= $berita['nama_user'] ?></span> </li>
                            <li class="post-date m-r20"> <i class="fa fa-calendar text-primary"></i> <span class="m-l5"><?= date('d M Y', strtotime($berita['tgl_berita'])) ?></span> </li>
                            <li class="post-comment"> <i class="fa fa-eye text-primary"></i> <span class="m-l5"><?= $berita['view'] ?> x dilihat</span> </li>
                        </ul>
                    </div>

                    <div class="dlab-post-media m-b30">
                        <img src="<?= base_url('cover/' . $berita['cover_berita']) ?>" class="rounded shadow-lg w-100" alt="<?= $berita['judul_berita'] ?>">
                    </div>

                    <div class="dlab-post-text text" style="font-size: 1.15rem; line-height: 1.9; color: #444;">
                        <?= $berita['isi_berita'] ?>
                    </div>
                    
                    <div class="m-t50 p-a30 glass-card share-post">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="m-b0">Bagikan Berita Ini:</h5>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="dlab-social-icon dlab-border">
                                    <li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-whatsapp" href="javascript:void(0);"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Side bar start -->
            <div class="col-xl-3 col-lg-4">
                <aside class="side-bar sticky-top">
                    <div class="widget">
                        <h5 class="widget-title style-1">Pencarian</h5>
                        <div class="search-bx style-1">
                            <?php echo form_open('Berita/Pencarian') ?>
                            <div class="input-group">
                                <input name="keyword" class="form-control" placeholder="Cari berita...">
                                <span class="input-group-btn">
                                    <button type="submit" class="fa fa-search site-button sharp radius-no"></button>
                                </span>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    
                    <div class="widget recent-posts-entry">
                        <h5 class="widget-title style-1">Berita Terbaru</h5>
                        <div class="widget-post-bx">
                            <?php foreach ($recent as $key => $value) { ?>
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media rounded">
                                        <img src="<?= base_url('cover/' . $value['cover_berita']) ?>" width="200" height="143" alt="">
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-header">
                                            <h6 class="post-title" style="font-size: 0.95rem; font-weight: 700;">
                                                <a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>"><?= $value['judul_berita'] ?></a>
                                            </h6>
                                        </div>
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"><?= date('d M Y', strtotime($value['tgl_berita'])) ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="widget widget_archive">
                        <h5 class="widget-title style-1">Kategori Berita</h5>
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
                </aside>
            </div>
        </div>
    </div>
</div>

<style>
.news-detail-premium .dlab-post-meta ul {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.9rem;
    color: #666;
}
.share-post {
    border-left: 4px solid var(--biru-utama);
}
.widget-post-media img {
    border-radius: 8px;
}
</style>