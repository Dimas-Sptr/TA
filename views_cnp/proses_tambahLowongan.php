<?php

include '../conn/koneksi.php';

$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$persyaratan = $_POST['persyaratan'];
$tgl_berakhir = $_POST['tgl_berakhir'];


mysqli_query($conn, "insert into tb_lowonganmagang values('','$nama','$posisi','$persyaratan','$tgl_berakhir')") or die(mysqli_error($conn));

header("location:lowongan_magang.php?pesan=success");
