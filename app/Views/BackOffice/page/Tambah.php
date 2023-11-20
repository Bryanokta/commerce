<?= $this->extend('BackOffice/Layout/master'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h4>Form Input Produk</h4>
    </div>
    <form action="/produk/save" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="nama_produk">Nama</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
            </div>
            <div class="form-group">
                <label for="gambar_produk" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="gambar_produk" name="gambar_produk" required>
            </div>
            <div class="row g-3">
                <div class="form-group col-md-6">
                    <label for="stok_produk">Stok</label>
                    <input type="number" class="form-control" id="stok_produk" name="stok_produk" required>
                </div>
                <div class="form_group col-md-6">
                    <label for="harga_produk">Harga</label>
                    <input type="number" class="form-control" id="harga_produk" name="harga_produk" required>
                </div>
            </div>
            <div class="form_group">
                <label for="deskripsi_produk">Deskripsi produk</label>
                <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" required>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>