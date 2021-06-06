<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$persyaratan = $_POST['persyaratan'];
$tgl_berakhir = $_POST['tgl_berakhir'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];


mysqli_query($conn, "UPDATE tb_lowonganmagang SET nama_perusahaan='$nama',posisi='$posisi',persyaratan='$persyaratan',tgl_berakhir='$tgl_berakhir'
,alamat='$alamat',status='$status' where id='$id'") or die(mysqli_error($conn));

header("location:lowongan_magang.php?pesan=approved_success");
