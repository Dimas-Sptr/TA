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
  include '../component/profile.php';
  ?>
  <div class="container-fluid">
    <div class="alert alert-primary " role="alert">
      Selamat Datang Kembali, <b> <?php echo $_SESSION['nama']; ?> </b>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
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