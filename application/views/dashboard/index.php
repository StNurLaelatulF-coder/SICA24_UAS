<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

<!-- Buku -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <h5>Total Produk</h5>
            <h3><?= $total_produk; ?></h3>
        </div>
    </div>
</div>
<!-- Kategori -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <h5>Total Order</h5>
            <h3><?= $total_order; ?></h3>
        </div>
    </div>
</div>
<!-- Anggota -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <h5>Total Pelanggan</h5>
            <h3><?= $total_pelanggan; ?></h3>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <canvas id="myBarChart"></canvas>
    </div>
</div>
</div>