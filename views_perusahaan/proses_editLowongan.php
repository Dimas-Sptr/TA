<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$persyaratan = $_POST['persyaratan'];
$tgl = $_POST['tgl_berakhir'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];




mysqli_query($conn, "update tb_lowonganmagang set nama_perusahaan = '$nama',posisi='$posisi',persyaratan='$persyaratan',
tgl_berakhir='$tgl',alamat= '$alamat',status='$status'where id='$id'") or die(mysqli_error($conn));

header("location:status_lowongan.php?pesan=add_success");
