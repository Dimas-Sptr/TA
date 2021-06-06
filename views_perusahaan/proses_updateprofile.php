<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$level = $_POST['level'];




mysqli_query($conn, "update pass_adm set kode='$kode',nama='$nama',email='$email',level='$level'
 where id='$id'") or die(mysqli_error($conn));

header("location:profile_update.php?pesan=Update_success");
