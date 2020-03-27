  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=site_url('public_area')?>" class="brand-link">
      <span class="brand-text font-weight-light">Cv. Atari Plastik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><b><?=$_SESSION['username']?></b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="<?=site_url('History_produksi')?>" class="nav-link">
              <i class="fa fa-history nav-icon"></i>
              <p>History Produksi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('lap_pengiriman')?>" class="nav-link">
              <i class="fa fa-shipping-fast nav-icon"></i>
              <p>Laporan Pengiriman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('lap_barang')?>" class="nav-link">
              <i class="fab fa-warehouse nav-icon"></i>
              <p>Laporan Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('lap_material')?>" class="nav-link">
              <i class="fa fa-box nav-icon"></i>
              <p>Laporan Material</p>
            </a>
          </li>
            </ul>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>