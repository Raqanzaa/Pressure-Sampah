<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <!-- <h1>Tempat Pembuangan Sampah</h1> -->
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
                        <div class="float-left mb-3">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal">
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
                                            <button class="btn btn-info btn-sm text-light" data-toggle="modal" data-target="#editModal" onclick="loadEditForm(<?= $t['id_tps']; ?>)">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="<?= site_url('C_tps/delete/'.$t['id_tps']); ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- Modal for Create -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah TPS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content from create.php -->
                <?php $this->load->view('v_tps/create'); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit TPS</h5>
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
    function loadEditForm(id_tps) {
        console.log('Loading form for TPS ID:', id_tps);
        $.ajax({
            url: '<?= site_url('C_tps/edit/') ?>' + id_tps,
            type: 'GET',
            success: function(data) {
                console.log('AJAX success:', data);
                $('#editModal .modal-body').html(data); // Memuat data ke dalam modal body
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error); // Menampilkan error jika terjadi masalah
                console.log(xhr.responseText); // Melihat detail respon
            }
        });
    }
</script>
