<?php
session_start();
include '../conn/koneksi.php';

if ($_GET['kode'] != "") {

    $kode = $_GET['kode'];
    $pass = md5($kode);

    $query = mysqli_query($conn, "SELECT * FROM pass_adm WHERE kode='$kode'");
    $num = mysqli_num_rows($query);

    if ($num > 0) {
        $reset = mysqli_query($conn, "UPDATE  pass_adm SET password='$pass' where kode='$kode' ") or die(mysqli_error($conn));

        if ($reset) {

            header("location:buat_akun.php?pesan=reset_success");
        }   //header("location:buat_akun.php?pesan=fail");
    } else {
        header("location:buat_akun.php?pesan=reset_fail");
    }
}
