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
                    <a href="<?= base_url('AlbumFoto') ?>" class="breadcrumb-nav-link">
                        Gallery
                    </a>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text"><?= $album['nama_album'] ?></span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;"><?= $album['nama_album'] ?></h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p class="sub-title">Dokumentasi kegiatan dan potensi Bumi Sakti Alam Kerinci dalam bingkai visual.</p>
        </div>

        <div class="row">
            <div id="lightgallery" class="row col-lg-12">
                <?php if (empty($foto)) { ?>
                    <!-- Dummy Photos from Web -->
                    <?php 
                    $dummies = [
                        ['url' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?auto=format&fit=crop&q=80&w=800', 'title' => 'Pemandangan Desa Kerinci'],
                        ['url' => 'https://images.unsplash.com/photo-1588666309990-d68f08e3d4a6?auto=format&fit=crop&q=80&w=800', 'title' => 'Budaya Lokal Kerinci'],
                        ['url' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?auto=format&fit=crop&q=80&w=800', 'title' => 'Kegiatan Masyarakat'],
                        ['url' => 'https://images.unsplash.com/photo-1506484334402-40f21501f673?auto=format&fit=crop&q=80&w=800', 'title' => 'Pertanian Desa'],
                    ];
                    foreach ($dummies as $d) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 m-b30">
                            <div class="gallery-premium-card glass-card overflow-hidden">
                                <div class="gallery-img-box">
                                    <img src="<?= $d['url'] ?>" alt="<?= $d['title'] ?>">
                                    <div class="gallery-overlay">
                                        <span data-exthumbimage="<?= $d['url'] ?>" data-src="<?= $d['url'] ?>" class="check-km view-btn" title="<?= $d['title'] ?>">
                                            <i class="fa fa-search-plus"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="p-a15 text-center bg-white">
                                    <h6 class="m-b0" style="font-size: 0.9rem; color: var(--biru-tua);"><?= $d['title'] ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <?php foreach ($foto as $key => $value) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 m-b30">
                            <div class="gallery-premium-card glass-card overflow-hidden">
                                <div class="gallery-img-box">
                                    <img src="<?= base_url('foto/' . $value['file_foto']) ?>" alt="<?= $value['file_foto'] ?>">
                                    <div class="gallery-overlay">
                                        <span data-exthumbimage="<?= base_url('foto/' . $value['file_foto']) ?>" data-src="<?= base_url('foto/' . $value['file_foto']) ?>" class="check-km view-btn" title="<?= $value['file_foto'] ?>">
                                            <i class="fa fa-search-plus"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        
        <div class="m-t50 text-center">
            <a href="<?= base_url('Gallery') ?>" class="btn-premium-outline"><i class="fa fa-arrow-left m-r10"></i> Kembali ke Album</a>
        </div>
    </div>
</div>

<style>
.gallery-premium-card {
    position: relative;
    border-radius: 12px;
    transition: all 0.4s ease;
    border: 1px solid #eee;
}
.gallery-img-box {
    position: relative;
    height: 250px;
    overflow: hidden;
}
.gallery-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.6s ease;
}
.gallery-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(21, 101, 192, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.4s ease;
}
.view-btn {
    width: 60px;
    height: 60px;
    background: white;
    color: var(--biru-utama);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    cursor: pointer;
    transform: scale(0.5);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.gallery-premium-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(21, 101, 192, 0.15);
}
.gallery-premium-card:hover .gallery-img-box img {
    transform: scale(1.15);
}
.gallery-premium-card:hover .gallery-overlay {
    opacity: 1;
}
.gallery-premium-card:hover .view-btn {
    transform: scale(1);
}
</style>