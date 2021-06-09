<?php
session_start();
include '../conn/koneksi.php';

//Menerima inputan dari user
$id          = $_POST['id'];
$nama        = $_POST['nama'];
$nohp        = $_POST['no_hp'];
$jurusan     = $_POST['jurusan'];
$status_M    = $_POST['status_M'];
$perusahaan  = $_POST['perusahaan'];
$posisi      = $_POST['posisi'];
$thn_angkatan = $_POST['angkatan'];
$ip1         = $_POST['ip1'];
$ip2         = $_POST['ip2'];
$ip3         = $_POST['ip3'];
$ip4         = $_POST['ip4'];

$gambar = $_FILES['gambar']['name'];

$ipk = ($_POST['ip1'] + $_POST['ip2'] + $_POST['ip3'] + $_POST['ip4']) / 4;

if ($gambar != "") {
    $ekstensi_diperbolehkan = array('pdf');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 99999);
    $gambar_baru = $angka_acak . '-' . $gambar;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../file_cv/' . $gambar_baru);


        $query  = "UPDATE tb_cvmahasiswa SET  nama_mahasiswa = '$nama', no_hp = '$nohp',
         jurusan = '$jurusan', status_mahasiswa = '$status_M',perusahaan='$perusahaan', jabatan='$posisi',tahun_angkatan='$thn_angkatan',
         ip1='$ip1',ip2='$ip2',ip3 ='$ip3',ip4 ='$ip4',total ='$ipk',gambar='$gambar_baru' ";

        $query .= "WHERE id = '$id'";
        $result = mysqli_multi_query($conn, $query);




        if (!$result) {
            header("location:biodata.php?pesan=Update_failed");
        } else {

            header("location:biodata.php?pesan=add_success");
        }
    } else {

        header("location:biodata.php?pesan=ekstensi_nothing");
    }
} else {
    $query  = "UPDATE tb_cvmahasiswa SET nim = '$nim', nama_mahasiswa = '$nama', no_hp = '$nohp',
    jurusan = '$jurusan', status_mahasiswa = '$status_M',perusahaan='$perusahaan', jabatan='$posisi',tahun_angkatan='$thn_angkatan',
    ip1='$ip1',ip2='$ip2',ip3 ='$ip3',ip4 ='$ip4',total ='$ipk' ";

    $query .= "WHERE id = '$id'";
    $result = mysqli_multi_query($conn, $query);

    if (!$result) {
        header("location:biodata.php?pesan=Update_failed");
    } else {

        header("location:biodata.php?pesan=add_success");
    }
}
