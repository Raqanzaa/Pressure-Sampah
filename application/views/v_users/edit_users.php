<!-- File: application/views/v_users/edit_users.php -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('user-management'); ?>">Manage Users</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php if ($this->session->flashdata('validation_errors')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('validation_errors'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo site_url('user-management/update/' . $user['id']); ?>" method="post">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $user['full_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password (leave blank to keep unchanged)</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <div class="form-group">
                        <label for="user_level">User Level</label>
                        <select class="form-control" id="user_level" name="user_level" required>
                            <option value="1" <?php echo $user['user_level'] == 1 ? 'selected' : ''; ?>>Super User</option>
                            <option value="0" <?php echo $user['user_level'] == 0 ? 'selected' : ''; ?>>Regular User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </section>