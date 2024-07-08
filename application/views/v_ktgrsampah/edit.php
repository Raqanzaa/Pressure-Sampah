<!-- Modal for Edit Kategori Sampah -->
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
                <form action="<?= site_url('c_ktgrsampah/update/'.$ktgrsampah['id_ktgrsampah']) ?>" method="post">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>