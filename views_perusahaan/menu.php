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

    <li class="nav-item <?php is_active('status_lowongan.php'); ?>">
      <a class="nav-link" href="status_lowongan.php">
        <i class="fas fa-file-alt"></i>
        <span>Status Lowongan</span></a>
    </li>
    <li class="nav-item <?php is_active('pengajuan_magang.php'); ?>">
      <a class="nav-link" href="pengajuan_magang.php">
        <i class="fas fa-folder"></i>
        <span>Pengajuan Magang</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Rekomendasi Mahasiswa
    </div>

    <li class="nav-item <?php is_active('rekomendasi_mahasiswa.php'); ?>">
      <a class="nav-link" href="rekomendasi_mahasiswa.php">
        <i class="fas fa-address-book"></i>
        <span>Rekomendasi Mahasiswa</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      History
    </div>

    <li class="nav-item <?php is_active('history.php'); ?>">
      <a class="nav-link" href="history.php">
        <i class="fas fa-history"></i>
        <span>History</span></a>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>

  <!-- End of Sidebar -->

  <!-- Content Wrapper -->