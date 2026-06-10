<div class="container-fluid">

<h3>Data Sales Order</h3>

<table class="table table-bordered">

<tr>
    <th>No</th>
    <th>ID Order</th>
    <th>Aksi</th>
</tr>

<?php $no=1; foreach($orders as $o): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $o->id_order; ?></td>
    <td>
        <a href="<?= site_url('detail_order/lihat/'.$o->id_order); ?>" 
           class="btn btn-primary btn-sm">
           Lihat Detail
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</div>