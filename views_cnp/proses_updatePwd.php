    <?php
    include '../conn/koneksi.php';

    $kode       = $_POST['kode'];
    $old_pwd    = $_POST['old_pwd'];
    $new_pwd    = $_POST['new_pwd'];
    $pass       = md5($_POST['new_pwd']);
    $new_pwdK   = $_POST['new_pwdK'];
    //cek old password
    $query = "SELECT * FROM pass_adm WHERE kode='$old_pwd' ";
    $sql = mysqli_query($conn, $query);
    $hasil = mysqli_num_rows($sql);
    if (!$hasil >= 1) {

        header("location:pwd_change.php?pesan=password_failed"); //pwd tak sesuai
    }
    //validasi input konfirm password
    else if (($_POST['new_pwd']) != ($_POST['new_pwdK'])) {
        header("location:pwd_change.php?pesan=password_failed"); //pwd harus sama
    } else {
        //update data
        $query = "UPDATE pass_adm SET password='$pass' WHERE kode='$kode'";
        $sql = mysqli_query($conn, $query);
        //setelah berhasil update
        if ($sql) {
            header("location:pwd_change.php?pesan=Update_success");
        } else {
            header("location:pwd_change.php?pesan=fail");
        }
    }

    ?>