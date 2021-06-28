<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location:../login/login.php?pesan=failed");
  //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "admin cnp") {
  header("Location:../login/login.php?pesan=failed");
}
?>

<?php
include '../conn/koneksi.php';
include '../component/header.php';
?>


<body id="page-top">


  <?php
  include 'menu.php';
  include '../component/profile1.php';
  ?>
  <div class="container-fluid">
    <div class="alert alert-primary " role="alert">
      Selamat Datang Kembali, <b> <?php echo $_SESSION['nama']; ?> </b>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>

    </div>
    <div class="row">

      <?php

      $daftar_akunPer = mysqli_query($conn, "SELECT * FROM pass_adm where level='perusahaan'");

      $jumlah = mysqli_num_rows($daftar_akunPer);

      ?>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2 h-10">
                <a href="buat_akun.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">Akun Perusahaan Terdaftar</a>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-building fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php

      $daftar_akun = mysqli_query($conn, "SELECT * FROM pass_adm where level='admin cnp'");

      $jumlah = mysqli_num_rows($daftar_akun);

      ?>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2 h-10">
                <a href="buat_akun.php" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Akun CNP Terdaftar
                </a>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php

      $daftar_pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuanmagang where status=1");

      $jumlah = mysqli_num_rows($daftar_pengajuan);

      ?>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2 h-10">
                <a href="history.php" class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengajuan Magang Approved
                </a>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>


      <?php

      $daftar_lowongan = mysqli_query($conn, "SELECT * FROM tb_lowonganmagang where status=1");

      $jumlah = mysqli_num_rows($daftar_lowongan);

      ?>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2 h-10">
                <a href="lowongan_magang.php" class="text-xs font-weight-bold text-danger text-uppercase mb-1">Lowongan Magang Approved
                </a>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <?php
  include '../component/script.php';
  include '../component/script_datatable.php';
  ?>
  <?php
  include '../component/footer.php';

  ?>

</body>



</html>