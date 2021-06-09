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
                                    <th scope=" row" style="font-size: 14px"><?php echo $no; ?></th>
                                    <td style="font-size: 14px"><?php echo $d['nim'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['nama_mahasiswa'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $d['tempat_lahir'];  ?></td>
                                    <td style="font-size: 14px"><?php echo $date =  date('d M Y', strtotime($date));  ?></td>
                                    <td style="font-size: 14px"><?php $jurusan = $d['jurusan'];
                                                                if ($jurusan == "-") {
                                                                    echo $jurusan = "-";
                                                                } else if ($jurusan == "AB") {
                                                                    echo $jurusan = "Administrasi Bisnis";
                                                                } else if ($jurusan == "TK") {
                                                                    echo $jurusan = "Teknologi Komputer";
                                                                } else {
                                                                    echo $jurusan = "Akutansi";
                                                                } ?> </td>
                                    <td style="font-size: 14px"><?php echo number_format($d['total'], 1, '.', '');   ?></td>
                                    <td style="font-size: 14px"><a href="view_cv.php?id=<?php echo $d['id']; ?>" class="badge badge-info" onclick="basicPopup(this.href); return false">Lihat CV</a></td>
                                    <td style="font-size: 14px"><a href="#" class="btn btn-warning btn-circle" data-target="#lihat<?php echo $d['nim']; ?>" data-toggle="modal">
                                            <i class="fas fa-info"></i>
                                        </a>
                                        <!-- AWAL DETAIL -->
                                        <div class="modal fade" id="lihat<?php echo $d['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="recipient-name" class="col-form-label"><b>NIM</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['nim']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="message-text" class="col-form-label"><b>Nama Mahasiswa</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['nama_mahasiswa']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="recipient-name" class="col-form-label"><b>Tempat Lahir</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['tempat_lahir']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="message-text" class="col-form-label"><b>Tanggal Lahir</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $date =  date('d M Y', strtotime($date));  ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="recipient-name" class="col-form-label"><b>Jenis Kelamin</b></label>
                                                                    <input type="text" class="form-control" value="<?php $jenkel = $d['jenkel'];
                                                                                                                    if ($jenkel == "2") {
                                                                                                                        echo $jenkel = "Prempuan";
                                                                                                                    } else {
                                                                                                                        echo $jenkel = "Laki-Laki";
                                                                                                                    } ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="recipient-name" class="col-form-label"><b> Handphone</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['no_hp']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="form-group col-6">
                                                                    <label for="message-text" class="col-form-label"><b>Jurusan</b></label>
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
                                                                <div class="form-group col-6">
                                                                    <label for="message-text" class="col-form-label"><b>Tahun Angkatan</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['tahun_angkatan']; ?>" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="recipient-name" class="col-form-label"><b>IP1</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip1']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="message-text" class="col-form-label"><b>IP2</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip2']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="recipient-name" class="col-form-label"><b>IP3</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip3']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="message-text" class="col-form-label"><b>IP4</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo $d['ip4']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="recipient-name" class="col-form-label"><b>Total</b></label>
                                                                    <input type="text" class="form-control" value="<?php echo number_format($d['total'], 1, '.', ''); ?>" readonly>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <a href="view_cv.php?id=<?php echo $d['id']; ?>" class="badge badge-info" style="margin-top: 45px; font-size: 14px; " onclick="basicPopup(this.href); return false">Lihat CV</a>
                                    </td>


                </div>
            </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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