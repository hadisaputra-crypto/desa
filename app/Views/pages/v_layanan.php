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
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text">Layanan</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner-2 bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title">Layanan Pusat BUMDes</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p class="sub-title">Pusat pelayanan terpadu untuk kemudahan akses informasi dan administrasi bagi seluruh elemen masyarakat desa.</p>
        </div>

        <div class="row">
            <?php if (empty($layanan)): ?>
                <div class="col-12 text-center p-5">
                    <div class="alert alert-info glass-card">
                        <i class="fa fa-info-circle mr-2"></i> Belum ada layanan pusat yang tersedia saat ini.
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($layanan as $key => $value): ?>
                    <div class="col-lg-4 col-md-6 m-b30">
                        <div class="service-box-card text-center h-100 glass-card">
                            <a href="<?= base_url('Layanan/Detail/' . $value['id_layanan_pusat']) ?>" class="d-block p-4">
                                <div class="service-icon m-b20">
                                    <i class="fa fa-file-text-o" style="font-size: 3rem; color: var(--biru-utama);"></i>
                                </div>
                                <div class="service-info">
                                    <h5 class="title m-b10" style="font-weight: 700; color: var(--biru-tua);"><?= $value['nama_layanan'] ?></h5>
                                    <p class="m-b20 text-muted" style="font-size: 0.9rem;"><?= $value['instansi'] ?? 'Instansi Terkait' ?></p>
                                    <div class="service-excerpt m-b20 text-left" style="font-size: 0.85rem; color: #666; line-height: 1.6;">
                                        <?= substr(strip_tags($value['deskripsi'] ?? 'Pelayanan profesional untuk masyarakat.'), 0, 100) ?>...
                                    </div>
                                    <span class="btn-premium-solid btn-block">Lihat Detail Layanan</span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.service-box-card {
    transition: all 0.3s ease;
    border: 1px solid #eee;
}
.service-box-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(21, 101, 192, 0.15);
    border-color: var(--biru-utama);
}
.service-icon {
    transition: all 0.3s ease;
}
.service-box-card:hover .service-icon {
    transform: scale(1.1);
}
</style>
