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
                                    <label><b>Status Mahasiswa</b></label>
                                    <select class="custom-select " style="font-size: 14px;" name="status_M" required>
                                        <?php
                                        if ($d['status_mahasiswa'] == "-") echo "<option selected value='-'>Pilih Status Mahasiswa</option>";
                                        else echo "<option  value='-'>Pilih Status Mahasiswa</option>";

                                        if ($d['status_mahasiswa'] == "1") echo "<option  value='1' selected >Magang</option> ";
                                        else echo "<option  value='1'>Magang</option>";

                                        if ($d['status_mahasiswa'] == "0") echo "<option  value='0' selected >Tidak Magang</option> ";
                                        else echo "<option  value='0'>Tidak Magang</option>";


                                        ?>


                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-lg-6">
                                    <label><b>Nama Perusahaan</b></label>
                                    <input type="text" class="form-control form-control-user" id="perusahaan" name="perusahaan" value="<?php echo $d['perusahaan']; ?>">
                                </div>


                                <div class=" form-group col-lg-6">
                                    <label><b>Posisi</b></label>
                                    <input type="text" class="form-control form-control-user" id="jabatan" name="posisi" value="<?php echo $d['jabatan']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><b>Tahun Angkatan</b></label>
                                    <input name="angkatan" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" value="<?php echo $d['tahun_angkatan']; ?>" required />
                                </div>


                                <div class=" form-group col-lg-6">
                                    <label><b>IP 1</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip1" name="ip1" value="<?php echo $d['ip1']; ?>" required maxlength="2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><b>Ip 2</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip2" name="ip2" value="<?php echo $d['ip2']; ?>" required maxlength="2">
                                </div>


                                <div class=" form-group col-lg-6">
                                    <label><b>IP 3</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip3" name="ip3" value="<?php echo $d['ip3']; ?>" required maxlength="2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label><b>Ip 4</b></label>
                                    <input type="text" class="form-control form-control-user" id="ip4" name="ip4" value="<?php echo $d['ip4']; ?>" required maxlength="2">
                                </div>


                                <div class="form-group col-lg-5">
                                    <label><b>CV</b></label>

                                    <input type="file" class="form-control " name="gambar" value="<?php echo $d['gambar']; ?>" required>

                                </div>
                                <label></label>
                                <div class="form-group col-lg-1" style="margin-top: 30px;">
                                    <a href="view_cv.php?id=<?php echo $d['id']; ?>" class="badge badge-info" onclick="basicPopup(this.href); return false" style="margin-top: 10px;">Lihat CV</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-footer">
                                        <div class="form-group">
                                            <button class="btn btn-info btn-lg btn-block" style="margin-top: 20px;" type="submit">Simpan</button>
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


    </div>

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