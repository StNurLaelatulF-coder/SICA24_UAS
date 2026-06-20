<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Edit Sales Order</h2>

<div class="card shadow">
<div class="card-body">

<form method="post" action="<?= site_url('sales_order/update/'.$order->id_order); ?>">

<!-- PELANGGAN -->
<div class="form-group">
    <label>Pelanggan</label>
    <select name="id_pelanggan" class="form-control" required>

        <?php foreach($pelanggan as $p): ?>
            <option value="<?= $p->id_pelanggan; ?>"
                <?= ($order->id_pelanggan == $p->id_pelanggan) ? 'selected' : ''; ?>>
                <?= $p->nama_pelanggan; ?>
            </option>
        <?php endforeach; ?>

    </select>
</div>

<div class="form-group">
    <label>Sales</label>

    <select name="id_sales" class="form-control" required>

        <?php foreach($sales as $s): ?>

            <option value="<?= $s->id_sales; ?>"
                <?= ($order->id_sales == $s->id_sales) ? 'selected' : ''; ?>>

                <?= $s->nama_sales; ?>

            </option>

        <?php endforeach; ?>

    </select>
</div>

<!-- TANGGAL -->
<div class="form-group">
    <label>Tanggal</label>
    <input type="date"
           name="tanggal"
           class="form-control"
           value="<?= $order->tanggal; ?>"
           required>
</div>

<!-- TOTAL -->
<div class="form-group">
    <label>Total</label>
    <input type="number"
           name="total"
           class="form-control"
           value="<?= $order->total; ?>">
</div>

<!-- STATUS -->
<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">

        <option value="draft"
            <?= ($order->status == 'draft') ? 'selected' : ''; ?>>
            Draft
        </option>

        <option value="dikirim"
            <?= ($order->status == 'dikirim') ? 'selected' : ''; ?>>
            Dikirim
        </option>

        <option value="selesai"
            <?= ($order->status == 'selesai') ? 'selected' : ''; ?>>
            Selesai
        </option>

        <option value="dibatalkan"
            <?= ($order->status == 'dibatalkan') ? 'selected' : ''; ?>>
            Dibatalkan
        </option>

    </select>
</div>

<button type="submit" class="btn btn-primary">
    Update
</button>

<a href="<?= site_url('sales_order'); ?>" class="btn btn-secondary">
    Kembali
</a>

</form>

</div>
</div>

</div>