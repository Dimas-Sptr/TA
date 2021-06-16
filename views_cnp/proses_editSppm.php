<?php

include '../conn/koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$tgl = $_POST['tanggal'];
$prodi = $_POST['prodi'];
$lokasi = $_POST['lokasi'];
$nohp = $_POST['nohp'];
$ipk1 = $_POST['ipk1'];
$ipk2 = $_POST['ipk2'];
$ipk3 = $_POST['ipk3'];
$ipk4 = $_POST['ipk4'];
$angkatan = $_POST['angkatan'];


$ipk = ($_POST['ipk1'] + $_POST['ipk2'] + $_POST['ipk3'] + $_POST['ipk4']) / 4;


mysqli_query($conn, "update tb_sppm set nim='$nim',nama='$nama',tempat='$tempat'
,tgl_lahir='$tgl',prodi='$prodi',lokasi_kampus='$lokasi',nohp='$nohp',ipk1='$ipk1'
,ipk2='$ipk2',ipk3='$ipk3',ipk4='$ipk4',total='$ipk',tahun_angkatan='$angkatan' where id='$id'") or die(mysqli_error($conn));

header("location:input_sppm.php?pesan=success");
