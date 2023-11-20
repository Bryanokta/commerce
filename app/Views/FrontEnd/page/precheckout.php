<?= $this->extend('FrontEnd/Layout/master'); ?>

<?= $this->section('content'); ?>

<div class=" container-md bg-secondary-subtle mt-3 mb-5 p-5 border border-3 border-dark-subtle">

    <a href="/" class="btn text-light mb-3" style="background-color: #190482;"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="row my-4 ">
        <div class="col-12 col-md-4 border border-3 border-dark-subtle p-2" style="max-height: 150px;">
            <table class="table table-secondary ">
                <tr>
                    <td><i class="fa-solid fa-truck-fast"></i></td>
                    <td>Dikirim ke <?= $address; ?></td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-user"></i></td>
                    <td>Diterima oleh <?= $nama_depan; ?> <?= $nama_belakang; ?></td>
                </tr>
                <tr>
                    <td><i class="fa-solid fa-phone"></i></td>
                    <td>No Telp - <?= $no_telephone; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-12 col-md-8 mt-3 mt-md-0 d-flex justify-content-end">
            <div class="table-responsive">
                <table class="table table-secondary " style="width: 500px;">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                            <tr>
                                <td><?= $item['nama_pesanan']; ?></td>
                                <td><?= $item['harga_produk']; ?></td>
                                <td><?= $item['jumlah_pesanan']; ?></td>
                                <td><?= "Rp " . number_format($item['total_harga'], 2, ',', '.'); ?></td>
                                <td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <form action="/produk/checkout" method="post">
                    <input type="hidden" name="nama_depan" id="nama_depan" value="<?= $nama_depan; ?>">
                    <input type="hidden" name="nama_belakang" id="nama_belakang" value="<?= $nama_belakang; ?>">
                    <input type="hidden" name="email" id="email" value="<?= $email; ?>">
                    <input type="hidden" name="no_telephone" id="no_telephone" value="<?= $no_telephone; ?>">
                    <input type="hidden" name="address" id="address" value="<?= $address; ?>">
                    <input type="hidden" name="token" id="token" value="<?= $token; ?>">
                    <input type="hidden" name="order_id" id="order_id" value="<?= $order_id; ?>">
                    <input type="hidden" name="sub_total" id="sub_total" value="<?= $sub_total; ?>">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                        <button class="btn btn-primary" type="submit">Konfirmasi<i class="fa-solid fa-angles-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>