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
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kuisioner</li>
            </ol>
        </nav>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-8 offset-2 text-center border-bottom pb-1">
              <h5>Kriteria Kuisioner</h5>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-md-10 offset-1 d-flex">
              <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
              <input type="search" class="pencarian form-control mr-4" id="txtCariKriteria">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-10 offset-1 p-0 pr-3 d-flex justify-content-center scrollbar" id="dataKriteria">
            <?php
              $resultKriteria=kriteria($con);
              
              if (mysqli_num_rows($resultKriteria) > 0){
              ?>

              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Isi Kriteria</th>
                    <th colspan="2">Proses</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                $no=1;
                while($row=mysqli_fetch_assoc($resultKriteria)){
                  ?>
                  <tr class="itemKriteria">
                    <td><?php echo $no; ?></td>
                    <td class="text-left kriteria"><?php echo $row["kriteria"]; ?></td>
                    <td>
                      <button type="button" id="<?php echo $row["id_kuisioner"];?>" class="btn btn-primary edit-kriteria" data-toggle="modal" data-target="#modalEditKriteria">Edit</button>
                    </td>
                    <td>
                      <button type="button" id="<?php echo $row["id_kuisioner"];?>" class="btn btn-danger hapus-kriteria" data-toggle="modal" data-target="#modalHapusKriteria">Hapus</button>
                    </td>
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
                  <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                  <p class="text-muted">Kriteria Tidak Ditemukan</p>
                </div>
              <?php
              }
              ?>

            </div>
          </div>
          
          <div class="row">
            <div class="col-md-10 offset-1 mt-3 text-center">
              <button type="button" class="btn btn-outline-secondary btn-tambah" data-toggle="modal" data-target="#modalTambahKriteria">Tambah Kriteria</button>
            </div>
          </div>
          
          <!-- Modal Edit Kriteria-->
          <div class="modal modalEditKriteria fade" id="modalEditKriteria" tabindex="-1" role="dialog" aria-labelledby="modalEditKriteria"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content pl-4 pr-4 text-left">
                <div class="modal-header d-flex justify-content-center pb-1">
                  <h5 class="modal-title" id="judulModalEditKriteria">Edit Kriteria</h5>
                </div>
                <form action="../process/proses_kuisioner.php?module=kriteriaKuisioner&act=edit" method="post" onsubmit="return validasiSubmitEditKriteria();" id="formEditKriteria">
                  <div class="modal-body">
                      <input type="hidden" name="id_kuisioner" id="id_kuisionerEdit">
                      <div class="form-group">
                      <label for="editIsiKriteria"><h5>Isi Kriteria</h5></label>
                      <small class="text-danger ml-3 d-none peringatanEdit" id="peringatanEdit">*Masukkan Isi Kriteria</small>
                      <textarea class="form-control w-100" name="isiKriteria" id="editIsiKriteria" rows="3" oninput="validasiEditKriteria(this)"></textarea>
                  </div>
                  <div class="pb-2 pt-4 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Batal</button>
                    <button type="submit" name="editIsi" class="btn btn-success btn-ok">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Edit Kriteria -->

        </div>
      </div>
    </div>
        
    <!-- Modal Hapus Kriteria-->
    <div class="modal fade" id="modalHapusKriteria" tabindex="-1" role="dialog" aria-labelledby="modalHapusKriteria"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="../process/proses_kuisioner.php?module=kriteriaKuisioner&act=hapus" method="post">
            <div class="modal-body pt-5 text-center">
              <input type="hidden" name="id_kuisioner" id="id_kuisionerHapus">
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
              <button type="submit" name="hapus" class="btn btn-success btn-ok">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal Hapus Kriteria -->

  </div>

  <!-- Modal Tambah Kriteria-->
  <div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog" aria-labelledby="modalTambahKriteria"
      aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content pl-4 pr-4">
        <div class="modal-header d-flex justify-content-center pb-1">
          <h5 class="modal-title" id="judulModalTambahKriteria">Tambah Kriteria</h5>
        </div>

        <form action="../process/proses_kuisioner.php?module=kriteriaKuisioner&act=tambah" method="post" onsubmit="return validasiSubmitTambahKriteria();">
          <div class="modal-body">
            <div class="form-group">
            <label for="tambahIsiKriteria"><h5>Isi Kriteria</h5></label>
            <small class="text-danger ml-3 d-none" id="peringatanTambah">*Masukkan Isi Kriteria</small>
            <textarea class="form-control w-100" name="isiKriteria" id="tambahIsiKriteria" rows="3" oninput="validasiTambahKriteria(this)"></textarea>
          </div>
          <div class="pb-2 pt-4 d-flex justify-content-end">
            <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Batal</button>
            <button type="submit" name="tambahIsi" class="btn btn-success btn-ok">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal Tambah Kriteria -->

</main>
