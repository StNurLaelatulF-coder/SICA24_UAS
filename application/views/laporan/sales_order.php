<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Laporan Sales Order</h2>

<table class="table table-bordered table-striped" id="dataTable">

<thead class="thead-dark">
<tr>
    <th>No</th>
    <th>ID Order</th>
    <th>Pelanggan</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Status</th>
</tr>
</thead>

<tbody>

<?php $no = 1; foreach($laporan as $l): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $l->id_order; ?></td>
    <td><?= $l->nama_pelanggan; ?></td>
    <td><?= $l->tanggal; ?></td>
    <td>Rp <?= number_format($l->total, 0, ',', '.'); ?></td>

    <td>
        <?php if($l->status == 'draft'): ?>
            <span class="badge badge-secondary">Draft</span>

        <?php elseif($l->status == 'dikirim'): ?>
            <span class="badge badge-warning">Dikirim</span>

        <?php elseif($l->status == 'selesai'): ?>
            <span class="badge badge-success">Selesai</span>

        <?php else: ?>
            <span class="badge badge-danger">Dibatalkan</span>
        <?php endif; ?>
    </td>
</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>