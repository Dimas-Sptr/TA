<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:../login/login.php?pesan=failed");
    //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "mahasiswa") {
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
    include '../component/profile.php';
    ?>
    <div class="container-fluid">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-3">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">History Rekrutmen</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">History Rekrutmen</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-bordered " style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color: white">No</th>
                                <th scope="col" style="color: white">NIM</th>
                                <th scope="col" style="color: white">Nama</th>
                                <th scope="col" style="color: white">Tempat</th>
                                <th scope="col" style="color: white">No Handphone</th>
                                <th scope="col" style="color: white">Jurusan</th>
                                <th scope="col" style="color: white">IPK</th>
                                <th scope="col" style="color: white">Rekrutmen By</th>
                                <th scope="col" style="color: white">Status</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "select * from tb_rekrutmen where nama_mahasiswa= '$_SESSION[nama]' AND status = 2   ");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;

                                if ($d['status'] == 3) {
                                    $status = '<span class="badge badge-pill badge-danger" style="margin-top: 5px; font-size: 14px; ">Rejected</span>';
                                }
                                if ($d['status'] == 2) {
                                    $status = '<span class="badge badge-pill badge-success" style="margin-top: 5px; font-size: 14px;">Approved</span>';
                                }



                            ?>
                                <tr>
                                    <th scope=" row" style="font-size: 14px"><?php echo $no; ?></th>
                                    <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama_mahasiswa'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['tempat'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['no_hp'];  ?></td>
                                    <td style="font-size: 14px"><?php $jurusan = $d['jurusan'];
                                                                if ($jurusan == "TK") {
                                                                    echo $jurusan = "Teknologi Komputer";
                                                                } else if ($jurusan == "AB") {
                                                                    echo $jurusan = "Administrasi Bisnis";
                                                                } else {
                                                                    echo $jurusan = "Akutansi";
                                                                } ?></td>
                                    <td style="font-size: 14px"><?php echo $d['total']; ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama_perusahaan']; ?></td>
                                    <td style="font-size: 14px"><?php echo $status; ?></td>


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
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'success') {

        echo " <script>Swal.fire(
  'Berhasil',
  'Data Berhasil Disimpan ',
  'success')
  </script>";
    } else {
    }

    ?>




    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable_wrapper .col-md-6:eq(0)');
        });
    </script>
    <?php
    include '../component/footer.php';

    ?>

</body>



</html>