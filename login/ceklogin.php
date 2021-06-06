<?php

// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$kode = md5($_POST['password']);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "select * from pass_adm where kode = '$username' AND password = '$kode'") or die(mysqli_error($conn));
// menghitung jumlah data yang ditemuka
$cek = mysqli_num_rows($login);



// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);
	//echo "<script>alert('Gagal  login');document.location= '../login2/index.php'</script>";

	//cek password
	if ($data['password'] == $kode) {


		if ($data['level'] == "admin cnp") {


			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin cnp";
			$_SESSION['nama'] = $data["nama"];

			header("location:../views_cnp/index.php");
		} else if ($data['level'] == "mahasiswa") {

			$_SESSION['username'] = $username;
			$_SESSION['level'] = "mahasiswa";
			$_SESSION['nama'] = $data["nama"];


			header("location:../views_mahasiswa/index.php");
		} else if ($data['level'] == "perusahaan") {

			$_SESSION['username'] = $username;
			$_SESSION['level'] = "perusahaan";
			$_SESSION['nama'] = $data["nama"];


			header("location:../views_perusahaan/index.php");
		}
	}

	// kembali ke halaman login jika password salah dan munculkan pesan
	else {
		//header("location:login.php?pesan=gagal_login");
	}
} else {
	// pesan untuk memunculkan jika user tidak terdaftar
	//header("location:login.php?pesan=gagal_login");
}
