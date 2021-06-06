<?php
//$conn = "koneksi.php";
include 'koneksi.php';
error_reporting(0);

$nim = mysqli_escape_string($conn, $_POST['nim']);
$pass = md5(mysqli_escape_string($conn, $_POST['nim']));
$email = mysqli_escape_string($conn, $_POST['email']);
$level = mysqli_escape_string($conn, $_POST['level']);

// cek apakah nim ada didalam table cek_data
$q_cek = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";
$cek = mysqli_query($conn, $q_cek) or die(mysqli_error($conn));
$proses = mysqli_num_rows($cek);
$row_cek = mysqli_fetch_assoc($cek);

$nama = $row_cek['nama'];

// cek apakah sudah daftar atau belum
$cek_daftar = mysqli_query($conn, "SELECT * FROM pass_adm WHERE kode = '$nim'") or die(mysqli_error($conn));
$periksa = mysqli_num_rows($cek_daftar);

// Cek apakah username terdafar di tabel cnp_user
if ($row_cek['nim'] === $nim) {
    if ($periksa > 0) {
        header("location:login.php?pesan=failed");
    } else {
        $save_login = "INSERT INTO pass_adm ( kode, password, nama,email, level) VALUES ('$nim','$pass','$nama','$email','$level')";
        $q_sl = mysqli_query($conn, $save_login) or die(mysqli_error($conn));

        if ($q_sl) {
            header("location:login.php?pesan=success");
            //header("location:login-20.php?pesan=simpan");
        }
    }
} else {
    echo "<script>alert('system gagal');document.location= 'login.php'</script>";
}
// jika belum terdata, maka akan muncul pesan ini


    //echo "<script>alert('username tidak di temukan');document.location= '../registrasi_cnp/regis_cnp.php'</script>";
