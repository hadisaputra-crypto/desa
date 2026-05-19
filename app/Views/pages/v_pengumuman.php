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
                    <span class="breadcrumb-nav-text">Pengumuman</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title" style="color: var(--biru-tua); font-weight: 800;">Pengumuman Desa</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p>Informasi resmi dan pengumuman terbaru dari Pemerintah Desa untuk warga.</p>
        </div>
        
        <div class="row">
            <?php foreach ($pengumuman as $key => $value) { ?>
                <div class="col-lg-6 m-b30">
                    <div class="icon-bx-wraper bx-style-1 p-a30 left fly-box glass-card h-100">
                        <div class="icon-lg text-primary m-b20"> 
                            <a href="<?= base_url('Pengumuman/Detail/' . $value['id_pengumuman']) ?>" class="icon-cell"><i class="fa fa-bullhorn"></i></a> 
                        </div>
                        <div class="icon-content p-l20">
                            <h5 class="dlab-tilte" style="font-weight: 700; font-size: 1.25rem;">
                                <a href="<?= base_url('Pengumuman/Detail/' . $value['id_pengumuman']) ?>" class="text-primary"><?= $value['judul_pengumuman'] ?></a>
                            </h5>
                            <div class="m-b20 text-muted" style="font-size: 0.9rem;">
                                <i class="fa fa-calendar m-r5"></i> <?= date('d M Y', strtotime($value['tgl_pengumuman'])) ?>
                            </div>
                            <div class="m-b20" style="line-height: 1.6; color: #555;">
                                <?= substr(strip_tags($value['isi_pengumuman']), 0, 150) ?>...
                            </div>
                            <a href="<?= base_url('Pengumuman/Detail/' . $value['id_pengumuman']) ?>" class="btn-premium-solid" style="padding: 10px 20px; font-size: 0.9rem;">Baca Selengkapnya <i class="fa fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <?php if (empty($pengumuman)) { ?>
                <div class="col-12 text-center p-tb50">
                    <div class="icon-bx-lg bg-gray m-b20 d-inline-block rounded-circle">
                        <i class="fa fa-info-circle text-muted"></i>
                    </div>
                    <h4 class="text-muted">Belum ada pengumuman saat ini.</h4>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<style>
.fly-box {
    transition: all 0.3s ease;
    border: 1px solid #eee;
}
.fly-box:hover {
    transform: translateY(-10px);
    border-color: var(--biru-utama);
    box-shadow: 0 15px 30px rgba(21, 101, 192, 0.1);
}
</style>