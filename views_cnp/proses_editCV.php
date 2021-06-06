<?php
include '../conn/koneksi.php';

//Menerima inputan dari user
$id          = $_POST['id'];
$nim         = $_POST['nim'];
$nama        = $_POST['nama'];
$nohp        = $_POST['nohp'];
$jurusan     = $_POST['jurusan'];
$status_M    = $_POST['status_M'];
$perusahaan  = $_POST['perusahaan'];
$posisi      = $_POST['jabatan'];
$thn_angkatan = $_POST['angkatan'];

$gambar = $_FILES['gambar']['name'];

if ($gambar != "") {
    $ekstensi_diperbolehkan = array('pdf');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 99999);
    $gambar_baru = $angka_acak . '-' . $gambar;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../file_cv/' . $gambar_baru);


        $query  = "UPDATE tb_cvmahasiswa SET nim = '$nim', nama_mahasiswa = '$nama', no_hp = '$nohp',
         jurusan = '$jurusan', status_mahasiswa = '$status_M',perusahaan='$perusahaan', jabatan='$posisi',tahun_angkatan='$thn_angkatan',gambar='$gambar_baru' ";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            header("location:cv_mahasiswa.php?pesan=Update_failed");
        } else {

            header("location:cv_mahasiswa.php?pesan=add_success");
        }
    } else {

        header("location:cv_mahasiswa.php?pesan=ekstensi_nothing");
    }
} else {
    $query  = "UPDATE tb_cvmahasiswa SET nim = '$nim', nama_mahasiswa = '$nama', no_hp = '$nohp',
    jurusan = '$jurusan', status_mahasiswa = '$status_M',perusahaan='$perusahaan', jabatan='$posisi',tahun_angkatan='$thn_angkatan' ";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        header("location:cv_mahasiswa.php?pesan=Update_failed");
    } else {

        header("location:cv_mahasiswa.php?pesan=add_success");
    }
}
