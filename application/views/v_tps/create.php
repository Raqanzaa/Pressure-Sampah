
<?php echo form_open('C_tps/store'); ?>
<div class="form-group">
    <label for="nama_tps">Nama TPS</label>
    <input type="text" name="nama_tps" class="form-control" required>
</div>
<div class="form-group">
    <label for="alamat_tps">Alamat TPS</label>
    <input type="text" name="alamat_tps" class="form-control" required>
</div>
                       
<div class="form-group">
    <label for="kapasitas">Kapasitas</label>
    <div class="input-group">
        <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
        <div class="input-group-append">
            <select class="form-control" name="satuan" id="satuan">
                <option value="g">gram</option>
                <option value="kg">kg</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" class="form-control" required></textarea>
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<!-- <a href="<?php echo site_url('C_tps'); ?>" class="btn btn-secondary">Kembali</a> -->
<?php echo form_close(); ?>
