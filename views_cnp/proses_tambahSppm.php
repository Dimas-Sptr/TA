<?php

include '../conn/koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$tgl = $_POST['tanggal'];
$prodi = $_POST['prodi'];
$lokasi = $_POST['lokasi'];
$usia = $_POST['usia'];
$nohp = $_POST['nohp'];
$ipk1 = $_POST['ipk1'];
$ipk2= $_POST['ipk2'];
$ipk3= $_POST['ipk3'];
$ipk4= $_POST['ipk4'];
$total= $_POST['total'];
$angkatan= $_POST['angkatan'];


mysqli_query($conn,"insert into tb_sppm values('','$nim','$nama','$tempat','$tgl','$prodi','$lokasi','$usia','$nohp','$ipk1','$ipk2','$ipk3','$ipk4','$total','$angkatan')") or die(mysqli_error($conn));

header("location:input_sppm.php?pesan=success");

?>