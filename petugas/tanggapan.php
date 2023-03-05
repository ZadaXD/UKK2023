<?php
session_start();
include "header.php";
include "menu.php";
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Tanggapan Pengaduan<h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Pengaduan</li>
          <li class="breadcrumb-item active">Tanggapan</li>
        </ol>
      </nav>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Tanggapan Pengaduan</h5>
        <!-- Primary Color Bordered Table -->
        <table class="table table-bordered border-primary">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th style="width: 100px">Foto</th>
              <th>Isi Laporan</th>                        
              <th>Isi Tanggapan</th>
              <th>Tanggal Pengaduan</th>
              <th>Tanggal Tanggapan</th>
              <th>Nama Petugas</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            include "../config.php";
            $catatan    =mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas");
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
              <div class="modal fade" id="modal-view-foto">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Foto Pengaduan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
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
                    <div class="modal-footer justify-content-between"> 
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Keluar</button>
                    </div>
                  </div>
                </div>
              </div>
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