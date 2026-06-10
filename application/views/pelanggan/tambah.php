<h2>Tambah Pelanggan</h2>

<form method="post" action="<?php echo base_url('pelanggan/simpan')?>">

Nama Pelanggan
<input type="text" name="nama_pelanggan" required><br><br>

Alamat
<textarea name="alamat"></textarea><br><br>

Telepon
<input type="text" name="telepon"><br><br>

<button type="submit">Simpan</button>

</form>