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
                <div class="modal-dialog  modal-lg modal-dialog-scrollable " role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title" id="aktivasi">Tambah CV Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            <form class="user" method="POST" action="proses_tambahCV.php" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">NIM</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control " name="nim" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No Handphone</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control " name="nohp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jurusan</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="jurusan">
                                            <option selected value="-">Pilih Jurusan...</option>
                                            <option value="AB">Administrasi Bisnis</option>
                                            <option value="TK">Teknologi Komputer</option>
                                            <option value="AK">Akutansi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Status Mahasiswa</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="status_M">
                                            <option selected value="-">Pilih Status Mahasiswa...</option>
                                            <option value="1">Magang</option>
                                            <option value="0">Tidak Magang</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="perusahaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Posisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="jabatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                                    <div class="col-sm-8">
                                        <input name="angkatan" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " id="ip1" name="ip1" maxlength="2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " id="ip2" name="ip2" maxlength="2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " id="ip3" name="ip3" maxlength="2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 4</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " id="ip4" name="ip4" maxlength="2">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">CV</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="gambar" class="form-control " name="gambar">

                                    </div>
                                </div>
                        </div>

                        <div class=" modal-footer ">
                            <button type=" submit" name="simpan" class="btn  btn-primary  "> Simpan </button>

                        </div>
                        </form>

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
                                    <td> <a href="view_cv.php?id=<?php echo $d['id']; ?>" class="badge badge-info" onclick="basicPopup(this.href); return false" style="margin-top: 10px;">Lihat CV</a></td>
                                    <td> <a href=" #" class="btn btn-success btn-circle" data-target="#edit<?php echo $d['id']; ?>" data-toggle="modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- ################# Edit  ##################################################### -->
                                        <!-- Edit CV Mahasiswa-->
                                        <div class="modal fade  bd-example-modal-lg" id="edit<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog modal-lg  modal-dialog-scrollable " role="document">
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
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">NIM</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" class="form-control " name="nim" value="<?php echo $d['nim']; ?>" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="nama" placeholder="Ketik Nama Mahasiswa ..." value="<?php echo $d['nama_mahasiswa']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                                                <div class="col-sm-8">
                                                                    <input type="number" class="form-control " name="nohp" placeholder="Ketik Nomor Handphone..." value="<?php echo $d['no_hp']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Jurusan</label>
                                                                <div class="col-sm-8">
                                                                    <select class="custom-select" name="jurusan">
                                                                        <?php
                                                                        if ($d['jurusan'] == "-") echo "<option selected value='-' >Pilih Jurusan</option>";
                                                                        else echo "<option  value='-'>pilih Jurusan</option>";
                                                                        if ($d['jurusan'] == "TK") echo "<option  value='TK' selected >Teknologi Komputer</option> ";
                                                                        else echo "<option  value='TK'>Teknologi Komputer</option>";

                                                                        if ($d['jurusan'] == "AB") echo "<option  value='AB' selected >Administrasi Bisnis</option> ";
                                                                        else echo "<option  value='AB'>Administrasi Bisnis</option>";

                                                                        if ($d['jurusan'] == "AK") echo "<option  value='AK' selected >Akutansi</option> ";
                                                                        else echo "<option  value='AK'>Akutansi</option>";

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Status Mahsiswa</label>
                                                                <div class="col-sm-8">
                                                                    <select class="custom-select" name="status_M">
                                                                        <?php
                                                                        if ($d['status_mahasiswa'] == "-") echo "<option selected value='-'  >Pilih Status Mahasiswa</option>";
                                                                        else echo "<option  value='-'>Pilih Status Mahasiswa</option>";
                                                                        if ($d['status_mahasiswa'] == "1") echo "<option  value='1' selected >Magang</option> ";
                                                                        else echo "<option  value='1'>Magang</option>";

                                                                        if ($d['status_mahasiswa'] == "0") echo "<option  value='0' selected >Tidak Magang</option> ";
                                                                        else echo "<option  value='0'>Tidak Magang</option>";


                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="perusahaan" value="<?php echo $d['perusahaan']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Posisi</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " name="jabatan" value="<?php echo $d['jabatan']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                                                                <div class="col-sm-8">
                                                                    <input name="angkatan" class="form-control" value="<?php echo $d['tahun_angkatan']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 1</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " id="ipk1e" name="ipk1e" value="<?php echo $d['ip1']; ?>" maxlength="2">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 2</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " id="ipk2e" name="ipk2e" value="<?php echo $d['ip2']; ?>" maxlength="2">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 3</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " id="ipk3e" name="ipk3e" value="<?php echo $d['ip3']; ?>" maxlength="2">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">IP 4</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control " id="ipk4e" name="ipk4e" value="<?php echo $d['ip4']; ?>" maxlength="2">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">CV</label>
                                                                <div class="col-sm-8">
                                                                    <input type="file" id="gambar" class="form-control " name="gambar" value="<?php echo $d['gambar']; ?>">


                                                                </div>
                                                            </div>
                                                    </div>






                                                    <div class="modal-footer ">
                                                        <button type="submit" name="simpan" class="btn   btn-primary " style="font-size: medium;"> Simpan </button>

                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                </div>
            </div>
            <!---------------- AKHIR Edit DATA ----------------->
            <a href="delete_cv.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-xs delete-data btn-circle">
                <i class="far fa-trash-alt"></i>
            </a>
            <a href=" #" class="btn btn-success btn-circle btn-warning" data-target="#lihat<?php echo $d['id']; ?>" data-toggle="modal">
                <i class="fas fa-info"></i>
            </a>
            <!-- ################# Detail Modal  ##################################################### -->
            <!-- Modal CV Mahasiswa-->
            <div class="modal fade  bd-example-modal-lg" id="lihat<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog modal-lg  modal-dialog-scrollable " role="document">
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
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">NIM</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control " name="nim" value="<?php echo $d['nim']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="nama" placeholder="Ketik Nama Mahasiswa ..." value="<?php echo $d['nama_mahasiswa']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control " name="nohp" placeholder="Ketik Nomor Handphone..." value="<?php echo $d['no_hp']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jurusan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " value="<?php $jurusan = $d['jurusan'];
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
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Status Mahsiswa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " value="<?php $jenkel = $d['status_mahasiswa'];
                                                                                        if ($jenkel == "0") {
                                                                                            echo $jenkel = "Tidak Magang";
                                                                                        } else {
                                                                                            echo $jenkel = "Magang";
                                                                                        } ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="perusahaan" value="<?php echo $d['perusahaan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Posisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="jabatan" value="<?php echo $d['jabatan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tahun Angkatan</label>
                                    <div class="col-sm-8">
                                        <input name="angkatan" class="form-control" value="<?php echo $d['tahun_angkatan']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="ip1" value="<?php echo $d['ip1']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="ip2" value="<?php echo $d['ip2']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="ip3" value="<?php echo $d['ip3']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP 4</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " name="ip4" value="<?php echo $d['ip4']; ?>" readonly>
                                    </div>
                                </div>

                        </div>






                        <div class="modal-footer ">
                            <a href="view_cv.php?id=<?php echo $d['id']; ?>" class="btn btn-info" onclick="basicPopup(this.href); return false" style=" font-size: 16px">Lihat CV</a>
                            <button type="button" name="simpan" class="btn btn-m  btn-danger " data-dismiss="modal"> Close </button>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---------------- AKHIR Detail DATA ----------------->



    </td>
    </tr>
<?php }
?>
</tbody>

</table>


</div>
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

<script type="text/javascript">
    var ipk1e = document.getElementById("ipk1e");
    ipk1e.addEventListener("keyup", function(e) {
        ipk1e.value = formatRupiah(this.value, "");
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
    var ipk2e = document.getElementById("ipk2e");
    ipk2e.addEventListener("keyup", function(e) {
        ipk2e.value = formatRupiah(this.value, "");
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
    var ipk3e = document.getElementById("ipk3e");
    ipk3e.addEventListener("keyup", function(e) {
        ipk3e.value = formatRupiah(this.value, "");
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
    var ipk4e = document.getElementById("ipk4e");
    ipk4e.addEventListener("keyup", function(e) {
        ipk4e.value = formatRupiah(this.value, "");
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