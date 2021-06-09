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
            <ol class="breadcrumb col-lg-3">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengajuan Magang</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Data Permintaan</h6>
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
                                <th scope="col" style="color: white">Status</th>
                                <th scope="col" style="color: white">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "select * from tb_pengajuanmagang where status='0' ");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;
                                $date = $d['tgl_berakhir'];
                                $date =  date('d-M-Y', strtotime($date));
                                if ($d['status'] == 0) {
                                    $status = '<span class="badge badge-pill badge-info" style="margin-top: 5px; font-size: 14px; ">Pending</span>';
                                }
                                if ($d['status'] == 1) {
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
                                    <td style="font-size: 14px"><?php echo $status; ?></td>
                                    <td style="font-size: 14px">
                                        <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- ################# Edit  ##################################################### -->
                                        <!-- Edit CV Mahasiswa-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="edit">Pratinjau Pengajuan Magang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <form class="user" method="POST" action="proses_editpengajuan.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="nim" placeholder="Ketik NIM Mahasiswa.." value="<?php echo $d['nim']; ?>" required="">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="nama_M" placeholder="Ketik Nama Mahasiswa.." value="<?php echo $d['nama_mahasiswa']; ?>" required="">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="nama_P" placeholder="Ketik Nama Perusahaan..." value="<?php echo $d['nama_perusahaan']; ?>" required="">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="posisi" placeholder="Ketik Posisi Yang Dibutuhkan..." value="<?php echo $d['posisi']; ?>" required>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <textarea class="ckeditor" id="ckedtor" name="persyaratan" placeholder="Ketik persyaratan" required><?php echo $d['persyaratan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="tgl_berakhir" placeholder="Pilih Tanggal Berakhir ..." onfocus="(this.type='date')" value="<?php echo $d['tgl_berakhir']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <textarea class="form-control form-control-user" style="height: 30px;" name="alamat" required=""><?php echo $d['alamat']; ?></textarea>

                                                                </div>


                                                            </div>


                                                            <div class="modal-footer ">
                                                                <button type="submit" name="status" class="btn   btn-primary  " style="font-size: medium;" value="1"> Approve </button>
                                                                <button type="submit" name="status" class="btn   btn-danger  " style="font-size: medium;" value="3"> Reject </button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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