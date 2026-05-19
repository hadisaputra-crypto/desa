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
                    <a href="<?= base_url('Pasar') ?>" class="breadcrumb-nav-link">
                        Pasar Desa
                    </a>
                </li>
                <li class="breadcrumb-nav-item separator">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="breadcrumb-nav-item active">
                    <span class="breadcrumb-nav-text">Detail Produk</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="section-full content-inner bg-white">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-5 col-md-6 m-b30">
                <div class="product-detail-image">
                    <?php if ($produk['foto']): ?>
                        <img src="<?= base_url('produk/' . $produk['foto']) ?>" alt="<?= $produk['nama_produk'] ?>" class="img-fluid rounded shadow-sm">
                    <?php else: ?>
                        <div class="no-image-placeholder-detail">
                            <i class="fa fa-shopping-bag"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-7 col-md-6">
                <div class="product-detail-content">
                    <div class="badge badge-primary mb-3"><?= $produk['nama_kategori'] ?></div>
                    <h2 class="product-name mb-2"><?= $produk['nama_produk'] ?></h2>
                    
                    <div class="product-price-detail mb-4">
                        Rp <?= number_format($produk['harga'], 0, ',', '.') ?>
                        <?php if ($produk['satuan']): ?>
                            <span class="text-muted text-sm">/ <?= $produk['satuan'] ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="product-stock-info mb-4">
                        <span class="stock-label">Ketersediaan:</span>
                        <span class="stock-value <?= $produk['stok'] > 0 ? 'text-success' : 'text-danger' ?>">
                            <?= $produk['stok'] > 0 ? 'Stok Tersedia (' . $produk['stok'] . ' ' . $produk['satuan'] . ')' : 'Stok Habis' ?>
                        </span>
                    </div>

                    <div class="product-description mb-5">
                        <h5>Deskripsi Produk</h5>
                        <p><?= nl2br($produk['deskripsi']) ?></p>
                    </div>

                    <!-- Seller Info Box -->
                    <div class="seller-info-box p-4 rounded mb-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="seller-icon mr-3">
                                <i class="fa fa-university"></i>
                            </div>
                            <div>
                                <h6 class="mb-0"><?= $produk['nama_bumdes'] ?></h6>
                                <p class="text-muted small mb-0"><?= $produk['desa'] ?>, <?= $produk['kecamatan'] ?></p>
                            </div>
                        </div>
                        
                        <?php 
                        $phone = $produk['no_hp'];
                        // Clean phone number for WhatsApp
                        $wa_phone = preg_replace('/[^0-9]/', '', $phone);
                        if (strpos($wa_phone, '0') === 0) {
                            $wa_phone = '62' . substr($wa_phone, 1);
                        }
                        $message = rawurlencode("Halo, saya tertarik dengan produk " . $produk['nama_produk'] . " di Pasar Desa.");
                        $wa_url = "https://wa.me/" . $wa_phone . "?text=" . $message;
                        ?>

                        <div class="action-buttons">
                            <a href="<?= $wa_url ?>" target="_blank" class="btn btn-success btn-lg btn-block btn-wa">
                                <i class="fa fa-whatsapp mr-2"></i> Hubungi Penjual
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.product-detail-image img {
    width: 100%;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.no-image-placeholder-detail {
    width: 100%;
    aspect-ratio: 1/1;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    color: #dee2e6;
}

.no-image-placeholder-detail i {
    font-size: 8rem;
}

.product-name {
    color: #0d47a1;
    font-weight: 700;
}

.product-price-detail {
    font-size: 2rem;
    font-weight: 700;
    color: #e67e22;
}

.stock-label {
    font-weight: 600;
    margin-right: 10px;
}

.product-description h5 {
    border-bottom: 2px solid #1565c0;
    display: inline-block;
    padding-bottom: 5px;
    margin-bottom: 15px;
    color: #0d47a1;
}

.seller-info-box {
    background: #f0f7ff;
    border: 1px solid #d0e3ff;
}

.seller-icon {
    width: 50px;
    height: 50px;
    background: #1565c0;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.btn-wa {
    background-color: #25d366;
    border-color: #25d366;
    font-weight: 700;
    padding: 15px;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.btn-wa:hover {
    background-color: #128c7e;
    border-color: #128c7e;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
}
</style>
