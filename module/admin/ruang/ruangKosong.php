<?php
  include "../config/connection.php";
  include "../process/proses_kelasKosong.php";
  
?>

<div class="col-md-6 p-0">
    <div class="m-2 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Pemesanan Ruang</h6>
    <div class="pt-3">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-md-12">
            <form class="form-inline">
              <img src="../img/search.svg" alt="" id="icon-search">
              <input type="search" class="form-control" name="cari" id="cari" placeholder="Pencarian">
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>

<div class="col-md-6 p-0">
    <div class="m-2 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Ruangan</h6>
    <div class="pt-3">
      <form action="?module=ruang" method="post">
        <div class="container-fluid">
          <div class="row">
            <div class="col-1 p-0 text-center">
              <strong>Hari</strong>
            </div>
          
           <div class="col-11 p-0">
              <div class="btn-group-toggle d-flex justify-content-around" data-toggle="buttons">
                <label class="btn btn-outline-dark btn-hari active">
                  <input type="radio" name="hari" value="senin" class="hari" id="senin" autocomplete="off" checked> Senin
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="selasa" id="selasa" autocomplete="off">Selasa
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="rabu" id="rabu" autocomplete="off"> Rabu
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="kamis" id="kamis" autocomplete="off"> Kamis
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="jumat" id="jumat" autocomplete="off"> Jumat
                </label>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-1 p-0 text-center">
              <strong>Jam</strong>
            </div>
            <div class="col-11 p-0 pl-2">
              <select class="optionJam" name="jam">
                <option value="07:00:00">07.00</option>
                <?php
                  $jam=tampilJam($con);
                  while($row=mysqli_fetch_array($jam)){
                    ?>
                    <option value=<?php echo tampilWaktuDefault($row["waktu_mulai"])?>><?php echo tampilWaktu($row["waktu_mulai"])?></option>
                    <?php
                  }
                  ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-right">
              <input type="submit" name="cari" class="btn btn-success btn-cari" value="Cari">
            </div>
          </div>
          </form>

          <div id="daftar-ruangan" class="scrollbar">
          <div class="row p-2">
          <?php
            if(isset($_POST["cari"])){
              $resultKelasKosong=kelasKosong($con,$_POST["jam"],$_POST["hari"]);
            }
            else{
              $resultKelasKosong=kelasKosong($con,'07:00:00','senin');
            }
              if (mysqli_num_rows($resultKelasKosong) > 0){
                  while($row = mysqli_fetch_assoc($resultKelasKosong)){
                      $id_info_kelas_kosong = $row["id_info_kelas_kosong"];
                      if($row["status_dipinjam"]=="Kosong"){
                        ?>
                        <div class="col-md-12 p-0 mb-3 pr-3">
                          <div class="rounded ruang p-3">

                            <form action="../process/proses_kelasKosong.php?act=pesan&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
                            <div class="row d-flex align-items-center">
                              <div class="col-3 text-center">
                                <h4 class="p-0 m-0"><?php echo $row["kode_ruang"]; ?></h4>
                                <span class="text-secondary"><?php echo "(Lantai ".$row["lantai"].")"; ?></span>
                              </div>
                              <div class="col-5">
                                <h5><?php echo tampilWaktu($row["waktu_mulai"]). " - ".tampilWaktu($row["waktu_selesai"]) ?></h5>
                              </div>
                              <div class="col-4 text-right">
                                <?php
                                  if (cekPeminjamSekelas($con, $row["waktu_mulai"], $row["hari"])==true){
                                    ?>
                                    <a tabindex="0" class="btn btn-pesan p-1 bg-blue text-white" role="button" data-toggle="popover" data-trigger="focus" data-content="*Kelas anda telah melakukan pemesanan ruangan!" data-placement="bottom">Pesan</a>
                                    <?php
                                  }else{
                                    ?>
                                    <button type="submit" name="pesan" class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                                    <?php
                                  }
                                ?>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <?php
                      }else if($row["status_dipinjam"]=="Dipinjam"){
                        ?>
                        <div class="col-md-12 p-0 pr-3">
                          <div class="rounded ruang p-3 dipesan">
                            <div class="row d-flex align-items-center">
                              <div class="col-3 text-center">
                                <h4 class="p-0 m-0"><?php echo $row["kode_ruang"]; ?></h4>
                                <span class="text-secondary"><?php echo "(Lantai ".$row["lantai"].")"; ?></span>
                              </div>
                              <div class="col-5">
                                <h5><?php echo tampilWaktu($row["waktu_mulai"]). " - ".tampilWaktu($row["waktu_selesai"]) ?></h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                  }
              }else{
                  ?><div class="col-12 text-center mt-3"><strong>Tidak ada ruang yang kosong</strong></div><?php
              }
              mysqli_close($con);

              ?>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>