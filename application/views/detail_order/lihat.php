<div class="container-fluid">

<h3>Detail Order #<?= $order->id_order; ?></h3>

<!-- FORM TAMBAH PRODUK -->
<form method="post" action="<?= site_url('detail_order/simpan'); ?>">

<input type="hidden" name="id_order" value="<?= $order->id_order; ?>">

<select name="id_produk" class="form-control">
    <?php foreach($produk as $p): ?>
        <option value="<?= $p->id_produk; ?>">
            <?= $p->nama_produk; ?> - Rp <?= $p->harga; ?>
        </option>
    <?php endforeach; ?>
</select>

<input type="number" name="qty" class="form-control mt-2" placeholder="Qty">

<button type="submit" class="btn btn-primary btn-sm mt-2">
    Tambah
</button>

</form>

<hr>

<!-- TABEL DETAIL -->
<table class="table table-bordered mt-3">

<tr>
    <th>Produk</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Subtotal</th>
    <th>Aksi</th>
</tr>

<?php foreach($detail as $d): ?>
<tr>
    <td><?= $d->nama_produk; ?></td>
    <td><?= $d->qty; ?></td>
    <td><?= $d->harga; ?></td>
    <td><?= $d->subtotal; ?></td>
    <td>
        <a href="<?= site_url('detail_order/hapus/'.$d->id_detail.'/'.$order->id_order); ?>" 
           class="btn btn-danger btn-sm">
           Hapus
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</div>