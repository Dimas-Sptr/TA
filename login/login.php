<?php
session_start();
session_destroy();
?>
<?php
include '../component/header.php';
?>

<body class="bg-gradient-light">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class=" col-lg-6 ">
                <div class=" p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>

                  </div>
                  <form class="user" method="POST" action="ceklogin.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" aria-describedby="" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-user btn-block">
                      Login
                    </button>


                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#passwd_forget">Lupa Password ?</a>
                    ||
                    <a class="small" href="#" data-toggle="modal" data-target="#aktivasi">Aktivasi Akun</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade  bd-example-modal-lg" id="aktivasi" tabindex="-1" aria-labelledby="aktivasi" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header ">
                <h5 class="modal-title" id="aktivasi">Aktivasi Akun!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <div class="modal-body">
                <form class="user" method="POST" action="aktivasi_mhs.php">
                  <div class="form-row">
                    <div class="form-group col-xl-6">
                      <input type="number" class="form-control form-control-user" name="nim" placeholder="Masukkan Nim Kamu..." required="">
                    </div>

                    <div class="col-lg-6">
                      <input type="email" class="form-control form-control-user" name="email" placeholder="Masukkan Email Kamu..." required>
                    </div>
                  </div>
                  <div class="form-group ">
                    <input type="text" hidden="true" class="form-control form-control-user" name="level" value="mahasiswa" readonly="">
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="aktivasi" class="btn  btn-primary btn-user btn-block" value="Aktivasi">
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- modal forget password -->
    <div class="modal fade" id="passwd_forget">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Informasi </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <h6>Jika <b>Lupa Password</b>, silahkan hubungi bagian <b>Akademik</b> kampus untuk <i>Reset Password</i></h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Paham!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

  include '../component/script.php';

  ?>
  <?php

  $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

  if ($pesan == 'success') {

    echo " <script>Swal.fire(
  'Aktivasi Berhasil',
  '<b>Nim</b> Adalah <b>Username</b> Dan <b>Password</b> Kamu',
  'success')
  </script>";
  } else {
  }

  ?>

  <?php

  $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

  if ($pesan == 'gagal_login') {

    echo " <script>Swal.fire(
  'GAGAL',
  'username atau password salah',
  'error')
  </script>";
  } else {
  }

  ?>
  <?php

  $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

  if ($pesan == 'failed') {

    echo " <script>
    Swal.fire(
  'GAGAL',
  'Maaf, Anda harus login terlebih dahulu',
  'error')
  </script>";
  } else {
  }

  ?>
  <?php

  $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

  if ($pesan == 'exist') {

    echo " <script>
Swal.fire(
'GAGAL',
'Maaf, NIM Sudah Teraktivasi',
'info')
</script>";
  } else {
  }

  ?>
  <?php

  $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

  if ($pesan == 'doesnt_exist') {

    echo " <script>
  Swal.fire(
'GAGAL',
'NIM yang anda masukkan tidak tersedia',
'error')
</script>";
  } else {
  }

  ?>



  </script>
</body>

</html>