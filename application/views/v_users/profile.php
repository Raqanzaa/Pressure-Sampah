<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1>Profile</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $user['full_name'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="profile_picture">Foto Profil</label>
                            <div class="image text-center">
                                <img id="profileImage" src="<?= !empty($user['profile_picture']) ? base_url('assets/img/profile/'.$user['profile_picture']) : base_url('assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2 profile-picture" alt="User Image">
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <a href="<?= site_url('user-profile/edit/'.$user['id']); ?>" class="btn btn-primary">Edit Profil</a>
                            <?php if (!empty($user['profile_picture'])): ?>
                                <a href="<?= site_url('C_users/delete_profile_picture/'.$user['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus foto profil?')">Hapus Foto</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add this CSS block to ensure consistent image dimensions -->
<style>
    .profile-picture {
        width: 160px;
        height: 160px;
        object-fit: cover; /* Ensures the image covers the entire area without distortion */
    }
</style>
