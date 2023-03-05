<?php
include 'config.php';

//menangkap data yang dikirim
$tgl_pengaduan = $_POST['tgl_pengaduan'];
$nik = $_POST['nik'];
$isi_laporan = $_POST['isi_laporan'];
$status = $_POST['status'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:tampildata.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 10440700000000){	
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'image/'.$rand.'_'.$filename);
	}
}

mysqli_query ($koneksi, "insert into pengaduan values ('','$tgl_pengaduan','$nik','$isi_laporan','$xx','0')");

//mengalihkan halaman kembali ke
header("location:tampildata.php");

?>