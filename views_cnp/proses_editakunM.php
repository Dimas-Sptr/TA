<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$email = $_POST['email'];
$level = $_POST['level'];




mysqli_query($conn, "update pass_adm set kode='$kode',password='$password',nama='$nama',email='$email', 
level='$level' where id='$id'") or die(mysqli_error($conn));

header("location:mahasiswa_teraktivasi.php?pesan=Update_success");
