<?php
include '../conn/koneksi.php';

$id    = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tb_cvmahasiswa WHERE id='$id' ");
$data  = mysqli_fetch_array($query);


$path = '../file_cv/' . $data['gambar'];

header('Content-Type: application/pdf');
header('Content-Disposition: inline: filename='   . $path);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

readfile($path);
