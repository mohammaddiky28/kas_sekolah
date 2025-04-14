<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin/dashboard') ?>" class="brand-link text-center">
    <img src="<?= base_url('images/logo.jpg') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .9; width: 35px; height: 35px;">
    <span class="brand-text font-weight-bold ml-2">Kas Sekolah</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-home text-info"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('kas-masuk') ?>" class="nav-link">
            <i class="nav-icon fas fa-arrow-down text-success"></i>
            <p>Kas Masuk</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('kas-keluar') ?>" class="nav-link">
            <i class="nav-icon fas fa-arrow-up text-danger"></i>
            <p>Kas Keluar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('laporan') ?>" class="nav-link">
            <i class="nav-icon fas fa-file-alt text-primary"></i>
            <p>Laporan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/data-admin') ?>" class="nav-link">
            <i class="nav-icon fas fa-user-cog text-warning"></i>
            <p>Data Admin</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('logout') ?>" class="nav-link" onclick="return confirm('Yakin ingin logout?')">
            <i class="nav-icon fas fa-sign-out-alt text-light"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>