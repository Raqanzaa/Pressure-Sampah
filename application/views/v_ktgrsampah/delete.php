<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Hapus Kategori Sampah</title>
</head>
<body>

<h2>Konfirmasi Hapus Kategori Sampah</h2>

<p>Anda yakin ingin menghapus kategori sampah ini?</p>
<p>Nama Kategori: <?php echo $kategori['Nama_Kategori']; ?></p>

<form method="post" action="<?php echo site_url('c_ktgrsampah/hapus/'.$kategori['ID_KategoriSampah']); ?>">
    <input type="submit" name="submit" value="Hapus">
    <a href="<?php echo site_url('c_ktgrsampah'); ?>">Batal</a>
</form>

</body>
</html>
