<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>TPS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <div class="float-right mb-3">
                            <a class="btn btn-success" href="<?= site_url('c_tps/create') ?>">
                                <i class="fas fa-plus"></i> Tambah TPS
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama TPS</th>
                                        <th>Alamat TPS</th>
                                        <th>Kapasitas</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tps as $t): ?>
                                    <tr>
                                        <td><?php echo $t['id_tps']; ?></td>
                                        <td><?php echo $t['nama_tps']; ?></td>
                                        <td><?php echo $t['alamat_tps']; ?></td>
                                        <td><?php echo $t['kapasitas']; ?></td>
                                        <td><?php echo $t['keterangan']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('c_tps/edit/'.$t['id_tps']); ?>" class="btn btn-warning">Edit</a>
                                            <a href="<?php echo site_url('c_tps/delete/'.$t['id_tps']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>
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
