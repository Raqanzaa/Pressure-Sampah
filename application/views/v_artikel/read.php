<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Crud Image Codeigniter</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

</head>
<body>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>ARTIKEL</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">ARTIKEL</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Artikel Terbaru</h3>

            <div class="card-tools">
            <form action="<?=base_url()?>index.php/c_artikel/index" method="get">
            <input type="text" name="cari" placeholder="Cari judul artikel">
            <input type="submit" value="Cari" class="btn btn-default">
            </form>
            </div>
          </div>

          <div class="float-right ml-4 mb-3">
            <a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/c_artikel/tambah">
              <i class="fas fa-plus"></i> Tambah Artikel
            </a>
          </div>

          <!-- /.card-header -->
          <div class="row">

            <?php foreach ($data as $artikel): ?>
             <div class="col-sm-6 col-md-3">
             <a href="#" class="thumbnail">
             <img src="<?=base_url()?>assets/img/<?=$artikel->gambar_artikel?>" alt="gambar artikel">
            </a>
            <div class="caption">
            <h3><?php echo $artikel->judul ?></h3>
            <p>Tanggal Publikasi: <?php echo $artikel->tanggal_publikasi ?></p>
            <p>
            <a href="<?=base_url()?>index.php/c_artikel/edit/<?=$artikel->id_artikel?>" class="btn btn-info" role="button">Edit</a>
            <a href="<?=base_url()?>index.php/c_artikel/deletedata/<?=$artikel->id_artikel?>/<?=$artikel->gambar_artikel?>" class="btn btn-danger" role="button">Hapus</a>
            </p>
            </div>
            </div>
            <?php endforeach; ?>

            </div>
            </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>

<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
