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
<script>
    function basicPopup(url) {
        popupWindow = window.open(url, 'popUpWindow',
            'height=300, width=700, left=50, top=50, resizable=yes, scrollbar=yes, toolbar=yes, menubar=no, location=no, directories=no, status = yes ')
    }
</script>

<body id="page-top">


    <?php
    include 'menu.php';
    include '../component/profile.php';
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
                <h6 class="m-0 font-weight-bold text-primary">Pengajuan Magang</h6>
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
                                <th scope="col" style="color: white; width: 80px;">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "SELECT
                            tb_pengajuanmagang.id,
                            tb_pengajuanmagang.nim,
                            tb_pengajuanmagang.nama_mahasiswa,
                            tb_pengajuanmagang.nama_perusahaan,
                            tb_pengajuanmagang.posisi,
                            tb_pengajuanmagang.persyaratan,
                            tb_pengajuanmagang.tgl_berakhir,
                            tb_pengajuanmagang.alamat,
                            tb_pengajuanmagang.`status`,
                            tb_cvmahasiswa.id,
                            tb_cvmahasiswa.nim,
                            tb_cvmahasiswa.nama_mahasiswa,
                            tb_cvmahasiswa.no_hp,
                            tb_cvmahasiswa.jurusan,
                            tb_cvmahasiswa.status_mahasiswa,
                            tb_cvmahasiswa.perusahaan,
                            tb_cvmahasiswa.jabatan,
                            tb_cvmahasiswa.tahun_angkatan,
                            tb_cvmahasiswa.ip1,
                            tb_cvmahasiswa.ip2,
                            tb_cvmahasiswa.ip3,
                            tb_cvmahasiswa.ip4,
                            tb_cvmahasiswa.total,
                            tb_cvmahasiswa.gambar 
                        FROM
                            tb_cvmahasiswa
                            INNER JOIN tb_pengajuanmagang ON tb_cvmahasiswa.nim = tb_pengajuanmagang.nim 
                        WHERE
                        tb_pengajuanmagang.nama_perusahaan = '$_SESSION[nama]' AND  tb_pengajuanmagang.`status`= 1 ");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;
                                $date = $d['tgl_berakhir'];
                                $date =  date('d-M-Y', strtotime($date));
                                if ($d['status'] == 1) {
                                    $status = '<span class="badge badge-pill badge-info" style="margin-top: 5px; font-size: 14px; ">Pending</span>';
                                }
                                if ($d['status'] == 2) {
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
                                    <td style="font-size: 14px"> <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- ################# Edit  ##################################################### -->
                                        <!-- Edit CV Mahasiswa-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg modal-dialog-scrollable" role="document">
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
                                                                <div class="form-group col-lg-12">
                                                                    <label class="col-sm-4 col-form-label">NIM</label>
                                                                    <input type="number" class="form-control " name="nim" value="<?php echo $d['nim']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                                                    <input type="text" class="form-control " name="nama_M" placeholder="Ketik Nama Mahasiswa.." value="<?php echo $d['nama_mahasiswa']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                                                    <input type="text" class="form-control " name="nama_P" value="<?php echo $d['nama_perusahaan']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label class="col-sm-4 col-form-label">Posisi</label>
                                                                    <input type="text" class="form-control " name="posisi" value="<?php echo $d['posisi']; ?>" required>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label class="col-sm-4 col-form-label">Persyaratan</label>
                                                                    <textarea class="ckeditor" id="ckedtor" name="persyaratan" placeholder="Ketik persyaratan" required><?php echo $d['persyaratan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label class="col-sm-4 col-form-label">Tanggal Berakhir</label>
                                                                    <input type="text" class="form-control " name="tgl_berakhir" onfocus="(this.type='date')" value="<?php echo $d['tgl_berakhir']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <label class="col-sm-4 col-form-label">Alamat perusahaan</label>
                                                                    <textarea class="form-control " style="height: 30px;" name="alamat" required=""><?php echo $d['alamat']; ?></textarea>

                                                                </div>


                                                            </div>


                                                            <div class="modal-footer ">
                                                                <button type="submit" name="status" class="btn   btn-success  " style="font-size: medium;" value="2"> Approve </button>
                                                                <button type="submit" name="status" class="btn   btn-danger  " style="font-size: medium;" value="3"> Reject </button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- AKHIR MODAL EDIT -->


                                        <a href="#" class="btn btn-warning btn-circle" data-target="#lihat<?php echo $d['nim']; ?>" data-toggle="modal">
                                            <i class="fas fa-info"></i>
                                        </a>
                                        <!-- AWAL DETAIL MODAL -->

                                        <div class="modal fade" id="lihat<?php echo $d['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NIM</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" class="form-control" value="<?php echo $d['nim']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['nama_mahasiswa']; ?>" readonly>
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['no_hp']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Jurusan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php $jurusan = $d['jurusan'];
                                                                                                                    if ($jurusan == "-") {
                                                                                                                        echo $jurusan = "-";
                                                                                                                    } else if ($jurusan == "AB") {
                                                                                                                        echo $jurusan = "Administrasi Bisnis";
                                                                                                                    } else if ($jurusan == "TK") {
                                                                                                                        echo $jurusan = "Teknologi Komputer";
                                                                                                                    } else {
                                                                                                                        echo $jurusan = "Akutansi";
                                                                                                                    } ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Status Mahasiswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php $status_M = $d['status_mahasiswa'];
                                                                                                                    if ($status_M == "-") {
                                                                                                                        echo $status_M = "-";
                                                                                                                    } else if ($status_M == "1") {
                                                                                                                        echo $status_M = "Magang";
                                                                                                                    } else {
                                                                                                                        echo $status_M = "Tidak Magang";
                                                                                                                    } ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['tahun_angkatan']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 1</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip1']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 2</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip2']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 3</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip3']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 4</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip4']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Total</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo number_format($d['total'], 1, '.', ''); ?>" readonly>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    </form>


                                                    <div class="modal-footer">
                                                        <a href="view_cv.php?id=<?php echo $d['id']; ?>" class="btn btn-info" style=" font-size: 16px; " onclick="basicPopup(this.href); return false">Lihat CV</a>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                </div>

                <!-- AKHIR DETAIL MODAL -->


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