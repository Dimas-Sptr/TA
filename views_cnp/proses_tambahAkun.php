<?php

include '../conn/koneksi.php';


$kode = mysqli_escape_string($conn, $_POST['kode']);
$password = md5(mysqli_escape_string($conn, $_POST['kode']));
$nama = mysqli_escape_string($conn, $_POST['nama']);
$email = mysqli_escape_string($conn, $_POST['email']);
$level = mysqli_escape_string($conn, $_POST['level']);
$alamat = $_POST['alamat'];

$cek_daftar = mysqli_query($conn, "SELECT * FROM pass_adm WHERE kode = '$kode'") or die(mysqli_error($conn));
$periksa = mysqli_num_rows($cek_daftar);


if ($periksa > 0) {
    header("location:buat_akun.php?pesan=Add_failed");
} else {
    $save_login = "INSERT INTO pass_adm ( kode, password, nama ,email,alamat, level) VALUES ('$kode','$password','$nama','$email','$alamat','$level')";
    $q_sl = mysqli_query($conn, $save_login) or die(mysqli_error($conn));

    if ($q_sl) {
        header("location:buat_akun.php?pesan=add_success");
        //header("location:login-20.php?pesan=simpan");
    }
} 
// jika belum terdata, maka akan muncul pesan ini


//echo "<script>alert('username tidak di temukan');document.location= '../registrasi_cnp/regis_cnp.php'</script>";
