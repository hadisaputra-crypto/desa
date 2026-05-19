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
                    <span class="breadcrumb-nav-text">Hubungi Kami</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner-2 bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;">Hubungi Kami</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p class="sub-title">Kami siap melayani Anda. Hubungi kami melalui kanal informasi resmi BUMDes Digital Kerinci.</p>
        </div>

        <div class="row align-items-stretch">
            <div class="col-lg-4 m-b30">
                <div class="contact-info-card glass-card h-100 p-a40 text-center">
                    <div class="contact-icon m-b20">
                        <i class="ti-location-pin" style="font-size: 3.5rem; color: var(--biru-utama);"></i>
                    </div>
                    <h4 class="m-b15" style="font-weight: 700; color: var(--biru-tua);">Alamat Kantor</h4>
                    <p class="m-b0" style="line-height: 1.6; color: #555;"><?= $profil['alamat'] ?></p>
                </div>
            </div>
            <div class="col-lg-4 m-b30">
                <div class="contact-info-card glass-card h-100 p-a40 text-center">
                    <div class="contact-icon m-b20">
                        <i class="ti-headphone-alt" style="font-size: 3.5rem; color: var(--biru-utama);"></i>
                    </div>
                    <h4 class="m-b15" style="font-weight: 700; color: var(--biru-tua);">Telepon / WA</h4>
                    <p class="m-b0" style="font-size: 1.1rem; color: #555; font-weight: 600;"><?= $profil['telpon'] ?></p>
                </div>
            </div>
            <div class="col-lg-4 m-b30">
                <div class="contact-info-card glass-card h-100 p-a40 text-center">
                    <div class="contact-icon m-b20">
                        <i class="ti-email" style="font-size: 3.5rem; color: var(--biru-utama);"></i>
                    </div>
                    <h4 class="m-b15" style="font-weight: 700; color: var(--biru-tua);">Email Resmi</h4>
                    <p class="m-b0" style="color: #555;"><?= $profil['email'] ?></p>
                </div>
            </div>
        </div>

        <div class="row m-t50">
            <div class="col-lg-12">
                <div class="social-connect-box glass-card p-a50 text-center" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border: 1px solid #eee;">
                    <h4 class="m-b35" style="font-weight: 700; color: var(--biru-tua);">Terhubung Melalui Media Sosial</h4>
                    <div class="social-icons-premium">
                        <a href="<?= $profil['fb'] ?>" class="social-btn fb"><i class="fa fa-facebook"></i></a>
                        <a href="<?= $profil['yt'] ?>" class="social-btn yt"><i class="fa fa-youtube-play"></i></a>
                        <a href="<?= $profil['ig'] ?>" class="social-btn ig"><i class="fa fa-instagram"></i></a>
                        <a href="<?= $profil['twitter'] ?>" class="social-btn tw"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-info-card {
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    border: 1px solid #f0f0f0;
}
.contact-info-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(21, 101, 192, 0.12);
    border-color: var(--biru-utama);
}
.social-icons-premium {
    display: flex;
    justify-content: center;
    gap: 25px;
}
.social-btn {
    width: 65px;
    height: 65px;
    line-height: 65px;
    border-radius: 18px;
    font-size: 1.8rem;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
.fb { background: #3b5998; }
.yt { background: #ff0000; }
.ig { background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); }
.tw { background: #1da1f2; }
.social-btn:hover {
    transform: translateY(-8px) scale(1.05) rotate(5deg);
    color: white;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}
</style>