<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$perusahaan = $_POST['perusahaan'];
$posisi = $_POST['posisi'];
$alamat = $_POST['alamat'];
$status = $_POST['selesai'];



mysqli_query($conn, "update tb_pengajuanmagang set nim='$nim',nama_mahasiswa='$nama',nama_perusahaan='$perusahaan',posisi='$posisi',alamat='$alamat',
status='$status' where id='$id'") or die(mysqli_error($conn));

header("location:history.php?pesan=Update_success");
