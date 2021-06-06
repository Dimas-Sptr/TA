<?php
include '../conn/koneksi.php';

//Menerima inputan dari user
$nim         = $_POST['nim'];
$nama        = $_POST['nama'];
$nohp        = $_POST['nohp'];
$jurusan     = $_POST['jurusan'];
$status_M    = $_POST['status_M'];
$perusahaan  = $_POST['perusahaan'];
$posisi      = $_POST['jabatan'];
$thn_angkatan = $_POST['angkatan'];
$ip1 = $_POST['ip1'];
$ip2 = $_POST['ip2'];
$ip3 = $_POST['ip3'];
$ip4 = $_POST['ip4'];
$total = $_POST['total'];
// Carefully

$rand = rand(1, 99999);
$ekstensi =  array('pdf');
$filename = $_FILES['gambar']['name']; // Carefully
$ukuran = $_FILES['gambar']['size']; // Carefully
$ext = pathinfo($filename, PATHINFO_EXTENSION);

// menyeleksi data user dengan username dan password yang sesuai
$ceknim = mysqli_query($conn, "SELECT * FROM tb_cvmahasiswa WHERE nim='$nim' ") or die(mysqli_error($conn));

if (mysqli_num_rows($ceknim) == 0) {
    if (!in_array($ext, $ekstensi)) {
        // Carefully
        header('location:cv_mahasiswa.php?pesan=nothing_PDF');
    } else {
        if ($ukuran < 1044070) {
            $gambar = $rand . '_' . $filename; // Carefully
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../file_cv/' . $rand . '_' . $filename); // Carefully
            $query = mysqli_query($conn, "INSERT INTO tb_cvmahasiswa VALUES('' ,'$nim', '$nama', '$nohp' , '$jurusan',
            '$status_M', '$perusahaan', '$posisi', '$thn_angkatan','$ip1','$ip2','$ip3','$ip4','$total', '$gambar')"); // Carefully ''

            if (!$query) {
                header("location:cv_mahasiswa.php?pesan=add_failed");
            } else {
                header("location:cv_mahasiswa.php?pesan=add_success");
            }
        } else {
            $query = mysqli_query($conn, "INSERT INTO tb_cvmahasiswa VALUES('' ,'$nim', '$nama', '$nohp' , '$jurusan',
            '$status_M', '$perusahaan', '$posisi', '$thn_angkatan','$ip1','$ip2','$ip3','$ip4','$total', NULL)");

            if (!$query) {
                header("location:cv_mahasiswa.php?pesan=add_failed");
            } else {
                header("location:cv_mahasiswa.php?pesan=add_success");
            }
        }
    }
}
