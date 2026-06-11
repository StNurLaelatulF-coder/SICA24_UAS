<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body onload="window.print()">

<h2>Laporan Sales Order</h2>

<table border="1" width="100%" cellspacing="0">

<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Sales</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Status</th>
</tr>

<?php $no=1; foreach($laporan as $l): ?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $l->nama_pelanggan; ?></td>
    <td><?= $l->nama_sales; ?></td>
    <td><?= $l->tanggal; ?></td>
    <td><?= $l->total; ?></td>
    <td><?= $l->status; ?></td>
</tr>

<?php endforeach; ?>

</table>

</body>
</html>