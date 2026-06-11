<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Tambah Sales Order
</h1>

<div class="card shadow">
<div class="card-body">

<form method="post" action="<?= site_url('sales_order/simpan'); ?>">

<div class="form-group">
<label>Pelanggan</label>

<select name="id_pelanggan" class="form-control" required>

<option value="">-- Pilih Pelanggan --</option>

<?php foreach($pelanggan as $p): ?>
<option value="<?= $p->id_pelanggan; ?>">
    <?= $p->nama_pelanggan; ?>
</option>
<?php endforeach; ?>

</select>
</div>

<div class="form-group">
<label>Sales</label>

<select name="id_sales" class="form-control" required>

<option value="">-- Pilih Sales --</option>

<?php foreach($sales as $s): ?>
<option value="<?= $s->id_sales; ?>">
    <?= $s->nama_sales; ?>
</option>
<?php endforeach; ?>

</select>
</div>

<div class="form-group">
<label>Tanggal</label>

<input type="date"
       name="tanggal"
       class="form-control"
       value="<?= date('Y-m-d'); ?>"
       required>
</div>

<div class="form-group">
<label>Status</label>

<select name="status" class="form-control">

<option value="draft">Draft</option>
<option value="dikirim">Dikirim</option>
<option value="selesai">Selesai</option>
<option value="dibatalkan">Dibatalkan</option>

</select>
</div>

<button type="submit" class="btn btn-primary">
    Simpan
</button>

<a href="<?= site_url('sales_order'); ?>"
   class="btn btn-secondary">
   Kembali
</a>

</form>

</div>
</div>

</div>