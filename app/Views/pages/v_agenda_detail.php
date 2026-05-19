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
                    <a href="<?= base_url('Agenda') ?>" class="breadcrumb-nav-link">
                        Agenda
                    </a>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text">Detail Kegiatan</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="row">
            <!-- Left part start -->
            <div class="col-lg-8 col-md-12">
                <div class="agenda-detail-premium">
                    <div class="agenda-header m-b30">
                        <h1 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem; line-height: 1.2;"><?= $agenda['nama_agenda'] ?></h1>
                        <div class="d-flex align-items-center m-t15 text-muted" style="font-weight: 600;">
                            <span class="m-r20"><i class="fa fa-calendar text-primary m-r5"></i> <?= date('d M Y', strtotime($agenda['tgl_mulai'])) ?></span>
                            <span><i class="fa fa-map-marker text-primary m-r5"></i> <?= $agenda['lokasi'] ?></span>
                        </div>
                    </div>
                    
                    <div class="agenda-media m-b40">
                        <img src="<?= base_url('cover/' . $agenda['cover_agenda']) ?>" alt="<?= $agenda['nama_agenda'] ?>" style="width: 100%; border-radius: 25px; box-shadow: 0 15px 45px rgba(0,0,0,0.1);">
                    </div>
                    
                    <div class="agenda-content glass-card p-a40 m-b40" style="background: #ffffff; border-radius: 25px; border: 1px solid #f0f0f0; box-shadow: 0 10px 40px rgba(0,0,0,0.02);">
                        <h4 class="m-b20" style="font-weight: 700; color: var(--biru-utama);">Deskripsi Kegiatan</h4>
                        <div class="content-text" style="line-height: 1.9; font-size: 1.1rem; color: #444;">
                            <?= $agenda['isi_agenda'] ?>
                        </div>
                    </div>
                    
                    <div class="share-post-premium p-a30 glass-card d-flex align-items-center justify-content-between m-b40" style="background: var(--biru-pastel); border-radius: 20px;">
                        <h6 class="m-b0" style="color: var(--biru-utama); font-weight: 700;">Bagikan agenda:</h6>
                        <ul class="d-flex m-b0" style="list-style: none; gap: 10px; padding: 0;">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" class="login-icon" style="padding: 10px 15px;"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text=<?= urlencode($agenda['nama_agenda'] . ' - ' . current_url()) ?>" target="_blank" class="login-icon" style="padding: 10px 15px;"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Side bar start -->
            <div class="col-lg-4 col-md-12">
                <aside class="side-bar sticky-top">
                    <div class="widget glass-card p-a30" style="background: var(--biru-tua); border-radius: 25px; color: white;">
                        <h4 class="widget-title style-1" style="color: white; border-bottom-color: rgba(255,255,255,0.2);">Detail Pelaksanaan</h4>
                        <ul class="event-info-list" style="list-style: none; padding: 0;">
                            <li class="m-b20">
                                <div class="d-flex align-items-center">
                                    <div class="icon-bx-sm bg-white rounded-circle text-primary m-r15 d-flex align-items-center justify-content-center" style="min-width: 45px; height: 45px;">
                                        <i class="fa fa-calendar" style="font-size: 1.2rem;"></i>
                                    </div>
                                    <div>
                                        <small style="opacity: 0.7; display: block; text-transform: uppercase; font-weight: 700; font-size: 0.7rem; letter-spacing: 1px;">Mulai</small>
                                        <span style="font-weight: 600; font-size: 1.05rem;"><?= date('d M Y', strtotime($agenda['tgl_mulai'])) ?></span>
                                    </div>
                                </div>
                            </li>
                            <li class="m-b20">
                                <div class="d-flex align-items-center">
                                    <div class="icon-bx-sm bg-white rounded-circle text-primary m-r15 d-flex align-items-center justify-content-center" style="min-width: 45px; height: 45px;">
                                        <i class="fa fa-calendar-check-o" style="font-size: 1.2rem;"></i>
                                    </div>
                                    <div>
                                        <small style="opacity: 0.7; display: block; text-transform: uppercase; font-weight: 700; font-size: 0.7rem; letter-spacing: 1px;">Selesai</small>
                                        <span style="font-weight: 600; font-size: 1.05rem;"><?= date('d M Y', strtotime($agenda['tgl_selesai'])) ?></span>
                                    </div>
                                </div>
                            </li>
                            <li class="m-b20">
                                <div class="d-flex align-items-center">
                                    <div class="icon-bx-sm bg-white rounded-circle text-primary m-r15 d-flex align-items-center justify-content-center" style="min-width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker" style="font-size: 1.2rem;"></i>
                                    </div>
                                    <div>
                                        <small style="opacity: 0.7; display: block; text-transform: uppercase; font-weight: 700; font-size: 0.7rem; letter-spacing: 1px;">Lokasi</small>
                                        <span style="font-weight: 600; font-size: 1.05rem;"><?= $agenda['lokasi'] ?></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
                        <hr style="border-top: 1px solid rgba(255,255,255,0.1); margin: 25px 0;">
                        
                        <div class="text-center">
                            <p style="font-size: 0.85rem; opacity: 0.8; margin-bottom: 20px;">Diterbitkan pada <?= date('d M Y', strtotime($agenda['tgl_post'])) ?></p>
                            <a href="<?= base_url('Contact') ?>" class="btn-premium-white btn-block" style="width: 100%;">Tanya Detail <i class="fa fa-whatsapp m-l10"></i></a>
                        </div>
                    </div>
                    
                    <div class="m-t30 text-center">
                        <a href="<?= base_url('Agenda') ?>" class="btn-premium-outline btn-block">
                            <i class="fa fa-arrow-left m-r10"></i> Kembali ke Daftar
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<style>
.event-info-list li span {
    display: block;
}
.agenda-content img {
    border-radius: 15px;
    margin: 20px 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
</style>