<?= $this->extend('BackOffice/Layout/master'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h4>Form Edit Produk</h4>
    </div>
    <form action="/produk/update/<?= $produk['id']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?= $produk['gambar_produk']; ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="nama_produk">Nama</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required value="<?= $produk['nama_produk']; ?>">
            </div>
            <div class="form-group">
                <label for="gambar_produk" class="form-label">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar_produk" name="gambar_produk">
                    <label class="custom-file-label" for="gambar_produk">Pilih Gambar</label>
                </div>
            </div>
            <div class="row g-3">
                <div class="form-group col-md-6">
                    <label for="stok_produk">Stok</label>
                    <input type="number" class="form-control" id="stok_produk" name="stok_produk" required value="<?= $produk['stok_produk']; ?>">
                </div>
                <div class="form_group col-md-6">
                    <label for="harga_produk">Harga</label>
                    <input type="number" class="form-control" id="harga_produk" name="harga_produk" required value="<?= $produk['harga_produk']; ?>">
                </div>
            </div>
            <div class="form_group">
                <label for="deskripsi_produk">Deskripsi produk</label>
                <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" required value="<?= $produk['deskripsi_produk']; ?>">
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>