<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama_M = $_POST['nama_M'];
$tempat = $_POST['tempat'];
$nohp = $_POST['nohp'];
$jurusan = $_POST['jurusan'];
$total = $_POST['total'];
$nama_P = $_POST['nama_P'];
$status = $_POST['status'];




mysqli_query($conn, "update tb_rekrutmen set nim = '$nim',nama_mahasiswa='$nama_M',total='$total',tempat='$tempat',
no_hp='$nohp',jurusan= '$jurusan',nama_perusahaan='$nama_P',status='$status'where id='$id'") or die(mysqli_error($conn));

header("location:history_rekrutmen.php?pesan=success");
