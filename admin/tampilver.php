<?php
session_start();
include "header.php";
include "menu.php";
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Verifikasi Dan Validasi<h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Pengaduan</li>
          <li class="breadcrumb-item active">Verifikasi dan Validasi</li>
        </ol>
      </nav>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Verifikasi dan Validasi Pengaduan</h5>
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
            include '../config.php';
            $no = 1;
            $data = mysqli_query($koneksi, "select * from pengaduan");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <th scope="row"><?php echo $no++;?></th>
                <th scope="row"><?php echo $d['nik'];?></th>
                <td><?php echo $d['tgl_pengaduan'];?></td>
                <td><?php echo $d['isi_laporan'];?></td>
                <td><center><img src="../image/<?php echo $d['foto'];?>" width="100" height="100"></center></td>
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
                  Verifikasi
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
                                <option value="proses">Proses</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Isi Tanggapan</label>
                              <textarea class="form-control" name="laporan" rows="3" placeholder="Enter ..."></textarea>
                            </div>                          
                          </div>                                  
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" fdprocessedid="wk0fs"><a href="hapus.php?id=<?php echo $d['id_pengaduan'];?>" style="color:#FFFFFF;"><i class="bx bx-trash-alt"></i> Hapus</a></button>
                          <button type="submit" class="btn btn-primary">Setuju</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php 
              }
              ?> 
            </td>
          </tr>
        </tbody>
      </table>
      <!-- End Primary Color Bordered Table -->

    </div>
  </div>
</main>
<?php
include "footer.php";
?>