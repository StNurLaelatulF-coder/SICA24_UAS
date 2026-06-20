
<?php if($this->session->userdata('role') == 'admin'): ?>
<div class="alert alert-primary">
    Dashboard Administrator
</div>
<?php endif; ?>

<?php if($this->session->userdata('role') == 'sales'): ?>
<div class="alert alert-info">
    Dashboard Sales
</div>
<?php endif; ?>

<?php if($this->session->userdata('role') == 'manager'): ?>
<div class="alert alert-success">
    Dashboard Manager
</div>
<?php endif; ?>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h5>Total Produk</h5>
                <h2><?= $total_produk; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <h5>Total Pelanggan</h5>
                <h2><?= $total_pelanggan; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <h5>Total Sales Order</h5>
                <h2><?= $total_sales_order; ?></h2>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <h5>Total Sales</h5>
                <h2><?= $total_sales; ?></h2>
            </div>
        </div>
    </div>


</div>

<!-- GRAFIK -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Grafik Status Sales Order
        </h6>
    </div>

    <div class="card-body">
        <canvas id="statusChart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('statusChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Draft', 'Dikirim', 'Selesai', 'Dibatalkan'],
        datasets: [{
            label: 'Jumlah Order',
            data: [
                <?= $draft; ?>,
                <?= $dikirim; ?>,
                <?= $selesai; ?>,
                <?= $dibatalkan; ?>
            ]
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>