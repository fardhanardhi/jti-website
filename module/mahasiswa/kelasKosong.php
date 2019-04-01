<?php
  include "../config/connection.php";
  include "../process/proses_kelasKosong.php";
  
?>

<main role="main" class="container-fluid" id="kelasKosong">
  <div class="row">
    <div class="col-md-3 p-0">
      <div class="ml-2 mr-2 mt-2 p-1 bg-blue rounded-top shadow-sm">
        <h5 class="text-white pl-3">Pemesanan</h5>
      </div>
      <div class="ml-2 mr-2 mb-2 mt-0 bg-white rounded-bottom shadow-sm">
      <?php
        $resultKelasDipesan=kelasDipesan($con);
        if (mysqli_num_rows($resultKelasDipesan) > 0){
            while($row = mysqli_fetch_assoc($resultKelasDipesan)){
                $id_info_kelas_kosong = $row["id_info_kelas_kosong"];
                ?>
                <div class="pesanan p-3 container-fluid border-top">
                  <div class="row d-flex align-items-center">
                    <div class="col-7 text-left">
                      <strong><span class="p-0 m-0 kelas"><?php echo $row["kode_ruang"]; ?></span></strong>
                      <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai ".$row["lantai"].")"; ?></span>
                      <br>
                      <strong><?php echo tampilWaktu($row["waktu_mulai"]). " - ".tampilWaktu($row["waktu_selesai"]) ?></strong>
                    </div>
                    <div class="col-5 text-right">
                      <h4>Jumat</h4>
                    </div>
                  </div>

                  <!-- Button trigger modal -->
                  <div class="row">
                    <div class="col-12 text-right">
                      <button class="btn btn-danger btn-checkout text-white" data-toggle="modal"
                        data-target="#modalCheckout">Checkout</button>
                    </div>
                  </div>
                </div>
                
                <!-- Modal -->
                <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=checkout&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
                <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-body pt-5 text-center">
                        <strong>Apakah Anda yakin?</strong>
                      </div>
                      <div class="container-fluid pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger btn-confirm" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="checkout" class="btn btn-success btn-confirm">Ya</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                <!-- End Modal -->
                <?php
            }
        }else{
            ?>
            <div class="text-center pt-5 pb-5 container-fluid">
              <strong>Tidak ada ruang yang dipesan!</strong>
            </div>
          <?php
        }

        ?>

      </div>
    </div>

    <div class="col-md-9 p-0">
      <div class="ml-2 mr-2 mt-2 p-1 bg-blue rounded-top shadow-sm">
        <h5 class="text-white pl-3">Daftar Ruangan</h5>
      </div>
      <div class="ml-2 mr-2 mb-2 mt-0 pt-4 pb-3 bg-white rounded-bottom shadow-sm">
      <form action="?module=kelasKosong" method="post">
        <div class="container-fluid">
          <div class="row">
            <div class="col-1 text-center">
              <strong>Hari</strong>
            </div>
          
           <div class="col-7 m-0 p-0">
              <div class="btn-group-toggle d-flex justify-content-around" data-toggle="buttons">
                <label class="btn btn-outline-dark btn-hari active">
                  <input type="radio" name="senin" class="hari" id="senin" autocomplete="off" checked> Senin
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="selasa" id="selasa" autocomplete="off">Selasa
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="rabu" id="rabu" autocomplete="off"> Rabu
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="kamis" id="kamis" autocomplete="off"> Kamis
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="jumat" id="jumat" autocomplete="off"> Jumat
                </label>
              </div>
            </div>
            <div class="col-2 pl-0 pr-0 m-0 text-right">
              <strong class="pr-3">Jam</strong>
              <select class="optionJam" name="jam">
                <option value="07:00:00">07.00</option>
                <?php
                  $jam=tampilJam($con);
                  while($row=mysqli_fetch_array($jam)){
                    ?>
                    <option value=<?php echo tampilWaktu($row["waktu_mulai"])?>><?php echo tampilWaktu($row["waktu_mulai"])?></option>
                    <?php
                  }
                  ?>
              </select>
            </div>
            <div class="col-2 p-0 m-0 text-right">
              <input type="submit" name="cari" class="btn btn-success btn-cari mr-4" value="Cari">
            </div>
          </div>
          </form>

          <div class="row p-3">
          <?php
            if(isset($_POST["cari"])){
              $resultKelasKosong=kelasKosong($con,$_POST["jam"]);
            }
            else{
              $resultKelasKosong=kelasKosong($con,'07:00:00');
            }
              if (mysqli_num_rows($resultKelasKosong) > 0){
                  while($row = mysqli_fetch_assoc($resultKelasKosong)){
                      $id_info_kelas_kosong = $row["id_info_kelas_kosong"];
                      if($row["status_dipinjam"]=="Kosong"){
                        ?>
                        <div class="col-md-6 col-sm-12 p-2">
                          <div class="rounded ruang p-3">
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
                                  if (cekPeminjamSekelas($con, $row["waktu_mulai"])==true){
                                    ?>
                                    <a tabindex="0" class="btn btn-pesan p-1 bg-blue text-white" role="button" data-toggle="popover" data-trigger="focus" data-content="*Kelas anda telah melakukan pemesanan ruangan!" data-placement="bottom">Pesan</a>
                                    <?php
                                  }else{
                                    ?>
                                    <button class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                                    <?php
                                  }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                      }else if($row["status_dipinjam"]=="Dipinjam"){
                        ?>
                        <div class="col-md-6 col-sm-12 p-2">
                          <div class="rounded ruang p-3 dipesan">
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
                                  if (cekPeminjamSekelas($con, $row["waktu_mulai"])==true){
                                    ?>
                                    <a tabindex="0" class="btn btn-pesan p-1 bg-blue text-white" role="button" data-toggle="popover" data-trigger="focus" data-content="*Kelas anda telah melakukan pemesanan ruangan!" data-placement="bottom">Pesan</a>
                                    <?php
                                  }else{
                                    ?>
                                    <button class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                                    <?php
                                  }
                                ?>
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
</main>