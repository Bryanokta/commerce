<?= $this->extend('BackOffice/Layout/master'); ?>

<?= $this->section('content'); ?>
<div class="row">
<div class="col-6">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close ml-5" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        </div>
    <?php endif ?>
</div>
</div>
<a class="btn btn-primary my-3" href="/produk/tambah" role="button">Tambah</a>
<table class="table table-striped">
    <thead class="table-info">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Gambar Produk</th>
            <th scope="col">Stok Produk</th>
            <th scope="col">Deskripsi Produk</th>
            <th scope="col">Harga Produk</th>
            <th scope="col" class="text-center">Menu</th>
        </tr>
    </thead>
    <tbody class="table-group-divider table-bordered">
        <?php $i = 1; ?>
        <?php foreach ($raw_produk as $produk) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $produk['nama_produk']; ?></td>
                <td><img src="/img/<?= $produk['gambar_produk']; ?>" alt="" width="100"></td>
                <td><?= $produk['stok_produk']; ?></td>
                <td><?= $produk['deskripsi_produk']; ?></td>
                <td><?= $produk['harga_produk']; ?></td>
                <td>
                    <form action="/produk/<?= $produk['id']; ?>" method="post" class="d-inline" >
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah njenengan yakin');" title="Hapus"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    <a href="/produk/edit/<?= $produk['id']; ?>" class="btn btn-warning ml-3"><i class="fa-regular fa-pen-to-square"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>