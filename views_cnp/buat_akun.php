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
                <li class="breadcrumb-item active" aria-current="page">Daftar Akun</li>
            </ol>
        </nav>
        <div class="card " style="border: 0px;">
            <div class="float-md-right">
                <button type="button" class="btn btn-primary  btn-icon-split" data-toggle="modal" data-target="#buat_akun" style="float: right;">
                    <span class=" icon text-white-50">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="text">Buat Akun</span>
                    </a></button>

                <!-- ################# AWAL TAMBAH ##################################################### -->
                <!-- Buat Akun-->
                <div class="modal fade  bd-example-modal-lg" id="buat_akun" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog    " role="document">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h5 class="modal-title">Tambah Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                <form class="user" method="POST" action="proses_tambahAkun.php">

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Kode</b></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control " name="kode" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Nama Pengguna</b></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control " name="nama" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Email</b></label>
                                        <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control ">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Hak Akses</b></label>
                                        <div class="col-sm-8">
                                            <select class="custom-select" name="level" required>
                                                <option selected>Pilih Hak Akses...</option>
                                                <option value="admin cnp">Admin CNP</option>
                                                <option value="perusahaan">Perusahaan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><b>Alamat</b></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="alamat"> </textarea>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer ">
                                <button type="submit" name="simpan" class="btn  btn-user btn-primary  "> Simpan </button>

                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!---------------- AKHIR Buat Akun ----------------->
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card border-left-success shadow py-2">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Akun CNP Terdaftar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered ">
                            <thead class="bg-primary">
                                <tr>
                                    <th scope="col" style="color: white">No</th>
                                    <th scope="col" style="color: white">Kode</th>
                                    <th scope="col" style="color: white; ">Nama</th>
                                    <th scope="col" style="color: white">Email</th>
                                    <th scope="col" style="color: white">Alamat</th>
                                    <th scope="col" style="color: white">Hak Akses</th>
                                    <th scope="col" style="color: white; width: 120px">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $data = mysqli_query($conn, "select * from pass_adm where level='admin cnp' ");

                                while ($d = mysqli_fetch_array($data)) {
                                    $no++;


                                ?>
                                    <tr>
                                        <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                        <td style="font-size: 14px"><?php echo $d['kode'];  ?></td>
                                        <td style="font-size: 14px"><?php echo $d['nama'];  ?></td>
                                        <td style="font-size: 14px"><?php echo $d['email'];  ?></td>
                                        <td style="font-size: 14px"><?php echo $d['alamat'];  ?></td>
                                        <td style="font-size: 14px"><?php $level = $d['level'];
                                                                    if ($level == "admin cnp") {
                                                                        echo $level = "Admin C&P";
                                                                    } ?></td>
                                        <td style="font-size: 14px"> <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- ################# Edit  ##################################################### -->
                                            <!-- Edit admin C&P Mahasiswa-->
                                            <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog   " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header ">
                                                            <h5 class="modal-title" id="edit">Edit Admin C&P</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <form class="user" method="POST" action="proses_editCNP.php" enctype="multipart/form-data">
                                                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label"><b> NIK</b> </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control " name="kode" placeholder="Ketik Kode C&P..." value="<?php echo $d['kode']; ?>" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label"><b> Nama</b> </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control " name="nama" placeholder="Ketik Nama C&P ..." value="<?php echo $d['nama']; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <input type="hidden" class="form-control " name="password" value="<?php echo $d['password']; ?>" required>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label"><b> Email</b> </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="email" class="form-control " name="email" placeholder="Ketik Email C&P ..." value="<?php echo $d['email']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label"><b> Hak Akses</b> </label>
                                                                    <div class="col-sm-8">
                                                                        <select class="custom-select" name="level" required>
                                                                            <?php
                                                                            if ($d['level'] == "") echo "<option selected >Pilih Status</option>";

                                                                            if ($d['level'] == "admin cnp") echo "<option  value='admin cnp' selected >Admin CNP</option> ";
                                                                            else echo "<option  value='admin cnp'>Admin CNP</option>";

                                                                            if ($d['level'] == "perusahaan") echo "<option  value='perusahaan' selected >Perusahaan</option> ";
                                                                            else echo "<option  value='perusahaan'>Perusahaan</option>";

                                                                            if ($d['level'] == "mahasiswa") echo "<option  value='mahasiswa' selected >Mahasiswa</option> ";
                                                                            else echo "<option  value='mahasiswa'>Mahasiswa</option>";

                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label"><b>Alamat</b></label>
                                                                    <div class="col-sm-8">
                                                                        <textarea class="form-control" name="alamat"><?php echo $d['alamat']; ?> </textarea>
                                                                    </div>
                                                                </div>


                                                        </div>


                                                        <div class="modal-footer ">
                                                            <a href="reset_pass.php?kode=<?php echo $d['kode']; ?>" type="submit" name="reset" class="btn  btn-danger " style="font-size: medium;"> Reset Password </a>
                                                            <button type="submit" name="simpan" class="btn  btn-primary  " style="font-size: medium;"> Simpan </button>


                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                    </div>
                    <!----------- Akhir Edit  Modal -------------->
                    <a href="delete_cnp.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-xs delete-data btn-circle">
                        <i class="far fa-trash-alt"></i>
                    </a>
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
    <div class="card shadow mb-4">
        <div class="card border-left-warning shadow py-2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Akun Perusahan Terdaftar</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="table table-hover table-bordered ">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color: white">No</th>
                                <th scope="col" style="color: white">Kode</th>
                                <th scope="col" style="color: white; ">Nama</th>
                                <th scope="col" style="color: white">Email</th>
                                <th scope="col" style="color: white">Alamat</th>
                                <th scope="col" style="color: white">Hak Akses</th>
                                <th scope="col" style="color: white; width: 120px">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "select * from pass_adm where level='perusahaan' ");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;


                            ?>
                                <tr>
                                    <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                    <td style="font-size: 14px"><?php echo $d['kode'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['email'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['alamat'];  ?></td>
                                    <td style="font-size: 14px"><?php $level = $d['level'];
                                                                if ($level == "perusahaan") {
                                                                    echo $level = "Perusahaan";
                                                                } ?></td>
                                    <td style="font-size: 14px"> <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- ################# Edit  ##################################################### -->
                                        <!-- Edit admin C&P Mahasiswa-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog  " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="edit">Edit AKun Perusahaan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <form class="user" method="POST" action="proses_editperusahaan.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b>Kode Perusahan</b> </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="kode" value="<?php echo $d['kode']; ?>" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b> Nama Perusahaan</b> </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="nama" value="<?php echo $d['nama']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">

                                                                <div class="col-sm-8">
                                                                    <input type="hidden" class="form-control " name="password" value="<?php echo $d['password']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b> Email Perusahaan</b> </label>
                                                                <div class="col-sm-8">
                                                                    <input type="email" class="form-control " name="email" value="<?php echo $d['email']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b> Hak Akses</b> </label>
                                                                <div class="col-sm-8">
                                                                    <select class="custom-select" name="level" required>
                                                                        <?php
                                                                        if ($d['level'] == "") echo "<option selected >Pilih Status</option>";

                                                                        if ($d['level'] == "admin cnp") echo "<option  value='admin cnp' selected >Admin CNP</option> ";
                                                                        else echo "<option  value='admin cnp'>Admin CNP</option>";

                                                                        if ($d['level'] == "perusahaan") echo "<option  value='perusahaan' selected >Perusahaan</option> ";
                                                                        else echo "<option  value='perusahaan'>Perusahaan</option>";

                                                                        if ($d['level'] == "mahasiswa") echo "<option  value='mahasiswa' selected >Mahasiswa</option> ";
                                                                        else echo "<option  value='mahasiswa'>Mahasiswa</option>";

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b>Alamat</b></label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" name="alamat"><?php echo $d['alamat']; ?> </textarea>
                                                                </div>
                                                            </div>



                                                    </div>

                                                    <div class="modal-footer ">
                                                        <a href="reset_passP.php?kode=<?php echo $d['kode']; ?>" type="reset" name="reset" role="button" class="btn  btn-danger " style="font-size: medium;"> Reset Password </a>
                                                        <button type="submit" name="simpan" class="btn   btn-primary " style="font-size: medium;"> Simpan </button>

                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!----------- Akhir Edit  Modal -------------->
                                        <a href="delete_perusahaan.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-xs delete-data btn-circle">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
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
    <div class="card shadow mb-4">
        <div class="card border-left-danger shadow py-2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Mahasiswa Teraktivasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table3" class="table table-hover table-bordered " style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color: white">No</th>
                                <th scope="col" style="color: white">Kode</th>
                                <th scope="col" style="color: white">Nama</th>
                                <th scope="col" style="color: white">Email</th>
                                <th scope="col" style="color: white">Alamat</th>
                                <th scope="col" style="color: white">Hak Akses</th>
                                <th scope="col" style="color: white">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $data = mysqli_query($conn, "select * from pass_adm where level='mahasiswa' ");

                            while ($d = mysqli_fetch_array($data)) {
                                $no++;


                            ?>
                                <tr>
                                    <th scope="row" style="font-size: 14px"><?php echo $no; ?></th>
                                    <td style="font-size: 14px"><?php echo $d['kode'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['email'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['alamat'];  ?></td>
                                    <td style="font-size: 14px"><?php $level = $d['level'];
                                                                if ($level == "mahasiswa") {
                                                                    echo $level = "Mahasiswa";
                                                                } ?></td>
                                    <td style="font-size: 14px"> <a href="#" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- ################# Edit  ##################################################### -->
                                        <!-- Edit admin C&P Mahasiswa-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog  " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="edit">Edit AKun Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    <div class="modal-body">
                                                        <form class="user" method="POST" action="proses_editakunM.php" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b> NIM</b> </label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" class="form-control " name="kode" value="<?php echo $d['kode']; ?>" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b> Nama Mahasiswa</b> </label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="nama" value="<?php echo $d['nama']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">

                                                                <div class="col-sm-8">
                                                                    <input type="hidden" class="form-control " name="password" value="<?php echo $d['password']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b> Email</b> </label>
                                                                <div class="col-sm-8">
                                                                    <input type="email" class="form-control " name="email" value="<?php echo $d['email']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b> Hak Akses</b> </label>
                                                                <div class="col-sm-8">
                                                                    <select class="custom-select" name="level" required>
                                                                        <?php
                                                                        if ($d['level'] == "") echo "<option selected >Pilih Status</option>";

                                                                        if ($d['level'] == "admin cnp") echo "<option  value='admin cnp' selected >Admin CNP</option> ";
                                                                        else echo "<option  value='admin cnp'>Admin CNP</option>";

                                                                        if ($d['level'] == "perusahaan") echo "<option  value='perusahaan' selected >Perusahaan</option> ";
                                                                        else echo "<option  value='perusahaan'>Perusahaan</option>";

                                                                        if ($d['level'] == "mahasiswa") echo "<option  value='mahasiswa' selected >Mahasiswa</option> ";
                                                                        else echo "<option  value='mahasiswa'>Mahasiswa</option>";

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label"><b>Alamat</b></label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" name="alamat"><?php echo $d['alamat']; ?> </textarea>
                                                                </div>
                                                            </div>



                                                    </div>


                                                    <div class="modal-footer ">
                                                        <a href="reset_passM.php?kode=<?php echo $d['kode']; ?>" type="submit" name="reset" class="btn  btn-danger " style="font-size: medium;"> Reset Password </a>
                                                        <button type="submit" name="simpan" class="btn   btn-primary " style="font-size: medium;"> Simpan </button>

                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                </div>
                <!----------- Akhir Edit  Modal -------------->

                <a href="delete_AkunM.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-xs delete-data btn-circle">
                    <i class="far fa-trash-alt"></i>
                </a>
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
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Update Akun Berhasil',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
    } else {
    }
    ?>
    <?php

    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'reset_success') {

        echo " <script>Swal.fire(
'Reset Berhasil',
'<b>Kode</b> Adalah <b>Username</b> Dan <b>Password</b> Kamu',
'success')
</script>";
    } else {
    }

    ?>
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
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#table2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');

    if ($pesan == 'add_success') {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Tambah Akun Berhasil',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>";
    } else {
    }
    ?>
    <?php
    $pesan = (isset($_GET['pesan']) ? $_GET['pesan'] : '');
    if ($pesan == 'Add_failed') {
        echo "<script>
        Swal.fire({
  icon: 'error',
  title: 'GAGAL',
  text: 'Kode Atau Nama Sudah Digunakan!'
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

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table3').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#table3_wrapper .col-md-6:eq(0)');
        });
    </script>

    <?php
    include '../component/footer.php';

    ?>

</body>



</html>