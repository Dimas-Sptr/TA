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
                <li class="breadcrumb-item active" aria-current="page">Pengajuan Rekrutmen</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary">Pengajuan Rekrutmen</h6>
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
                                <th scope="col" style="color: white">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "SELECT
                            tb_rekrutmen.id,
                            tb_rekrutmen.nim,
                            tb_rekrutmen.nama_mahasiswa,
                            tb_rekrutmen.total,
                            tb_rekrutmen.tempat,
                            tb_rekrutmen.no_hp,
                            tb_rekrutmen.jurusan,
                            tb_rekrutmen.nama_perusahaan,
                            tb_rekrutmen.`status`,
                            pass_adm.nama,
                            pass_adm.alamat
                            FROM
                            tb_rekrutmen
                            INNER JOIN pass_adm ON tb_rekrutmen.nama_perusahaan = pass_adm.nama WHERE tb_rekrutmen.`status`=1");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;

                                if ($d['status'] == 1) {
                                    $status = '<span class="badge badge-pill badge-info" style="margin-top: 5px; font-size: 14px; ">Pending</span>';
                                }
                                if ($d['status'] == 3) {
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
                                    <td style="font-size: 14px">
                                        <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- pratinjau pengajuan rekrutmen -->

                                        <div class="modal fade" id="edit<?php echo $d['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Pratinjau Rekrutmen</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="user" method="POST" action="proses_editrekrut.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NIM</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="nim" class="form-control" value="<?php echo $d['nim']; ?>" id="recipient-name" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="nama_M" class="form-control" value="<?php echo $d['nama_mahasiswa']; ?>" id="recipient-name" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tempat</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="tempat" class="form-control" value="<?php echo $d['tempat']; ?>" id="recipient-name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">No Handphone</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="nohp" class="form-control" value="<?php echo $d['no_hp']; ?>" id="recipient-name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Jurusan</label>
                                                                <div class="col-sm-8">
                                                                    <select class="custom-select" name="jurusan" required>
                                                                        <?php
                                                                        if ($d['prodi'] == "-") echo "<option selected value='-' >Pilih Jurusan</option>";

                                                                        if ($d['prodi'] == "TK") echo "<option  value='TK' selected >Teknologi Komputer</option> ";
                                                                        else echo "<option  value='TK'>Teknologi Komputer</option>";

                                                                        if ($d['prodi'] == "AB") echo "<option  value='AB' selected >Administrasi Bisnis</option> ";
                                                                        else echo "<option  value='AB'>Administrasi Bisnis</option>";

                                                                        if ($d['prodi'] == "AK") echo "<option  value='AK' selected >Akutansi</option> ";
                                                                        else echo "<option  value='AK'>Akutansi</option>";

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Total IPK</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="total" class="form-control" value="<?php echo $d['total']; ?>" id="recipient-name" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Rekrutmen By</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="nama_P" class="form-control" value="<?php echo $d['nama_perusahaan']; ?>" id="recipient-name" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Alamat</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" name="alamat" readonly><?php echo $d['alamat']; ?> </textarea>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="status" class="btn btn-success" value="2">Approve</button>
                                                        <button type="submit" name="status" class="btn btn-danger" value="3">Reject</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- akhir pratinjau -->

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        </form>
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
  'Rekrutmen Berhasil ',
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