<h2>Edit Pelanggan</h2>

<form method="post" action="<?php echo base_url('pelanggan/update/'.$pelanggan->id_pelanggan) ?>">

ID
<input type="text" value="<?php echo $pelanggan->id_pelanggan ?>" readonly><br><br>

Nama Pelanggan
<input type="text" name="nama_pelanggan" value="<?php echo $pelanggan->nama_pelanggan ?>" required><br><br>

Alamat
<textarea name="alamat"><?php echo $pelanggan->alamat ?></textarea><br><br>

Telepon
<input type="text" name="telepon" value="<?php echo $pelanggan->telepon ?>"><br><br>

<button type="submit">Update</button>

</form>