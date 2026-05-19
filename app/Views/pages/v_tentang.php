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
                    <span class="breadcrumb-nav-text">Profil</span>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text">Tentang Kami</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<style>
.breadcrumb-row-premium {
    padding: 20px 0;
    background: #f8f9fa;
    border-bottom: 1px solid #eee;
}
.breadcrumb-nav-list {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 10px;
}
.breadcrumb-nav-item {
    display: flex;
    align-items: center;
}
.breadcrumb-nav-link {
    display: inline-flex;
    align-items: center;
    padding: 8px 16px;
    background: #fff;
    color: var(--biru-tua);
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    text-decoration: none !important;
}
.breadcrumb-nav-link:hover {
    background: var(--biru-utama);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(21, 101, 192, 0.2);
}
.breadcrumb-nav-text {
    padding: 8px 16px;
    background: #eef2f7;
    color: #666;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
}
.breadcrumb-nav-item.active .breadcrumb-nav-text {
    background: var(--biru-utama);
    color: #fff;
    box-shadow: 0 4px 10px rgba(21, 101, 192, 0.15);
}
.breadcrumb-nav-item.separator {
    color: #ccc;
    font-size: 0.8rem;
}
</style>

<div class="section-full content-inner-1 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Content Left -->
            <div class="col-lg-6 col-md-12 m-b30">
                <div class="section-head text-left">
                    <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;">Profil BUMDes</h2>
                    <div class="dlab-separator-outer">
                        <div class="dlab-separator bg-primary style-skew"></div>
                    </div>
                </div>
                <div class="about-text-content" style="font-size: 1.1rem; line-height: 1.8; color: #555;">
                    <?= $profil['tentang'] ?>
                </div>
                <div class="m-t30">
                    <a href="<?= base_url('Contact') ?>" class="btn-premium-solid">Hubungi Kami <i class="fa fa-phone m-l10"></i></a>
                </div>
            </div>
            
            <!-- Image Right -->
            <div class="col-lg-6 col-md-12 m-b30">
                <div class="about-img-box-right">
                    <img src="<?= base_url('cover/slider1.png') ?>" class="img-fluid rounded shadow-lg" alt="Tentang BUMDes">
                    <div class="about-tag-premium glass-card">
                        <h4 class="m-b0">Membangun Ekonomi</h4>
                        <span>Bumi Sakti Alam Kerinci</span>
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row m-t50">
            <div class="col-md-4 m-b30">
                <div class="icon-bx-wraper bx-style-1 p-a30 center fly-box glass-card">
                    <div class="icon-lg text-primary m-b20"> <a href="javascript:void(0);" class="icon-cell"><i class="fa fa-university"></i></a> </div>
                    <div class="icon-content">
                        <h5 class="dlab-tilte text-uppercase" style="font-weight: 700;">Legalitas Resmi</h5>
                        <p>Terdaftar dan diakui secara hukum sebagai unit usaha desa yang sah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-b30">
                <div class="icon-bx-wraper bx-style-1 p-a30 center fly-box glass-card">
                    <div class="icon-lg text-primary m-b20"> <a href="javascript:void(0);" class="icon-cell"><i class="fa fa-users"></i></a> </div>
                    <div class="icon-content">
                        <h5 class="dlab-tilte text-uppercase" style="font-weight: 700;">Berbasis Masyarakat</h5>
                        <p>Dikelola oleh warga desa untuk meningkatkan kesejahteraan bersama.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-b30">
                <div class="icon-bx-wraper bx-style-1 p-a30 center fly-box glass-card">
                    <div class="icon-lg text-primary m-b20"> <a href="javascript:void(0);" class="icon-cell"><i class="fa fa-line-chart"></i></a> </div>
                    <div class="icon-content">
                        <h5 class="dlab-tilte text-uppercase" style="font-weight: 700;">Pembangunan Desa</h5>
                        <p>Keuntungan digunakan kembali untuk pembangunan infrastruktur desa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.about-img-box-right {
    position: relative;
    padding-left: 30px;
}
.about-tag-premium {
    position: absolute;
    top: -20px;
    right: -20px;
    padding: 20px 30px;
    background: var(--biru-utama);
    color: white;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 15px 30px rgba(21, 101, 192, 0.3);
}
.about-tag-premium h4 { color: white; font-weight: 800; font-size: 1.1rem; }
.about-tag-premium span { font-size: 0.8rem; opacity: 0.9; }
.about-text-content p { margin-bottom: 20px; }
.fly-box:hover {
    transform: translateY(-10px);
    border-color: var(--biru-utama);
}
</style>