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
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'config.php';
              $no = 1;
              $data = mysqli_query($koneksi, "select * from pengaduan");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <th scope="row"><?php echo $no++;?></th>
                  <th scope="row"><?php echo $d['nik'];?></th>
                  <td><?php echo $d['tgl_pengaduan'];?></td>
                  <td><?php echo $d['isi_laporan'];?></td>
                  <td><center><img src="image/<?php echo $d['foto'];?>" width="100" height="100"></center></td>
                  <td>
                    <?php if ($d['status'] == '0') { ?>
                      <span class="badge bg-warning">Menunggu</span>
                    <?php } else if ($d['status'] == 'proses') { ?>
                      <span class="badge bg-primary">Proses</span>
                    <?php } else { ?>
                      <span class="badge bg-success">Selesai</span>
                    <?php } ?>
                  </td>
                  <td>
                    <center>
                      <button type="button" class="btn btn-success" fdprocessedid="sg827">
                        <a href="edit.php?id=<?php echo $d['id_pengaduan'];?>"style="color:#FFFFFF;"><i class="bx bxs-edit"></i> Edit</a>
                      </button>
                      <hr>
                      <button type="button" class="btn btn-danger" fdprocessedid="wk0fs"><a href="hapus.php?id=<?php echo $d['id_pengaduan'];?>" style="color:#FFFFFF;"><i class="bx bx-trash-alt"></i> Hapus</a></button>
                    </center>
                  </td>
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