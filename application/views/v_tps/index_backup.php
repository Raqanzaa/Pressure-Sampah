<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tempat Pembuangan Sampah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">TPS</li>
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
                        <h3 class="card-title">Daftar TPS</h3>
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
                            <a class="btn btn-primary text-dark" href="<?= site_url('c_tps/create') ?>">
                                <i class="fas fa-plus"></i> Tambah TPS
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th style="width: 15%;">Nama TPS</th>
                                        <th>Alamat TPS</th>
                                        <th>Kapasitas</th>
                                        <th style="width: 30%;">Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tps as $index => $t): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $t['nama_tps']; ?></td>
                                        <td><?= $t['alamat_tps']; ?></td>
                                        <td>
                                            <?php
                                                // Tampilkan kapasitas dalam kg jika lebih dari atau sama dengan 1000 gram
                                                if ($t['kapasitas'] >= 1000) {
                                                    echo ($t['kapasitas'] / 1000) . ' kg';
                                                } else {
                                                    echo $t['kapasitas'] . ' gram';
                                                }
                                            ?>
                                        </td>
                                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= $t['keterangan']; ?></td>
                                        <td>
                                            <a href="<?= site_url('c_tps/edit/'.$t['id_tps']); ?>" class="btn btn-warning btn-sm text-dark" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= site_url('c_tps/delete/'.$t['id_tps']); ?>" class="btn btn-danger btn-sm text-dark" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
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
