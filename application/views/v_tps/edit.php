<form id="editForm" action="<?= site_url('c_tps/update/'.$tps['id_tps']) ?>" method="post">
    <div class="form-group">
        <label for="nama_tps">Nama TPS</label>
        <input type="text" class="form-control" id="nama_tps" name="nama_tps" value="<?= $tps['nama_tps'] ?>" required>
        <?= form_error('nama_tps', '<small class="text-danger">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="alamat_tps">Alamat TPS</label>
        <input type="text" class="form-control" id="alamat_tps" name="alamat_tps" value="<?= $tps['alamat_tps'] ?>" required>
        <?= form_error('alamat_tps', '<small class="text-danger">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="kapasitas">Kapasitas</label>
        <div class="input-group">
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?= $tps['kapasitas'] ?>" required>
            <div class="input-group-append">
                <span class="input-group-text">gram</span>
            </div>
        </div>
        <?= form_error('kapasitas', '<small class="text-danger">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" required><?= $tps['keterangan'] ?></textarea>
        <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <!-- <a href="<?= site_url('c_tps'); ?>" class="btn btn-secondary">Kembali</a> -->
</form>

<script>
    // Script untuk mengubah nilai kapasitas ke gram sebelum submit form
    document.getElementById('editForm').addEventListener('submit', function(e) {
        var kapasitas = document.getElementById('kapasitas').value;
        // Pastikan nilai kapasitas dalam bentuk gram sebelum dikirim
        document.getElementById('kapasitas').value = kapasitas;
    });
</script>
