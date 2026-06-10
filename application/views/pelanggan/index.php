<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Pelanggan</h2>

<div class="card shadow mb-4">

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
</div>

<div class="card-body">

<!-- FLASH -->
<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success">
    <?= $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<!-- BUTTON -->
<a href="<?= site_url('pelanggan/tambah'); ?>" class="btn btn-primary btn-sm mb-3">
    + Tambah Pelanggan
</a>

<div class="table-responsive">
<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

<thead class="thead-dark">
<tr>
<th>No</th>
<th>Nama</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($pelanggan as $p): ?>

<tr>
<td><?= $no++; ?></td>
<td><?= $p->nama_pelanggan; ?></td>
<td><?= $p->alamat; ?></td>
<td><?= $p->telepon; ?></td>

<td>
<a href="<?= site_url('pelanggan/edit/'.$p->id_pelanggan); ?>" 
   class="btn btn-warning btn-sm">
   Edit
</a>

<a href="<?= site_url('pelanggan/hapus/'.$p->id_pelanggan); ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin hapus?')">
   Hapus
</a>
</td>

</tr>

<?php endforeach; ?>
</tbody>

</table>

</div>
</div>
</div>
</div>