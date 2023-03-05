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
              <th>Status</th>
              <th>Aksi</th>
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
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-tanggapan<?php echo $d['id_pengaduan']; ?>">
                    Validasi
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modal-tanggapan<?php echo $d['id_pengaduan']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Verifikasi dan Isi Tanggapan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="prosestanggapan.php">
                            <div class="card-body">
                              <input type="text" name="id_pengaduan" value="<?php echo $d['id_pengaduan'];?>" hidden>
                              <?php
                              include "../config.php";
                              $petugas_login    =mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$_SESSION[username]'");
                              $petugas_login    =mysqli_fetch_array($petugas_login);
                              ?>
                              <input type="text" name="id_petugas" value="<?=$petugas_login['id_petugas']?>" class="form-control" hidden>                                    
                              <div class="form-group">
                                <label>Verifikasi</label>
                                <select class="form-control" name="status">
                                  <option value="selesai">Selesai</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Isi Tanggapan</label>
                                <textarea class="form-control" name="laporan" rows="3" placeholder="Enter ..."></textarea>
                              </div>                          
                            </div>                                  
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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