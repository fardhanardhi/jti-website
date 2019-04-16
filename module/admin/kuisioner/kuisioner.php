<?php
  include "../config/connection.php";
  include "../process/proses_kuisioner.php";
?>

<main role="main" class="container-fluid" id="kuisioner">
  <div class="row">

    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="pr-4 title "><a href="?module=kuisioner"><strong>Kuisioner</strong></a></li>
                <li class="breadcrumb-item"><a href="?module=home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kuisioner</li>
            </ol>
        </nav>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-6 ">
              <a href="?module=kriteriaKuisioner" class="btn btn-success button mr-2">
              Kriteria
              </a>
              <button type="button" class="btn btn-success button mr-2" data-toggle="modal" data-target="#modalLihatperKelas">
              Lihat per Kelas
              </button>

                <!-- Modal Lihat per Kelas-->
                <div class="modal fade" id="modalLihatperKelas" tabindex="-1" role="dialog" aria-labelledby="modalLihatperKelas"
                    aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <button type="button" class="close close-setting" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center">Lihat per Kelas</h5>
                        <hr class="mt-2 text-muted mr-4 ml-4">

                        <div class="container-fluid">
                          <div class="row mt-2">
                            <form action="" class="col-md-12 p-0 pl-3 d-flex">
                              <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
                              <select class="form-control form-control-sm w-auto mr-2" name="kelas">
                                  <option>TI - 2F</option>
                              </select>
                              <input type="submit" value="Cari" name="cari" class="btn btn-success button">
                            </form>
                          </div>

                          <div class="row mt-2">
                            <div class="col-md-12 p-0 d-flex">
                              <table class="table table-striped table-bordered text-center">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Telah Mengisi Kuisioner</th>
                                    <th>Belum Mengisi Kuisioner</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>1741720086</td>
                                    <td>Chintya Puspa Dewi</td>
                                    <td>7</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>1741720086</td>
                                    <td>Chintya Puspa Dewi</td>
                                    <td>7</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>1741720086</td>
                                    <td>Chintya Puspa Dewi</td>
                                    <td>7</td>
                                    <td>3</td>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>1741720086</td>
                                    <td>Chintya Puspa Dewi</td>
                                    <td>7</td>
                                    <td>3</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal Lihat per Kelas -->

              <button type="button" class="btn btn-success button mr-2" data-toggle="modal" data-target="#modalAktifkanKuisioner">
              Aktifkan Kuisioner
              </button>
            </div>

            <div class="col-md-6">
              <form action="" class="p-0 m-0 d-flex justify-content-end">
                <select class="form-control form-control-sm w-auto mr-2" name="tahun">
                    <option>Pilih Tahun Ajaran</option>
                </select>
                <select class="form-control form-control-sm w-auto mr-2" name="semester">
                    <option>Pilih Semester</option>
                </select>
                <input type="submit" value="Cari" name="cari" class="btn btn-success button">
              </form>
            </div>
          </div>

          <div class="row mt-3">
            <form class="col-md-12 d-flex" action="?module=kuisioner" method="POST">
              <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
              <input type="search" class="pencarian form-control mr-4" name="txtCariDosen" id="cari">
              <input type="submit" value="Cari Dosen" name="cariDosen" class="btn btn-success btn-cariDosen">
            </form>
          </div>

          <div class="row mt-3">
            <div class="col-md-12 d-flex text-center justify-content-center">
            <?php
              if(isset($_POST["cari"])){
                $resultKuisioner=kuisioner($con, $_POST["tahun"], $_POST["semester"]);
              }
              else if(isset($_POST["cariDosen"])){
                $resultKuisioner=kuisionerCariDosen($con, $_POST["txtCariDosen"]);
              }
              else{
                $resultKuisioner=kuisioner($con, date("Y"), 7);
              }
              
              if (mysqli_num_rows($resultKuisioner) > 0){
              ?>
              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Kelas yang Diajar Semester Ini</th>
                    <th>Proses</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($resultKuisioner)){
                      ?>
                      <tr>
                        <td>1</td>
                        <td><?php echo $row["nip"]; ?></td>
                        <td><?php echo $row["namaDosen"]; ?></td>
                        <td>
                        <?php
                        $resultKelasDosen=kelasDosen($con,$row["id_dosen"]);
                        if (mysqli_num_rows($resultKelasDosen) > 0){
                          while($rowKelas = mysqli_fetch_assoc($resultKelasDosen)){
                              echo tampilKelas($con,$rowKelas["id_kelas"]);
                          }
                        }
                        else{
                          echo "-";
                        }
                            ?>
                        </td>
                        <td>
                          <button type="button" id="<?php echo $row["id_dosen"];?>" class="btn btn-primary lihat-detail" data-toggle="modal" data-target="#modalLihatHasil">Lihat Hasil</button>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                </tbody>
              </table>
            <?php 
            }else{
              ?>
              <div>
                <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                <p class="text-muted">Dosen Tidak Ditemukan</p>
              </div>
              <?php
            }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <!-- Modal Lihat Hasil-->
    <div class="modal fade" id="modalLihatHasil" tabindex="-1" role="dialog" aria-labelledby="modalLihatHasil"
        aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close close-setting" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div id="judul"></div>
            <hr class="mt-2 text-muted mr-4 ml-4">

            <div class="container-fluid">
              <div class="row mt-2">
                  <select class="form-control form-control-sm w-auto mr-2" name="kelas" id="kelas">
                      <option value="0">Pilih Kelas</option>
                      <option value="4">TI-2F</option>
                  </select>
                  <select class="form-control form-control-sm w-auto mr-2" name="tahun" id="tahun">
                      <option value="0">Pilih Tahun Ajaran</option>
                      <option value="2019">2019</option>
                  </select>
                  <select class="form-control form-control-sm w-auto mr-2" name="semester" id="semester">
                      <option value="0">Pilih Semester</option>
                      <option value="7">4</option>
                  </select>
                  <input type="button" value="Cari" name="cariKuisionerDosen" 
                  id="cariKuisionerDosen" class="btn btn-success button">
              </div>

              <div class="row mt-2">
                <div class="col-md-12 p-0 d-flex justify-content-center" id="tableData">
                  <div>
                    <img src='../img/magnifier.svg' alt='pencarian' class='p-3'><p class='text-muted'>Data Tidak Ditemukan</p>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Lihat Hasil -->
    
  </div>
</main>