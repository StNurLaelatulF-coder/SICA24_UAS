<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Data Sales Order
</h1>

<a href="<?= site_url('sales_order/tambah'); ?>"
   class="btn btn-primary mb-3">
   Tambah Sales Order
</a>

<table class="table table-bordered">

<thead>
<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Sales</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($order as $o): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $o->nama_pelanggan; ?></td>
    <td><?= $o->nama_sales; ?></td>
    <td><?= $o->tanggal; ?></td>
    <td><?= ucfirst($o->status); ?></td>

    <td>
        <a href="<?= site_url('sales_order/edit/'.$o->id_order); ?>"
           class="btn btn-warning btn-sm">
           Edit
        </a>

        <a href="<?= site_url('sales_order/hapus/'.$o->id_order); ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus data?')">
           Hapus
        </a>
    </td>
</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>