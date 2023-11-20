<?= $this->extend('BackOffice/Layout/master'); ?>

<?= $this->section('content'); ?>
<table class="table table-striped">
    <thead class="table-info">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga Total</th>
            <th scope="col">Status Pembayaran</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody class="table-group-divider table-bordered">
        <?php $i = 1; ?>
        <?php foreach ($raw_pemesanan as $pemesanan) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $pemesanan['nama']; ?></td>
                <td><?=  $pemesanan['jumlah']; ?></td>
                <td><?=  $pemesanan['harga_total']; ?></td>
                <td><?=  $pemesanan['status_pembayaran']; ?></td>
                <td><?=  $pemesanan['alamat']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>