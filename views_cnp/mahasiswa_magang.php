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
    <div class="container">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-3">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mahasiswa Magang</li>
            </ol>
        </nav>

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
                            $data = mysqli_query($conn, "SELECT * FROM tb_pengajuanmagang where status = '2'");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;


                            ?>
                                <tr>
                                    <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                    <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama_mahasiswa'];  ?></td>
                                    <td style="font-size: 14px"><?php $status_M = $d['status'];
                                                                if ($status_M == '2') {
                                                                    echo $status_M = " Magang";
                                                                } else {
                                                                    echo $status_M = "-";
                                                                } ?></td>
                                    <td style="font-size: 14px"> <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- ################# Edit  ##################################################### -->
                                        <!-- Edit CV Mahasiswa-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog   " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="edit">Edit Mahasiswa Magang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <form class="user" method="POST" action="proses_editRelease.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NIM</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" class="form-control " name="nim" value="<?php echo $d['nim']; ?>" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="nama" value="<?php echo $d['nama_mahasiswa']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Status Mahsiswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="status" value="<?php $status_M = $d['status'];
                                                                                                                                    if ($status_M == '2') {
                                                                                                                                        echo $status_M = " Magang";
                                                                                                                                    } else {
                                                                                                                                        echo $status_M = "-";
                                                                                                                                    } ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="perusahaan" value="<?php echo $d['nama_perusahaan']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Posisi</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="posisi" value="<?php echo $d['posisi']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Alamat</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="alamat" value="<?php echo $d['alamat']; ?>" readonly>
                                                                </div>
                                                            </div>


                                                    </div>


                                                    <div class="modal-footer ">
                                                        <button type="submit" name="selesai" class="btn   btn-danger " style="font-size: medium;" value='4'>Selesai Magang</button>
                                                        <button type="submit" name="simpan" class="btn   btn-primary " style="font-size: medium;"> Simpan </button>

                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                </div>
                <!----------- Akhir Edit  Modal -------------->

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