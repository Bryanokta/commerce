<?= $this->extend('FrontEnd/Layout/master'); ?>

<?= $this->section('content'); ?>
<!-- alert -->
<div class="container mt-3 text-center">
    <div class="row justify-content-center">
        <div class="col-6">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-dismissible show fade text-light fw-bold" style="background-color: #190482;">
                    <div class="alert-body">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/keranjang/update" method="post">
                    <div class="col-md-6">


                        <input type="hidden" class="form-control id_hidden" name="id_hidden" name="id_hidden1" value="">
                        <h1 id="id_hidden2"></h1>

                        <label for="jumlah_pesanan" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah_pesanan" id="jumlah_pesanan" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- title -->
<!-- table keranjang -->
<div class=" container bg-secondary-subtle mt-3 mb-5 p-5 border border-3 border-dark-subtle">
    <div class="text-center">
        <h1 class="fw-bold keranjang-title">Keranjang<i class="fa-solid fa-cart-shopping"></i></h1>
    </div>
    <a href="/" class="btn text-light mb-3" style="background-color: #190482;"><i class="fa-solid fa-arrow-left"></i></a>
    <table class="table table-secondary table-hover">
        <thead>
            <tr>
                <th scope="col">Id Pesanan</th>
                <th scope="col">Gambar Pesanan</th>
                <th scope="col">Nama Pesanan</th>
                <th scope="col">Harga Produk</th>
                <th scope="col">Jumlah Pesanan</th>
                <th scope="col">Harga Total</th>
                <th scope="col">Menu</th>
            </tr>
        </thead>
        <tbody class="table-group-divider align-middle">
            <?php foreach ($raw_keranjang as $item) : ?>
                <tr>
                    <td><?= $item['id_pesanan']; ?></td>
                    <td><img src="/img/<?= $item['gambar_pesanan']; ?>" alt="" style="max-width: 100px;"></td>
                    <td><?= $item['nama_pesanan']; ?></td>
                    <td><?= "Rp " . number_format($item['harga_produk'], 2, ',', '.'); ?></td>
                    <td><?= $item['jumlah_pesanan']; ?></td>
                    <td><?= "Rp " . number_format($item['total_harga'], 2, ',', '.'); ?></td>
                    <td>
                        <form action="/keranjang/hapus/<?= $item['id_pesanan']; ?>" method="post" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah njenengan yakin');" title="Hapus"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        <button type="button" class="btn btn-warning modalEdit" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" data-id="<?= $item['id_pesanan']; ?>">
                            <i class=" fa-regular fa-pen-to-square"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="button" class="btn text-light col-2 tombolModal" id="tombol_checkout" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Checkout
    </button>

    <div class="float-end" style="margin-right: 53px;">Sub Total : <?= "Rp " . number_format($sub_total, 2, ',', '.'); ?></div>
    <!-- modal checkout-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Diri</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="/produk/precheckout" method="post">

                        <input type="hidden" name="sub_total" value="<?= $sub_total; ?>">
                        <!-- form input data diri customer -->
                        <div class="col-md-6">
                            <label for="nama_depan" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" name="nama_depan" id="nama_depan">
                        </div>
                        <div class="col-md-6">
                            <label for="nama_belakang" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="col-md-6">
                            <label for="no_telephone" class="form-label">No Telephone</label>
                            <input type="number" class="form-control" name="no_telephone" id="no_telephone">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="dusun, desa, kecamatan, kota">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>