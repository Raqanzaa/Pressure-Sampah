<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?php echo base_url('/assets/AdminLTE-3.2.0/dist/img/logo.svg'); ?>" alt="Pressure Sampah Logo" height="60" width="60">
</div>

<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto pb-2 justify-content-end">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                <div class="user-panel d-flex align-items-center">
                    <div class="image">
                        <img src="<?php echo !empty($user['profile_picture']) ? base_url('assets/img/profile/'.$user['profile_picture']) : base_url('assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image" style="width: 35px; height: 35px; object-fit: cover;">
                    </div>
                    <div class="info">
                        <span class="d-block"><?php echo isset($user['full_name']) ? $user['full_name'] : ''; ?></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="<?php echo site_url('user-profile/index/'.$user['id']); ?>" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo site_url('auth/logout'); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                </a>

                <?php if (isset($user['user_level']) && $user['user_level'] == 1): ?>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo site_url('user-management'); ?>" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> Manajemen User
                    </a>
                <?php endif; ?>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

