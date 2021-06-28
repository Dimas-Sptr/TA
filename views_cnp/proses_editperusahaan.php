<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$email = $_POST['email'];
$level = $_POST['level'];
$alamat = $_POST['alamat'];



mysqli_query($conn, "update pass_adm set kode='$kode',password='$password',nama='$nama',email='$email',alamat='$alamat', 
level='$level' where id='$id'") or die(mysqli_error($conn));

header("location:buat_akun.php?pesan=Update_success");
