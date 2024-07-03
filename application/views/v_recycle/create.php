<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Daur Ulang Sampah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('c_recycle'); ?>">Data Daur Ulang</a></li>
                    <li class="breadcrumb-item active">Tambah Data Daur Ulang</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Data Daur Ulang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo base_url('c_recycle/simpan'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis_sampah">Jenis Sampah</label>
                                <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" placeholder="Masukkan Jenis Sampah" required>
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat (kg)</label>
                                <input type="number" step="0.01" class="form-control" id="berat" name="berat" placeholder="Masukkan Berat Sampah" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('c_recycle'); ?>" class="btn btn-default">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
