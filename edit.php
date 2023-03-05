<?php
session_start();
include "header.php";
include "menu.php";
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Pengaduan<h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Pengaduan</li>
          <li class="breadcrumb-item"><a href="tampildata.php">Data Pengaduan</a></li>
          <li class="breadcrumb-item active">Edit Data Pengaduan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Form Pengaduan</h5>

        <?php
        include 'config.php';
        @$id = $_GET['id'];
        $data = mysqli_query($koneksi, "select * from pengaduan where id_pengaduan='$id'");
        while($d = mysqli_fetch_array($data)){
          ?>
          <!-- Multi Columns Form -->
          <form class="row g-3" action="proses_edit.php" method="post" enctype="multipart/form-data">
            
            <div class="col-md-6">
              <input type="hidden" name="id_pengaduan" value="<?php echo $d['id_pengaduan']; ?>">
              <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
              <input type="date" name="tgl_pengaduan" value="<?php echo $d['tgl_pengaduan'];?>"class="form-control">
            </div>
            <div class="col-md-6">
              <label for="inputPassword5" class="form-label">NIK</label>
              <input type="text" name="nik" value="<?php echo $d['nik'];?>"class="form-control" id="inputPassword5">
            </div>
            <div class="col-12">
              <label for="inputAddress5">Isi Laporan</label>
              <input type="text" name="isi_laporan" value="<?php echo $d['isi_laporan'];?>"class="form-control" id="inputPassword5">
            </div>
            <div class="row mb-3">
              <label for="input" class="col-sm-2 col-form-label">Upload Foto</label>
              <div class="col-sm-12">
                <input class="form-control" name ="foto" value="<?php echo $d['foto'];?>" type="file" id="inputAddres5s">
              </div>
            </div>
            <div class="col-12">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Kirim</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Multi Columns Form -->
          <?php
        }
        ?>
      </div>
    </div>

  </div>
</main>
<?php
include "footer.php";

?>