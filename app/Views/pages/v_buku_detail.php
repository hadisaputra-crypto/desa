<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= base_url('images/bg-breadcrumb.jpg') ?>);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white"><?= $buku['judul_buku'] ?></h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="javascript:void(0);">Buku</a></li>
                    <li>Detail Buku</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->

<!-- contact area -->
<div class="content-block">

    <div class="section-full content-inner">
        <div class="container">
            <!-- <div class="sort-title clearfix text-center">
                <h4>Daftar Buku</h4>
            </div>
            -->
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="row mt-30-reverse">
                        <div class="col-md-3">
                            <img src="<?= base_url('cover/' . $buku['cover_buku']) ?>" alt="<?= $buku['judul_buku'] ?>">
                        </div>
                        <div class="col-md-9">
                            <div class="tm-blog-content">
                                <div class="tm-blog-meta">
                                    <span><i class="fa fa-calendar-o"></i><?= date('d M Y', strtotime($buku["create_at"]));   ?></span>
                                </div>
                                <h3><?= $buku['judul_buku'] ?></h3>
                                <p style='text-align: justify ;'><?= $buku['deskripsi_buku'] ?></p>
                                <div class="tm-prodetails-tags">
                                    <h6>ISBN :<a href="https://isbn.perpusnas.go.id/Account/SearchBuku?searchTxt=<?= $buku['isbn'] ?>&searchCat=ISBN" target="_blank"><?= $buku['isbn'] ?></a></h6>
                                </div>
                                <div class="tm-prodetails-tags">
                                    <h6>Penulis :<?= $buku['penulis_buku'] ?></h6>
                                </div>
                                <div class="tm-prodetails-tags">
                                    <h6>Halaman :<?= $buku['halaman_buku'] ?> Hal</h6>
                                </div>
                                <div class="tm-prodetails-tags">
                                    <h6>Terbit :<?= date('d M Y', strtotime($buku["tgl_terbit"]));   ?></h6>
                                </div>
                                <div class="tm-prodetails-tags">
                                    <h6>Harga :<b style="color: green;">Rp. <?= number_format($buku['harga_buku'], 0) ?></b></h6>
                                </div>

                                <a href="https://api.whatsapp.com/send?phone=6285156829831" target="_blank" class="btn btn-default" style="background-color:  #233785; color: white;"><i class="fa fa-shopping-cart"></i> Order</a>
                                <a href="<?= base_url('Buku') ?>" class="btn btn-default" style="background-color:  #233785; color: white;">Kembali</a>
                            </div>




                        </div>

                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </div>
</div>


