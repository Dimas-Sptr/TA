<?php

include '../conn/koneksi.php';

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

mysqli_query($conn, "insert into tb_sppm(id,nim,nama,tempat,tgl_lahir,prodi,lokasi_kampus,nohp,ipk1,ipk2,ipk3,ipk4,total,tahun_angkatan) values('NULL','$nim','$nama','$tempat','$tgl','$prodi','$lokasi','$nohp','$ipk1','$ipk2','$ipk3','$ipk4','$ipk','$angkatan')") or die(mysqli_error($conn));

header("location:input_sppm.php?pesan=success");
