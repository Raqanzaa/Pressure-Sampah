<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori Sampah Baru</title>
</head>
<body>

<h2>Tambah Kategori Sampah Baru</h2>

<form method="post" action="<?php echo site_url('c_ktgrsampah/tambah'); ?>">
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_kategori" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi" required></textarea><br><br>

    <label>Warna Kategori:</label><br>
    <input type="text" name="warna_kategori" required><br><br>

    <input type="submit" name="submit" value="Simpan">
</form>

</body>
</html>
