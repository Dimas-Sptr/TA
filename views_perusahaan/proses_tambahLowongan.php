<?php

include '../conn/koneksi.php';

$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$persyaratan = $_POST['persyaratan'];
$tgl_berakhir = $_POST['tgl_berakhir'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];


mysqli_query($conn, "insert into tb_lowonganmagang values('','$nama','$posisi','$persyaratan','$tgl_berakhir','$alamat','$status')") or die(mysqli_error($conn));

header("location:buat_lowongan.php?pesan=success");
