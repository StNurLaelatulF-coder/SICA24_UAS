<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Laporan Penjualan</h2>

<!-- FILTER -->
<form method="get" action="<?= site_url('laporan/filter'); ?>" class="mb-3">

<div class="row">

<div class="col-md-4">
<label>Tanggal Awal</label>
<input type="date" name="awal" class="form-control" required>
</div>

<div class="col-md-4">
<label>Tanggal Akhir</label>
<input type="date" name="akhir" class="form-control" required>
</div>

<div class="col-md-4" style="margin-top:25px;">
<button type="submit" class="btn btn-primary">
    Filter
</button>

<a href="<?= site_url('laporan'); ?>" class="btn btn-secondary">
    Reset
</a>
</div>

</div>

</form>

<!-- TABEL -->
<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">

<table class="table table-bordered" id="dataTable">

<thead>
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>User (Sales)</th>
    <th>Total</th>
    <th>Status</th>
</tr>
</thead>

<tbody>
<?php $no = 1; foreach($laporan as $l): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $l->tanggal_order; ?></td>
    <td><?= $l->nama_pelanggan; ?></td>
    <td><?= $l->nama_sales; ?></td>
    <td><?= number_format($l->total_harga,0,',','.'); ?></td>
    <td><?= $l->status; ?></td>
</tr>
<?php endforeach; ?>

</tbody>

</table>

</div>
</div>
</div>

</div>