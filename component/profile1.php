<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <?php
      include '../component/hari.php';
      echo date(', d F Y');
      ?>

      <ul class="navbar-nav ml-auto">
        <?php

        $daftar_lowongan = mysqli_query($conn, "SELECT * FROM tb_lowonganmagang where status=0");

        $jumlah1 = mysqli_num_rows($daftar_lowongan);

        $daftar_pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuanmagang where status=0");

        $jumlah2 = mysqli_num_rows($daftar_pengajuan);

        $total = $jumlah1 + $jumlah2;


        ?>

        <li class="nav-item dropdown no-arrow ">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter"><?php echo $total; ?></span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Notification
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fas fa-comment text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500"><?php echo date(', d F Y'); ?></div>
                <span class="font-weight-bold">PENGAJUAN MAGANG = <?php echo $jumlah2; ?></span>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-building text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500"><?php echo date(', d F Y'); ?></div>
                <span class="font-weight-bold">PENGAJUAN LOWONGAN = <?php echo $jumlah1; ?></span>
              </div>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow" style="margin-right: 50px;">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 large">
              <?php
              echo $_SESSION['nama'];
              ?>
            </span>
            <img class="img-profile rounded-circle" src="../img/profile.png" alt="">

          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profile_update.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="pwd_change.php">
              <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
              Ganti Password
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>


      </ul>

    </nav>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Meninggalkan?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" jika kamu ingin keluar</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../login/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    </nav>