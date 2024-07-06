<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori Sampah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kategori Sampah</li>
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
                        <h3 class="card-title">Daftar Kategori Sampah</h3>
                        <div class="card-tools">
                            <form action="#" method="get">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
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
                        <div class="float-left mb-1">
                            <a class="btn btn-primary text-dark" href="<?= site_url('c_ktgrsampah/create') ?>">
                                <i class="fas fa-plus"></i> Tambah Kategori
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Warna Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ktgrsampah as $index => $item): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $item['nama_kategori'] ?></td>
                                            <td><?= $item['deskripsi'] ?></td>
                                            <td><span style="background-color: <?= $item['warna_kategori'] ?>; padding: 5px; border-radius: 3px;"><?= $item['warna_kategori'] ?></span></td>
                                            <td>
                                                <a href="<?= site_url('c_ktgrsampah/edit/'.$item['id_ktgrsampah']) ?>" class="btn btn-warning btn-sm text-dark" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= site_url('c_ktgrsampah/delete/'.$item['id_ktgrsampah']) ?>" class="btn btn-danger btn-sm text-dark" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
