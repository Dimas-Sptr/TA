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



<body id="page-top">


    <?php
    include 'menu.php';
    include '../component/profile.php';
    ?>

    <div class="container-fluid">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-3">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Lowongan</li>
            </ol>
        </nav>


        <div class="card">
            <div class="card-header ">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Lowongan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-bordered " style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color: white">No</th>
                                <th scope="col" style="color: white;">Nama</th>
                                <th scope=" col" style="color: white">Posisi</th>
                                <th scope="col" style="color: white">Persyaratan</th>
                                <th scope="col" style="color: white">Tanggal Berakhir</th>
                                <th scope="col" style="color: white;">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "select * from tb_lowonganmagang where status=1");

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
                                        <!-- ################# AWAL Edit ##################################################### -->
                                        <!-- Edit Lowongan-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable   " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="aktivasi">Edit Pengajuan Lowongan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <form class="user" method="POST" action="#">
                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-12">
                                                                    <input type="text" class="form-control form-control-user" name="nama_P" placeholder="Ketik Nama Perusahaan..." value="<?php echo $d['nama_perusahaan'];  ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <input type="text" class="form-control form-control-user" name="posisi" placeholder="Ketik Posisi ..." value="<?php echo $d['posisi'];  ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <textarea class="ckeditor" id="editor" name="persyaratan" readonly="readonly"><?php echo $d['persyaratan']; ?> </textarea>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <input type="date" class="form-control form-control-user" name="tgl_berakhir" value="<?php echo $d['tgl_berakhir'];  ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-lg-12">

                                                                    <textarea class="form-control  form-control-user" name="alamat" aria-label="With textarea" readonly><?php echo $d['alamat']; ?></textarea>
                                                                </div>

                                                            </div>
                                                    </div><?php
                                                        }
                                                            ?>
                                                <div class="modal-footer ">
                                                    <?php
                                                    $data = mysqli_query($conn, "select * from tb_pengajuanmagang where nim = '$_SESSION[username]'  ");

                                                    while ($d = mysqli_fetch_array($data)) {
                                                        if ($d['status'] < 2) {
                                                            $status = '<button type="submit" name="simpan" class="btn  btn-user btn-success" disabled > Ajukan Magang </button>';
                                                        }
                                                        if ($d['status'] > 2) {
                                                            $status = '<button type="submit" name="simpan" class="btn  btn-user btn-success"> Ajukan Magang </button>';
                                                        }

                                                    ?>
                                                        <?php echo $status; ?>


                                                    <?php
                                                    }
                                                    ?>

                                                </div>

                                                </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!---------------- AKHIR Edit Lowongan ----------------->

                                    </td>
                                </tr>

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

    if ($pesan == 'add_success') {

        echo " <script>Swal.fire(
  'Berhasil',
  'Pengajuan Berhasil Disimpan',
  'success')
  </script>";
    } else {
    }

    ?>

    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'add_failed') {

        echo " <script>
    Swal.fire({
        icon: 'info',
        title: 'Oops...',
        text: 'Mohon Isi Biodata Terlebih Dahulu',
        
      })
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