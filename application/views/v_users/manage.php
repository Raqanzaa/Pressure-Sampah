<!-- File: application/views/v_users/manage.php -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Manage Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('validation_errors')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('validation_errors'); ?>
                    </div>
                <?php endif; ?>

                <a href="<?php echo site_url('c_users/create_manage'); ?>" class="btn btn-primary mb-3">Add New User</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>User Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['full_name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['user_level'] == 1 ? 'Super User' : 'Regular User'; ?></td>
                                <td>
                                    <a href="<?php echo site_url('c_users/edit_manage/' . $user['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?php echo site_url('c_users/delete_manage/' . $user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
