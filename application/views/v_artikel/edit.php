<!-- views/v_artikel/edit.php -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Artikel</h1>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('c_artikel/edit/'.$artikel->id_artikel) ?>" method="post">
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input type="text" class="form-control" name="judul" value="<?= $artikel->judul ?>">
                            </div>
                            <div class="form-group">
                                <label>Isi Artikel</label>
                                <textarea class="form-control" name="isi"><?= $artikel->isi ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= site_url('c_artikel/index') ?>" class="btn btn-default">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
