<?php
include 'config.php';

//menangkap data yang dikirim
$id= $_POST['id_pengaduan'];
$tgl_pengaduan = $_POST['tgl_pengaduan'];
$nik = $_POST['nik'];
$isi_laporan = $_POST['isi_laporan'];
$foto = $_FILES['foto']['name'];
$status = $_POST['status'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:tampildata.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 104407000000000){	
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'image/'.$rand.'_'.$filename);
	}
}


//menginput date ke database
mysqli_query($koneksi, "UPDATE pengaduan SET tgl_pengaduan='$tgl_pengaduan',nik='$nik',isi_laporan='$isi_laporan', foto='$xx' WHERE id_pengaduan='$id'");

//mengalihkan halaman kembali ke
header("location:tampildata.php");

?>