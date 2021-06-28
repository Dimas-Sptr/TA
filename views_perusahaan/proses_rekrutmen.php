<?php
session_start();

include '../conn/koneksi.php';

$nim = $_POST['nim'];
$nama_M = $_POST['nama_M'];
$total = $_POST['total'];
$tempat = $_POST['tempat'];
$nohp = $_POST['nohp'];
$jurusan = $_POST['jurusan'];
$nama_P = $_SESSION['nama'];
$status = $_POST['status'];


mysqli_query($conn, "insert into tb_rekrutmen (id,nim,nama_mahasiswa,total,tempat,no_hp,jurusan,nama_perusahaan,status)
 values(NULL,'$nim','$nama_M','$total','$tempat','$nohp','$jurusan','$nama_P','$status')") or die(mysqli_error($conn));

header("location:history_rekrutmen.php?pesan=success");
