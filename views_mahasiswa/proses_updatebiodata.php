<?php
session_start();
include '../conn/koneksi.php';

//Menerima inputan dari user
$id          = $_POST['id'];
$nama        = $_POST['nama'];
$nohp        = $_POST['no_hp'];
$jurusan     = $_POST['jurusan'];
$thn_angkatan = $_POST['angkatan'];
$ip1         = $_POST['ip1'];
$ip2         = $_POST['ip2'];
$ip3         = $_POST['ip3'];
$ip4         = $_POST['ip4'];
$porto       = $_POST['porto'];

$gambar = $_POST['gambar'];

$ipk = ($_POST['ip1'] + $_POST['ip2'] + $_POST['ip3'] + $_POST['ip4']) / 4;



mysqli_query($conn, "UPDATE tb_cvmahasiswa SET  nama_mahasiswa = '$nama', no_hp = '$nohp', jurusan = '$jurusan',
   tahun_angkatan='$thn_angkatan',ip1='$ip1',ip2='$ip2',ip3 ='$ip3',ip4 ='$ip4',total ='$ipk',portofolio='$porto',
   gambar='$gambar' WHERE id = '$id'") or die(mysqli_error($conn));


header("location:biodata.php?pesan=add_success");
