<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori Sampah</title>
</head>
<body>

<h2>Edit Kategori Sampah</h2>

<form method="post" action="<?php echo site_url('c_ktgrsampah/edit/'.$kategori['ID_KategoriSampah']); ?>">
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_kategori" value="<?php echo $kategori['Nama_Kategori']; ?>" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi" required><?php echo $kategori['Deskripsi']; ?></textarea><br><br>

    <label>Warna Kategori:</label><br>
    <input type="text" name="warna_kategori" value="<?php echo $kategori['Warna_Kategori']; ?>" required><br><br>

    <input type="submit" name="submit" value="Simpan">
</form>

</body>
</html>
