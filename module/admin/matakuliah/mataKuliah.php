<?php
include "../config/connection.php";
include "../process/proses_adminMatakuliah.php";
?>
<main role="main" class="container-fluid" id="ruang">
  <div class="row">

    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="pr-4 title "><a href="#"><strong>Mata Kuliah</strong></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mata Kuliah</li>
            </ol>
        </nav>
      </div>
    </div>

    <div class="col-md-9 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Mata Kuliah</h6>
        <div class="pt-3">
          <div class="container-fluid">
            <div class="row">
              <form class="col-md-3 p-0 m-0 d-flex">
                <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
                <input type="search" class="pencarian form-control" name="cari" id="cari">
              </form>
              
              <div class="col-md-2">
                <button class="btn btn-success btn-checkout text-white">Cari</button>
              </div>
            </div>

            <div class="row pt-2 mt-2 pl-0 scrollbar" id="ruangan2">
            <?php
              $resultMatakuliah=matakuliah($con);

              if (mysqli_num_rows($resultMatakuliah) > 0){
                while($rowMatakuliah = mysqli_fetch_assoc($resultMatakuliah)){
              ?>
              <div class="col-md-6 m-0 pr-3 pb-4 p-0">
                <div class="row pl-3 pr-3 pt-0 pb-0">
                  <div class="col-md-9 p-2 ruang rounded-left">
                    <div class="row d-flex align-items-center">
                      <div class="col-md">
                        <h5 class="my-auto"><?php echo $rowMatakuliah["nama"];?></h5> 
                      </div>
                    </div>
                    <div class="row d-flex align-items-center">
                      <div class="col-md-4">
                        <small class="semester">Semester : 3</small>
                      </div>
                      <div class="col-md-4">
                        <small class="sks"><?php echo "SKS :".$rowMatakuliah["sks"];?></small>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 p-0 d-flex">
                  <button type="button" id="<?php echo $rowMatakuliah["id_matkul"];?>" class="btn btn-danger hapus-ruang" data-toggle="modal" data-target="#modalHapusRuangan">
                      <i class="far fa-trash-alt"><small class="pl-1">Hapus</small></i>
                      </button>
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

              <div class='col-md-12 p-2 text-center' id='ruanganTidakDitemukan' style="display:none;"><p class='text-muted'>Ruangan tidak dapat ditemukan</p></div> 
            </div>
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
            <h6 class="border-bottom border-gray pb-2 mb-0">Tambah Mata Kuliah</h6>
            <form class="pt-3" id="tambah-data">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">MataKuliah</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" placeholder="Mata Kuliah..."></small>
                </div>
              </div>
              <div class="form-group row mt-0">
                <label class="col-sm-4 col-form-label">SKS</label>
                <div class="col-sm-4">
                <select class="form-control form-control-sm" name="lantai">
                    <option value="">Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mt-0">
                <label class="col-sm-4 col-form-label">Semester</label>
                <div class="col-sm-4">
                <select class="form-control form-control-sm" name="lantai">
                    <option value="">Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
              <div class="form-group mb-0 row">
                <div class="col-sm-12 text-right">
                  <input type="submit" value="Tambah" class="btn btn-primary btn-checkout">
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    
  </div>
</main>