<?php

include '../conn/koneksi.php';

$nim = $_POST['nim'];
$nama_M = $_POST['nama_M'];
$nama_P = $_POST['nama_P'];
$posisi = $_POST['posisi'];
$persyaratan = $_POST['persyaratan'];
$tgl_berakhir = $_POST['tgl_berakhir'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];


mysqli_query($conn, "UPDATE tb_pengajuanmagang SET nim='$nim', nama_mahasiswa= '$nama_M',nama_perusahaan='$nama_P',posisi='$posisi',persyaratan='$persyaratan',tgl_berakhir='$tgl_berakhir'
,alamat='$alamat',status='$status' where nim='$nim'") or die(mysqli_error($conn));

header("location:history.php?pesan=success");
