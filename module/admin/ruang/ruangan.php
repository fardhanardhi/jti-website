<?php
include "../config/connection.php";
include "../process/proses_adminRuangan.php";
?>

<main role="main" class="container-fluid" id="ruang">
  <div class="row">

    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="pr-4 title "><a href="#"><strong>Ruang Kosong</strong></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ruang Kosong</li>
            </ol>
        </nav>
      </div>
    </div>

    <div class="col-md-6 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Pemesanan Ruang</h6>
        <div class="pt-3">
          <div class="container-fluid p-0">
            <div class="row">
              <div class="col-md-12">
                <div class="form-inline">
                  <img src="../img/search.svg" alt="" id="icon-search">
                  <input type="search" class="form-control" id="txtCariPemesanan" placeholder="Pencarian">
                </div>
              </div>
            </div>

            <div class="row pt-0 pl-3 pr-3 mr-0 mt-3 scrollbar scrollbar-x" id="pemesanan-ruang">

              <?php
              $resultPeminjam=peminjam($con);
              $resultRiwayatPeminjam=riwayatPeminjam($con);

              if (mysqli_num_rows($resultPeminjam) > 0 || mysqli_num_rows($resultRiwayatPeminjam) > 0){
              $no=1;
              while($rowPeminjam = mysqli_fetch_assoc($resultPeminjam)){
              ?>
                <div class="col-md-12 p-2 border-top border-bottom itemPemesanan">
                  <div class="container-fluid p-0">
                    <div class="row d-flex justify-content-around p-0 m-0">
                      <div class="col-md-1 my-auto">
                        <strong><?php echo $no;?></strong>
                      </div>
                      <div class="col-md-1 my-auto">
                      <?php
                      $resultUser=user($con, $rowPeminjam["peminjam"]);
                      $rowUser=mysqli_fetch_assoc($resultUser);

                      if($rowPeminjam["level"]=="admin"){
                        ?>
                        <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="">
                        <?php
                      }else{
                        if($rowUser["foto"]==NULL){
                          ?>
                          <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="foto peminjam">
                          <?php
                        }else{
                          ?>
                          <img src="../attachment/img/<?php echo $rowUser["foto"];?>" class="nav-profile-photo" alt="foto peminjam">
                          <?php
                        }
                      }
                      ?>
                      </div>
                      <div class="col-md-7 pl-5 my-auto">
                        <div class="container-fluid p-0">
                          <div class="row">
                            <div class="col-md-12">
                              <strong class="nama"><?php echo $rowUser["nama"];
                              if($rowPeminjam["level"]=="mahasiswa"){
                                echo " (".tampilKelas($con, $rowPeminjam["id_user"]).")";
                              }
                              ?>
                              </strong>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-auto">
                              <small>
                                <i class="far fa-calendar-alt text-secondary"></i>
                                <span class="pl-1 text-muted tanggalPinjam"><?php echo tampilTanggal($rowPeminjam["waktu_pinjam"]);?></span>
                              </small>
                            </div>
                            <div class="col-md-auto">
                              <small>
                                <i class="far fa-clock text-secondary"></i>
                                <span class="pl-1 text-muted waktuMulai"><?php echo tampilWaktu($rowPeminjam["waktu_mulai"]);?></span>
                              </small>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 my-auto pl-0">
                        <h4 class="kodeRuang"><?php echo $rowPeminjam["kode"];?></h4>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="bungkus label p-0">
                        <label class="bg-success text-white rounded-bottom text-center caption-label">
                          <small class="pesan">Pesan</small>
                        </label>                  
                      </div>
                    </div>
                  </div>
                </div>
              <?php
                $no++;
                }

              // perulangan untuk tabel riwayat peminjam
              $no=$no;
              while($rowRiwayatPeminjam = mysqli_fetch_assoc($resultRiwayatPeminjam)){
              ?>
                <div class="col-md-12 p-2 border-top border-bottom itemPemesanan">
                  <div class="container-fluid p-0">
                    <div class="row d-flex justify-content-around p-0 m-0">
                      <div class="col-md-1 my-auto">
                        <strong><?php echo $no;?></strong>
                      </div>
                      <div class="col-md-1 my-auto">
                        <?php
                        $resultRiwayatUser=user($con, $rowRiwayatPeminjam["peminjam"]);
                        $rowRiwayatUser=mysqli_fetch_assoc($resultRiwayatUser);
  
                        if($rowRiwayatPeminjam["level"]=="admin"){
                          ?>
                          <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="">
                          <?php
                        }else{
                          if($rowRiwayatUser["foto"]==NULL){
                            ?>
                            <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="">
                            <?php
                          }else{
                            ?>
                            <img src="../attachment/img/<?php echo $rowRiwayatUser["foto"];?>" class="nav-profile-photo" alt="">
                            <?php
                          }
                        }
                        ?>
                      </div>
                      <div class="col-md-7 pl-5 my-auto">
                        <div class="container-fluid p-0">
                          <div class="row">
                            <div class="col-md-12">
                              <strong class="nama"><?php echo $rowRiwayatUser["nama"];
                              if($rowRiwayatPeminjam["level"]=="mahasiswa"){
                                echo " (".tampilKelas($con, $rowRiwayatPeminjam["id_user"]).")";
                              }
                              ?>
                              </strong>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-auto">
                              <small>
                                <i class="far fa-calendar-alt text-secondary"></i>
                                <span class="pl-1 text-muted tanggalPinjam"><?php echo tampilTanggal($rowRiwayatPeminjam["waktu_pinjam"]);?></span>
                              </small>
                            </div>
                            <div class="col-md-auto">
                              <small>
                                <i class="far fa-clock text-secondary"></i>
                                <span class="pl-1 text-muted waktuMulai"><?php echo tampilWaktu($rowRiwayatPeminjam["waktu_mulai"]);?></span>
                              </small>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 my-auto pl-0">
                        <h4 class="kodeRuang"><?php echo $rowRiwayatPeminjam["kode"];?></h4>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="bungkus label p-0">
                        <label class="bg-danger text-white rounded-bottom text-center caption-label">
                          <small class="selesai">Selesai</small>
                        </label>                   
                      </div>
                    </div>
                  </div>
                </div>
              <?php
                $no++;
                }
              }else{
                ?>
                <div class='col-md-12 p-2 text-center text-muted'>Data Pemesanan Ruang Kosong</div>
                <?php
              }
              ?>
              <!-- End loop -->
              
            </div>
            
            <div class='col-md-12 p-2 text-center mt-3' id='pemesananTidakDitemukan' style="display:none;"><p class='text-muted'>Username, Kelas atau Ruangan tidak dapat ditemukan</p></div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 p-0">
      <div class="container-fluid m-0 p-0">
        <div class="row">
          <div class="col-md-12">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
              <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Ruangan</h6>
              <div class="pt-3">
                <div class="container-fluid pl-2">
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
                    <div class="col-2 text-center p-0 pl-2">
                      <select class="optionJam" name="jam" id="jamKelasKosongAdmin">
                        <option value="07:00:00">07.00</option>
                        <?php
                        $jam = tampilJam($con);
                        while ($row = mysqli_fetch_array($jam)) {
                          ?>
                          <option value=<?php echo tampilWaktuDefault($row["jam_mulai"]) ?>><?php echo tampilWaktu($row["jam_mulai"]) ?></option>
                        <?php
                      }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-right">
                      <input type="button" name="cari" class="btn btn-success btn-cari" value="Cari" id="cariKelasKosongAdmin">
                    </div>
                  </div>

                  <div class="row pr-1 mt-2 scrollbar scrollbar-x" id="daftar-ruangan">

                    <?php
                    $resultKelasKosong = kelasKosong($con, '07:00:00', 'senin');
                    if (mysqli_num_rows($resultKelasKosong) > 0) {
                      while ($rowKelasKosong = mysqli_fetch_assoc($resultKelasKosong)) {
                        if(cekRuangDipinjam($con, '07:00:00', jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"]), 'senin', $rowKelasKosong["id_ruang"]) == false) {
                        ?>
                        <div class="col-md-6 p-2">
                          <div class="p-3 ruang rounded">
                            <form action="../process/proses_adminRuangan.php?module=ruang&act=pesan" class="m-0" method="post">
                              <input type="hidden" name="id_ruang" value="<?php echo $rowKelasKosong["id_ruang"];?>">
                              <input type="hidden" name="waktu_mulai" value="07:00:00">
                              <input type="hidden" name="hari" value="senin">
                              <input type="hidden" name="waktu_selesai" value="<?php echo jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"]); ?>">
                              <div class="row d-flex align-items-center">
                                <div class="col-7 text-left">
                                  <strong><span class="p-0 m-0 kelas"><?php echo $rowKelasKosong["kode"]; ?></span></strong>
                                  <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $rowKelasKosong["lantai"] . ")"; ?></span>
                                  <br>
                                  <strong><?php echo "07.00 - " . tampilWaktu(jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"])); ?></strong>
                                </div>
                                <div class="col-5 text-right">
                                  <button type="submit" name="pesan" class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      <?php
                      }else{
                        ?>
                        <div class="col-md-6 p-2">
                          <div class="p-3 ruang rounded dipesan">
                            <div class="m-0">
                              <div class="row d-flex align-items-center">
                                <div class="col-7 text-left">
                                  <strong><span class="p-0 m-0 kelas"><?php echo $rowKelasKosong["kode"]; ?></span></strong>
                                  <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $rowKelasKosong["lantai"] . ")"; ?></span>
                                  <br>
                                  <strong><?php echo "07.00 - " . tampilWaktu(jamSelesaiKelasKosong($con, '07:00:00', 'senin', $rowKelasKosong["id_ruang"])); ?></strong>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                      }
                      }
                    } else {
                      ?><div class="col-12 text-center mt-3"><strong>Tidak ada ruang yang kosong</strong></div><?php
                    }
                ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
          <h6 class="border-bottom border-gray pb-2 mb-0">Ruangan Dipesan</h6>
          <div class="mt-2" id="ruang-dipesan">
            
          <?php 
          $resultPinjaman=pinjaman($con, $_SESSION["id"]);
          if(mysqli_num_rows($resultPinjaman)>0){
            $resultCountPinjaman=countPinjaman($con, $_SESSION["id"]);
            if($resultCountPinjaman>0){
              ?>               
              <!-- Carousel -->
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php
                  $mulaiLimit=-2;
                  for($i=0; $i<$resultCountPinjaman/2; $i++){
                      if($i==0){
                        ?>
                        <div class="carousel-item active">
                        <?php
                      }else{
                        ?>
                        <div class="carousel-item">
                        <?php
                      }
                      ?>
                      <div class="container-fluid">
                        <div class="row">
                          <?php
                          $mulaiLimit=$mulaiLimit+2;
                          $jmlLimit=2;
                          $resultItemPinjaman=itemPinjaman($con, $_SESSION["id"], $mulaiLimit, $jmlLimit);
                          if(mysqli_num_rows($resultItemPinjaman)>0){
                            while($rowItemPinjaman=mysqli_fetch_assoc($resultItemPinjaman)){
                              ?>             
                              <div class="col-md-6 p-2">
                                <div class="p-3 ruang rounded container-fluid">
                                  <div class="row align-items-center">
                                    <div class="col-7 text-left">
                                      <strong><span class="p-0 m-0 kelas"><?php echo $rowItemPinjaman["kode"] ?></span></strong>
                                      <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " .$rowItemPinjaman["lantai"]. ")"; ?></span>
                                      <br>
                                      <strong><?php echo tampilWaktu($rowItemPinjaman["waktu_mulai"]) . " - " . tampilWaktu($rowItemPinjaman["waktu_selesai"]) ?></strong>
                                    </div>
                                    <div class="col-5 text-right">
                                      <h5><?php echo ucfirst($rowItemPinjaman["hari"]); ?></h5>
                                      <button class="btn btn-danger btn-checkout text-white checkout-ruang-admin" id=<?php echo $rowItemPinjaman["id_ruang_dipinjam"];?> data-toggle="modal" data-target="#modalCheckoutPinjamanAdmin">Checkout</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php
                            }
                          }
                          ?> 
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <!-- End Carousel -->
              <?php
            }
          }else{
            ?>
            <div class="text-center text-muted">Tidak ada ruangan yang dipesan</div>
            <?php
          }
          ?>
        </div>
      </div>
      </div>
    </div>
    </div>
    </div> 

    <!-- Modal -->
      <div class="modal fade" id="modalCheckoutPinjamanAdmin" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <form action="../process/proses_adminRuangan.php?module=ruang&act=checkout" method="post">
            <div class="modal-body pt-5 text-center">
              <input type="hidden" name="id_ruang_dipinjam" id="id_ruang_dipinjam">
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger btn-confirm" data-dismiss="modal">Tidak</button>
              <button type="submit" name="checkoutRuang" class="btn btn-success btn-confirm">Ya</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    <!-- End Modal -->

    <!-- Halaman Ruangan Bagian Bawah -->
    <div class="col-md-9 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Ruangan</h6>
        <div class="pt-3">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 p-0 m-0 d-flex">
                <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
                <input type="search" class="pencarian form-control" id="txtCariRuangan">
              </div>
            </div>

            <div class="row pt-2 mt-2 pl-0 scrollbar scrollbar-x" id="ruangan2">
              <?php
              $resultRuangan=ruangan($con);

              if (mysqli_num_rows($resultRuangan) > 0){
                while($rowRuangan = mysqli_fetch_assoc($resultRuangan)){
              ?>
              <div class="col-md-4 m-0 pr-3 pb-4 p-0 itemRuangan">
                <div class="container-fluid p-0">
                <div class="row pl-3 pr-3 pt-0 pb-0">
                  <div class="col-md-9 p-2 ruang rounded-left">
                    <div class="container-fluid p-0">
                    <div class="row d-flex align-items-center">
                      <div class="col-md-6 text-center">
                        <h5 class="my-auto kode"><?php echo $rowRuangan["kode"];?></h5> 
                      </div>
                      <div class="col-md-6">
                        <span class="lantaiRuangan"><?php echo "Lantai ".$rowRuangan["lantai"];?></span>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="col-md-3 p-0 d-flex">
                    <button type="button" id="<?php echo $rowRuangan["id_ruang"];?>" class="btn btn-danger hapus-ruang" data-toggle="modal" data-target="#modalHapusRuangan">
                      <i class="far fa-trash-alt"><small class="pl-1">Hapus</small></i>
                      </button>
                  </div>
                </div>
                </div>
              </div>
            <?php }
              }else{
                ?>
                <div class='col-md-12 p-2 text-center'><p class='text-muted'>Data Ruang Kosong</p></div>
                <?php
              }
                ?>            
            </div>
            
            <div class='col-md-12 p-2 text-center' id='ruanganTidakDitemukan' style="display:none;"><p class='text-muted'>Ruangan tidak dapat ditemukan</p></div>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Hapus Ruangan-->
    <div class="modal fade" id="modalHapusRuangan" tabindex="-1" role="dialog" aria-labelledby="modalHapusRuangan"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="../process/proses_adminRuangan.php?module=ruang&act=hapus" method="post">
            <div class="modal-body pt-5 text-center">
              <input type="hidden" name="id_ruang" id="id_ruangHapus">
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger mr-4 btn-confirm" data-dismiss="modal">Tidak</button>
              <button type="submit" name="hapusRuang" class="btn btn-success btn-confirm">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal Hapus Ruangan -->
    
    <div class="col-md-3 p-0">
      <div class="container-fluid m-0 p-0">
        <div class="row">
          <div class="col-md-12">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Tambah Ruangan</h6>
            <form class="pt-3" action="../process/proses_adminRuangan.php?module=ruang&act=tambah" id="tambah-data" method="post">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ruangan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" name="kode" placeholder="Kode Ruang..."></small>
                </div>
              </div>
              <div class="form-group row mt-0">
                <label class="col-sm-3 col-form-label">Lantai</label>
                <div class="col-sm-9">
                <select class="form-control form-control-sm" name="lantai">
                    <option value="">Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                  </select>
                </div>
              </div>
              <div class="form-group mb-0 row">
                <div class="col-sm-12 text-right">
                  <input type="submit" value="Tambah" name="tambahRuang" class="btn btn-primary btn-checkout">
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Jumlah Ruangan Setiap Lantai</h6>
            <div class="scrollbar pr-2 scrollbar-x" id="lantai">

            <?php
              $resultJmlRuangLantai=jmlRuangLantai($con);

              if (mysqli_num_rows($resultJmlRuangLantai) > 0){
                while($rowJmlRuangLantai = mysqli_fetch_assoc($resultJmlRuangLantai)){
              ?>            
              <div class="row m-0 border-bottom pb-2 pt-2">
                <div class="col-md-9 p-0 d-flex">
                  <h5 class="my-auto"><?php echo "Lantai ".$rowJmlRuangLantai["lantai"];?></h5> 
                </div>
                <div class="col-md-3 p-0 text-center">
                  <h5 class="m-0"><?php echo $rowJmlRuangLantai["jmlRuang"];?></h5><small class="text-muted">Ruangan</small>
                </div>
              </div>
                <?php
                }
              }else{
                ?>
                <div class="row m-0 border-bottom pb-2 pt-2">
                  <div class="col-md-12 text-center">Data Lantai Kosong</div>
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
    
  </div>
</main>