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
          <a href="masyarakat.php" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Tambah Akun</a>
          <hr>
          <!-- Primary Color Bordered Table -->
          <table class="table table-bordered border-primary">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Telp</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../config.php';
              $no = 1;
              $data = mysqli_query($koneksi, "select * from masyarakat");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <th scope="row"><?php echo $no++;?></th>
                  <th scope="row"><?php echo $d['nik'];?></th>
                  <td><?php echo $d['nama'];?></td>
                  <td><?php echo $d['username'];?></td>
                  <td><?php echo $d['telp'];?></td>
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