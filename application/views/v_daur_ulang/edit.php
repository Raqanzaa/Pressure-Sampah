<form action="<?= site_url('c_daur_ulang/update_harian'); ?>" method="post">
    <input type="hidden" name="id" value="<?= $daur_ulang['id']; ?>">
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $daur_ulang['tanggal']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="berat_total">Total Berat Sampah</label>
        <input type="number" class="form-control" id="berat_total" name="berat_total" value="<?= $daur_ulang['berat_total']; ?>">
    </div>
    <div class="form-group">
        <label for="berat_daur_ulang">Sampah Terdaur Ulang</label>
        <input type="number" class="form-control" id="berat_daur_ulang" name="berat_daur_ulang" value="<?= $daur_ulang['berat_daur_ulang']; ?>">
    </div>
    <div class="form-group">
        <label for="residu">Residu Sampah</label>
        <input type="number" class="form-control" id="residu" name="residu" value="<?= $daur_ulang['residu']; ?>">
    </div>
    <div class="form-group">
        <label for="kategori_id">Kategori Sampah</label>
        <select class="form-control" name="kategori_id">
            <?php foreach ($kategori as $k) : ?>
                <option value="<?= $k['id_ktgrsampah']; ?>" <?= ($k['id_ktgrsampah'] == $daur_ulang['kategori_id']) ? 'selected' : ''; ?>><?= $k['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tps_id">Nama TPS</label>
        <input type="text" class="form-control" id="nama_tps" name="nama_tps" value="<?= $daur_ulang['nama_tps']; ?>" readonly>
        <input type="hidden" name="tps_id" value="<?= $daur_ulang['tps_id']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
