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
            <ol class="breadcrumb col-lg-4">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rekomendasi Mahasiswa</li>
            </ol>
        </nav>

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
                                <th scope="col" style="color: white; width: 30px;">NIM</th>
                                <th scope="col" style="color: white">Nama</th>
                                <th scope="col" style="color: white">Tempat Lahir</th>
                                <th scope="col" style="color: white">Tanggal Lahir</th>
                                <th scope="col" style="color: white;">Jurusan</th>
                                <th scope="col" style="color: white;">IPK</th>
                                <th scope="col" style="color: white;">CV</th>
                                <th scope="col" style="color: white;">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "SELECT
                            tb_mahasiswa.id,
                            tb_mahasiswa.nim,
                            tb_mahasiswa.nama,
                            tb_mahasiswa.tempat_lahir,
                            tb_mahasiswa.tgl_lahir,
                            tb_mahasiswa.jenkel,
                            tb_mahasiswa.angkatan,
                            tb_cvmahasiswa.id,
                            tb_cvmahasiswa.nim,
                            tb_cvmahasiswa.nama_mahasiswa,
                            tb_cvmahasiswa.no_hp,
                            tb_cvmahasiswa.jurusan, 
                            tb_cvmahasiswa.tahun_angkatan,
                            tb_cvmahasiswa.ip1,
                            tb_cvmahasiswa.ip2,
                            tb_cvmahasiswa.ip3,
                            tb_cvmahasiswa.ip4,
                            tb_cvmahasiswa.total,
                            tb_cvmahasiswa.portofolio,
                            tb_cvmahasiswa.gambar
                            FROM
                            tb_cvmahasiswa
                            INNER JOIN tb_mahasiswa ON tb_cvmahasiswa.nim = tb_mahasiswa.nim
                            WHERE
                            tb_cvmahasiswa.total >=3
                            
                            ");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;
                                $date = $d['tgl_lahir'];
                                $date =  date('d-M-Y', strtotime($date));

                            ?>
                                <tr>
                                    <th scope=" row"><?php echo $no; ?></th>
                                    <td><?php echo $d['nim'];  ?></td>
                                    <td><?php echo $d['nama_mahasiswa'];  ?></td>
                                    <td><?php echo $d['tempat_lahir'];  ?></td>
                                    <td><?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                                    <td><?php $jurusan = $d['jurusan'];
                                        if ($jurusan == "-") {
                                            echo $jurusan = "-";
                                        } else if ($jurusan == "AB") {
                                            echo $jurusan = "Administrasi Bisnis";
                                        } else if ($jurusan == "TK") {
                                            echo $jurusan = "Teknologi Komputer";
                                        } else {
                                            echo $jurusan = "Akutansi";
                                        } ?> </td>
                                    <td><?php echo number_format($d['total'], 1, '.', '');   ?></td>
                                    <td><a href="view_cv.php?id=<?php echo $d['id']; ?>" class="badge badge-info" onclick="basicPopup(this.href); return false" style="margin-top: 5px;">Lihat CV</a></td>
                                    <td><a href="#" class="btn btn-warning btn-circle" data-target="#lihat<?php echo $d['nim']; ?>" data-toggle="modal">
                                            <i class="fas fa-info"></i>
                                        </a>
                                        <!-- AWAL DETAIL -->
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
                                                        <form class="user" method="POST" action="proses_rekrutmen.php" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NIM</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" name="nim" class="form-control" value="<?php echo $d['nim']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="nama_M" value="<?php echo $d['nama_mahasiswa']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="tempat" value="<?php echo $d['tempat_lahir']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $date =  date('d M Y', strtotime($date));  ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php $jenkel = $d['jenkel'];
                                                                                                                    if ($jenkel == "2") {
                                                                                                                        echo $jenkel = "Prempuan";
                                                                                                                    } else {
                                                                                                                        echo $jenkel = "Laki-Laki";
                                                                                                                    } ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" name="nohp" value="<?php echo $d['no_hp']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Jurusan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php $jurusan = $d['jurusan'];
                                                                                                                    if ($jurusan == "TK") {
                                                                                                                        echo $jurusan = "Teknologi Komputer";
                                                                                                                    } else if ($jurusan == "AB") {
                                                                                                                        echo $jurusan = "Administrasi Bisnis";
                                                                                                                    } else {
                                                                                                                        echo $jurusan = "Akutansi";
                                                                                                                    } ?>" readonly>
                                                                </div>
                                                                <select class="custom-select" name="jurusan" style="display: none;">
                                                                    <?php
                                                                    if ($d['jurusan'] == "-") echo "<option selected value='-' >Pilih Jurusan</option>";

                                                                    if ($d['jurusan'] == "TK") echo "<option  value='TK' selected >Teknologi Komputer</option> ";
                                                                    else echo "<option  value='TK'>Teknologi Komputer</option>";

                                                                    if ($d['jurusan'] == "AB") echo "<option  value='AB' selected >Administrasi Bisnis</option> ";
                                                                    else echo "<option  value='AB'>Administrasi Bisnis</option>";

                                                                    if ($d['jurusan'] == "AK") echo "<option  value='AK' selected >Akutansi</option> ";
                                                                    else echo "<option  value='AK'>Akutansi</option>";

                                                                    ?>
                                                                </select>

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
                                                                    <input type="text" class="form-control" name="total" value="<?php echo number_format($d['total'], 1, '.', ''); ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Portofolio</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="<?php echo $d['portofolio']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                    </div>



                                                    <div class="modal-footer">
                                                        <a href="<?php echo $d['portofolio']; ?>" class="btn btn-warning mr-3" style=" font-size: 16px;  float:right " target="_blank">Lihat Portofolio</a>

                                                        <a href="view_cv.php?id=<?php echo $d['id']; ?>" class="btn btn-info" style=" font-size: 16px; " target="_blank">Lihat CV</a>
                                                        <button type="submit" class="btn btn-success">Rekrut</button>

                                                    </div>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- AKHIR DETAIL MODAL -->


                                    </td>
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