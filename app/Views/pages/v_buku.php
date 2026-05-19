<!-- inner page banner -->
<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(<?= base_url('images/bg-breadcrumb.jpg') ?>);">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">Buku</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="javascript:void(0);">Buku</a></li>
                    <li>Daftar Buku</li>
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
            <div class="sort-title clearfix text-center">
                <h4>Daftar Buku</h4>
            </div>
           
            <div class="row mt-30-reverse">
                <?php foreach ($buku as $key => $value) { ?>
                    <div class="col-sm-6">
                        <table class="table table-bordered">
                            <tr>
                                <td width="150px">
                                    <img src="<?= base_url('cover/' . $value['cover_buku']) ?>" width="150px" alt="<?= $value['judul_buku'] ?>">
                                </td>
                                <td class="text-left">
                                    <h6 class="card-title"><b><?= $value['judul_buku'] ?></b></h6>
                                    <p>
                                        ISBN : <a href="https://isbn.perpusnas.go.id/Account/SearchBuku?searchTxt=<?= $value['isbn'] ?>&searchCat=ISBN" target="_blank"><?= $value['isbn'] ?></a><br>
                                        Harga : <b style="color: green;">Rp. <?= number_format($value['harga_buku'], 0) ?></b>
                                    </p>
                                    <a href="https://api.whatsapp.com/send?phone=6285156829831" target="_blank" class="btn btn-default" style="background-color:  #233785; color: white;"><i class="fa fa-shopping-cart"></i> Order</a>
                                    <a href="<?= base_url('Buku/Detail/' . $value['slug_buku']) ?>" class="btn btn-default" style="background-color:  #233785; color: white;"><i class="fa fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        </table>


                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

