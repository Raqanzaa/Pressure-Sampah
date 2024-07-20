<form id="editForm" action="<?= site_url('C_ktgrsampah/update/'.$ktgrsampah['id_ktgrsampah']) ?>" method="post">
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $ktgrsampah['nama_kategori'] ?>" required>
        <?= form_error('nama_kategori', '<small class="text-danger">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $ktgrsampah['deskripsi'] ?></textarea>
        <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="warna_kategori">Warna Kategori</label>
        <input type="color" class="form-control" id="warna_kategori" name="warna_kategori" value="<?= $ktgrsampah['warna_kategori'] ?>" required>
        <?= form_error('warna_kategori', '<small class="text-danger">', '</small>') ?>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <!-- <a href="<?= site_url('C_ktgrsampah'); ?>" class="btn btn-secondary">Kembali</a> -->
</form>

<script>
    // Script untuk mengubah nilai warna_kategori sebelum submit form
    document.getElementById('editForm').addEventListener('submit', function(e) {
        var warna_kategori = document.getElementById('warna_kategori').value;
        document.getElementById('warna_kategori').value = warna_kategori;
    });
</script>