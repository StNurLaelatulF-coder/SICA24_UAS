<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Edit Sales
</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('sales/update/'.$sales->id_sales); ?>">

<div class="form-group">
<label>Nama Sales</label>
<input type="text"
       name="nama_sales"
       class="form-control"
       value="<?= $sales->nama_sales; ?>"
       required>
</div>

<div class="form-group">
<label>Telepon</label>
<input type="text"
       name="telepon"
       class="form-control"
       value="<?= $sales->telepon; ?>">
</div>

<div class="form-group">
<label>Email</label>
<input type="email"
       name="email"
       class="form-control"
       value="<?= $sales->email; ?>">
</div>

<div class="form-group">
<label>Alamat</label>
<textarea name="alamat"
          class="form-control"><?= $sales->alamat; ?></textarea>
</div>

<button type="submit"
        class="btn btn-primary">
    Update
</button>

<a href="<?= site_url('sales'); ?>"
   class="btn btn-secondary">
    Kembali
</a>

</form>

</div>
</div>

</div>