<?php
include '../config.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from pengaduan where id_pengaduan='$id'");

header('location:tampiladata.php');
?>