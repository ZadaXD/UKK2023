<?php
session_start();
include "header.php";
include "menu.php";
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tambah Pengaduan<h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Pengaduan</li>
          <li class="breadcrumb-item active">Tambah Pengaduan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Form Pengaduan</h5>

        <!-- Multi Columns Form -->
        <form class="row g-3" action="proses_pengaduan.php" method="post" enctype="multipart/form-data">
          
          <div class="col-md-6">
            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
            <input type="date" name="tgl_pengaduan" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="inputPassword5" class="form-label">NIK</label>
            <input type="text" name="nik" class="form-control" id="inputPassword5">
          </div>
          <div class="col-12">
            <label for="inputAddress5">Isi Laporan</label>
            <textarea class="form-control" name="isi_laporan" placeholder="Isi Laporan" id="inputAddres5s"></textarea>
          </div>
          <div class="row mb-3">
            <label for="input" class="col-sm-2 col-form-label">Upload Foto</label>
            <div class="col-sm-12">
              <input class="form-control" name ="foto" type="file" id="inputAddres5s">
            </div>
          </div>
          <div class="col-12">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Kirim</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form><!-- End Multi Columns Form -->

      </div>
    </div>

  </div>
</main>
<?php
include "footer.php";

?>