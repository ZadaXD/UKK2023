<?php
session_start();
include "header.php";
include "menu.php";
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Laporan Pengaduan<h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Laporan</li>
        </ol>
      </nav>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Laporan Pengaduan</h5>
        <a href="print.php" class="btn btn-primary btn-sm"><i class="bi bi-printer"></i> Print Laporan</a>
        <hr>
        <!-- Primary Color Bordered Table -->
        <table class="table table-bordered border-primary">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Foto</th>
              <th scope="col">Isi Laporan</th>
              <th scope="col">Tanggapan</th>
              <th scope="col">Tanggal Pengaduan</th>
              <th scope="col">Tanggal Tanggapan</th>
              <th scope="col">Nama Petugas</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            include "../config.php";
            $catatan    =mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas where level='admin'");
            while($d = mysqli_fetch_array($catatan)){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td class="text-center">
                  <img src="../image/<?=$d['foto']?>" width="100"><br>
                </td>
                <td><?=$d['isi_laporan']?></td>
                <td><?=$d['tanggapan']?></td>
                <td><?=$d['tgl_pengaduan']?></td>
                <td><?=$d['tgl_tanggapan']?></td>
                <td><?=$d['nama_petugas']?></td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>              <!-- End Primary Color Bordered Table -->
      </div>
    </div>
  </main>
  <?php
  include "footer.php";
?>