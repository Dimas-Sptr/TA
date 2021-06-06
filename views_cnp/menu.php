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
      Akun Pengguna
    </div>
    <li class="nav-item <?php is_active('buat_akun.php'); ?> ">
      <a class="nav-link" href="buat_akun.php">
        <i class="fas fa-users"></i>
        <span>Buat Akun</span></a>
    </li>
    <li class="nav-item <?php is_active('admin_cnp.php'); ?>
                        <?php is_active('perusahaan.php'); ?>
                        <?php is_active('mahasiswa_teraktivasi.php'); ?>">

      <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#userterdaftar" aria-expanded="true" aria-controls="userterdaftar">
        <i class="fas fa-address-book"></i>
        <span>User Terdaftar</span>
      </a>
      <div id="userterdaftar" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">User Terdaftar:</h6>
          <a class="collapse-item" href="admin_cnp.php">Admin C&P</a>
          <a class="collapse-item" href="perusahaan.php">Perusahaan</a>
          <a class="collapse-item" href="mahasiswa_teraktivasi.php">Mahasiswa Teraktivasi</a>

        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Aktivitas
    </div>

    <li class="nav-item <?php is_active('input_sppm.php'); ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-envelope-open"></i>
        <span>SPPM</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">sppm</h6>
          <a class="collapse-item" href="input_sppm.php">Input Data</a>

        </div>
      </div>
    </li>

    <li class="nav-item <?php is_active('data_mahasiswa.php'); ?>
                        <?php is_active('lowongan_magang.php'); ?>
                        <?php is_active('cv_mahasiswa.php'); ?>">

      <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#datamaster" aria-expanded="true" aria-controls="userterdaftar">
        <i class="fas fa-address-book"></i>
        <span>Data Master</span>
      </a>
      <div id="datamaster" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Master:</h6>
          <a class="collapse-item" href="data_mahasiswa.php">Data Mahasiswa</a>
          <a class="collapse-item" href="lowongan_magang.php">Lowongan Magang</a>
          <a class="collapse-item" href="cv_mahasiswa.php">CV Mahasiswa</a>

        </div>
      </div>
    </li>

    <li class="nav-item <?php is_active('mahasiswa_magang.php'); ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datarelease" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data Realease</span>
      </a>
      <div id="datarelease" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Release</h6>
          <a class="collapse-item" href="mahasiswa_magang.php">Mahasiswa Magang</a>

        </div>
      </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Permintaan
    </div>
    <li class="nav-item <?php is_active('data_permintaan.php'); ?> 
                        <?php is_active('pengajuan_magang.php'); ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data_permintaan" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-chart-area"></i>
        <span>Data Permintaan</span>
      </a>
      <div id="data_permintaan" class=" collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Permintaan</h6>
          <a class="collapse-item" href="data_permintaan.php">Data Permintaan</a>
          <a class="collapse-item" href="pengajuan_magang.php">Pengajuan Lowongan</a>


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