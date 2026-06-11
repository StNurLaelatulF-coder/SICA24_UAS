<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Tambah Pelanggan
</h1>

<div class="card shadow">
<div class="card-body">

<form method="post" action="<?= site_url('pelanggan/simpan'); ?>">

<div class="form-group">
<label>Nama Pelanggan</label>
<input type="text"
       name="nama_pelanggan"
       class="form-control"
       required>
</div>

<div class="form-group">
<label>Alamat</label>
<textarea name="alamat"
          class="form-control"></textarea>
</div>

<div class="form-group">
<label>Telepon</label>
<input type="text"
       name="telepon"
       class="form-control">
</div>

<button type="submit"
        class="btn btn-primary">
    Simpan
</button>

<a href="<?= site_url('pelanggan'); ?>"
   class="btn btn-secondary">
    Kembali
</a>

</form>

</div>
</div>

</div>