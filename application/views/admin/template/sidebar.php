<div class="wrapper">

<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=site_url('admin/dashboard')?>" class="nav-link">Home</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <li class="nav-item">
      <a href="<?=site_url('auth/logout')?>" class="btn btn-danger Btn-sm">Keluar</a>
     </li>
    </ul>
  </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=site_url('admin/dashboard')?>" class="brand-link">
      <span class="brand-text font-weight-light">Admin Control Panel</span>
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
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Order Produksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('admin/po')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input PO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('admin/print_po')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print PO</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Produksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('produksi/input')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Harian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('rencana_harian')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rencana Harian</p>
                </a>
              </li><li class="nav-item">
                <a href="<?=site_url('outstanding')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Extras</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Database
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('base_barang/')?>" class="nav-link">
                  <i class="fa fa-box nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('base_operator/')?>" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Operator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('base_mesin/')?>" class="nav-link">
                  <i class="fa fa-cogs nav-icon"></i>
                  <p>Mesin</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                Administrator
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('admin/users')?>" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('admin/adduser')?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add New Admin</p>
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