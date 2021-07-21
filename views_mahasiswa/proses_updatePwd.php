<?php
session_start();
include '../conn/koneksi.php';


$old_pwd    = $_POST['old_pwd'];
$old_Pwd    = md5($old_pwd);
$new_pwd    = $_POST['new_pwd'];
$pass       = md5($_POST['new_pwd']);
$new_pwdK   = $_POST['new_pwdK'];
//cek old password
$query = "SELECT * FROM pass_adm WHERE password ='$old_Pwd' ";
$sql = mysqli_query($conn, $query);
$hasil = mysqli_num_rows($sql);
if ($hasil > 0) {

    if (strlen($new_pwd) >= 5) {
        if ($new_pwd == $new_pwdK) {

            $kode = $_SESSION['username'];
            $query = "UPDATE pass_adm SET password='$pass' WHERE kode='$kode'";
            $sql = mysqli_query($conn, $query);
            //setelah berhasil update
            if ($sql) {
                header("location:pwd_change.php?pesan=Update_success");
            } else {
                header("location:pwd_change.php?pesan=fail");
            }
        } else {
            header("location:pwd_change.php?pesan=passwordOld_failed"); //pwd tak sesuai
        }
    } else {
        header("location:pwd_change.php?pesan=not_enought");
    }
} else {
    header("location:pwd_change.php?pesan=password_failed");
}
