<?php echo form_open('C_ktgrsampah/store'); ?>
<div class="form-group">
    <label for="nama_kategori">Nama Kategori</label>
    <input type="text" name="nama_kategori" class="form-control" required>
</div>
<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required></textarea>
</div>
<div class="form-group">
                        <label for="warna_kategori">Warna Kategori</label>
                        <input type="color" class="form-control" id="warna_kategori" name="warna_kategori" required>
                    </div>
<button type="submit" class="btn btn-primary">Simpan</button>
<!-- <a href="<?php echo site_url('C_ktgrsampah'); ?>" class="btn btn-secondary">Kembali</a> -->
<?php echo form_close(); ?>
