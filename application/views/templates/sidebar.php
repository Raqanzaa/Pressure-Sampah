<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand-link py-3">
    <img src="<?php echo base_url('assets/AdminLTE-3.2.0/dist/img/logo.svg'); ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">Pressure Sampah</span>
  </div>

  <!-- Sidebar -->
  <div class="sidebar pt-3">
    
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('list-tps'); ?>" class="nav-link">
            <i class="nav-icon fas fa-trash-alt"></i>
            <p>TPS</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('kategori-sampah'); ?>" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Kategori Sampah</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('c_recycle'); ?>" class="nav-link">
            <i class="nav-icon fas fa-recycle"></i>
            <p>Data Daur Ulang</p>
          </a>
        </li>
        <!-- Uncomment the below section if the 'c_regulasi' route is required -->
        <!-- 
        <li class="nav-item">
          <a href="<?php echo base_url('c_regulasi'); ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Regulasi</p>
          </a>
        </li> 
        -->
        <li class="nav-item">
          <a href="<?= site_url('artikel-sampah'); ?>" class="nav-link <?= ($this->uri->segment(1) == 'c_artikel' && in_array($this->uri->segment(2), ['index', 'tambah', 'edit'])) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-pen"></i>
              <p>Artikel</p>
          </a>
      </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
