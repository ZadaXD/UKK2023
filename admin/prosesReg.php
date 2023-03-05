<?php 
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$nama_petugas=$_POST['nama_petugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$telp = $_POST['telp'];
$level = $_POST['level'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO petugas (`id_petugas`, `nama_petugas`, `username`, `password`,`telp`, `level`) values('','$nama_petugas','$username','$password','$telp','$level')");

// mengalihkan halaman kembali ke index.php
header("location:tampilpet.php");

?>