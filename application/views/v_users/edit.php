<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1>Edit Profile</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('c_users/update/'.$user['id']); ?>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $user['full_name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>
                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                            <small class="form-text text-muted">Ukuran foto maksimal 2MB.</small>
                            <?php if (isset($profile_picture_error)) { ?>
                                <div class="text-danger"><?= $profile_picture_error ?></div>
                            <?php } ?>
                            <div class="image mt-3 text-center">
                                <img src="<?= !empty($user['profile_picture']) ? base_url('assets/img/profile/'.$user['profile_picture']) : base_url('assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2 profile-preview" alt="User Image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="<?= site_url('user-profile/index/'.$user['id']); ?>" class="btn btn-secondary">Cancel</a>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .profile-preview {
        width: 160px;
        height: 160px;
        object-fit: cover;
    }
</style>
