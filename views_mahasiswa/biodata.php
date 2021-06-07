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
    <?php

    $data = mysqli_query($conn, "select * from tb_cvmahasiswa where nim='$_SESSION[username]'")  or die(mysqli_error($conn));

    $cek_row = mysqli_fetch_row($data);

    if ($cek_row) {
        while ($d = mysqli_fetch_assoc($data)) {


    ?>
            <div class="container-fluid">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb col-lg-4">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Biodata Mahasiswa</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-xl-12 col-lg-10">
                        <form id="frm-example" action="proses_updatebiodata.php" method="POST" enctype="multipart/form-data">
                            <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Biodata Mahasiswa</h6>
                                </div>
                                <div class="card-body">
                                    <form id="frm-example" action="proses_updatebiodata.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label><b>NIM</b></label>
                                                <input type="text" class="form-control form-control-user" name="nim" value="<?php echo $d['nim']; ?>" required>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label><b>Nama Mahasiswa</b></label>
                                                <input type="text" class="form-control form-control-user" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label><b>Nomor Handphone</b></label>
                                                <input type="number" class="form-control form-control-user" name="nohp" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label><b>Jurusan</b></label>
                                            <select class="custom-select" name="jurusan" required>
                                                <option selected>Pilih Jurusan...</option>
                                                <option value="AB">Administrasi Bisnis</option>
                                                <option value="TK">Teknologi Komputer</option>
                                                <option value="AK">Akutansi</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label><b>Status Mahasiswa</b></label>
                                        <select class="custom-select" name="status_M" required>
                                            <option selected>Pilih Status Mahasiswa...</option>
                                            <option value="1">Magang</option>
                                            <option value="0">Tidak Magang</option>

                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label><b>Nama Perusahaan</b></label>
                                        <input type="text" class="form-control form-control-user" name="perusahaan">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" form-group col-lg-6">
                                        <label><b>Posisi</b></label>
                                        <input type="text" class="form-control form-control-user" name="posisi">
                                    </div>
                              
                                <div class="form-group col-lg-6">
                                    <label><b>Tahun Angkatan</b></label>
                                    <input type="text" class="form-control form-control-user" name="angkatan" required>
                                </div>
                                </div>
                                <div class="row">
                                    <div class=" form-group col-lg-6">
                                        <label><b>IP 1</b></label>
                                        <input type="text" class="form-control form-control-user" name="ip1" required>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label><b>Ip 2</b></label>
                                        <input type="text" class="form-control form-control-user" name="ip2" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" form-group col-lg-6">
                                        <label><b>IP 3</b></label>
                                        <input type="text" class="form-control form-control-user" name="ip3" required>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label><b>Ip 4</b></label>
                                        <input type="text" class="form-control form-control-user" name="ip4" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="file" id="gambar" name="gambar" style="display:none" placeholder="CV WAJIB DIISI" onchange="document.getElementById('filename').value=this.value">
                                        <input type="text" class="form-control " id="filename" readonly>

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="button" class="btn  btn-danger btn-block" value="Pilih CV" onclick="document.getElementById('gambar').click()" required>
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
                            </div>

                    </div>
                </div>

                </form>


            <?php
            include '../component/script.php';
            include '../component/script_datatable.php';
            ?>
            <?php
            include '../component/footer.php';

            ?>

</body>



</html>