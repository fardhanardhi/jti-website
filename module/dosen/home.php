<?php
  include "../config/connection.php";
  include "../process/proses_dosenHome.php";
?>

<main role="main" class="container-fluid" id="dosenHomepage">
  <link rel="stylesheet" href="../css/dosen.css">
  <div class="row">
    <!-- Profil Dosen -->
    <div class="col-md-3 p-0 ">
      <div class="sticky-sidebar sticky-top">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125">
              <div class="isi">
          <?php 
          $resultTampilProfilDosen=tampilDataProfilDosen($con, $idUser);
        if (mysqli_num_rows($resultTampilProfilDosen) > 0){
          while ($row = mysqli_fetch_assoc($resultTampilProfilDosen)) {
        ?>
                <div class="d-flex justify-content-center">
                  <img src="../attachment/img/avatar.jpeg" alt="dosen"
                    style="width:150px;height:150px;border-radius:50%;">
                </div>
                <div class="data-dosen text-center">
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0"><?= $row["nama"]?></h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0"><?= $row["nip"]?></h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">DOSEN JTI</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">SARJANA</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">DOSEN TETAP</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">AKTIF</h6>
                </div>
              </div>
        <?php
          } 
        }
        ?>      
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jadwal Dosen -->
    <div class="col-md-6 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0 judul">JADWAL DOSEN</h6>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125">
            <div class="isi" id="isiJadwalDosen">
              
          <?php
            $resultQueryJadwalDosen = ambilJadwalDosen($con, $idUser);
          if (mysqli_num_rows($resultQueryJadwalDosen) > 0) {
            $index = 1;
          ?>
              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>SKS</th>
                    <th>Ruang</th>
                  </tr>
                </thead>
            <?php
            while ($row = mysqli_fetch_assoc($resultQueryJadwalDosen)) {

            ?>
                <tbody>
                  <tr>
                    <td><?= $index ?></td>
                    <td><?= $row["nama"]?></td>
                    <td><?= $row["hari"]?></td>
                    <td><?= $row["jam_mulai"]?> - <?= $row["jam_selesai"]?></td>
                    <td><?= $row["sks"]?></td>
                    <td><?= $row["kode"]?>(Lt.<?= $row["lantai"]?>)</td>
                  </tr>
                </tbody>
          <?php
            $index++;
            }
            ?>
              </table>  
          <?php  
          }else {
          ?>
            <!-- ------------------------ -->
              <!-- Jika Jadwal Dosen Kosong -->
              <!-- ------------------------ -->

              <div class="jadwal-dosen-kosong text-center">
                  <img src="../img/jadwalKosong.svg" alt="jadwal kosong">
                  <p>Maaf, jadwal masih belum tersedia. <br> Jadwal baru bisa dilihat pada bulan Juni 2019</p>
              </div>

              <!-- ---------------------------- -->
              <!-- END Jika Jadwal Dosen Kosong -->
              <!-- ---------------------------- -->
          <?php
          }
          ?>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Kompen Mahasiswa -->
    <div class="col-md-3 p-0 ">
      <div class="sticky-sidebar sticky-top">
        <div class="kompen-bar m-2 p-3 bg-white rounded shadow-sm my-auto">
          <h6 class="border-bottom border-gray pb-2 mb-0 judul">KOMPEN MAHASISWA</h6>
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small">

              <!-- ------------ -->
              <!-- Kompen Tabel -->
              <!-- ------------ -->

              <div class="col-12 p-0 data-kompen-ada scrollbar">
                <div class="border-bottom border-gray pb-2 mb-0"> </div>

            <?php 
              $resultQueryTask= tampilTaskDosen($con, $idUser);
              if (mysqli_num_rows($resultQueryTask) > 0) {
                $index=1;
                while ($row = mysqli_fetch_assoc($resultQueryTask)) {
            ?>

                <form action="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="row">
                            <div class="col-md-1 my-auto">
                            <?= $index ?>.
                            </div>
                            <div class="col-md-9">
                              <div class="row">
                                <div class="col-md-12">
                                  <?= $row["pekerjaan"]?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  kuota: <?= $row["kuota"]?> mahasiswa
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 my-auto">
                          <button type="submit" class="btn btn-success kompen-submit-btn">Submit</button>
                        </div>
                        <div class="col-md-auto my-auto">
                          <div class="dropdown">
                            <a data-toggle="dropdown"><i class="fa fa-ellipsis-v fa-2x waves-effect"></i></a>
                            <div class="dropdown-kompen dropdown-menu">
                              <a class="dropdown-item" data-toggle="modal" data-target="#hapusKompen"><i class="far fa-trash-alt"></i> Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="border-bottom border-gray pb-2 mb-0"> </div>
                </form>
            <?php
                $index++;
                }
              }
            ?>    

              </div>
              <!-- Modal -->
              <div class="modal fade hapusKompen-modal" id="hapusKompen" tabindex="-1" role="dialog" 
              aria-labelledby="hapusKompenTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content konten-modal">
                    <div class="modal-body ">
                      <h5 class="isiHapusKompen text-center">Apakah Anda Yakin?</h5>
                      <div class="tombolAksiHapusKompen text-center">
                        <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-iya">Ya</button>
                      </div>
                    </div>                 
                  </div>
                </div>
              </div>
              <!-- ---------------- -->
              <!-- END Kompen Tabel -->
              <!-- ---------------- -->

              <!-- Tombol  -->
              <div class="d-flex justify-content-center">
                <button type="button" class="btn tambah-pekerjaan-kompen" data-toggle="modal"
                  data-target="#exampleModalCenter">Tambah Pekerjaan</button>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <button type="button" class="close text-right active" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <center>
                      <h5 class=" modal-title text-center border-bottom border-gray pb-2 mb-0"
                        id="exampleModalCenterTitle" style="margin: 0 auto;">Tambah Pekerjaan</h5>
                    </center>
                    <form action="" method="post">
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-2"></div>
                          <div class="col-3">
                            <label for="pekerjaanKompensasi">
                              <h6>Pekerjaan Kompensasi</h6>
                            </label>
                          </div>
                          <div class="col-6">
                            <input id="pekerjaanKompensasi" class="form-control" type="text">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-2"></div>
                          <div class="col-3">
                            <label for="kuotaMahasiswa">
                              <h6>Kuota Mahasiswa</h6>
                            </label>
                          </div>
                          <div class="col-3">
                            <select class="form-control kuota-mahasiswa" id="kuotaMahasiswa">
                          </div>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                          <option>25</option>
                          <option>26</option>
                          <option>27</option>
                          <option>28</option>
                          <option>29</option>
                          <option>30</option>
                          </select>
                        </div>
                        <div class="modal-footer col-12 tambahkan-modal-parent text-right">
                          <button type="submit" class="btn tambahkan-modal ">Tambahkan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- ------------------ -->
              <!-- Jika Kompen Kosong -->
              <!-- ------------------ -->

              <!-- <div class="isi py-5 text-center">
                <div class="text-center mb-2">
                  <img src="../img/clipboard.svg" alt="clipBoard" class="clipBoard">
                </div>
                <div class="data-kompen text-center w-50 mr-auto ml-auto">
                  <h6>Anda tidak mempunyai daftar pekerjaan</h6>
                </div>
              </div> -->

              <!-- ---------------------- -->
              <!-- END Jika Kompen Kosong -->
              <!-- ---------------------- -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>