<!-- contact area -->
<div class="content-block">
    
    <!-- Hero Slider BUMDes -->
    <div class="bumdes-hero-slider owl-carousel owl-theme">
        <?php foreach ($slider as $key => $value) { ?>
            <div class="hero-slide-item">
                <div class="container-fluid p-0 h-100">
                    <div class="row m-0 h-100 align-items-stretch">
                        <div class="col-lg-7 p-0 order-lg-1 d-none d-lg-block">
                            <div class="slide-img-box">
                                <img src="<?= base_url('cover/' . $value['cover_slider']) ?>" alt="<?= $value['judul_slider'] ?>">
                                <div class="img-overlay-blue"></div>
                            </div>
                        </div>
                        <div class="col-lg-5 bg-white d-flex align-items-center order-lg-2">
                            <div class="slide-content-premium p-lr50">
                                <div class="bumdes-badge-premium m-b20">
                                    <i class="fa fa-leaf m-r10"></i>
                                    BADAN USAHA MILIK DESA
                                </div>
                                <h2 class="slide-title-premium m-b20">
                                    <?= $value['judul_slider'] ?>
                                </h2>
                                <p class="slide-desc-premium m-b40">
                                    Transformasi ekonomi desa melalui inovasi digital dan pemberdayaan potensi lokal untuk kemandirian masyarakat Kerinci.
                                </p>
                                <div class="slide-btns-premium m-b30">
                                    <a href="<?= $value['url_slider'] ?>" class="btn-premium-solid m-r10">
                                        Jelajahi <i class="fa fa-arrow-right m-l10"></i>
                                    </a>
                                    <a href="<?= base_url('Tentang') ?>" class="btn-premium-outline">
                                        Profil <i class="fa fa-info-circle m-l10"></i>
                                    </a>
                                </div>
                                <div class="hero-features-premium">
                                    <div class="h-feature"><i class="fa fa-check-circle"></i> Terpercaya</div>
                                    <div class="h-feature"><i class="fa fa-check-circle"></i> Inovatif</div>
                                    <div class="h-feature"><i class="fa fa-check-circle"></i> Mandiri</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        
        <?php if (empty($slider)) { ?>
            <div class="hero-slide-item">
                <div class="slide-background">
                    <div class="default-bg"></div>
                </div>
                
                <div class="container">
                    <div class="slide-content">
                        <div class="bumdes-badge">
                            <i class="fa fa-leaf"></i>
                            BADAN USAHA MILIK DESA
                        </div>
                        
                        <h1 class="slide-title">
                            Membangun Ekonomi Desa Mandiri
                        </h1>
                        
                        <p class="slide-description">
                            Wadah pengembangan ekonomi desa yang dikelola secara profesional untuk kemandirian dan kesejahteraan bersama di Bumi Sakti Alam Kerinci.
                        </p>
                        
                        <div class="slide-actions">
                            <a href="<?= base_url('Pasar') ?>" class="btn-primary">
                                <span>Belanja Produk Desa</span>
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                            <a href="<?= base_url('Tentang') ?>" class="btn-secondary">
                                <i class="fa fa-users"></i>
                                Tentang Kami
                            </a>
                        </div>
                        
                        <div class="bumdes-features">
                            <div class="feature-item">
                                <i class="fa fa-star"></i>
                                <span>Produk Unggulan</span>
                            </div>
                            <div class="feature-item">
                                <i class="fa fa-shield"></i>
                                <span>Kualitas Terjamin</span>
                            </div>
                            <div class="feature-item">
                                <i class="fa fa-heart"></i>
                                <span>Dari Warga Desa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Stats Section -->
    <div class="section-full content-inner-2 bg-white stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="counter-style-1 text-center">
                        <div class="counter-num">
                            <h2 class="counter">45</h2>
                            <span class="counter-suffix">+</span>
                        </div>
                        <span class="counter-text">BUMDes Aktif</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="counter-style-1 text-center">
                        <div class="counter-num">
                            <h2 class="counter">120</h2>
                            <span class="counter-suffix">+</span>
                        </div>
                        <span class="counter-text">Produk Desa</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="counter-style-1 text-center">
                        <div class="counter-num">
                            <h2 class="counter">12</h2>
                            <span class="counter-suffix">K</span>
                        </div>
                        <span class="counter-text">Warga Berdaya</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="counter-style-1 text-center">
                        <div class="counter-num">
                            <h2 class="counter">100</h2>
                            <span class="counter-suffix">%</span>
                        </div>
                        <span class="counter-text">Kemandirian Desa</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Layanan -->
    <div class="section-full content-inner-2 bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="title">Layanan Unggulan</h2>
                <div class="dlab-separator-outer">
                    <div class="dlab-separator bg-primary style-skew"></div>
                </div>
                <p class="sub-title">Solusi ekonomi terpadu untuk percepatan pembangunan desa</p>
            </div>
            
            <div class="section-content">
                <div class="row justify-content-center">
                    <?php foreach ($layanan as $key => $value) { ?>
                        <div class="col-lg-4 col-md-6 m-b30">
                            <div class="service-premium-card h-100 glass-card">
                                <div class="service-card-img">
                                    <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1000&auto=format&fit=crop" alt="Layanan">
                                </div>
                                <div class="service-card-body">
                                    <h5 class="service-card-title"><?= $value['nama_layanan'] ?></h5>
                                    <p class="service-card-instansi"><?= $value['instansi'] ?? 'Pelayanan Desa' ?></p>
                                    <div class="service-card-footer">
                                        <a href="<?= base_url('Layanan/Detail/' . $value['id_layanan_pusat']) ?>" class="btn-service-detail">
                                            Detail Layanan <i class="fa fa-arrow-right m-l5"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Unggulan (Pasar Desa) -->
    <div class="section-full content-inner bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="title">Pasar Desa Kerinci</h2>
                <div class="dlab-separator-outer">
                    <div class="dlab-separator bg-primary style-skew"></div>
                </div>
                <p class="sub-title">Temukan keaslian rasa dan kualitas dari hasil alam Bumi Kerinci</p>
            </div>
            
            <div class="section-content">
                <div class="row">
                    <?php 
                    $limit = 4;
                    $count = 0;
                    foreach ($produk_unggulan as $key => $value) { 
                        if ($count >= $limit) break;
                        $count++;
                    ?>
                        <div class="col-lg-3 col-md-6 m-b30">
                            <div class="product-premium-card">
                                <div class="product-img">
                                    <a href="<?= base_url('Pasar/Detail/' . $value['id_produk']) ?>">
                                        <?php if ($value['foto']): ?>
                                            <img src="<?= base_url('produk/' . $value['foto']) ?>" alt="<?= $value['nama_produk'] ?>">
                                        <?php else: ?>
                                            <img src="<?= base_url('front/images/product/no-image.jpg') ?>" alt="No Image">
                                        <?php endif; ?>
                                    </a>
                                    <div class="product-tag"><?= $value['nama_kategori'] ?></div>
                                </div>
                                <div class="product-body">
                                    <h6 class="product-name">
                                        <a href="<?= base_url('Pasar/Detail/' . $value['id_produk']) ?>">
                                            <?= $value['nama_produk'] ?>
                                        </a>
                                    </h6>
                                    <div class="product-price">
                                        Rp <?= number_format($value['harga'], 0, ',', '.') ?>
                                    </div>
                                    <div class="product-meta">
                                        <div class="bumdes-name">
                                            <i class="fa fa-university"></i> <?= $value['nama_bumdes'] ?>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('Pasar/Detail/' . $value['id_produk']) ?>" class="btn-buy">
                                        Detail Produk
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="text-center m-t30">
                    <a href="<?= base_url('Pasar') ?>" class="btn-premium-solid btn-lg">Lihat Semua Produk <i class="fa fa-angle-right m-l10"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Berita -->
    <div class="section-full content-inner bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="title">Warta Kerinci</h2>
                <div class="dlab-separator-outer">
                    <div class="dlab-separator bg-primary style-skew"></div>
                </div>
                <p class="sub-title">Update terkini perkembangan ekonomi dan kegiatan BUMDes di Kerinci</p>
            </div>
            
            <div class="section-content">
                <div class="row">
                    <?php foreach ($berita as $key => $value) { ?>
                        <div class="col-lg-4 col-md-6 m-b30">
                            <div class="news-premium-card">
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
                                            <li><i class="fa fa-user"></i> Admin</li>
                                            <li><i class="fa fa-tag"></i> <?= $value['kategori_berita'] ?></li>
                                        </ul>
                                    </div>
                                    <h5 class="news-title">
                                        <a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>">
                                            <?= $value['judul_berita'] ?>
                                        </a>
                                    </h5>
                                    <p class="news-excerpt">
                                        <?= substr(strip_tags($value['isi_berita']), 0, 100) ?>...
                                    </p>
                                    <a href="<?= base_url('Berita/Detail/' . $value['id_berita']) ?>" class="read-more">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="section-full p-tb80 bg-primary text-white text-center cta-section">
        <div class="container">
            <h2 class="title">Ayo Majukan Desa Kita!</h2>
            <p class="m-b30">Jadilah bagian dari gerakan ekonomi mandiri. Hubungi kami untuk kemitraan atau informasi lebih lanjut.</p>
            <a href="<?= base_url('Contact') ?>" class="btn-premium-white btn-lg">Mulai Kemitraan <i class="fa fa-handshake-o m-l10"></i></a>
        </div>
    </div>

</div>


<style>
    /* Premium Home Specific Styles */
    .bumdes-hero-slider .hero-slide-item {
        height: 600px;
        background: #f8f9fa;
        overflow: hidden;
    }

    .slide-img-box {
        position: relative;
        height: 600px;
        width: 100%;
        overflow: hidden;
    }

    .overlay-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(13, 71, 161, 0.8) 0%, rgba(21, 101, 192, 0.3) 100%);
        z-index: 1;
    }

    .slide-title-premium {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        color: var(--biru-tua);
        letter-spacing: -0.5px;
    }

    .slide-desc-premium {
        font-size: 1.15rem;
        color: #666;
        max-width: 100%;
        line-height: 1.7;
    }

    .btn-premium-solid {
        display: inline-block;
        padding: 14px 25px;
        background: var(--biru-utama);
        color: white;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 15px rgba(21, 101, 192, 0.2);
        white-space: nowrap;
    }

    .btn-premium-outline {
        display: inline-block;
        padding: 14px 25px;
        background: transparent;
        color: var(--biru-utama);
        border: 2px solid var(--biru-utama);
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .btn-premium-solid:hover {
        background: var(--biru-tua);
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(21, 101, 192, 0.3);
        color: white;
    }

    .btn-premium-outline:hover {
        background: var(--biru-utama);
        color: white;
        transform: translateY(-5px);
    }

    .hero-features-premium {
        display: flex;
        gap: 25px;
        border-top: 1px solid #eee;
        padding-top: 25px;
    }

    .h-feature {
        font-weight: 700;
        color: #777;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .h-feature i { color: var(--biru-utama); }

    /* Service Premium Card */
    .service-premium-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .service-card-img {
        position: relative;
        height: 150px;
        overflow: hidden;
    }

    .service-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.8;
    }

    .service-card-icon {
        position: absolute;
        bottom: -20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background: var(--biru-utama);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        box-shadow: 0 5px 15px rgba(21, 101, 192, 0.3);
        border: 3px solid white;
    }

    .service-card-body {
        padding: 25px;
    }

    /* Slider Nav Fix - Sides */
    .bumdes-hero-slider .owl-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        left: 0;
        transform: translateY(-50%);
        z-index: 10;
        margin: 0;
        display: flex;
        justify-content: space-between;
        padding: 0 30px;
        pointer-events: none;
    }

    .bumdes-hero-slider .owl-nav button.owl-prev,
    .bumdes-hero-slider .owl-nav button.owl-next {
        width: 50px;
        height: 50px;
        background: white !important;
        color: var(--biru-utama) !important;
        border-radius: 50% !important;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px !important;
        pointer-events: auto;
    }

    .bumdes-hero-slider .owl-nav button:hover {
        background: var(--biru-utama) !important;
        color: white !important;
        transform: translateY(-3px);
    }

    .service-card-title {
        font-weight: 800;
        color: var(--biru-tua);
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .service-card-instansi {
        color: #777;
        font-size: 0.85rem;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .btn-service-detail {
        color: var(--biru-utama);
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .service-premium-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border-color: var(--biru-utama);
    }

    .service-premium-card:hover .service-card-img img {
        transform: scale(1.1);
    }

    /* Stats Section */
    .stats-section {
        padding: 50px 0;
        background: white;
        border-bottom: 1px solid #eee;
        position: relative;
        z-index: 10;
        margin-top: -60px;
        width: 85%;
        margin-left: auto;
        margin-right: auto;
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    }

    .counter-num h2 {
        font-size: 3rem;
        font-weight: 800;
        color: var(--biru-utama);
    }

    /* Responsive */
    @media (max-width: 991px) {
        .bumdes-hero-slider .hero-slide-item { height: auto; }
        .slide-img-box { height: 350px; }
        .slide-title-premium { font-size: 2.2rem; }
        .slide-content-premium { padding: 40px 20px; text-align: center; }
        .slide-desc-premium { margin: 0 auto 30px; }
        .hero-features-premium { justify-content: center; flex-wrap: wrap; }
        .stats-section { margin-top: 0; width: 100%; border-radius: 0; }
    }
</style>