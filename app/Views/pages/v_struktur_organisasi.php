<div class="breadcrumb-row">
    <div class="container">
        <ul class="list-inline">
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li>Profil</li>
            <li>Struktur Organisasi</li>
        </ul>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title" style="color: var(--biru-tua); font-weight: 800; font-size: 2.5rem;">Struktur Organisasi</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p class="sub-title">Susunan kepengurusan BUMDes Digital Kerinci yang profesional dan berintegritas.</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="structure-img-wrapper glass-card p-a20 text-center m-b50">
                    <img src="<?= base_url('images/') . $profil['struktur_organisasi'] ?>" class="img-fluid rounded shadow" alt="Struktur Organisasi BUMDes" style="max-width: 100%; height: auto;">
                    
                    <div class="m-t30 text-muted italic">
                        <p><i class="fa fa-info-circle m-r5"></i> Bagan organisasi resmi periode berjalan.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row text-center m-t30">
            <div class="col-md-4 m-b30">
                <div class="p-a30 glass-card">
                    <h5 class="text-primary m-b10">Penasehat</h5>
                    <p class="m-b0">Kepala Desa</p>
                </div>
            </div>
            <div class="col-md-4 m-b30">
                <div class="p-a30 glass-card">
                    <h5 class="text-primary m-b10">Pengawas</h5>
                    <p class="m-b0">Ketua BPD</p>
                </div>
            </div>
            <div class="col-md-4 m-b30">
                <div class="p-a30 glass-card">
                    <h5 class="text-primary m-b10">Operasional</h5>
                    <p class="m-b0">Direktur BUMDes</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.structure-img-wrapper {
    background: #f8f9fa;
    border: 1px solid #eee;
}
.structure-img-wrapper img {
    transition: all 0.3s ease;
}
.structure-img-wrapper:hover img {
    transform: scale(1.02);
}
</style>