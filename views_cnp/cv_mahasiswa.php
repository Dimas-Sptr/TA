<?php
session_start();

if (!isset($_SESSION['nama'])) {
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
<script>
    function basicPopup(url) {
        popupWindow = window.open(url, 'popUpWindow',
            'height=300, width=700, left=50, top=50, resizable=yes, scrollbar=yes, toolbar=yes, menubar=no, location=no, directories=no, status = yes ')
    }
</script>


<body id="page-top">


    <?php
    include 'menu.php';
    include '../component/profile1.php';
    ?>
    <div class="container-fluid">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb col-lg-3">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">CV Mahasiswa</li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">CV Mahasiswa</h6>
                <div class="dropdown no-arrow">
                    <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahCv" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </span>
                        <span class="text">Tambah</span>
                        </a></button>
                </div>
            </div>
            <!-- ################# AWAL TAMBAH ##################################################### -->
            <!-- Tambah CV Mahasiswa-->
            <div class="modal fade  bd-example-modal-lg" id="tambahCv" tabindex="-1" aria-labelledby="aktivasi" aria-hidden="true">
                <div class="modal-dialog  modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title" id="aktivasi">Tambah CV Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            <form class="user" method="POST" action="proses_tambahCV.php" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="nim" placeholder="Ketik NIM kamu..." required="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama Mahasiswa ..." required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="number" class="form-control form-control-user" name="nohp" placeholder="Ketik Nomor Handphone...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <select class="custom-select" style="height: 50px;  border-radius: 30px; font-size: 14px;" name="jurusan">
                                            <option selected value="-">Pilih Jurusan...</option>
                                            <option value="AB">Administrasi Bisnis</option>
                                            <option value="TK">Teknologi Komputer</option>
                                            <option value="AK">Akutansi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <select class="custom-select" style="height: 50px;  border-radius: 30px; font-size: 14px;" name="status_M">
                                            <option selected value="-">Pilih Status Mahasiswa...</option>
                                            <option value="1">Magang</option>
                                            <option value="0">Tidak Magang</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="perusahaan" placeholder="Ketik Perusahaan ...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="jabatan" placeholder="Ketik Posisi ...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="number" class="form-control form-control-user" name="angkatan" placeholder="Ketik Tahun Angkatan ...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="ip1" placeholder="Ketik ip1 ...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="ip2" placeholder="Ketik ip2 ...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="ip3" placeholder="Ketik ip3 ...">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control form-control-user" name="ip4" placeholder="Ketik ip4 ...">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <input type="file" id="gambar" name="gambar" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                        <input type="text" class="form-control form-control-user" id="filename" readonly>

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="button" class="btn  btn-danger btn-lg btn-block  " style="height: 50px;  border-radius: 30px; font-size:medium;" value="Pilih CV" onclick="document.getElementById('gambar').click()">
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
            <!---------------- AKHIR TAMBAH DATA ----------------->

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-bordered " style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color: white">No</th>
                                <th scope="col" style="color: white">Nim</th>
                                <th scope="col" style="color: white; width: 30px;">Nama</th>
                                <th scope="col" style="color: white">Jurusan</th>
                                <th scope="col" style="color: white">Status Mahasiswa Magang</th>
                                <th scope="col" style="color: white; ">Perusahaan</th>
                                <th scope="col" style="color: white; ">Posisi</th>
                                <th scope="col" style="color: white; ">CV</th>
                                <th scope="col" style="color: white; width: 120px">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "select * from tb_cvmahasiswa");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;


                            ?>
                                <tr>
                                    <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                    <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama_mahasiswa'];  ?></td>
                                    <td style="font-size: 14px"><?php $jurusan = $d['jurusan'];
                                                                if ($jurusan == "-") {
                                                                    echo $jurusan = "-";
                                                                } else if ($jurusan == "AB") {
                                                                    echo $jurusan = "Administrasi Bisnis";
                                                                } else if ($jurusan == "TK") {
                                                                    echo $jurusan = "Teknologi Komputer";
                                                                } else {
                                                                    echo $jurusan = "Akutansi";
                                                                } ?></td>

                                    <td style="font-size: 14px"><?php $status_M = $d['status_mahasiswa'];
                                                                if ($status_M == "-") {
                                                                    echo $status_M = "-";
                                                                } else if ($status_M == "1") {
                                                                    echo $status_M = "Magang";
                                                                } else {
                                                                    echo $status_M = "Tidak Magang";
                                                                } ?></td>
                                    <td style="font-size: 14px"><?php echo $d['perusahaan']  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['jabatan']  ?></td>
                                    <td> <a href="view_cv.php?id=<?php echo $d['id']; ?>" class="badge badge-info" onclick="basicPopup(this.href); return false" style="margin-top: 10px;">Lihat CV</a>
                                    <td> <a href=" #" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- ################# Edit  ##################################################### -->
                                        <!-- Edit CV Mahasiswa-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="edit">Edit CV Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <form class="user" method="POST" action="proses_editCV.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="nim" placeholder="Ketik NIM kamu..." value="<?php echo $d['nim']; ?>" required="">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama Mahasiswa ..." value="<?php echo $d['nama_mahasiswa']; ?>" required>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="number" class="form-control form-control-user" name="nohp" placeholder="Ketik Nomor Handphone..." value="<?php echo $d['no_hp']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <select class="custom-select" style="height: 50px;  border-radius: 30px; font-size: 14px;" name="jurusan">
                                                                        <?php
                                                                        if ($d['jurusan'] == "") echo "<option selected >Pilih Jurusan</option>";

                                                                        if ($d['jurusan'] == "TK") echo "<option  value='TK' selected >Teknologi Komputer</option> ";
                                                                        else echo "<option  value='TK'>Teknologi Komputer</option>";

                                                                        if ($d['jurusan'] == "AB") echo "<option  value='AB' selected >Administrasi Bisnis</option> ";
                                                                        else echo "<option  value='AB'>Administrasi Bisnis</option>";

                                                                        if ($d['jurusan'] == "AK") echo "<option  value='AK' selected >Akutansi</option> ";
                                                                        else echo "<option  value='AK'>Akutansi</option>";

                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <select class="custom-select" style="height: 50px;  border-radius: 30px; font-size: 14px; " name="status_M">
                                                                        <?php
                                                                        if ($d['status_mahasiswa'] == "") echo "<option selected >Pilih Status Mahasiswa</option>";

                                                                        if ($d['status_mahasiswa'] == "1") echo "<option  value='1' selected >Magang</option> ";
                                                                        else echo "<option  value='1'>Magang</option>";

                                                                        if ($d['status_mahasiswa'] == "0") echo "<option  value='0' selected >Tidak Magang</option> ";
                                                                        else echo "<option  value='0'>Tidak Magang</option>";


                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="perusahaan" placeholder="Ketik Perusahaan ..." value="<?php echo $d['perusahaan']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="jabatan" placeholder="Ketik Posisi ..." value="<?php echo $d['jabatan']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="angkatan" placeholder="Ketik Tahun Angkatan ..." value="<?php echo $d['tahun_angkatan']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="ip1" placeholder="Ketik ip1 ..." value="<?php echo $d['ip1']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="ip2" placeholder="Ketik ip2 ..." value="<?php echo $d['ip2']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="ip3" placeholder="Ketik ip3 ..." value="<?php echo $d['ip3']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control form-control-user" name="ip4" placeholder="Ketik ip4 ..." value="<?php echo $d['ip4']; ?>">
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="file" id="gambar" name="gambar" style="display:none" onchange="document.getElementById('filename').value=this.value">
                                                                    <input type="text" class="form-control form-control-user" id="filename" readonly>

                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="button" class="btn  btn-danger btn-lg btn-block  " style="height: 50px;  border-radius: 30px; font-size:medium;" value="Pilih CV" onclick="document.getElementById('gambar').click()">
                                                                </div>
                                                            </div>


                                                    </div>


                                                    <div class="modal-footer ">
                                                        <button type="submit" name="simpan" class="btn  btn-user btn-primary  btn-block" style="font-size: medium;"> Simpan </button>

                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                </div>
                <!---------------- AKHIR Edit DATA ----------------->
                <a href="delete_cv.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-xs delete-data btn-circle">
                    <i class="far fa-trash-alt"></i>
                </a>
                </td>
                </tr>
            <?php }
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

    if ($pesan == 'add_success') {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: ' Data Berhasil Disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
    } else {
    }
    ?>

    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'Update_failed') {

        echo " <script>
        Swal.fire(
            'GAGAL',
            'Update Data Gagal Mohon Isi Dengan Benar',
            'error')
    </script>";
    } else {
    }
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'already_exist') {

        echo " <script>
        Swal.fire(
            'GAGAL',
            'Maaf Nim Yang Anda Masukkan Sudah Tersedia',
            'error')
    </script>";
    } else {
    }


    ?> <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script type="text/javascript">
        $('.delete-data').on('click', function(e) {
            e.preventDefault();
            var getLink = $(this).attr('href');

            Swal.fire({
                title: 'Hapus Data?',
                text: "Data akan dihapus permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {

                    window.location.href = getLink;
                }
            })
        });
    </script>
    <?php
    include '../component/footer.php';

    ?>


</body>



</html>