<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
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
        <!-- <h1>Edit Artikel</h1> -->
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Artikel</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Formulir Edit Artikel</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url() ?>index.php/c_artikel/updatedata" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="judul">Judul Artikel</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $data->judul ?>" required>
              </div>

              <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Publikasi</label>
                <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="<?= $data->tanggal_publikasi ?>" required>
              </div>

              <div class="form-group">
                <label for="deskripsi">Isi Artikel</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $data->deskripsi ?></textarea>
             </div>

              <div class="form-group">
                <label for="gambar_artikel">Gambar Artikel</label>
                <input type="file" class="form-control-file" id="gambar_artikel" name="gambar_artikel">
                <small class="form-text text-muted">Ukuran foto maksimal 2MB.</small>
                <?php if (!empty($data->gambar_artikel)) { ?>
                  <div class="mb-3">
                    <img src="<?= base_url() ?>assets/img/<?= $data->gambar_artikel ?>" width="150"><br><br>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <input type="hidden" name="filelama" value="<?= $data->gambar_artikel ?>">
            <input type="hidden" name="id_artikel" value="<?= $data->id_artikel ?>">

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Sertakan file JavaScript yang diperlukan -->
<script src="path/to/your/js/scripts.js"></script>
</body>
</html>
