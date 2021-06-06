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
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-4">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rekomendasi Mahasiswa</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-12 col-lg-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rekomendasi Mahasiswa</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-hover table-bordered " style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col" style="color: white">No</th>
                                        <th scope="col" style="color: white; width: 30px;">Nama</th>
                                        <th scope="col" style="color: white">Posisi</th>
                                        <th scope="col" style="color: white">Persyaratan</th>
                                        <th scope="col" style="color: white">Tanggal Berakhir</th>
                                        <th scope="col" style="color: white; width: 120px">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $data = mysqli_query($conn, "select * from tb_lowonganmagang where status='1'");

                                    while ($d = mysqli_fetch_array($data)) {
                                        $no++;
                                        $date = $d['tgl_berakhir'];
                                        $date =  date('d-M-Y', strtotime($date));

                                    ?>
                                        <tr>
                                            <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                            <td style="font-size: 14px"><?php echo $d['nama_perusahaan'];  ?></td>
                                            <td style="font-size: 14px"><?php echo $d['posisi'];  ?></td>
                                            <td style="font-size: 14px"><?php echo $d['persyaratan'];  ?></td>
                                            <td style="font-size: 14px"><?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                                            <td style="font-size: 14px"> <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                        </div>
                    </div>


                    </td>
                    </tr>
                <?php
                                    }
                ?>
                </tbody>

                </table>
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