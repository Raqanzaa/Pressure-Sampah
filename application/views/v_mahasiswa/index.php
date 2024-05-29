<!-- <?php var_dump($d_mahasiswa) ; ?> -->

<div class="container">
    <?php if ($this->session->flashdata()) : ?>
    
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>berhasil! </strong><?php echo $this->session->flashdata('success') ; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif ; ?>
    

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?php echo base_url() ; ?>c_mahasiswa/create" 
             class="btn btn-primary">Tambah data</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>List Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($d_mahasiswa as $mhs)  : ?>
                    <li class="list-group-item">
                        <?php echo $mhs['nama_mhs'] ; ?>
                        <a href="<?php echo base_url()  ; ?>c_mahasiswa/delete/<?php echo $mhs['id'] ; ?>" class="badge bg-danger text-decoration-none float-end" onclick="return confirm('yakin?');" >Hapus</a>
                    </li>
                <?php endforeach ; ?>     
            </ul>
        </div>
    </div>
</div>