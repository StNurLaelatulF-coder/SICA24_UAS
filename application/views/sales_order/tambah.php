<div class="container-fluid">

<<<<<<< HEAD
<h2>Tambah Sales Order</h2>

<form method="post" action="<?= site_url('sales_order/simpan'); ?>">

<div class="form-group">
    <label>Pelanggan</label>
    <select name="id_pelanggan" class="form-control" required>
        <option value="">Pilih</option>

        <?php foreach($pelanggan as $p): ?>
            <option value="<?= $p->id_pelanggan; ?>">
                <?= $p->nama_pelanggan; ?>
            </option>
        <?php endforeach; ?>

    </select>
</div>

<div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>">
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

<a href="<?= site_url('sales_order'); ?>" class="btn btn-secondary">
    Kembali
</a>

=======
<h2 class="h3 mb-4 text-gray-800">Tambah Sales Order</h2>

<form method="post" action="<?= site_url('sales_order/simpan'); ?>">

<!-- PELANGGAN -->
 <pre>
<?php print_r($pelanggan); ?>
</pre>
<div class="form-group">
<label>Pelanggan</label>

<select name="id_pelanggan" class="form-control" required>
    <option value="">-- Pilih Pelanggan --</option>

    <?php foreach ($pelanggan as $p) { ?>
        <option value="<?= $p->id_pelanggan ?>">
            <?= $p->nama_pelanggan ?>
        </option>
    <?php } ?>
</select>
</div>

<div class="form-group">
<label>Sales</label>

<select name="id_sales" class="form-control" required>
    <option value="">-- Pilih Sales --</option>

    <?php foreach ($sales as $s) { ?>
        <option value="<?= $s->id_sales ?>">
            <?= $s->id_sales ?> - <?= $s->nama_sales ?>
        </option>
    <?php } ?>
</select>
</div>
<hr>

<h5>Produk</h5>

<table class="table table-bordered">
<thead>
<tr>
    <th>Produk</th>
    <th>Qty</th>
</tr>
</thead>

<tbody>
<tr>
    <td>
        <select name="produk[]" class="form-control" required>
            <?php foreach($produk as $p): ?>
                <option value="<?= $p->kode_produk; ?>">
                    <?= $p->nama_produk; ?> - <?= number_format($p->harga,0,',','.'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </td>

    <td>
        <input type="number" name="qty[]" class="form-control" required>
    </td>
</tr>
</tbody>
</table>

<button type="submit" class="btn btn-success">
    Simpan Order
</button>

>>>>>>> 582864d7e57bfac3d25c26aa04d3a5cc15c7fec3
</form>

</div>