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
          <h5 class="card-title">Registrasi Petugas</h5>
          <!-- Primary Color Bordered Table -->
          <form class="row g-3" action="prosesReg.php" method="post" enctype="multipart/form-data">

            <div class="col-md-6">
              <label for="inputDate" class="form-label">Nama Petugas</label>
              <input type="text" name="nama_petugas" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="inputPassword5" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="inputPassword5">
            </div>
            <div class="col-md-6">
              <label for="inputAddress5">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword5">
            </div>
            <div class="col-md-6">
              <label for="inputAddress5">Telp</label>
              <input type="text" name="telp" class="form-control" id="inputPassword5">
            </div>
            <center>
              <div class="col-md-6">
                <label>Level</label>
                <select name="level" class="form-control">
                  <option>--- Pilih Level ---</option>
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                </select>
              </div>
            </center>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Kirim</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Multi Columns Form -->
      </div>
    </div>
  </main>
  <?php
  include "footer.php";
?>