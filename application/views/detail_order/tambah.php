<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Tambah Detail Order
</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('detail_order/simpan'); ?>">

<div class="form-group">
<label>Sales Order</label>

<select name="id_order"
        class="form-control"
        required>

<option value="">-- Pilih Order --</option>

<?php foreach($order as $o): ?>

<option value="<?= $o->id_order; ?>">
    #<?= $o->id_order; ?> - <?= $o->nama_pelanggan; ?>
</option>

<?php endforeach; ?>

</select>
</div>

<div class="form-group">
<label>Produk</label>

<select name="id_produk"
        class="form-control"
        required>

<option value="">-- Pilih Produk --</option>

<?php foreach($produk as $p): ?>

<option value="<?= $p->id_produk; ?>">
    <?= $p->nama_produk; ?>
</option>

<?php endforeach; ?>

</select>
</div>

<div class="form-group">
<label>Qty</label>

<input type="number"
       name="qty"
       class="form-control"
       required>
</div>

<button type="submit"
        class="btn btn-primary">
    Simpan
</button>

<a href="<?= site_url('detail_order'); ?>"
   class="btn btn-secondary">
   Kembali
</a>

</form>

</div>
</div>

</div>