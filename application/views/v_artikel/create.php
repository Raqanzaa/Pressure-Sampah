
<body>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Artikel</li>
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
            <h3 class="card-title">Formulir Tambah Artikel</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url('c_artikel/insertdata') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul artikel" required>
              </div>

              <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Publikasi:</label>
                <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" required>
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi Artikel:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
             </div>

              <div class="form-group">
                <label for="gambar_artikel">Gambar Artikel:</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar_artikel" name="gambar_artikel" required>
                    <label class="custom-file-label" for="gambar_artikel">Pilih file</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

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

</body>
</html>
