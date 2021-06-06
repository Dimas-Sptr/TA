<?php 
// mengaktifkan session php
error_reporting(0);
session_start();
 unset($_SESSION['nama']);
// menghapus semua session
session_destroy();
 
// mengalihkan halaman ke halaman login
header("location:../login/login.php");
?>