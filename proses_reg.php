<?php
include 'config.php';

//menangkap data yang dikirim
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];


//menginput date ke database
mysqli_query ($koneksi, "insert into masyarakat values ('$nik','$nama','$username','$password','$telp')");

//mengalihkan halaman kembali ke
header("location:index.php");
?>