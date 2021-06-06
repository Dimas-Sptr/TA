<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$status_M = $_POST['status_M'];




mysqli_query($conn, "update tb_cvmahasiswa set nim='$nim',nama_mahasiswa='$nama',status_mahasiswa='$status_M', 
perusahaan='', jabatan='' where id='$id'") or die(mysqli_error($conn));

header("location:mahasiswa_magang.php?pesan=Update_success");
