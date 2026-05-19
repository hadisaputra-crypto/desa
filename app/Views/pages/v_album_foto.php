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
                    <span class="breadcrumb-nav-text">Gallery</span>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text">Album Foto</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;">Album Galeri</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p class="sub-title">Kumpulan momen dan dokumentasi kegiatan pembangunan serta potensi desa Kerinci.</p>
        </div>

        <div class="row">
            <?php 
            $db = \Config\Database::connect();
            foreach ($album as $key => $value) {
                $jml = $db->table('tbl_foto')->where('id_album', $value['id_album'])->countAllResults();
            ?>
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="album-premium-card glass-card overflow-hidden h-100">
                        <div class="album-cover">
                            <a href="<?= base_url('AlbumFoto/Foto/' . $value['id_album']) ?>">
                                <img src="<?= base_url('foto/' . $value['cover_album']) ?>" alt="<?= $value['nama_album'] ?>" style="height: 280px; width: 100%; object-fit: cover;">
                            </a>
                            <div class="album-count">
                                <i class="fa fa-picture-o m-r5"></i> <?= $jml ?> Foto
                            </div>
                        </div>
                        <div class="album-info p-a25 text-center">
                            <h5 class="m-b15" style="font-weight: 700;">
                                <a href="<?= base_url('AlbumFoto/Foto/' . $value['id_album']) ?>" style="color: var(--biru-tua);">
                                    <?= $value['nama_album'] ?>
                                </a>
                            </h5>
                            <a href="<?= base_url('AlbumFoto/Foto/' . $value['id_album']) ?>" class="btn-premium-solid btn-block">Lihat Album</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<style>
.album-premium-card {
    transition: all 0.3s ease;
    border: 1px solid #eee;
}
.album-premium-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(21, 101, 192, 0.1);
    border-color: var(--biru-utama);
}
.album-cover {
    position: relative;
    overflow: hidden;
}
.album-cover img {
    transition: all 0.5s ease;
}
.album-premium-card:hover .album-cover img {
    transform: scale(1.1);
}
.album-count {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: var(--biru-utama);
    color: white;
    padding: 5px 15px;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 700;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}
</style>