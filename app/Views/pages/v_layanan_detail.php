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
                    <a href="<?= base_url('Layanan') ?>" class="breadcrumb-nav-link">
                        Layanan
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

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-detail-header m-b30">
                    <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;"><?= $layanan['nama_layanan'] ?></h2>
                    <div class="service-meta d-flex align-items-center m-b20">
                        <span class="badge badge-primary p-2" style="background: var(--biru-utama);"><?= $layanan['instansi'] ?? 'Pemerintah Desa' ?></span>
                        <span class="m-l20 text-muted"><i class="fa fa-calendar m-r5"></i> Terakhir Diperbarui: <?= date('d M Y', strtotime($layanan['updated_at'])) ?></span>
                    </div>
                </div>

                <div class="service-media m-b30">
                    <?php if ($layanan['foto']): ?>
                        <img src="<?= base_url('cover/' . $layanan['foto']) ?>" class="img-fluid rounded shadow-lg" alt="<?= $layanan['nama_layanan'] ?>" style="width: 100%; height: auto; max-height: 500px; object-fit: cover;">
                    <?php else: ?>
                        <div class="no-image-placeholder rounded glass-card p-5 text-center">
                            <i class="fa fa-file-text-o" style="font-size: 5rem; color: var(--biru-pastel);"></i>
                            <p class="m-t20">Aset gambar tidak tersedia</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="service-description m-b40">
                    <h4 class="m-b15" style="border-left: 4px solid var(--biru-utama); padding-left: 15px;">Deskripsi Layanan</h4>
                    <div class="description-content" style="line-height: 1.8; color: #444; font-size: 1.05rem;">
                        <?= $layanan['deskripsi'] ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 m-b30">
                        <div class="glass-card p-4 h-100">
                            <h5 class="m-b20" style="color: var(--biru-utama);"><i class="fa fa-list-check m-r10"></i> Persyaratan</h5>
                            <div class="requirements-content" style="font-size: 0.95rem; line-height: 1.6;">
                                <?= $layanan['syarat'] ?: '<p class="text-muted italic">Tidak ada persyaratan khusus.</p>' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 m-b30">
                        <div class="glass-card p-4 h-100">
                            <h5 class="m-b20" style="color: var(--biru-utama);"><i class="fa fa-tasks m-r10"></i> Prosedur</h5>
                            <div class="procedure-content" style="font-size: 0.95rem; line-height: 1.6;">
                                <?= $layanan['prosedur'] ?: '<p class="text-muted italic">Hubungi petugas untuk informasi prosedur.</p>' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <aside class="side-bar sticky-top" style="top: 100px;">
                    <div class="widget">
                        <div class="contact-card glass-card p-4 text-center">
                            <h5 class="m-b20">Butuh Bantuan?</h5>
                            <p class="m-b25">Jika Anda memiliki pertanyaan mengenai layanan ini, silakan hubungi pusat informasi kami.</p>
                            <a href="<?= base_url('Contact') ?>" class="btn-premium-solid btn-block">Hubungi Petugas <i class="fa fa-whatsapp m-l5"></i></a>
                        </div>
                    </div>
                    
                    <div class="widget widget_archive">
                        <h5 class="widget-title style-1">Layanan Lainnya</h5>
                        <ul>
                            <?php 
                            $db = \Config\Database::connect();
                            $others = $db->table('tbl_layanan_pusat')->where('id_layanan_pusat !=', $layanan['id_layanan_pusat'])->limit(5)->get()->getResultArray();
                            foreach ($others as $other): 
                            ?>
                                <li><a href="<?= base_url('Layanan/Detail/' . $other['id_layanan_pusat']) ?>"><?= $other['nama_layanan'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<style>
.service-detail-header .title {
    margin: 0;
}
.service-meta {
    font-size: 0.9rem;
}
.service-description h4 {
    font-weight: 700;
}
.glass-card {
    border: 1px solid rgba(0,0,0,0.05);
}
</style>