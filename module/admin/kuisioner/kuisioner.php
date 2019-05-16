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
                            <div class="col-md-12 p-0 pl-3 d-flex">
                              <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
                              <select class="form-control form-control-sm w-auto mr-2" name="kelas" id="id_kelas">
                                <option value="0">Pilih Kelas</option>
                                <?php
                                $resultKelas=kelas($con);
                                if(mysqli_num_rows($resultKelas)){
                                  while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                                    ?>
                                    <option value="<?php echo $rowKelas["id_kelas"];?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                                    <?php
                                  }
                                }
                                ?>
                              </select>
                              <input type="button" value="Cari" name="cariKuisionerPerKelas" id="cariKuisionerPerKelas" class="btn btn-success button">
                            </div>
                          </div>

                          <div class="row mt-2">
                            <div class="col-md-12 p-0 d-flex justify-content-center scrollbar pr-1" id="tableData">
                              <div class="text-center">
                                <img src='../img/magnifier.svg' alt='pencarian' class='p-3'><p class='text-muted'>Data Tidak Ditemukan</p>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal Lihat per Kelas -->

              <?php
              if(cekStatusAktif($con)){ ?>
                <button type="button" class="btn btn-danger button mr-2" id="hentikanKuisioner">
                Hentikan Kuisioner
                </button>
              <?php } 
              else if(!cekStatusAktif($con)){ ?>
                <button type="button" class="btn btn-success button mr-2" id="aktifkanKuisioner">
                Aktifkan Kuisioner
                </button>
              <?php } ?>
            </div>

            <div class="col-md-6">
              <div class="p-0 m-0 d-flex justify-content-end">
                <select class="form-control form-control-sm w-auto mr-2" name="tahun" id="tahunKuisioner">
                  <option value="0">Pilih Tahun Ajaran</option>
                  <?php
                    $resultTahun=tampilTahun($con);
                    if(mysqli_num_rows($resultTahun)){
                      while($rowTahun=mysqli_fetch_assoc($resultTahun)){
                        ?>
                        <option value="<?php echo $rowTahun["tahun"];?>"><?php echo $rowTahun["tahun"];?></option>
                        <?php
                      }
                    }
                   ?>
                </select>
                <select class="form-control form-control-sm w-auto mr-2" name="semester" id="semesterKuisioner">
                  <option value="0">Pilih Semester</option>
                   <?php
                    $resultSemester=tampilSemester($con);
                    if(mysqli_num_rows($resultSemester)){
                      while($rowSemester=mysqli_fetch_assoc($resultSemester)){
                        ?>
                        <option value="<?php echo $rowSemester["id_semester"];?>"><?php echo $rowSemester["semester"];?></option>
                        <?php
                      }
                    }
                   ?>
                </select>
                <button id="cariKuisioner" class="btn btn-success button">Cari</button>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-12 d-flex">
              <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
              <input type="search" class="pencarian form-control mr-4" id="txtCariDosenKuisioner">
            </div>
          </div>

          <div class="row mt-3 scrollbar scrollbar-x" style="overflow:auto" id="dataDosenKuisioner">
            <div class="col-md-12 d-flex text-center justify-content-center">
            <?php
              $resultKuisioner=kuisioner($con, date("Y"), 4);
              
              if (mysqli_num_rows($resultKuisioner) > 0){
              ?>
              <table class="table table-striped table-bordered text-center itemDosenKuisioner">
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
                    $no=1;
                    while($row = mysqli_fetch_assoc($resultKuisioner)){
                      ?>
                      <tr class="itemDosenKuisioner">
                        <td><?php echo $no;?></td>
                        <td class="nip"><?php echo $row["nip"]; ?></td>
                        <td class="nama"><?php echo $row["namaDosen"]; ?></td>
                        <td class="kelas">
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
                          <button type="button" id="<?php echo $row["id_dosen"];?>" class="btn btn-primary lihat-detail text-nowrap" data-toggle="modal" data-target="#modalLihatHasil">Lihat Hasil</button>
                        </td>
                      </tr>
                    <?php
                     $no++;
                    }
                    ?>
                </tbody>
              </table>
            <?php 
            }else{
              ?>
              <div class="text-center">
                <p class="text-muted">Data Kuisioner Kosong</p>
              </div>
          <?php
            }
            ?>
            </div>
          </div>
          
          <div class="text-center" id="kuisionerTidakDitemukan" style="display:none">
            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
            <p class="text-muted">Dosen Tidak Ditemukan</p>
          </div>

        </div>          
      </div>
    </div>

    
    <!-- Modal Lihat Hasil-->
    <div class="modal modalLihatHasil fade" id="modalLihatHasil" tabindex="-1" role="dialog" aria-labelledby="modalLihatHasil"
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
                  <?php
                  $resultKelas=kelas($con);
                  if(mysqli_num_rows($resultKelas)){
                    while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                      ?>
                      <option value="<?php echo $rowKelas["id_kelas"];?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
                <select class="form-control form-control-sm w-auto mr-2" name="tahun" id="tahun">
                  <option value="0">Pilih Tahun Ajaran</option>
                  <?php
                  $resultTahun=tampilTahun($con);
                  if(mysqli_num_rows($resultTahun)){
                    while($rowTahun=mysqli_fetch_assoc($resultTahun)){
                      ?>
                      <option value="<?php echo $rowTahun["tahun"];?>"><?php echo $rowTahun["tahun"];?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
                <select class="form-control form-control-sm w-auto mr-2" name="semester" id="semester">
                    <option value="0">Pilih Semester</option>
                    <?php
                      $resultSemester=tampilSemester($con);
                      if(mysqli_num_rows($resultSemester)){
                        while($rowSemester=mysqli_fetch_assoc($resultSemester)){
                          ?>
                          <option value="<?php echo $rowSemester["id_semester"];?>"><?php echo $rowSemester["semester"];?></option>
                          <?php
                        }
                      }
                    ?>
                </select>
                <input type="button" value="Cari" name="cariKuisionerDosen" 
                id="cariKuisionerDosen" class="btn btn-success button">
              </div>

              <div class="row mt-2">
                <div class="col-md-12 p-0 d-flex justify-content-center scrollbar pr-1" id="tableDataKuisionerDosen">
                  <div class="text-center">
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