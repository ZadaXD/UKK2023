<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../login.php?info=login");
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">


    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">

              <div class="card">
                <div class="card-header">
                  <h5 class="card-title m-0">Laporan Pengaduan Masyarakat</h5>
                </div>
                  <center><b><font size="4" face="Courier New">Desa Kalirejo</font></b></center><br>
                  <center><b><font size="2" face="Courier New">JL.KALIMAS NO.260 DUSUN KRAJAN DESA KALIREJO</font></b></center><br>
                    <hr><width="100" height="75"></hr>
                      <div class="card-body">
                        <table class="table table-bordered">
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
                                  <a href="" data-toggle="modal" data-target="#modal-view-foto"><img src="../image/<?=$d['foto']?>" width="100"></a><br>
                                </td>
                                <td><?=$d['isi_laporan']?></td>
                                <td><?=$d['tanggapan']?></td>
                                <td><?=$d['tgl_pengaduan']?></td>
                                <td><?=$d['tgl_tanggapan']?></td>
                                <td><?=$d['nama_petugas']?></td>
                              </tr>
                              <div class="modal fade" id="modal-view-foto">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <div class="text-center">
                                        <img src="../upload/<?=$d['foto']?>" width="300">
                                      </div><hr>
                                      <div class="card-body">
                                        <div class="text-center">
                                          <?=$d['isi_laporan']?>
                                        </div>
                                      </div>                                
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php 
                            }
                            ?>
                          </tbody>
                        </table>                  
                      </div>
                    </div>


                  </div>
                  <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->

          <!-- Main Footer -->
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <script>
         window.addEventListener("load", window.print());
       </script>
     </body>
     </html>
