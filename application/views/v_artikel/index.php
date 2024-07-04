<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Artikel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Artikel</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Artikel</h3>
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
                        <a class="btn btn-success btn-sm" href="<?php echo site_url('c_artikel/tambah'); ?>">
                            <i class="fas fa-plus"></i> Tambah Artikel
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: auto;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Author</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                <tr>
                                    <td><?php echo $article->id_artikel; ?></td>
                                    <td><?php echo $article->judul; ?></td>
                                    <td><?php echo $article->author_name; ?></td>
                                    <td><?php echo $article->tanggal_publikasi; ?></td>
                                    <td class="project-actions">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder"></i> View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="<?php echo site_url('c_artikel/edit/'.$article->id_artikel); ?>">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('c_artikel/hapus/'.$article->id_artikel); ?>">
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
