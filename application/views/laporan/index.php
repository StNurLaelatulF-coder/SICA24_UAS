<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Laporan Sales Order
</h1>

<!-- FILTER -->
<form method="GET" class="mb-3">

<select name="id_sales" class="form-control mb-2">
    <option value="">Semua Sales</option>
    <?php foreach ($sales as $s) { ?>
        <option value="<?= $s->id_sales; ?>">
            <?= $s->nama_sales; ?>
        </option>
    <?php } ?>
</select>

<select name="id_produk" class="form-control mb-2">
    <option value="">Semua Produk</option>
    <?php foreach ($produk as $p) { ?>
        <option value="<?= $p->id_produk; ?>">
            <?= $p->nama_produk; ?>
        </option>
    <?php } ?>

</select>

<input type="date" name="tanggal_awal" class="form-control mb-2">

<input type="date" name="tanggal_akhir" class="form-control mb-2">

<button type="submit" class="btn btn-primary">
    Filter
</button>

</form>

<a href="<?= site_url('laporan/cetak'); ?>"
   target="_blank"
   class="btn btn-success mb-3">

    Cetak Laporan

</a>

<table class="table table-bordered">

<thead>
<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Sales</th>
    <th>Produk</th>
    <th>Tanggal</th>
    <th>Qty</th>
    <th>Subtotal</th>
    <th>Status</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($laporan as $l): ?>

<tr>

<td><?= $no++; ?></td>
<td><?= $l->nama_pelanggan; ?></td>
<td><?= $l->nama_sales; ?></td>
<td><?= $l->nama_produk; ?></td>
<td><?= $l->tanggal; ?></td>
<td><?= $l->qty; ?></td>
<td>Rp <?= number_format($l->subtotal,0,',','.'); ?></td>
<td><?= $l->status; ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>