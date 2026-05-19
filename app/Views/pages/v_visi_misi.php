<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li>Profil</li>
            <li>Visi & Misi</li>
        </ul>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;">Visi & Misi</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p class="sub-title">Arah dan tujuan strategis BUMDes Digital Kerinci dalam membangun ekonomi desa yang berkelanjutan.</p>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="visi-box glass-card p-a50 m-b40 text-center">
                    <h3 class="m-b20" style="color: var(--biru-utama); font-weight: 700;">VISI</h3>
                    <div class="visi-content" style="font-size: 1.4rem; font-style: italic; line-height: 1.6; color: #333;">
                        <?= $profil['visi_misi'] ?>
                    </div>
                </div>
                
                <div class="motto-box text-center m-b50">
                    <h4 class="text-primary" style="font-weight: 600; letter-spacing: 2px;">#MembangunDesa #EkonomiMandiri</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.visi-box {
    border-top: 5px solid var(--biru-utama);
    position: relative;
}
.visi-box::before {
    content: '"';
    position: absolute;
    top: 20px;
    left: 40px;
    font-size: 5rem;
    color: var(--biru-pastel);
    font-family: serif;
    opacity: 0.5;
}
</style>