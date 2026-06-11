<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">
    Edit Detail Order
</h1>

<div class="card shadow">
<div class="card-body">

<form method="post"
      action="<?= site_url('detail_order/update/'.$detail->id_detail); ?>">

<div class="form-group">
<label>Sales Order</label>

<select name="id_order" class="form-control">

<?php foreach($order as $o): ?>

<option value="<?= $o->id_order; ?>"
<?= ($detail->id_order == $o->id_order) ? 'selected' : ''; ?>>

Order #<?= $o->id_order; ?>

</option>

<?php endforeach; ?>

</select>
</div>

<div class="form-group">
<label>Produk</label>

<select name="id_produk" class="form-control">

<?php foreach($produk as $p): ?>

<option value="<?= $p->id_produk; ?>"
<?= ($detail->id_produk == $p->id_produk) ? 'selected' : ''; ?>>

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
       value="<?= $detail->qty; ?>">
</div>

<button type="submit"
        class="btn btn-primary">
    Update
</button>

<a href="<?= site_url('detail_order'); ?>"
   class="btn btn-secondary">
   Kembali
</a>

</form>

</div>
</div>

</div>