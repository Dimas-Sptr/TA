<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header("Location:../login/login.php?pesan=failed");
    //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "perusahaan") {
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
    <?php

    $data = mysqli_query($conn, "select * from pass_adm where kode='$_SESSION[username]' ");

    $d = mysqli_fetch_array($data)
    ?>
    <div class="container">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-3 ">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ganti Password </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-12 col-lg-10">
                <div class="card">
                    <form id="frm-example" action="proses_updatePwd.php" method="POST" enctype="multipart/form-data">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>Password Lama</b></label>
                                        <input type="password" name="old_pwd" class="form-control" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">

                                    <label><b>Password Baru</b></label>
                                    <input type="password" name="new_pwd" class="form-control" autocomplete="off" required>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label><b>Konfirmasi Password Baru</b></label>
                                    <input type="password" name="new_pwdK" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button class="btn btn-info btn-lg btn-block" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
    <?php
    include '../component/script.php';
    include '../component/script_datatable.php';
    ?>

    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'Update_success') {
        echo "<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Ganti Password Berhasil',
        showConfirmButton: false,
        timer: 1500
    })
</script>";
    } else {
    }
    ?>

    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'password_failed') {

        echo " <script>Swal.fire(
'GAGAL',
'Password Lama Yang Anda Masukkan Salah',
'error')
</script>";
    } else {
    }

    ?>
    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'not_enought') {

        echo " <script>Swal.fire(
'GAGAL',
'Password Minimal Terdiri Dari 5 Karakter',
'error')
</script>";
    } else {
    }

    ?>
    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'passwordOld_failed') {

        echo " <script>Swal.fire(
'GAGAL',
'Password Baru Yang Anda Masukkan Tidak Cocok',
'error')
</script>";
    } else {
    }

    ?>
    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'fail') {

        echo " <script>Swal.fire(
'GAGAL',
'Password Baru Yang Anda Masukkan Tidak Cocok',
'error')
</script>";
    } else {
    }

    ?>

    <?php
    include '../component/footer.php';

    ?>

</body>





</html>