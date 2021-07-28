<?php
include '../conn/koneksi.php';

//Menerima inputan dari user
$nim         = $_POST['nim'];
$nama        = $_POST['nama'];
$nohp        = $_POST['nohp'];
$jurusan     = $_POST['jurusan'];
$thn_angkatan = $_POST['angkatan'];
$ip1 = $_POST['ip1'];
$ip2 = $_POST['ip2'];
$ip3 = $_POST['ip3'];
$ip4 = $_POST['ip4'];


// Carefully

$gambar = $_POST['gambar'];
$ipk = ((int)$_POST['ip1'] + (int)$_POST['ip2'] + (int)$_POST['ip3'] + (int)$_POST['ip4']) / 4;



mysqli_query($conn, "INSERT INTO tb_cvmahasiswa (id,nim,nama_mahasiswa,no_hp,jurusan,tahun_angkatan,ip1,ip2,ip3,ip4,total,gambar)
 VALUES ('','$nim', '$nama', '$nohp' , '$jurusan', '$thn_angkatan','$ip1','$ip2','$ip3','$ip4','$ipk','$gambar')");

header("location:cv_mahasiswa.php?pesan=add_success");
