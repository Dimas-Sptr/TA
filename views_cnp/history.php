<?php
session_start();

if (!isset($_SESSION['username'])) {
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
    <div class="container-fluid">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-4">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">History Approved magang</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">History Approved magang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-bordered " style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color: white">No</th>
                                <th scope="col" style="color: white">NIM</th>
                                <th scope="col" style="color: white">Nama</th>
                                <th scope="col" style="color: white">Perusahaan</th>
                                <th scope="col" style="color: white">Posisi</th>
                                <th scope="col" style="color: white">Persyaratan</th>
                                <th scope="col" style="color: white">Tanggal Berakhir</th>
                                <th scope="col" style="color: white">Alamat</th>
                                <th scope="col" style="color: white">Status</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "select * from tb_pengajuanmagang where status ");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;
                                $date = $d['tgl_berakhir'];
                                $date =  date('d-M-Y', strtotime($date));
                                if ($d['status'] == 0) {
                                    $status = '<span class="badge badge-pill badge-info" style="margin-top: 5px; font-size: 14px; ">Pending</span>';
                                }
                                if ($d['status'] > 0) {
                                    $status = '<span class="badge badge-pill badge-success" style="margin-top: 5px; font-size: 14px;">Approved</span>';
                                }



                            ?>
                                <tr>
                                    <th scope=" row" style="font-size: 14px"><?php echo $no; ?></th>
                                    <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama_mahasiswa'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama_perusahaan'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['posisi'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['persyaratan']; ?></td>
                                    <td style="font-size: 14px"> <?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['alamat']; ?></td>
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

    if ($pesan == 'approved_success') {

        echo " <script>Swal.fire(
  'Berhasil',
  'Data Berhasil Diapprove',
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