<?php
session_start();

if (!isset($_SESSION['username'])) {
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
    include '../component/profile.php';
    ?>
    <div class="container-fluid">
        <div class="alert alert-primary " role="alert">
            Selamat Datang Kembali, <b> <?php echo $_SESSION['nama']; ?> </b>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>


        <?php

        $daftar_pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuanmagang where nama_perusahaan= '$_SESSION[nama]' AND status=1");

        $jumlah = mysqli_num_rows($daftar_pengajuan);

        ?>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 h-10">
                                <a href="pengajuan_magang.php" class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengajuan Magang
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

            $daftar_pengajuan = mysqli_query($conn, "SELECT * FROM tb_pengajuanmagang  where nama_perusahaan= '$_SESSION[nama]' AND status=2");

            $jumlah = mysqli_num_rows($daftar_pengajuan);

            ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 h-10">
                                <a href="history.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengajuan Magang Approved
                                </a>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            $data = mysqli_query($conn, "select * from tb_lowonganmagang where nama_perusahaan = '$_SESSION[nama]' ");

            while ($d = mysqli_fetch_array($data)) {





            ?>


                <div class="col-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Status Lowongan</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($d['status'] == 0) {
                                $status = '<div class="alert alert-info" style="text-align: center;">Pengajuan Lowongan Anda <a href="#" class="btn btn-info btn-sm">Pending</a></div>';
                            }
                            if ($d['status'] == 1) {
                                $status = '<div class="alert alert-success" style="text-align: center;">Pengajuan Lowongan Anda <a href="status_lowongan.php" class="btn btn-success btn-sm">Approved</a></div>';
                            }
                            ?>
                            <?php echo $status; ?>
                        </div>
                    </div>
                </div>


            <?php
            }
            ?>

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