<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors() ; ?>
                        </div>
                    <?php endif ; ?>
                    
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_mhs" class="form-label">Nama</label>
                            <input type="text" name="nama_mhs" class="form-control" id="nama_mhs"  >
                        </div>
                        <div class="form-group">
                            <label for="nim_mhs" class="form-label">NIM</label>
                            <input type="text" name="nim_mhs" class="form-control" id="nim_mhs">
                        </div>
                        <div class="form-group">
                            <label for="email_mhs" class="form-label">Email</label>
                            <input type="text" name="email_mhs" class="form-control" id="email_mhs">
                        </div>
                        <div class="form-group">
                            <label for="jurusan_mhs" class="form-label">Jurusan</label>
                            <select class="form-select" aria-label="Default select example" name="jurusan_mhs">
                                <option selected>Pilih jurusan anda</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Informatika">Informatika</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-3" name="tambah" >Tambah</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>