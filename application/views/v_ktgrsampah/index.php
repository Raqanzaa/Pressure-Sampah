<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <!-- <h1>Kategori Sampah</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
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
                        <div class="float-left mb-3">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal">
                                <i class="fas fa-plus"></i> Tambah Kategori Sampah
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
                                    <?php if (!empty($ktgrsampah)): ?>
                                        <?php foreach ($ktgrsampah as $index => $k): ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td><?= $k['nama_kategori']; ?></td>
                                                <td><?= $k['deskripsi']; ?></td>
                                                <td><div style="width: 110px; height: 20px; background-color: <?= $k['warna_kategori']; ?>;"></div></td>
                                                <td>
                                                    <button class="btn btn-info btn-sm text-light" data-toggle="modal" data-target="#editModalLabel" onclick="loadEditForm(<?= $k['id_ktgrsampah']; ?>)">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <a href="<?= site_url('c_ktgrsampah/delete/'.$k['id_ktgrsampah']); ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5">Tidak ada data kategori sampah.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include the create modal -->
<?php $this->load->view('v_ktgrsampah/create'); ?>

<!-- Modal for Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Kategori Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content for edit will be dynamically loaded via AJAX -->
            </div>
        </div>
    </div>
</div>

<script>
    function loadEditForm(id_ktgrsampah) {
        console.log('Loading form for Kategori Sampah ID:', id_ktgrsampah);
        $.ajax({
            url: '<?= site_url('c_ktgrsampah/edit/') ?>' + id_ktgrsampah,
            type: 'GET',
            success: function(data) {
                console.log('AJAX success:', data);
                $('#editModalLabel .modal-body').html(data); // Memuat data ke dalam modal body
                $('#editModalLabel').modal('show'); // Menampilkan modal
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error); // Menampilkan error jika terjadi masalah
                console.log(xhr.responseText); // Melihat detail respon
            }
        });
    }
</script>