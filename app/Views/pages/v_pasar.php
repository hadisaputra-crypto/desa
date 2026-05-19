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
                    <span class="breadcrumb-nav-text">Pasar Desa</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title">Pasar Desa Kerinci</h2>
            <div class="dlab-separator-outer">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p class="sub-title">Jelajahi produk-produk unggulan dari BUMDes dan UMKM lokal Bumi Sakti Alam Kerinci</p>
        </div>

        <div class="row">
            <?php if (empty($produk)): ?>
                <div class="col-12 text-center p-5">
                    <div class="alert alert-info glass-card">
                        <i class="fa fa-info-circle mr-2"></i> Belum ada produk yang tersedia saat ini. Silakan kembali lagi nanti.
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($produk as $key => $value): ?>
                    <div class="col-lg-3 col-md-6 m-b30">
                        <div class="product-premium-card">
                            <div class="product-img">
                                <a href="<?= base_url('Pasar/Detail/' . $value['id_produk']) ?>">
                                    <?php if ($value['foto']): ?>
                                        <img src="<?= base_url('produk/' . $value['foto']) ?>" alt="<?= $value['nama_produk'] ?>">
                                    <?php else: ?>
                                        <img src="<?= base_url('front/images/product/no-image.jpg') ?>" alt="No Image">
                                    <?php endif; ?>
                                </a>
                                <div class="product-tag"><?= $value['nama_kategori'] ?></div>
                            </div>
                            <div class="product-body">
                                <h6 class="product-name">
                                    <a href="<?= base_url('Pasar/Detail/' . $value['id_produk']) ?>">
                                        <?= $value['nama_produk'] ?>
                                    </a>
                                </h6>
                                <div class="product-price">
                                    Rp <?= number_format($value['harga'], 0, ',', '.') ?>
                                </div>
                                <div class="product-meta">
                                    <div class="bumdes-name">
                                        <i class="fa fa-university"></i> <?= $value['nama_bumdes'] ?>
                                    </div>
                                </div>
                                <a href="<?= base_url('Pasar/Detail/' . $value['id_produk']) ?>" class="btn-buy">
                                    Detail Produk
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


