<?php
session_start();
include "header.php";
include "menu.php";
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Pengaduan<h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Pengaduan</li>
          <li class="breadcrumb-item active">Data Pengaduan</li>
        </ol>
      </nav>
    </div>
    <div class="card">
      <div class="card-body">
       <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Pengaduan</h5>
          <!-- Primary Color Bordered Table -->
          <table class="table table-bordered border-primary">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Tanggal Pengaduan</th>
                <th scope="col">Isi Laporan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'config.php';
              $no = 1;
              $id = $_GET['id'];
              $data = mysqli_query($koneksi, "select * from pengaduan where id_pengaduan='$id'");

              include 'config.php';
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <th scope="row"><?php echo $no++;?></th>
                  <th scope="row"><?php echo $d['nik'];?></th>
                  <td><?php echo $d['tgl_pengaduan'];?></td>
                  <td><?php echo $d['isi_laporan'];?></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          <!-- End Primary Color Bordered Table -->

        </div>
      </div>
    </main>
    <?php
    include "footer.php";
  ?>