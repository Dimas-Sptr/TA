<?php
include '../conn/koneksi.php';

//Menerima inputan dari user
$id          = $_POST['id'];
$nim         = $_POST['nim'];
$nama        = $_POST['nama'];
$nohp        = $_POST['nohp'];
$jurusan     = $_POST['jurusan'];
$thn_angkatan = $_POST['angkatan'];
$ip1         = $_POST['ip1'];
$ip2         = $_POST['ip2'];
$ip3         = $_POST['ip3'];
$ip4         = $_POST['ip4'];

$gambar = $_POST['gambar'];
$ipk = ($_POST['ip1'] + $_POST['ip2'] + $_POST['ip3'] + $_POST['ip4']) / 4;


mysqli_query($conn, "UPDATE tb_cvmahasiswa SET nim = '$nim', nama_mahasiswa = '$nama', no_hp = '$nohp',
         jurusan = '$jurusan', ip1='$ip1',ip2='$ip2',ip3 ='$ip3',ip4 ='$ip4',total ='$ipk',gambar='$gambar' WHERE id = '$id' ")
    or die(mysqli_error($conn));

header("location:cv_mahasiswa.php?pesan=add_success");
