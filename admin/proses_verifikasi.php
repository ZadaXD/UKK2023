<?php
if (isset($_POST['kirim'])) {
	$id_pengaduan = $_POST['id_pengaduan'];
	$status = $_POST['status'];
	$query = mysqli_query($koneksi, "update pengaduan set status='$status' where id_pengaduan='$id_pengaduan'");
	echo "<script>
	alert('Data berhasil diverifikasi');
	window.location='tampildata.php';
	</script>";
}
?>