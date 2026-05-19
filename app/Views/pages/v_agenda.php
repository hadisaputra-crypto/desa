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
                    <span class="breadcrumb-nav-text">Agenda</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title" style="color: var(--biru-tua); font-weight: 800;">Agenda Kegiatan</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p>Jadwal kegiatan, acara, dan program kerja BUMDes Kerinci yang akan datang.</p>
        </div>
        
        <div class="row">
            <?php foreach ($agenda as $key => $value) { ?>
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="news-premium-card h-100 glass-card">
                        <div class="news-img">
                            <a href="<?= base_url('Agenda/Detail/' . $value['id_agenda']) ?>">
                                <img src="<?= base_url('cover/' . $value['cover_agenda']) ?>" alt="<?= $value['nama_agenda'] ?>" style="height: 240px; object-fit: cover;">
                            </a>
                            <div class="news-date">
                                <span><?= date('d', strtotime($value['tgl_mulai'])) ?></span>
                                <strong><?= date('M', strtotime($value['tgl_mulai'])) ?></strong>
                            </div>
                        </div>
                        <div class="news-body">
                            <div class="news-meta">
                                <ul class="d-flex align-items-center" style="list-style: none; padding: 0; gap: 15px; font-size: 0.85rem; color: #666;">
                                    <li><i class="fa fa-map-marker text-primary"></i> <?= substr($value['lokasi'], 0, 30) ?><?= strlen($value['lokasi']) > 30 ? '...' : '' ?></li>
                                </ul>
                            </div>
                            <h5 class="news-title m-b20" style="font-weight: 700; line-height: 1.4;">
                                <a href="<?= base_url('Agenda/Detail/' . $value['id_agenda']) ?>" style="color: var(--biru-tua);">
                                    <?= $value['nama_agenda'] ?>
                                </a>
                            </h5>
                            <div class="m-b20" style="font-size: 0.95rem; line-height: 1.6; color: #555;">
                                <?= substr(strip_tags($value['isi_agenda']), 0, 100) ?>...
                            </div>
                            <a href="<?= base_url('Agenda/Detail/' . $value['id_agenda']) ?>" class="btn-premium-outline" style="padding: 10px 20px; font-size: 0.85rem; width: 100%; text-align: center;">Lihat Detail <i class="fa fa-arrow-right m-l10"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <?php if (empty($agenda)) { ?>
                <div class="col-12 text-center p-tb50">
                    <div class="icon-bx-lg bg-gray m-b20 d-inline-block rounded-circle">
                        <i class="fa fa-calendar-times-o text-muted"></i>
                    </div>
                    <h4 class="text-muted">Belum ada agenda kegiatan saat ini.</h4>
                </div>
            <?php } ?>
        </div>
    </div>
</div>