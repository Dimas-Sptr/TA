<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$tgl = $_POST['tanggal'];
$jenkel = $_POST['jenkel'];
$status = $_POST['status'];
$angkatan = $_POST['angkatan'];


mysqli_query($conn,"update tb_mahasiswa set nim='$nim',nama='$nama',tempat_lahir='$tempat',tgl_lahir='$tgl',jenkel='$jenkel',status='$status',angkatan='$angkatan' where id='$id'") or die(mysqli_error($conn));

header("location:data_mahasiswa.php?pesan=success");

?>