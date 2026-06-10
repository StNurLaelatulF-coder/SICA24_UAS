<h2>Tambah Produk</h2>

<form method="post" action="<?= base_url('produk/simpan') ?>">

    <div class="form-group">
        <label>Kode Produk</label>
        <input type="text" name="kode_produk" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">
        Simpan
    </button>

    <a href="<?= base_url('produk') ?>" class="btn btn-secondary">
        Kembali
    </a>

</form>