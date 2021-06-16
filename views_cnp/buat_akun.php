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
                <li class="breadcrumb-item active" aria-current="page">Buat Akun</li>
            </ol>
        </nav>
        <button type="button" class="btn btn-primary  btn-icon-split" data-toggle="modal" data-target="#buat_akun">
            <span class=" icon text-white-50">
                <i class="fas fa-users"></i>
            </span>
            <span class="text">Buat Akun</span>
            </a></button>

        <!-- ################# AWAL TAMBAH ##################################################### -->
        <!-- Buat Akun-->
        <div class="modal fade  bd-example-modal-lg" id="buat_akun" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg   " role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title">Tambah Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">
                        <form class="user" method="POST" action="proses_tambahAkun.php">
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="recipient-name" class="col-form-label"><b>Kode</b></label>
                                    <input type="text" class="form-control " name="kode" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="recipient-name" class="col-form-label"><b>Nama Pengguna</b></label>
                                    <input type="text" class="form-control " name="nama" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="recipient-name" name="email" class="col-form-label"><b>Email</b></label>
                                    <input type="text" class="form-control ">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="recipient-name" class="col-form-label"><b>Hak Akses</b></label>

                                    <select class="custom-select" name="level" required>
                                        <option selected>Pilih Hak Akses...</option>
                                        <option value="admin cnp">Admin CNP</option>
                                        <option value="perusahaan">Perusahaan</option>
                                    </select>
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

    <?php
    include '../component/footer.php';

    ?>

</body>



</html>