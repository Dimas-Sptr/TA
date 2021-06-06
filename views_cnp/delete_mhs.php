<?php
session_start();
include '../conn/koneksi.php';

if ($_GET['id']!="")
{
	 $id= $_GET['id'];
	$delete =mysqli_query($conn,"delete from tb_mahasiswa where id='$id' ") or die(mysqli_error($conn));
}
if ($delete) {

			echo "<script>document.location.href='data_mahasiswa.php'</script>";
}


?>