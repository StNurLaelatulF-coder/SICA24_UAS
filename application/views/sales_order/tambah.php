<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Tambah Sales Order</h2>

<form method="post" action="<?= site_url('sales_order/simpan'); ?>">

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
                <?= $s->nama_sales ?>
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
                            <?= $p->nama_produk; ?> -
                            Rp <?= number_format($p->harga,0,',','.'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>

            <td>
                <input type="number" name="qty[]" class="form-control" min="1" required>
            </td>
        </tr>
    </tbody>
</table>

<button type="submit" class="btn btn-success">
    Simpan Order
</button>

<a href="<?= site_url('sales_order'); ?>" class="btn btn-secondary">
    Kembali
</a>

</form>

</div>