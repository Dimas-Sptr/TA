<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:../login/login.php?pesan=failed");
    //echo "<script>alert('Anda Harus Melakukan Login Terlebih Dahulu');document.location= '../../login2/index.php'</script>";
}
if ($_SESSION['level'] != "admin cnp") {
    die("Anda bukan Admin");
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
            <ol class="breadcrumb col-lg-3 ">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin C&P </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-xl-12 col-lg-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">User Terdaftar</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-hover table-bordered " style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col" style="color: white">No</th>
                                        <th scope="col" style="color: white">Kode</th>
                                        <th scope="col" style="color: white; ">Nama</th>
                                        <th scope="col" style="color: white">Email</th>
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
                                                    <div class="modal-dialog  modal-sm " role="document">
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
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-10">
                                                                            <input type="text" class="form-control form-control-user" name="kode" placeholder="Ketik Kode C&P..." value="<?php echo $d['kode']; ?>" required="">
                                                                        </div>
                                                                        <div class="form-group col-lg-10">
                                                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Ketik Nama C&P ..." value="<?php echo $d['nama']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group col-lg-10">
                                                                            <input type="text" class="form-control form-control-user" name="email" placeholder="Ketik Email C&P ..." value="<?php echo $d['email']; ?>">
                                                                        </div>
                                                                        <div class="form-group col-lg-10">
                                                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Ketik Password Login ...">
                                                                        </div>
                                                                        <div class="form-group col-lg-10">
                                                                            <select class="custom-select" style="height: 50px;  border-radius: 30px;" name="level" required>
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


                                                                    <div class="modal-footer ">
                                                                        <button type="submit" name="simpan" class="btn  btn-user btn-primary  btn-block" style="font-size: medium;"> Simpan </button>

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