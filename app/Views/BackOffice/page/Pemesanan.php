<?= $this->extend('BackOffice/Layout/master'); ?>

<?= $this->section('content'); ?>
<table class="table table-striped">
    <thead class="table-info">
        <tr>
            <th scope="col">Order id</th>
            <th scope="col">Nama</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Menu</th>
        </tr>
    </thead>
    <tbody class="table-group-divider table-bordered">

        <?php foreach ($raw_pemesanan as $pemesanan) : ?>
            <tr>
                <td><?= $pemesanan['order_id'] ?></td>
                <td><?= $pemesanan['nama_depan']; ?> <?= $pemesanan['nama_belakang']; ?></td>
                <td><?= $pemesanan['sub_total']; ?></td>
                <td><?= $pemesanan['email']; ?></td>
                <td><?= $pemesanan['address']; ?></td>
                <td><?= $pemesanan['status_code']; ?></td>
                <td class="d-flex align-items-center">
                    <form action="#" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-success" onclick="return confirm('apakah njenengan yakin');" title="Hapus">Accept</i></button>
                    </form>
                    <a href="#" class="btn btn-danger ml-3">Cancel</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>