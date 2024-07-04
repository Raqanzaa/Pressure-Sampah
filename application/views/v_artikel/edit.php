<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Crud Codeigniter</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

</head>
<body>

<div class="container">
  <h1>Simple Crud image Codeigniter</h1>
  <hr>
</div>

<!-- KONTEN UTAMA -->
<div class="container">
  <h2>Edit Artikel</h2>
  <div class="row">
    <form action="<?=base_url()?>index.php/c_artikel/updatedata" method="post" enctype="multipart/form-data">
      <label>Judul</label><br>
      <input type="text" name="judul" value="<?=$data->judul?>"><br><br>
      <label>Tanggal Publikasi</label><br>
      <input type="date" name="tanggal_publikasi" value="<?=$data->tanggal_publikasi?>"><br><br>
      <label>Gambar Artikel</label><br>
      <?php if (!empty($data->gambar_artikel)) { ?>
        <img src="<?=base_url()?>assets/img/<?=$data->gambar_artikel?>" width="150"><br><br>
      <?php } ?>
      <input type="file" name="gambar_artikel"><br><br>

      <!-- file lama -->
      <input type="hidden" name="filelama" value="<?=$data->gambar_artikel?>">
      <!-- ID -->
      <input type="hidden" name="id_artikel" value="<?=$data->id_artikel?>">

      <input type="submit" name="submit" value="Submit" class="btn btn-default">
    </form>

  </div>
</div>
<!-- END KONTEN UTAMA -->

<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
