<?php
function is_active($sidebar)
{
  $uri = "$_SERVER[REQUEST_URI]";
  if (strpos($uri, $sidebar)) {
    echo 'active';
  }
}
?>


<!-- Sidebar -->

<div id="wrapper">
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-icon ">
        <i class="fas fa-briefcase fa-7x"></i>
      </div>

      <div class="sidebar-brand-text mx-2">Halo Magang</div>

    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Aktivitas
    </div>

    <li class="nav-item <?php is_active('biodata.php'); ?>">
      <a class="nav-link" href="biodata.php">
        <i class="fas fa-user"></i>
        <span>Biodata</span></a>
    </li>
    <li class="nav-item <?php is_active('daftar_lowongan.php'); ?>">
      <a class="nav-link" href="daftar_lowongan.php">
        <i class="fas fa-clipboard-list"></i>
        <span>Daftar Lowongan</span></a>
    </li>
    <li class="nav-item <?php is_active('pengajuan_rekrutmen.php'); ?>">
      <a class="nav-link" href="pengajuan_rekrutmen.php">
        <i class="far fa-envelope"></i>
        <span>Pengajuan Rekrutmen</span>
      </a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      History
    </div>
    <li class="nav-item <?php is_active('history.php'); ?>
                        <?php is_active('history_rekrutmen.php'); ?> ">

      <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#history" aria-expanded="true" aria-controls="userterdaftar">
        <i class="fas fa-history"></i>
        <span>History</span>
      </a>
      <div id="history" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">History:</h6>
          <a class="collapse-item" href="history.php">History Pengajuan</a>
          <a class="collapse-item" href="history_rekrutmen.php">History Rekrutmen</a>


        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>

  <!-- End of Sidebar -->

  <!-- Content Wrapper -->