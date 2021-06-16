<?php
session_start();
include '../conn/koneksi.php';

$nim    = $_SESSION['username'];
$nama_M = $_SESSION['nama'];
$nama_P =  $_POST['nama_P'];
$posisi = $_POST['posisi'];
$persyaratan = $_POST['persyaratan'];
$tgl_berakhir =  $_POST['tgl_berakhir'];
$alamat =  $_POST['alamat'];
$status =  $_POST['status'];


$cek_cv = mysqli_query($conn, "SELECT * FROM tb_cvmahasiswa WHERE nim = '$_SESSION[username]'") or die(mysqli_error($conn));
$periksa = mysqli_num_rows($cek_cv);



if ($periksa = 0) {
    header("location:daftar_lowongan.php?pesan=add_failed");
} else {

    $save_login = "insert into tb_pengajuanmagang values('','$nim','$nama_M','$nama_P','$posisi','$persyaratan','$tgl_berakhir','$alamat','$status')";
    $q_sl = mysqli_query($conn, $save_login) or die(mysqli_error($conn));

    if ($q_sl) {

        header("location:daftar_lowongan.php?pesan=add_success");
    }
}
