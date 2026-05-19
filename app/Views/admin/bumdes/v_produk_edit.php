<div class="col-md-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
        </div>
        <form action="<?= base_url('admin/bumdes/produk/update/' . $produk['id_produk']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="form-group">
                    <label>BUMDes</label>
                    <select name="id_bumdes" class="form-control" required>
                        <option value="">-- Pilih BUMDes --</option>
                        <?php foreach ($bumdes_list as $b) : ?>
                            <option value="<?= $b['id_bumdes'] ?>" <?= ($produk['id_bumdes'] == $b['id_bumdes']) ? 'selected' : '' ?>><?= $b['nama_bumdes'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="<?= $produk['nama_produk'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $produk['stok'] ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"><?= $produk['deskripsi'] ?></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/bumdes/produk/' . $produk['id_bumdes']) ?>" class="btn btn-default">Kembali</a>
            </div>
        </form>
    </div>
</div>
