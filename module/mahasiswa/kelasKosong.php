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
      <div class="ml-2 mr-2 mb-2 mt-0 bg-white rounded-bottom shadow-sm scrollbar" id="ruang-dipesan-mhs">
      <?php
        $resultKelasDipesan=kelasDipesan($con);
        if (mysqli_num_rows($resultKelasDipesan) > 0){
            while($rowKelasDipesan = mysqli_fetch_assoc($resultKelasDipesan)){ 
              ?>
              <div class="pesanan p-3 container-fluid border-top">
                <div class="row d-flex align-items-center">
                  <div class="col-7 text-left">
                    <strong><span class="p-0 m-0 kelas"><?php echo $rowKelasDipesan["kode"]; ?></span></strong>
                    <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai ".$rowKelasDipesan["lantai"].")"; ?></span>
                    <br>
                    <strong><?php echo tampilWaktu($rowKelasDipesan["waktu_mulai"]). " - ".tampilWaktu($rowKelasDipesan["waktu_selesai"]) ?></strong>
                  </div>
                  <div class="col-5 text-right">
                    <h4><?php echo ucfirst($rowKelasDipesan["hari"]); ?></h4>
                  </div>
                </div>

                <!-- Button trigger modal -->
                <div class="row">
                  <div class="col-12 text-right">
                    <button class="btn btn-danger btn-checkout text-white checkout-kelas" data-toggle="modal" data-target="#modalCheckout" id="<?php echo $rowKelasDipesan["id_ruang_dipinjam"] ; ?>">Checkout</button>
                  </div>
                </div>
              </div>
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
        <!-- Modal Checkout-->
        <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=checkout" method="post">
        <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body pt-5 text-center">
                <input type="hidden" name="id_ruang_dipinjam" id="id_ruang_dipinjam_mhs">
                <strong>Apakah Anda yakin?</strong>
              </div>
              <div class="pb-4 pt-4 d-flex justify-content-around">
                <button type="button" class="btn btn-danger btn-confirm" data-dismiss="modal">Tidak</button>
                <button type="submit" name="checkout" class="btn btn-success btn-confirm">Ya</button>
              </div>
            </div>
          </div>
        </div>
        </form>
        <!-- End Modal -->
    </div>

    <div class="col-md-9 p-0">
      <div class="ml-2 mr-2 mt-2 p-1 bg-blue rounded-top shadow-sm">
        <h5 class="text-white pl-3">Daftar Ruangan</h5>
      </div>
      <div class="ml-2 mr-2 mb-2 mt-0 pt-4 pb-3 bg-white rounded-bottom shadow-sm">
        <div class="container-fluid">
          <div class="row">
            <div class="col-1 text-center">
              <strong>Hari</strong>
            </div>
          
           <div class="col-7 m-0 p-0">
              <div class="btn-group-toggle d-flex justify-content-around" data-toggle="buttons">
                <label class="btn btn-outline-dark btn-hari active">
                  <input type="radio" name="hari" value="senin" class="hari" autocomplete="off" checked> Senin
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="selasa" autocomplete="off">Selasa
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="rabu" autocomplete="off"> Rabu
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="kamis" autocomplete="off"> Kamis
                </label>
                <label class="btn btn-outline-dark btn-hari">
                  <input type="radio" name="hari" value="jumat" autocomplete="off"> Jumat
                </label>
              </div>
            </div>
            <div class="col-2 pl-0 pr-0 m-0 text-right">
              <strong class="pr-3">Jam</strong>
              <select class="optionJam" name="jam" id="jamKelasKosong">
                <option value="07:00:00">07.00</option>
                <?php
                  $jam=tampilJam($con);
                  while($row=mysqli_fetch_array($jam)){
                    ?>
                    <option value=<?php echo tampilWaktuDefault($row["jam_mulai"])?>><?php echo tampilWaktu($row["jam_mulai"])?></option>
                    <?php
                  }
                  ?>
              </select>
            </div>
            <div class="col-2 p-0 m-0 text-right">
              <input type="button" class="btn btn-success btn-cari mr-4" value="Cari" id="cariKelasKosongMhs">
            </div>
          </div>

          <div class="row pb-3 pr-3 pl-3 pt-0 mt-3 scrollbar" id="dataKelasKosongMhs">
          <?php
            $resultKelasKosong=kelasKosong($con,'07:00:00','senin');
              if (mysqli_num_rows($resultKelasKosong) > 0){
                while($rowKelasKosong = mysqli_fetch_assoc($resultKelasKosong)){
                  if(cekRuangDipinjam($con, '07:00:00', jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"]), 'senin', $rowKelasKosong["id_ruang"]) == false) {
                    ?>
                    <div class="col-md-6 p-2">
                      <div class="rounded ruang p-3">

                        <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=pesan" method="post" class="mb-0 mt-0">
                          <input type="hidden" name="id_ruang" value="<?php echo $rowKelasKosong["id_ruang"];?>">
                          <input type="hidden" name="waktu_mulai" value="07:00:00">
                          <input type="hidden" name="hari" value="senin">
                          <input type="hidden" name="waktu_selesai" value="<?php echo jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"]); ?>">
                        <div class="row d-flex align-items-center">
                          <div class="col-3 text-center">
                            <h4 class="p-0 m-0"><?php echo $rowKelasKosong["kode"]; ?></h4>
                            <span class="text-secondary"><?php echo "(Lantai ".$rowKelasKosong["lantai"].")"; ?></span>
                          </div>
                          <div class="col-5">
                            <h5><?php echo "07.00 - " . tampilWaktu(jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"])); ?></h5>
                          </div>
                          <div class="col-4 text-right">
                            <?php
                              if (cekPeminjamSekelas($con, '07:00:00', jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"]), 'senin')==true){
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
                  }else{
                    ?>
                    <div class="col-md-6 p-2">
                      <div class="rounded ruang p-3 dipesan">
                        <div class="mb-0 mt-0">
                          <div class="row d-flex align-items-center">
                            <div class="col-3 text-center">
                              <h4 class="p-0 m-0"><?php echo $rowKelasKosong["kode"]; ?></h4>
                              <span class="text-secondary"><?php echo "(Lantai ".$rowKelasKosong["lantai"].")"; ?></span>
                            </div>
                            <div class="col-5">
                              <h5><?php echo "07.00 - " . tampilWaktu(jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"])); ?></h5>
                            </div>
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
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>