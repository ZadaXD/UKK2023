<?php
session_start();

//menghapus semua session
session_destroy();

//mengalihkan halaman log out
header("location:utama/index.php?pesan=logout");
?>