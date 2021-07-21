<?php
include '../conn/koneksi.php';

//Menerima inputan dari user
$nim         = $_POST['nim'];
$nama        = $_POST['nama'];
$nohp        = $_POST['nohp'];
$jurusan     = $_POST['jurusan'];
$thn_angkatan = $_POST['angkatan'];
$ip1 = $_POST['ip1'];
$ip2 = $_POST['ip2'];
$ip3 = $_POST['ip3'];
$ip4 = $_POST['ip4'];


// Carefully

$gambar = $_FILES['gambar']['name'];
$ipk = ((int)$_POST['ip1'] + (int)$_POST['ip2'] + (int)$_POST['ip3'] + (int)$_POST['ip4']) / 4;
if ($gambar != "") {
    $ekstensi_diperbolehkan = array('pdf'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 99999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
        move_uploaded_file($file_tmp, '../file_cv/' . $nama_gambar_baru);
        // Carefully
        $cek_daftar = mysqli_query($conn, "SELECT * FROM tb_cvmahasiswa WHERE nim = '$nim'") or die(mysqli_error($conn));
        $periksa = mysqli_num_rows($cek_daftar);
        if ($periksa > 0) {
            header("location:cv_mahasiswa.php?pesan=exist");
        } else {
            $query = "INSERT INTO tb_cvmahasiswa (id,nim,nama_mahasiswa,no_hp,jurusan,tahun_angkatan,
        ip1,ip2,ip3,ip4,total,gambar) VALUES ('','$nim', '$nama', '$nohp' , '$jurusan',
         '$thn_angkatan','$ip1','$ip2','$ip3','$ip4','$ipk', '$nama_gambar_baru')";
            $result = mysqli_query($conn, $query);
            // periska query apakah ada error
            if (!$result) {
                header("location:cv_mahasiswa.php?pesan=add_failed");
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                header("location:cv_mahasiswa.php?pesan=add_success");
            }
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='cv_mahasiswa.php';</script>";
    }
} else {
    $cek_daftar = mysqli_query($conn, "SELECT * FROM tb_cvmahasiswa WHERE nim = '$nim'") or die(mysqli_error($conn));
    $periksa = mysqli_num_rows($cek_daftar);
    if ($periksa > 0) {
        header("location:cv_mahasiswa.php?pesan=exist");
    } else {

        header("location:cv_mahasiswa.php?pesan=add_failed");
        $query = "INSERT INTO tb_cvmahasiswa (id,nim,nama_mahasiswa,no_hp,jurusan,tahun_angkatan,
    ip1,ip2,ip3,ip4,total) VALUES ('','$nim', '$nama', '$nohp' , '$jurusan', '$thn_angkatan','$ip1','$ip2','$ip3','$ip4','$ipk')";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if (!$result) {
            header("location:cv_mahasiswa.php?pesan=add_failed");
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            header("location:cv_mahasiswa.php?pesan=add_success");
        }
    }
}
