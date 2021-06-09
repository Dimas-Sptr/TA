<?php
session_start();

if (!isset($_SESSION['nama'])) {
    header("Location:../login/login.php?pesan=failed");
    //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "admin cnp") {
    // die("Anda bukan Admin");
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
                <li class="breadcrumb-item active" aria-current="page">Profile </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-12 col-lg-10">
                <form id="frm-example" action="proses_updateprofile.php" method="POST">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Profile Update</h6>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>NIP</b></label>
                                        <input type="text" name="kode" class="form-control" autocomplete="off" value="<?php echo $d['kode'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>Nama</b></label>
                                        <input type="text" name="nama" class="form-control" autocomplete="off" value="<?php echo $d['nama'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>Email</b></label>
                                        <input type="text" name="email" class="form-control" autocomplete="off" value="<?php echo $d['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>Hak Akses</b></label>
                                        <input type="text" name="level" class="form-control" autocomplete="off" value="<?php echo $d['level'] ?>" readonly>
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

                        </div>
                    </div>

            </div>
            </form>
        </div>
        <?php
        include '../component/script.php';
        include '../component/script_datatable.php';
        ?>

        <?php
        include '../component/footer.php';

        ?>
</body>
<?php
$pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

if ($pesan == 'Update_success') {
    echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Update Akun Berhasil',
                showConfirmButton: false,
                timer: 1500
            })
        </script>";
} else {
}
?>




</html>