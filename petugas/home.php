<?php
session_start();
include "header.php";
include "menu.php";
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Selamat Datang <?php echo $_SESSION['username'];?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><a href="tampildata.php">Data Pengaduan</a></h5>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php
include "footer.php";
?>