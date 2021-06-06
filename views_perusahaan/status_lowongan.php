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
            <ol class="breadcrumb col-lg-3">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Status Lowongan</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-12 col-lg-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Status Lowongan</h6>
                        <div class="dropdown no-arrow"><button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#buat_lowongan" style="float: right;">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                </span>
                                <span class="text">Ajukan Lowongan</span>
                                </a></button>
                        </div>
                    </div>
                    <!-- ################# AWAL TAMBAH ##################################################### -->
                    <!-- Tambah Lowongan-->
                    <div class="modal fade  bd-example-modal-lg" id="buat_lowongan" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable   " role="document">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h5 class="modal-title" id="aktivasi">Tambah Lowongan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <div class="modal-body">
                                    <form class="user" method="POST" action="proses_tambahLowongan.php">
                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama Perusahaan..." required="">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <input type="text" class="form-control form-control-user" name="posisi" placeholder="Ketik Posisi Yang Dibutuhkan ..." required>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <textarea class="ckeditor" id="editor" name="persyaratan" required></textarea>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <input type="text" class="form-control form-control-user" name="tgl_berakhir" placeholder="Pilih Tanggal Berakhir ..." onfocus="(this.type='date')">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <input type="text" class="form-control form-control-user" name="alamat" placeholder="Ketik Alamat Perusahaan ..." required>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer ">
                                    <button type="submit" name="simpan" class="btn  btn-user btn-primary  btn-block"> Simpan </button>

                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!---------------- AKHIR TAMBAH Lowongan ----------------->

                    <div class="card-body">
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
                                            <th scope="col" style="color: white">Status</th>
                                            <th scope="col" style="color: white; width: 120px">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $data = mysqli_query($conn, "select * from tb_lowonganmagang");

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
                                                <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                                <td style="font-size: 14px"><?php echo $d['nama_perusahaan'];  ?></td>
                                                <td style="font-size: 14px"><?php echo $d['posisi'];  ?></td>
                                                <td style="font-size: 14px"><?php echo $d['persyaratan'];  ?></td>
                                                <td style="font-size: 14px"><?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                                                <td style="font-size: 14px"><?php echo $status; ?></td>
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
                                                                    <form class="user" method="POST" action="proses_editLowongan.php">
                                                                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-lg-12">
                                                                                <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama Perusahaan..." value="<?php echo $d['nama_perusahaan'];  ?>" required="">
                                                                            </div>
                                                                            <div class="form-group col-lg-12">
                                                                                <input type="text" class="form-control form-control-user" name="posisi" placeholder="Ketik Posisi ..." value="<?php echo $d['posisi'];  ?>" required>
                                                                            </div>
                                                                            <div class="form-group col-lg-12">
                                                                                <textarea class="ckeditor" id="editor" name="persyaratan" required><?php echo $d['persyaratan']; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group col-lg-12">
                                                                                <input type="date" class="form-control form-control-user" name="tgl_berakhir" value="<?php echo $d['tgl_berakhir'];  ?>" required>
                                                                            </div>
                                                                            <div class="form-group col-lg-12">

                                                                                <textarea class="form-control  form-control-user" name="alamat" aria-label="With textarea"><?php echo $d['alamat']; ?></textarea>
                                                                            </div>
                                                                            <?php
                                                                            if ($d['status'] == 0) {
                                                                                $status = "Pending";
                                                                            }
                                                                            if ($d['status'] == 1) {
                                                                                $status = "Approved";
                                                                            }
                                                                            ?>
                                                                            <div class="form-group col-lg-12">
                                                                                <input type="text" class="form-control form-control-user" name="status" value="<?php echo $status  ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer ">
                                                                    <button type="submit" name="simpan" class="btn  btn-user btn-primary  btn-block"> Update </button>

                                                                </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---------------- AKHIR Edit Lowongan ----------------->
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


    <?php
    include '../component/script.php';
    include '../component/script_datatable.php';
    ?>
    <script>
        CKEDITOR.replace('editor', {
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Ketik Persyaratan Perusahaan'
        });
    </script>
    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'add_success') {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Tambah Lowongan Berhasil',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
    } else {
    }
    ?>
    <?php
    include '../component/footer.php';

    ?>



</body>



</html>