<?= $this->extend('FrontEnd/Layout/master'); ?>

<?= $this->section('content'); ?>

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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Ke Keranjang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/produk/keranjang" method="post">
                    <!-- input hidden -->
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="nama_produk" id="nama_produk" value="">
                    <input type="hidden" name="gambar_produk" id="gambar_produk" value="">

                    <!-- ajax modal -->
                    <div class="text-center">
                        <img id="gambar" src="/img/" class="card-img-top p-3" style="width: 250px; height: 250px; object-fit: cover; background-position: center;">
                    </div>
                    <fieldset>
                        <div class="mb-3">
                            <h2 id="TextInput"></h2>
                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" min="1" max="50" id="jumlah" name="jumlah" class="form-control" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Masukan Keranjang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- card -->
<div class="container rounded-3">
    <div class="row">
        <?php foreach ($raw_produk as $produk) : ?>
            <div class="col-md-4 mt-3 ">
                <div class="card card-bg-light border-1 border-light" style="width: 18rem;">
                    <div class="text-center">
                        <img src="/img/<?= $produk['gambar_produk']; ?>" class="card-img-top p-3" style="width: 250px; height: 250px; object-fit: cover; background-position: center;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                        <p class="card-text"><?= $produk['deskripsi_produk']; ?></p>
                        <div class="text-light">
                            <hr>
                        </div>
                        <div class="row justify-content-between px-2">
                            <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $token; ?>" id="tombol" class="btn text-light col-3 ">Beli</a>
                            <button type="button" class="btn text-light col-2 tombolModal" id="tombol" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?= $produk['id']; ?>">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>



<?= $this->endSection(); ?>