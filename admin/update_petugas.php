<?php 
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$id_petugas = $_POST['id_petugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama_petugas = $_POST['nama_petugas'];
$level = $_POST['level'];
// update data ke database
mysqli_query($koneksi,"update petugas set username='$username', password='$password', nama_petugas='$nama_petugas', level='$level' where id_petugas='$id_petugas'");

// mengalihkan halaman kembali ke index.php
header("location:tambah_user.php?info=update");

?>