<!-- views/v_artikel/delete.php -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hapus Artikel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Hapus Artikel</li>
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
                        <p>Anda yakin ingin menghapus artikel ini?</p>
                        <p><strong>Judul Artikel:</strong> <?= $artikel->judul ?></p>
                        <p><strong>Isi Artikel:</strong> <?= $artikel->isi ?></p>
                        <form action="<?= site_url('c_artikel/delete/'.$artikel->id_artikel) ?>" method="post">
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            <a href="<?= site_url('c_artikel/index') ?>" class="btn btn-default">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
