<section class="content-header">
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $tps['nama_tps']; ?></h3>
                        <div class="card-tools">
                            <a href="<?= site_url('presentase-daur-ulang'); ?>" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Total Berat Sampah</th>
                                        <th>Sampah Terdaur Ulang</th>
                                        <th>Residu Sampah</th>
                                        <th>Kategori Sampah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($daur_ulang as $du) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $du['tanggal']; ?></td>
                                            <td><?php echo $du['berat_total'] . " kg"; ?></td>
                                            <td><?php echo $du['berat_daur_ulang'] . " kg"; ?></td>
                                            <td><?php echo $du['residu'] . " kg"; ?></td>
                                            <td><?php echo $du['nama_kategori']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning text-light" data-toggle="modal" data-target="#editModal" onclick="loadEditForm(<?php echo $du['id']; ?>)">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a href="<?= site_url('presentase-daur-ulang/delete/' . $du['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
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
        </div>
    </div>
</section>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script>
    function loadEditForm(id) {
        $.ajax({
            url: '<?= site_url('presentase-daur-ulang/edit_harian/') ?>' + id,
            type: 'GET',
            success: function(data) {
                $('#editModal .modal-body').html(data); 
                $('#editModal').modal('show'); 
                attachResiduCalculation(); 
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                console.log(xhr.responseText); 
            }
        });
    }

    function attachResiduCalculation() {
        const beratTotalInput = document.getElementById('berat_total');
        const beratDaurUlangInput = document.getElementById('berat_daur_ulang');
        const residuInput = document.getElementById('residu');

        if (beratTotalInput && beratDaurUlangInput && residuInput) {
            const calculateResidu = () => {
                const beratTotal = parseFloat(beratTotalInput.value) || 0;
                const beratDaurUlang = parseFloat(beratDaurUlangInput.value) || 0;
                residuInput.value = beratTotal - beratDaurUlang;
            };

            beratTotalInput.addEventListener('input', calculateResidu);
            beratDaurUlangInput.addEventListener('input', calculateResidu);
        }
    }
</script>
