<!-- v_daur_ulang/harian.php -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1>Pencatatan Laporan Bulan <?php echo $nama_bulan . ' ' . $tahun; ?></h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pencatatan Harian</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Bulan <?php echo $nama_bulan . ' ' . $tahun; ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('c_daur_ulang/submit_harian') ?>" method="post">
                            <div class="form-group">
                                <label for="tps_id">Nama TPS</label>
                                <select class="form-control" id="tps_id" name="tps_id" required>
                                    <?php foreach ($tps as $t): ?>
                                        <option value="<?= $t['id_tps'] ?>"><?= $t['nama_tps'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori Sampah</label>
                                <select class="form-control" id="kategori_id" name="kategori_id" required>
                                    <?php foreach ($kategori as $kat): ?>
                                        <option value="<?= $kat['id_ktgrsampah'] ?>"><?= $kat['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="berat_total">Total Berat Sampah (kg)</label>
                                <input type="number" step="0.01" class="form-control" id="berat_total" name="berat_total" required>
                            </div>
                            <div class="form-group">
                                <label for="berat_daur_ulang">Sampah Terdaur Ulang (kg)</label>
                                <input type="number" step="0.01" class="form-control" id="berat_daur_ulang" name="berat_daur_ulang" required>
                            </div>
                            <div class="form-group">
                                <label for="residu">Residu Sampah (kg)</label>
                                <input type="number" step="0.01" class="form-control" id="residu" name="residu" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const beratTotalInput = document.getElementById('berat_total');
    const beratDaurUlangInput = document.getElementById('berat_daur_ulang');
    const residuInput = document.getElementById('residu');

    function updateResidu() {
        const beratTotal = parseFloat(beratTotalInput.value) || 0;
        const beratDaurUlang = parseFloat(beratDaurUlangInput.value) || 0;
        residuInput.value = beratTotal - beratDaurUlang;
    }

    beratTotalInput.addEventListener('input', updateResidu);
    beratDaurUlangInput.addEventListener('input', updateResidu);
});
</script>
