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
                    <a href="<?= base_url('Pengumuman') ?>" class="breadcrumb-nav-link">
                        Pengumuman
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

<div class="section-full content-inner-2 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 m-lr-auto">
                <div class="pengumuman-detail-premium">
                    <div class="section-head text-center m-b40">
                        <h1 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.8rem; line-height: 1.2; letter-spacing: -1px;"><?= $pengumuman['judul_pengumuman'] ?></h1>
                        <div class="dlab-separator-outer">
                            <div class="dlab-separator bg-primary style-skew"></div>
                        </div>
                        <div class="m-t15 text-muted d-flex align-items-center justify-content-center" style="font-size: 0.95rem; font-weight: 600;">
                            <span class="m-r20"><i class="fa fa-calendar-check-o text-primary m-r5"></i> <?= date('d M Y', strtotime($pengumuman['tgl_pengumuman'])) ?></span>
                            <span><i class="fa fa-bullhorn text-primary m-r5"></i> Pengumuman Resmi</span>
                        </div>
                    </div>
                    
                    <div class="glass-card p-a50 m-b40 content-box-shadow" style="background: #ffffff; border-radius: 25px; border: 1px solid #f0f0f0;">
                        <div class="pengumuman-content-area" style="line-height: 1.9; font-size: 1.15rem; color: #333;">
                            <?= $pengumuman['isi_pengumuman'] ?>
                        </div>
                    </div>
                    
                    <div class="share-post-premium p-a30 glass-card d-flex align-items-center justify-content-between m-b40" style="background: var(--biru-pastel); border-radius: 20px;">
                        <h6 class="m-b0" style="color: var(--biru-utama); font-weight: 700;">Bagikan informasi ini:</h6>
                        <ul class="d-flex m-b0" style="list-style: none; gap: 10px; padding: 0;">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" class="login-icon" style="padding: 10px 15px;"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text=<?= urlencode($pengumuman['judul_pengumuman'] . ' - ' . current_url()) ?>" target="_blank" class="login-icon" style="padding: 10px 15px;"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url=<?= current_url() ?>&text=<?= urlencode($pengumuman['judul_pengumuman']) ?>" target="_blank" class="login-icon" style="padding: 10px 15px;"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                    
                    <div class="text-center m-t50">
                        <a href="<?= base_url('Pengumuman') ?>" class="btn-premium-outline btn-lg">
                            <i class="fa fa-arrow-left m-r10"></i> Kembali ke Daftar Pengumuman
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.content-box-shadow {
    box-shadow: 0 20px 60px rgba(0,0,0,0.05);
}
.pengumuman-content-area p {
    margin-bottom: 25px;
}
.pengumuman-content-area img {
    border-radius: 15px;
    margin: 30px 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    max-width: 100%;
}
</style>