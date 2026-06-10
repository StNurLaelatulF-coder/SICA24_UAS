<h2>Edit Produk</h2>

<form method="post" action="<?= base_url('produk/update/'.$produk->id_produk) ?>">

    <div class="form-group">
        <label>Kode Produk</label>
        <input type="text"
               name="kode_produk"
               value="<?= $produk->kode_produk ?>"
               class="form-control"
               readonly>
    </div>

    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text"
               name="nama_produk"
               value="<?= $produk->nama_produk ?>"
               class="form-control"
               required>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number"
               name="harga"
               value="<?= $produk->harga ?>"
               class="form-control"
               required>
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number"
               name="stok"
               value="<?= $produk->stok ?>"
               class="form-control"
               required>
    </div>

    <button type="submit" class="btn btn-primary">
        Update
    </button>

    <a href="<?= base_url('produk') ?>" class="btn btn-secondary">
        Kembali
    </a>

</form>