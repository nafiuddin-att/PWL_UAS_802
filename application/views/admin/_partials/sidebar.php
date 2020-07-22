    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('/admin/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'corona' ? 'active': '' ?>">
        <a class="nav-link " href="<?php echo site_url('/admin/corona') ?>">
          <i class="fas fa-shopping-cart"></i>
          <span>Tabel</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item" <?php echo $this->uri->segment(2) == 'list_grafik' ? 'active': '' ?>>
        <a class="nav-link" href="<?php echo site_url('/admin/corona/list_grafik') ?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Grafik</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>