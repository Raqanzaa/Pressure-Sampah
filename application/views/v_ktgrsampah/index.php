<!-- Content Header (Page header) -->
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
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="float-right ml-4 mb-3">
                        <a class="btn btn-success btn-sm" href="#">
                            <i class="fas fa-plus"></i> Tambah Kategori
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: auto;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?php echo $category->id; ?></td>
                                    <td><?php echo $category->nama_kategori; ?></td>
                                    <td><?php echo $category->keterangan; ?></td>
                                    <td class="project-actions">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder"></i> View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
