<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?php echo base_url('/assets/AdminLTE-3.2.0/dist/img/logo.svg'); ?>" alt="Pressure Sampah Logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url('/assets/AdminLTE-3.2.0/index3.html'); ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto pb-2 justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                        <div class="user-panel d-flex align-items-center">
                            <div class="image">
                                <img src="<?php echo base_url('/assets/AdminLTE-3.2.0/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <span class="d-block"><?php echo isset($user['full_name']) ? $user['full_name'] : ''; ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Profile -->
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item">
                            <!-- Logout -->
                            <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
    </div>
    <!-- /.wrapper -->
</body>
