<?php
include '../conn/koneksi.php';

$id    = mysqli_real_escape_string($conn, $_GET['id']);

$data = "SELECT tb_cvmahasiswa.nim,tb_cvmahasiswa.nama_mahasiswa,tb_cvmahasiswa.no_hp,tb_cvmahasiswa.jurusan,
tb_mahasiswa.tempat_lahir,tb_mahasiswa.tgl_lahir,tb_cvmahasiswa.tahun_angkatan,tb_cvmahasiswa.total,tb_cvmahasiswa.gambar
FROM tb_pengajuanmagang INNER JOIN tb_cvmahasiswa ON tb_pengajuanmagang.nim = tb_cvmahasiswa.nim
 INNER JOIN tb_mahasiswa ON tb_pengajuanmagang.nim = tb_mahasiswa.nim";

$data_ms = mysqli_query($conn, $data) or die(mysqli_error($conn));
while ($d = mysqli_fetch_array($data_ms)) {


?>

<?php echo $d['nim']; ?>






<?php
}
?>