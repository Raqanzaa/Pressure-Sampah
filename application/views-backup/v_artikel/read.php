<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <!-- <h1>Kategori Sampah</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Artikel</li>
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
                            <form action="<?= site_url('artikel-sampah') ?>" method="get">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="cari" class="form-control float-right" placeholder="Cari judul artikel" value="<?= isset($cari) ? $cari : '' ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="float-left mb-3">
                            <a class="btn btn-success btn-sm" href="<?= site_url('artikel-sampah/tambah') ?>">
                                <i class="fas fa-plus"></i> Tambah Artikel
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width: 15%;">Judul</th>
                                        <th>Tanggal Publikasi</th>
                                        <th style="width: 40%;">Isi Artikel</th>
                                        <th>Gambar Artikel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $index => $artikel): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $artikel->judul; ?></td>
                                            <td><?= $artikel->tanggal_publikasi; ?></td>
                                            <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= $artikel->deskripsi; ?></td>
                                            <td>
                                                <img src="<?= site_url('assets/img/') . $artikel->gambar_artikel ?>" alt="gambar artikel" style="width: 100px; border-radius: 10px; border: 1px solid #ccc;">
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="<?= site_url('artikel-sampah/edit/') . $artikel->id_artikel ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="<?= site_url('C_artikel/deletedata/') . $artikel->id_artikel ?>/<?= $artikel->gambar_artikel ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
