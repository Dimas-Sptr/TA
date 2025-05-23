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
            <ol class="breadcrumb col-lg-4">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Biodata Mahasiswa</li>
            </ol>
        </nav>

        <form id="frm-example" action="proses_updatebiodata.php" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biodata Mahasiswa</h6>
                </div>
                <?php
                $data = mysqli_query($conn, "select * from tb_cvmahasiswa where nim='$_SESSION[username]'");

                while ($d = mysqli_fetch_array($data)) {

                ?>
                    <div class="card-body">
                        <form id="frm-example" action="proses_updatebiodata.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <input type="text" class="form-control form-control-user" id="nim" name="nim" value="<?php echo $d['nim']; ?>" hidden>
                            <div class="row">
                                <div class="form-group col-lg-6 ">
                                    <label><b>Nama Mahasiswa</b></label>
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?php echo $d['nama_mahasiswa']; ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label><b>Nomor Handphone</b></label>
                                    <input type="text" class="form-control form-control-user" id="nohp" name="no_hp" value="<?php echo $d['no_hp']; ?>" required>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-lg-6">

                                    <label><b>Jurusan</b></label>
                                    <select class="custom-select" style="font-size: 14px;" name="jurusan" required>
                                        <?php
                                        if ($d['jurusan'] == "") echo "<option selected value='-'>Pilih Jurusan</option>";
                                        else echo "<option  value='-'>Pilih Jurusan</option>";
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
                                    <label><b>Tahun Angkatan</b></label>
                                    <input name="angkatan" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" value="<?php echo $d['tahun_angkatan']; ?>" required />
                                </div>
                            </div>
                            <div class="row">

                                <div class=" form-group col-lg-6">
                                    <label><b>IP 1</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip1" name="ip1" value="<?php echo $d['ip1']; ?>" required maxlength="2">
                                </div>


                                <div class="form-group col-lg-6">
                                    <label><b>Ip 2</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip2" name="ip2" value="<?php echo $d['ip2']; ?>" required maxlength="2">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group col-lg-6">
                                    <label><b>IP 3</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip3" name="ip3" value="<?php echo $d['ip3']; ?>" required maxlength="2">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label><b>Ip 4</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip4" name="ip4" value="<?php echo $d['ip4']; ?>" required maxlength="2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><b>CV</b></label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-pdf"></i></span>
                                        </div>
                                        <input type="text" id="gambar" class="form-control " name="gambar" value="<?php echo $d['gambar']; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label><b>Link Portofolio</b></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                                        </div>

                                        <input type="text" class="form-control form-control-user" id="porto" name="porto" value="<?php echo $d['portofolio']; ?>">
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="card-footer">
                                    <div class="form-group">

                                        <button class="btn btn-success " style="margin-top: 20px; float:right" type="submit">Simpan</button>
                                        <a href="<?php echo $d['gambar']; ?>" class="btn btn-info mr-3" style=" font-size: 16px; margin-top: 20px; float:right " target="_blank">Lihat CV</a>
                                        <a href="<?php echo $d['portofolio']; ?>" class="btn btn-warning mr-3" style=" font-size: 16px; margin-top: 20px; float:right " target="_blank">Lihat Portofolio</a>

                                    </div>
                                </div>
                            </div>
                    </div>

        </form>

    </div>
<?php
                }
?>
</div>

</form>



<?php
include '../component/script.php';
include '../component/script_datatable.php';
?>
<script type="text/javascript">
    var ip1 = document.getElementById("ip1");
    ip1.addEventListener("keyup", function(e) {
        ip1.value = formatRupiah(this.value, "");
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 2,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1}/gi);
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? +rupiah : "";
    }
</script>

<script type="text/javascript">
    var ip2 = document.getElementById("ip2");
    ip2.addEventListener("keyup", function(e) {
        ip2.value = formatRupiah(this.value, "");
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 2,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1}/gi);
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? +rupiah : "";
    }
</script>

<script type="text/javascript">
    var ip3 = document.getElementById("ip3");
    ip3.addEventListener("keyup", function(e) {
        ip3.value = formatRupiah(this.value, "");
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 2,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1}/gi);
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? +rupiah : "";
    }
</script>
<script type="text/javascript">
    var ip4 = document.getElementById("ip4");
    ip4.addEventListener("keyup", function(e) {
        ip4.value = formatRupiah(this.value, "");
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 2,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1}/gi);
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? +rupiah : "";
    }
</script>

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
include '../component/footer.php';

?>

</body>



</html>