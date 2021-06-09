<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:../login/login.php?pesan=failed");
    //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "mahasiswa") {
    header("Location:../login/login.php?pesan=failed");
}
?>

<?php
include '../conn/koneksi.php';
include '../component/header.php';
?>
<?php

$daftar_lowongan = mysqli_query($conn, "SELECT * FROM tb_lowonganmagang where status =1");

$jumlah = mysqli_num_rows($daftar_lowongan);

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
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-40 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 h-10">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Daftar Lowongan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            $data = mysqli_query($conn, "select * from tb_lowonganmagang where status='0' ");

            while ($d = mysqli_fetch_array($data)) {

                if ($d['status'] == 0) {
                    $status = '<span class="badge badge-pill badge-info" style="margin-top: 5px; font-size: 14px; ">Pending</span>';
                }
                if ($d['status'] == 1) {
                    $status = '<span class="badge badge-pill badge-success" style="margin-top: 5px; font-size: 14px;">Approved</span>';
                }



            ?>


                <div class="col-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Status Pengajuan</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($d['status'] == 0) {
                                $status = '<div class="alert alert-info" style="text-align: center;">Pengajuan Magang Anda <a href="history.php" class="btn btn-info btn-sm">Pending</a></div>';
                            }
                            if ($d['status'] == 1) {
                                $status = '<span class="badge badge-pill badge-success" style="margin-top: 5px; font-size: 14px;">Approved</span>';
                            }
                            ?>
                            <?php echo $status; ?>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
            <?php

            $daftar_pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuanmagang where nim ='$_SESSION[username]'");
            $jml = mysqli_num_rows($daftar_pengajuan);
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-40 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 h-10">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">History Magang</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-history fa-2x text-gray-300"></i>
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