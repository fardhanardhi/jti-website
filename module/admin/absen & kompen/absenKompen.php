<?php
include "../config/connection.php";
include "../process/proses_absenKompen.php";

?>

<main role="main" class="container-fluid" id="absenKompen">
  <div class="row">

    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="pr-4 title "><a href="?module=absenKompen"><strong>Absen dan Kompen</strong></a></li>
                <li class="breadcrumb-item"><a href="?module=home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Absen dan Kompen</li>
            </ol>
        </nav>
      </div>
    </div>

    <div class="col-md-9 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Absensi Mahasiswa</h6>
          <div class="container-fluid mt-3 p-0">
            <form class="row mb-3 mt-3" action="?module=absenKompen" method="post">
              <div class="col-md-3 d-flex">
                <select class="absenKelas w-auto" name="kelas">
                  <?php
                  $resultKelas=kelas($con);
                  if(mysqli_num_rows($resultKelas)){
                    while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                      ?>
                      <option value="<?php echo $rowKelas["id_kelas"];?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                      <?php
                    }
                  }else{
                    ?>
                    <option value="0">Kelas Kosong</option>
                    <?php
                  }
                  ?>
                </select>

                <input type="submit" name="cariAbsen" class="btn btn-success absenCari ml-4" value="Cari">
              </div>
            </form>
            
            <div class="container-fluid p-0">
            <div class="row scrollbar scrollbar-x m-0" id="absen">
              <div class="col-md-12 p-0 d-flex justify-content-center">
                <?php
                if(isset($_POST["cariAbsen"])){
                  $resultAbsensi=absensi($con, $_POST["kelas"]);
                }
                else{
                  $resultAbsensi=absensi($con, minKelas($con));
                }
                
                if (mysqli_num_rows($resultAbsensi) > 0){
                ?>
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th id="absenNo">No</th>
                      <th id="absenNama">Nama</th>
                      <th id="absenSakit">Sakit</th>
                      <th id="absenIjin">Ijin</th>
                      <th id="absenAlpha">Alpha</th>
                      <th id="absenProses">Proses</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    while($rowAbsensi = mysqli_fetch_assoc($resultAbsensi)){
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td class="text-left"><?php echo $rowAbsensi["nama"]; ?></td>
                        <td>
                          <input type="number" id="sakit<?php echo $rowAbsensi["id_absensi"]; ?>" class="form-control bg-transparent" min="0" value="<?php echo $rowAbsensi["sakit"]; ?>" name="sakit">
                        </td> 
                        <td>
                          <input type="number" id="ijin<?php echo $rowAbsensi["id_absensi"]; ?>" class="form-control bg-transparent" min="0" value="<?php echo $rowAbsensi["ijin"]; ?>" name="ijin">
                        </td>
                        <td>
                          <input type="number" id="alpa<?php echo $rowAbsensi["id_absensi"]; ?>" class="form-control bg-transparent" min="0" value="<?php echo $rowAbsensi["alpa"]; ?>" name="alpha">
                        </td>
                        <td><input type="button" value="Simpan" id="<?php echo $rowAbsensi["id_absensi"]; ?>" class="btn btn-success submit-absen"></td>
                      </tr>
                    <?php
                    $no++;
                    }
                    ?>
                  </tbody>
                </table>
                <?php
                } else{
                  ?>
                  <div class="text-center">
                    <p class="text-muted">Data Kosong</p>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>
    
    <div class="col-md-3 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Total Absensi Mahasiswa</h6>

        <div class="container-fluid">
          <form class="row mb-3 mt-3" action="?module=absenKompen" method="post">
            <div class="col-md-8 p-0">
              <select class="absenKelas" name="kelas">
                <?php
                $resultKelas=kelas($con);
                if(mysqli_num_rows($resultKelas)){
                  while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                    ?>
                    <option value="<?php echo $rowKelas["id_kelas"];?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                    <?php
                  }
                }else{
                  ?>
                  <option value="0">Kelas Kosong</option>
                  <?php
                }
                ?>
              </select>
            </div>

            <div class="col-md-4 text-right">
              <input type="submit" name="cariTotal" class="btn btn-success absenCari" value="Cari">
            </div>
          </form>
        </div>
          
        <div class="container-fluid scrollbar m-0 pr-0 scrollbar-x" id="totalAbsen">
          <?php
          if(isset($_POST["cariTotal"])){
            $resultTotal=absensi($con, $_POST["kelas"]);
          }
          else{
            $resultTotal=absensi($con, minKelas($con));
          }
          
          if (mysqli_num_rows($resultTotal) > 0){
            $no=1;
            while($rowTotal = mysqli_fetch_assoc($resultTotal)){
              ?>
              <!-- Loop data -->
              <div class="row border-bottom border-top pt-1 pb-1 mr-1">
                <div class="col-md-1 align-self-center p-0">
                  <span><?php echo $no;?></span>
                </div>
                <div class="col-md-8 p-0 align-self-center">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-sm-12">
                        <span><?php echo $rowTotal["nama"];?></span>
                      </div>
                    </div>
                    <div class="row text-muted">
                      <div class="col-sm-4">
                        <small>A: <?php echo $rowTotal["alpa"];?></small>
                      </div>
                      <div class="col-sm-4">
                        <small>I: <?php echo $rowTotal["ijin"];?></small>
                      </div>
                      <div class="col-sm-4">
                        <small>S: <?php echo $rowTotal["sakit"];?></small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 text-right align-self-center p-0">
                  <?php
                  if($rowTotal["keterangan"]=="SP1"){
                    ?>
                    <small class="bg-success text-white pt-1 pb-1 pr-3 pl-3 rounded"><?php echo $rowTotal["keterangan"]?></small>
                    <?php
                  } else if($rowTotal["keterangan"]=="SP2"){
                    ?>
                    <small class="bg-orange text-white pt-1 pb-1 pr-3 pl-3 rounded"><?php echo $rowTotal["keterangan"]?></small>
                    <?php
                  } else if($rowTotal["keterangan"]=="SP3"){
                    ?>
                    <small class="bg-danger text-white pt-1 pb-1 pr-3 pl-3 rounded"><?php echo $rowTotal["keterangan"]?></small>
                    <?php
                  }
                  ?>
                </div>
              </div>
              <!-- End Loop Data -->
          <?php
            $no++;
            }
          } else{
            ?>
            <div class="text-center">
              <p class="text-muted">Data Kosong</p>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Kompensasi Mahasiswa</h6>
        <div class="container-fluid mt-3 p-0">
          <div class="row">
            <div class="col-md-12 form-inline">
                <img src="../img/search.svg" alt="" id="icon-search">
                <input type="search" class="form-control mr-3" name="txtCariKompen" id="txtCariKompen" placeholder="Pencarian">
            </div>
          </div>

          <div class="row mt-3 mr-0 ml-2 pr-0 scrollbar scrollbar-x" id="dataKompen">
            <div class="col-md-12 pr-1 pl-0 d-flex justify-content-center">
              <?php
              $resultKompen=kompen($con);
              
              if (mysqli_num_rows($resultKompen) > 0){
              ?>
              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Tanggal</th>
                    <th>Dosen</th>
                    <th colspan="2">Proses</th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  while($rowKompen = mysqli_fetch_assoc($resultKompen)){
                    ?>
                  <tr class="itemKompen">
                    <td class="tampil-detail" data-id="<?php echo $rowKompen["id_kompen"];?>"><?php echo $no;?></td>
                    <td class="tampil-detail nim" data-id="<?php echo $rowKompen["id_kompen"];?>"><?php echo $rowKompen["nim"];?></td>
                    <td class="text-left tampil-detail nama-mhs" data-id="<?php echo $rowKompen["id_kompen"];?>"><?php echo $rowKompen["namaMhs"];?></td>
                    <td class="tampil-detail prodi" data-id="<?php echo $rowKompen["id_kompen"];?>"><?php echo prodi($con, $rowKompen["kode"]);?></td>
                    <td class="tampil-detail nama-dosen" data-id="<?php echo $rowKompen["id_kompen"];?>"><?php echo tampilTanggal($rowKompen["waktu"]);?></td>
                    <td class="text-left tampil-detail waktu" data-id="<?php echo $rowKompen["id_kompen"];?>"><?php echo $rowKompen["namaDosen"];?></td>
                    <td><button type="button" id="<?php echo $rowKompen["id_kompen"];?>" class="btn btn-primary edit-kompen" data-toggle="modal" data-target="#modalEditKompen">Edit</button></td>
                    <td><button type="button" id="<?php echo $rowKompen["id_kompen"];?>"  class="btn btn-danger hapus-kompen" data-toggle="modal" data-target="#modalHapusKompen">Hapus</button></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <?php
              }
              ?>
              </div>
            </div>

          <div class="text-center" id="kompenTidakDitemukan" style="display:none">
            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
            <p class="text-muted">Data Tidak Ditemukan</p>
          </div>
        </div>
      </div>
      
      <!-- Modal preview -->
      <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modalPreview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h5 class="border-bottom border-dark text-center pb-2 mb-3">Form Kompensasi</h5>
              <div class="container-fluid p-0" id="detail-kompen">
                
              </div>
              <div class="row px-5 mt-3 d-flex justify-content-end">
                <button type="button" class="btn btn-danger btn-batal" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End modal preview -->

      <!-- Modal edit -->
      <div class="modal fade" id="modalEditKompen" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"       aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="../process/proses_absenKompen.php?module=absenKompen&act=edit" method="post" onsubmit="return validasiSubmitEditKompen();">
              <div class="modal-body">
                <h5 class="border-bottom border-dark text-center pb-2 mb-3">Form Kompensasi</h5>
                <input type="hidden" name="id_kompen" id="id_kompenEdit">
                <div class="container-fluid p-0" id="edit-kompen">
                    
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End modal edit -->

      <!-- Modal Hapus Kompen-->
      <div class="modal fade" id="modalHapusKompen" tabindex="-1" role="dialog" aria-labelledby="modalHapusKompen"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form action="../process/proses_absenKompen.php?module=absenKompen&act=hapus" method="post">
                <div class="modal-body pt-5 text-center">
                  <input type="hidden" name="id_kompen" id="id_kompenHapus">
                  <strong>Apakah Anda yakin?</strong>
                </div>
                <div class="pb-4 pt-4 d-flex justify-content-around">
                  <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                  <button type="submit" name="hapusKompen" class="btn btn-success btn-ok">Ya</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Hapus Kompen -->

    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Pekerjaan dari Dosen</h6>
        <div class="container-fluid mt-3 p-0">
          <div class="row">
            <div class="col-md-12 form-inline">
                <img src="../img/search.svg" alt="" id="icon-search">
                <input type="search" class="form-control mr-3" name="txtCariPekerjaan" id="txtCariPekerjaan" placeholder="Pencarian">
            </div>
          </div>

          <div class="row mt-3 mr-0 ml-2 pr-0 scrollbar scrollbar-x" id="dataPekerjaan">
            <div class="col-md-12 pr-1 pl-0 d-flex justify-content-center">
            <?php
              $resultPekerjaan=pekerjaan($con);
              
              if (mysqli_num_rows($resultPekerjaan) > 0){
              ?>
              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th class="text-nowrap">Nama Dosen</th>
                    <th>Pekerjaan</th>
                    <th>Kuota</th>
                    <th>Semester</th>                 
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                  while($rowPekerjaan = mysqli_fetch_assoc($resultPekerjaan)){
                  ?>
                    <tr class="itemPekerjaan">
                      <td><?php echo $no; ?></td>
                      <td class="nip"><?php echo $rowPekerjaan["nip"]; ?></td>
                      <td class="nama-dosen text-left"><?php echo $rowPekerjaan["namaDosen"]; ?></td>
                      <td class="nama-pekerjaan text-left"><?php echo $rowPekerjaan["nama"]; ?></td>
                      <td><?php echo $rowPekerjaan["kuota"]; ?></td>
                      <td><?php echo $rowPekerjaan["semester"]; ?></td>
                    </tr>
                  <?php
                  $no++;
                  }
                  ?>
                </tbody>
              </table>
              <?php
              }
              ?>
            </div>
          </div>

          <div class="text-center" id="pekerjaanTidakDitemukan" style="display:none">
            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
            <p class="text-muted">Pekerjaan Tidak Ditemukan</p>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Rekap Kompen</h6>
        <div class="container-fluid mt-3 p-0">
          <div class="row">
            <div class="col-md-12 form-inline">
                <img src="../img/search.svg" alt="" id="icon-search">
                <input type="search" class="form-control mr-3" name="txtCariRekap" id="txtCariRekap" placeholder="Pencarian">
            </div>
          </div>

          <div class="row mt-3 ml-1 mr-0 pr-0 scrollbar scrollbar-x" id="rekapKompen">
            <div class="col-md-12 pr-1 pl-0">
            <?php
              $resultRekap=rekap($con);

              if (mysqli_num_rows($resultRekap) > 0){
              ?>
              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Kompen Semester</th>
                    <th class="text-nowrap">Total Kompen Seluruh Semester</th>
                    <th class="text-nowrap">Kompen Terselesaikan</th>      
                    <th class="text-nowrap">Kompen Belum Terselesaikan</th>            
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                  while($rowRekap = mysqli_fetch_assoc($resultRekap)){
                  ?>
                    <tr class="itemRekap">
                      <td><?php echo $no; ?></td>
                      <td class="nim"><?php echo $rowRekap["nim"] ?></td>
                      <td class="kelas"><?php echo tampilKelas($con, $rowRekap["id_kelas"]) ?></td>
                      <td><?php echo kompenSemester($con, $rowRekap["id_mahasiswa"], $rowRekap["id_semester"]) ?></td>
                      <td><?php echo totalKompen($con, $rowRekap["id_mahasiswa"]) ?></td>
                      <td><?php echo kompenSelesai($con, $rowRekap["id_mahasiswa"]) ?></td>
                      <td><?php echo kompenBelumSelesai($con, $rowRekap["id_mahasiswa"]) ?></td>
                    </tr>
                  <?php
                  $no++;
                  }
                  ?>
                </tbody>
              </table>
              <?php
              }
              ?>
            </div>
          </div>

          <div class="text-center" id="rekapTidakDitemukan" style="display:none">
            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
            <p class="text-muted">Data Tidak Ditemukan</p>
          </div>

        </div>
      </div>
    </div>

  </div>
</main>