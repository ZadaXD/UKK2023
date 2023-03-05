<?php
//mengaktifkan session hp
session_start();
//menghubungkan ke database
include "config.php";

//menangkap data yang dikirim
$username = $_POST['username'];
$password =$_POST['password'];

//menyeleksi data
$data = mysqli_query($koneksi, "select * from masyarakat where username='$username' and password ='$password'");

//menghubungkan jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:home.php");
}else{
	header("location:index.php?pesan=gagal");
}