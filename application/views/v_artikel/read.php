<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artikel</title>
    <!-- Sertakan file CSS yang diperlukan -->
    <link rel="stylesheet" href="path/to/your/css/styles.css">
    <!-- Sertakan jQuery -->
    <script src="path/to/jquery.min.js"></script>
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
              <form action="<?= base_url() ?>index.php/c_artikel/index" method="get">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="cari" class="form-control float-right" placeholder="Cari judul artikel">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <br>

          <div class="float-right ml-4 mb-3">
            <a class="btn btn-success btn-sm" href="<?= base_url() ?>index.php/c_artikel/tambah">
              <i class="fas fa-plus"></i> Tambah Artikel
            </a>
          </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: auto;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Judul</th>
                  <th>Tanggal Publikasi</th>
                  <th>Deskripsi Artikel</th>
                  <th>Gambar Artikel</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $artikel): ?>
                  <tr>
                    <td><?= $artikel->id_artikel; ?></td>
                    <td><?= $artikel->judul; ?></td>
                    <td><?= $artikel->tanggal_publikasi; ?></td>
                    <td><?= $artikel->deskripsi; ?></td>
                    <td>
                      <img src="<?= base_url() ?>assets/img/<?= $artikel->gambar_artikel ?>" alt="gambar artikel" style="width: 100px;">
                    </td>
                    <td class="project-actions">
                      <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder"></i> View
                      </a>
                      <a class="btn btn-info btn-sm" href="<?= base_url() ?>index.php/c_artikel/edit/<?= $artikel->id_artikel ?>">
                        <i class="fas fa-pencil-alt"></i> Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="<?= base_url() ?>index.php/c_artikel/deletedata/<?= $artikel->id_artikel ?>/<?= $artikel->gambar_artikel ?>">
                        <i class="fas fa-trash"></i> Delete
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Sertakan file JavaScript yang diperlukan -->
<script src="path/to/your/js/scripts.js"></script>
</body>
</html>
