<?php

include '../conn/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$tgl = $_POST['tanggal'];
$jenkel = $_POST['jenkel'];
$status = $_POST['status'];
$angkatan = $_POST['angkatan'];

mysqli_query($conn, "insert into tb_mahasiswa(id,nim,nama,tempat_lahir,tgl_lahir,jenkel,status,angkatan) values('NULL','$nim','$nama','$tempat','$tgl','$jenkel','$status','$angkatan')") or die(mysqli_error($conn));

header("location:data_mahasiswa.php?pesan=success");
