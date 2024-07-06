<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Kategori Sampah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Kategori Sampah</li>
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
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('c_ktgrsampah/store') ?>" method="post">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                                <?= form_error('nama_kategori', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="warna_kategori">Warna Kategori</label>
                                <input type="color" class="form-control" id="warna_kategori" name="warna_kategori" required>
                                <?= form_error('warna_kategori', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= site_url('c_ktgrsampah'); ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
