<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">Data Sales Order</h2>

    <a href="<?= site_url('sales_order/tambah'); ?>" class="btn btn-primary btn-sm mb-3">
        + Tambah Order
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-hover" width="100%" cellspacing="0" id="dataTable">

                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>ID Order</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $no = 1; foreach($orders as $o) : ?>

                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $o->id_order; ?></td>

                            <td><?= $o->nama_pelanggan; ?></td>

                            <td><?= $o->tanggal; ?></td>

                            <td>Rp <?= number_format($o->total, 0, ',', '.'); ?></td>

                            <td>
                                <?php if($o->status == 'draft') : ?>
                                    <span class="badge badge-secondary">Draft</span>

                                <?php elseif($o->status == 'dikirim') : ?>
                                    <span class="badge badge-warning">Dikirim</span>

                                <?php elseif($o->status == 'selesai') : ?>
                                    <span class="badge badge-success">Selesai</span>

                                <?php else : ?>
                                    <span class="badge badge-danger">Dibatalkan</span>
                                <?php endif; ?>
                            </td>

                            <td>

                                <a href="<?= site_url('sales_order/edit/'.$o->id_order); ?>" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="<?= site_url('sales_order/hapus/'.$o->id_order); ?>" 
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