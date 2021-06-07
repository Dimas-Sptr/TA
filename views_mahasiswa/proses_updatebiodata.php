<?php
include '../conn/koneksi.php';

//Menerima inputan dari user
$nim         = $_POST['nim'];
$nama        = $_POST['nama'];
$nohp        = $_POST['nohp'];
$jurusan     = $_POST['jurusan'];
$status_M    = $_POST['status_M'];
$perusahaan  = $_POST['perusahaan'];
$posisi      = $_POST['posisi'];
$ip1         = $_POST['ip1'];
$ip2         = $_POST['ip2'];
$ip3         = $_POST['ip3'];
$ip4         = $_POST['ip4'];
$thn_angkatan = $_POST['angkatan'];

$gambar = $_FILES['gambar']['name'];

$ipk = ($_POST['ip1'] + $_POST['ip2'] + $_POST['ip3'] + $_POST['ip4']) / 4;

if ($gambar != "") {
    $ekstensi_diperbolehkan = array('pdf');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 99999);
    $gambar_baru = $angka_acak . '-' . $gambar;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../file_cv/' . $gambar_baru);


        $query  = "INSERT INTO tb_cvmahasiswa  VALUES( '', '$nim', '$nama','$nohp',
         '$jurusan', '$status_M','$perusahaan', '$posisi','$thn_angkatan','$ip1','$ip2','$ip3','$ip4','$ipk','$gambar_baru')";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            header("location:biodata.php?pesan=Update_failed");
        } else {

            header("location:biodata.php?pesan=add_success");
        }
    } else {

        header("location:biodata.php?pesan=ekstensi_nothing");
    }
}
