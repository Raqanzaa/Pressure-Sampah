<form id="createForm" action="<?= site_url('c_daur_ulang/submit_harian') ?>" method="post">
    <input type="hidden" name="tanggal" id="inputTanggal" value="">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let icons = document.querySelectorAll('.add-icon');
        
        icons.forEach(icon => {
            icon.addEventListener('click', function() {
                let selectedDate = this.getAttribute('data-date');
                document.getElementById('inputTanggal').value = selectedDate;
            });
        });

        let currentDate = new Date().toISOString().split('T')[0];
        document.getElementById('inputTanggal').value = currentDate;

        document.getElementById('createForm').addEventListener('submit', function(event) {
            if (!document.getElementById('inputTanggal').value) {
                document.getElementById('inputTanggal').value = new Date().toISOString().split('T')[0];
            }
        });
    });
</script>
