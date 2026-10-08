
<style>
  .dashboard-sections {
    width: 100%;
}

.dashboard-section {
    display: block;
    clear: both;
    margin: 1rem;
}

.dashboard-section .card {
    width: 100%;
    margin-bottom: 0;
}

</style>
<?php
$sections = [
    [
        'title' => 'Website',
        'icon'  => 'fas fa-globe',
        'color' => 'lightblue',
        'items' => [
            [
                'count' => $total_berita,
                'label' => 'Berita',
                'icon'  => 'fas fa-newspaper',
                'color' => 'primary',
                'url'   => 'admin/berita',
            ],
            [
                'count' => $total_agenda,
                'label' => 'Agenda',
                'icon'  => 'fas fa-calendar',
                'color' => 'info',
                'url'   => 'admin/agenda',
            ],
            [
                'count' => $total_pengumuman,
                'label' => 'Pengumuman',
                'icon'  => 'fas fa-bullhorn',
                'color' => 'warning',
                'url'   => 'admin/pengumuman',
            ],
            [
                'count' => $total_layanan,
                'label' => 'Layanan Publik',
                'icon'  => 'fas fa-concierge-bell',
                'color' => 'olive',
                'url'   => 'admin/layanan',
            ],
            [
                'count' => $total_lembaga,
                'label' => 'Kerjasama',
                'icon'  => 'fas fa-building',
                'color' => 'teal',
                'url'   => 'admin/lembaga',
            ],
            [
                'count' => $total_dokumen,
                'label' => 'Dokumen',
                'icon'  => 'fas fa-file',
                'color' => 'danger',
                'url'   => 'admin/dokumen',
            ],
            [
                'count' => $total_album,
                'label' => 'Foto',
                'icon'  => 'fas fa-images',
                'color' => 'maroon',
                'url'   => 'admin/foto',
            ],
            [
                'count' => $total_video,
                'label' => 'Video',
                'icon'  => 'fas fa-video',
                'color' => 'purple',
                'url'   => 'admin/video',
            ],
        ],
    ],

    [
        'title' => 'BUMDes',
        'icon'  => 'fas fa-shop',
        'color' => 'primary',
        'items' => [
            [
                'count' => $total_bumdes,
                'label' => 'Data BUMDes',
                'icon'  => 'fas fa-shop',
                'color' => 'primary',
                'url'   => 'admin/bumdes',
            ],
            [
                'count' => $total_unit,
                'label' => 'Unit Usaha',
                'icon'  => 'fas fa-store',
                'color' => 'secondary',
                'url'   => 'admin/bumdes/unitusaha',
            ],
            [
                'count' => $total_anggota,
                'label' => 'Anggota',
                'icon'  => 'fas fa-users',
                'color' => 'success',
                'url'   => 'admin/bumdes/anggota',
            ],
            [
                'count' => $total_produk,
                'label' => 'Produk',
                'icon'  => 'fas fa-box',
                'color' => 'info',
                'url'   => 'admin/bumdes/produk',
            ],
            [
                'count' => $total_transaksi,
                'label' => 'Transaksi',
                'icon'  => 'fas fa-exchange-alt',
                'color' => 'danger',
                'url'   => 'admin/bumdes/transaksi',
            ],
            [
                'count' => $total_layanan,
                'label' => 'Layanan BUMDes',
                'icon'  => 'fas fa-concierge-bell',
                'color' => 'warning',
                'url'   => 'admin/bumdes/layanan',
            ],
        ],
    ],

    [
        'title' => 'Akun & Pengaturan',
        'icon'  => 'fas fa-user-shield',
        'color' => 'maroon',
        'items' => [
            [
                'count' => $total_user,
                'label' => 'Semua Pengguna',
                'icon'  => 'fas fa-users-cog',
                'color' => 'navy',
                'url'   => 'admin/user',
            ],
            [
                'count' => $total_slider,
                'label' => 'Slider',
                'icon'  => 'fas fa-images',
                'color' => 'orange',
                'url'   => 'admin/slider',
            ],
        ],
    ],
];
?>

<!-- SEMUA SECTION -->
<div class="dashboard-sections">

    <?php foreach ($sections as $section): ?>

        <!-- SATU SECTION = SATU BARIS PENUH -->
        <div class="dashboard-section">

            <div class="card card-outline card-<?= esc($section['color']) ?>">

                <!-- HEADER SECTION -->
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="<?= esc($section['icon']) ?> mr-2"></i>
                        <?= esc($section['title']) ?>
                    </h3>
                </div>

                <!-- ITEM SECTION -->
                <div class="card-body">

                    <div class="row">

                        <?php foreach ($section['items'] as $item): ?>

                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">

                                <div class="small-box bg-<?= esc($item['color']) ?>">

                                    <div class="inner">
                                        <h3><?= esc($item['count']) ?></h3>
                                        <p><?= esc($item['label']) ?></p>
                                    </div>

                                    <div class="icon">
                                        <i class="<?= esc($item['icon']) ?>"></i>
                                    </div>

                                    <a
                                        href="<?= base_url($item['url']) ?>"
                                        class="small-box-footer"
                                    >
                                        Kelola
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>
