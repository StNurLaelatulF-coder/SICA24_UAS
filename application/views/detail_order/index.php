<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Detail Order
</h1>

<a href="<?= site_url('detail_order/tambah'); ?>"
   class="btn btn-primary mb-3">
    Tambah Detail
</a>

<table class="table table-bordered">

<thead>
<tr>
    <th>No</th>
    <th>ID Order</th>
    <th>Produk</th>
    <th>Qty</th>
    <th>Subtotal</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($detail as $d): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d->id_order; ?></td>

<td><?= $d->nama_produk; ?></td>

<td><?= $d->qty; ?></td>

<td>
Rp <?= number_format($d->subtotal,0,',','.'); ?>
</td>

<td>

<a href="<?= site_url('detail_order/edit/'.$d->id_detail); ?>"
   class="btn btn-warning btn-sm">
   Edit
</a>

<a href="<?= site_url('detail_order/hapus/'.$d->id_detail); ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin hapus?')">
   Hapus
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>