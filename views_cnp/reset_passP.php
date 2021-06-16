<?php
session_start();
include '../conn/koneksi.php';



$kode = $_SESSION['username'];
$pass = md5($kode);


$query = "SELECT * FROM pass_adm WHERE kode ='$kode' ";
$sql = mysqli_query($conn, $query);
$hasil = mysqli_num_rows($sql);
if ($hasil == 1) {

    $query = "UPDATE pass_adm SET password='$pass' WHERE kode='$kode'";
    $sql = mysqli_query($conn, $query);
    //setelah berhasil update
    if ($sql) {
        header("location:perusahaan.php?pesan=reset_success");
    } else {
        header("location:perusahaan.php?pesan=fail");
    }
} else {
    header("location:perusahaan.php?pesan=fail");
}
