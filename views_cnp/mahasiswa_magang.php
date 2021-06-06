<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:../login/login.php?pesan=failed");
    //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "admin cnp") {
    die("Anda bukan Admin");
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
    <div class="container">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-3">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mahasiswa Magang</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-12 col-lg-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                        <h6 class="m-0 font-weight-bold text-primary">Data Release</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-hover table-bordered " style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col" style="color: white">No</th>
                                        <th scope="col" style="color: white">Nim</th>
                                        <th scope="col" style="color: white; ">Nama</th>
                                        <th scope="col" style="color: white">Status</th>
                                        <th scope="col" style="color: white; width: 120px">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $data = mysqli_query($conn, "select * from tb_cvmahasiswa where status_mahasiswa = '1'");

                                    while ($d = mysqli_fetch_array($data)) {
                                        $no++;


                                    ?>
                                        <tr>
                                            <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                            <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                                            <td style="font-size: 14px"><?php echo $d['nama_mahasiswa'];  ?></td>
                                            <td style="font-size: 14px"><?php $status_M = $d['status_mahasiswa'];
                                                                        if ($status_M == "1") {
                                                                            echo $status_M = "Magang";
                                                                        } ?></td>
                                            <td style="font-size: 14px"> <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- ################# Edit  ##################################################### -->
                                                <!-- Edit CV Mahasiswa-->
                                                <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                                    <div class="modal-dialog  modal-sm " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header ">
                                                                <h5 class="modal-title" id="edit">Edit Data Release</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>


                                                            <div class="modal-body">
                                                                <form class="user" method="POST" action="proses_editRelease.php" enctype="multipart/form-data">
                                                                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-10">
                                                                            <input type="text" class="form-control form-control-user" name="nim" placeholder="Ketik NIM kamu..." value="<?php echo $d['nim']; ?>" required="">
                                                                        </div>
                                                                        <div class="form-group col-lg-10">
                                                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama Mahasiswa ..." value="<?php echo $d['nama_mahasiswa']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group col-lg-10">
                                                                            <select class="custom-select" style="height: 50px;  border-radius: 30px;" name="status_M" required>
                                                                                <?php
                                                                                if ($d['status_mahasiswa'] == "") echo "<option selected >Pilih Status</option>";

                                                                                if ($d['status_mahasiswa'] == "1") echo "<option  value='1' selected >Magang</option> ";
                                                                                else echo "<option  value='1'>Magang</option>";

                                                                                if ($d['status_mahasiswa'] == "0") echo "<option  value='0' selected >Tidak Magang</option> ";
                                                                                else echo "<option  value='0'>Tidak Magang</option>";
                                                                                ?>
                                                                            </select>
                                                                        </div>


                                                                    </div>


                                                                    <div class="modal-footer ">
                                                                        <button type="submit" name="simpan" class="btn  btn-user btn-primary  btn-block" style="font-size: medium;"> Simpan </button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!----------- Akhir Edit  Modal -------------->

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
    </div>
    <?php
    include '../component/script.php';
    include '../component/script_datatable.php';
    ?>
    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'Update_success') {

        echo " <script>Swal.fire(
  'Berhasil',
  'Data Berhasil Disimpan',
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