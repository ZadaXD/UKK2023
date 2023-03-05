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
          <form class="row g-3 needs-validation" novalidate action="proses.php" method="POST">
            <div class="col-12">
              <label for="yourName" class="form-label">NIK</label>
              <input type="text" name="nik" class="form-control" id="yourName" required>
              <div class="invalid-feedback">Silahkan masukkan NIK!</div>
            </div>

            <div class="col-12">
              <label for="yourEmail" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="yourEmail" required>
              <div class="invalid-feedback">Silahkan isi Nama Lengkap Anda!</div>
            </div>

            <div class="col-12">
              <label for="yourUsername" class="form-label">Username</label>
              <div class="input-group has-validation">
                <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                <input type="text" name="username" class="form-control" id="yourUsername" required>
                <div class="invalid-feedback">Silahkan isi username!</div>
              </div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="yourPassword" required>
              <div class="invalid-feedback">Silahkan masukkan password!</div>
            </div>

            <div class="col-12">
              <label for="yourTelp" class="form-label">Telp</label>
              <input type="text" name="telp" class="form-control" id="yourPassword" required>
              <div class="invalid-feedback">Silahkan masukkan nomer Telp!</div>
            </div>

            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
            </div>
          </div>
        </div>
      </main>
      <?php
      include "footer.php";
    ?>