<?php
session_start();
include '../conn/koneksi.php';

if ($_GET['id'] != "") {
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "delete from pass_adm where id='$id' ") or die(mysqli_error($conn));
}
if ($delete) {

    echo "<script>document.location.href='mahasiswa_teraktivasi.php'</script>";
}
