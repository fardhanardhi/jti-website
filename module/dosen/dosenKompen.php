<main role="main" class="container-fluid" id="dosenKompen">
  <link rel="stylesheet" href="../css/dosen.css">
  <div class="row">
    <!-- Profil Dosen -->
    <div class="col-md-3 p-0 ">
      <div class="sticky-sidebar sticky-top">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
          <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125">
              <div class="isi">
                <div class="d-flex justify-content-center">
                  <img src="../attachment/img/avatar.jpeg" alt="dosen"
                    style="width:150px;height:150px;border-radius:50%;">
                </div>
                <div class="data-dosen text-center">
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">BABANG NICHOL</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">1984757018014</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">JABATAN FUNGSIONAL</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">PENDIDIDIKAN</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">STATUS IKATAN KERJA</h6>
                  <h6 class="detail-dosen border-bottom border-gray pb-2 mb-0">STATUS AKTIVITAS</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jadwal Dosen -->
    <div class="col-md-6 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0 judul">KOMPENSASI MAHASISWA</h6>
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125">
            <div class="isi">
              <table class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kelas</th>
                    <th>Pratinjau</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>1741720001</td>
                    <td>fulan 1</td>
                    <td>TI-2A</td>
                    <td><button type="button" class="pratinjau btn" data-toggle="modal" data-target="#exampleModalCenter">Filter</button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>1741720001</td>
                    <td>fulan 1</td>
                    <td>TI-2A</td>
                    <td><button type="button" class="pratinjau btn">Filter</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1741720001</td>
                    <td>fulan 1</td>
                    <td>TI-2A</td>
                    <td><button type="button" class="pratinjau btn">Filter</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1741720001</td>
                    <td>fulan 1</td>
                    <td>TI-2A</td>
                    <td><button type="button" class="pratinjau btn">Filter</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1741720001</td>
                    <td>fulan 1</td>
                    <td>TI-2A</td>
                    <td><button type="button" class="pratinjau btn">Filter</button></td>
                  </tr>
                  <tr class="sudah-dikonfirmasi" style="baground-color: #A7FCA5";>
                    <td>1</td>
                    <td>1741720001</td>
                    <td>fulan 100</td>
                    <td>TI-2A</td>
                    <td><button type="button" class="pratinjau btn">Filter</button></td>
                  </tr>
                </tbody>
              </table>
              <div class="form-group row">
                <label class="col-xl-1">Keterangan:</label>
                <div class="input-group col-sm-10">
                  <ul class="keterangan">
                    <li>Sudah dikonfirmasi</li>
                    <li>Belum dikonfirmasi</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Kompen Mahasiswa -->
    <div class="col-md-3 p-0 ">
      <div class="sticky-sidebar sticky-top">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0 judul">LIST KOMPENSASI</h6>
          <div class="media text-muted pt-3">
            <!-- <div class="media-body pb-3 mb-0 small lh-125"> -->
              <!-- <div class="isi-kosong">
                <div class="d-flex justify-content-center">
                  <img src="../img/clipboard.svg" alt="list"
                    style="width:75px;height:75px;">
                </div><br>
                <center>
                  <p style="font-size: 12px;font-family: Lato; color:black;">Anda tidak mempunyai daftar <br> pekerjaan</p>
                </center>
                <center><button type="button" class="tambah-pekerjaan-kompen btn">Tambah Pekerjaan</button></center>
              </div> -->
              <br><br>
              <div class="ada-isi">
                <div class="form-group row">
                  <ol class="border-top border-gray pb-2 mb-0" style="width: 20em;">
                    <li class="col-sm-8">Menata dokumen" diruang baca <br> Kuota: 2 Mahasiswa <button>submit</button></li>
                    <li class="col-sm-8">Merapikan mouse & keyboard di LID 02 <br> Kuota: 2 Mahasiswa</li>
                    <li class="col-sm-8">Menstempel dokumen" di Ruang Admin <br> Kuota: 2 Mahasiswa</li>
                    <li class="col-sm-8">Membeli card reader 3 buah <br> Kuota: 1 Mahasiswa</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">                        
            <button type="button" class="close text-right active" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>                     
            <center>
              <h5 class=" modal-title text-center border-bottom border-gray pb-2 mb-0" id="exampleModalCenterTitle" style="margin: 0 auto;">Form Konfirmasi Kompensasi</h5>
            </center>
          <form action="" method="post">
            <div class="modal-body">
              <div class="form-group row">
                  <label class="col-sm-3">NIM</label>
                  <div class="input-group col-sm-9">
                    <p>: 1741720001</p>
                  </div>
                  <label class="col-sm-3">Nama</label>
                  <div class="input-group col-sm-9">
                    <p>: Fulan bin fulan</p>
                  </div>
                  <label class="col-sm-3" for="passwordLama">Tanggal</label>
                  <div class="input-group col-sm-9">
                    <p>: 6 Februari 2019</p>
                  </div>
                  <label class="col-sm-3" for="passwordLama">Jenis Kompensasi</label>
                  <div class="input-group col-sm-9">
                    <p>: Merapikan Mouse dan Keyboard</p>
                  </div>
                  <label class="col-sm-3" for="passwordLama">Total Jam</label>
                  <div class="input-group col-sm-9">
                    <p>: 2 Jam</p>
                  </div>
                  <label class="col-sm-3" for="passwordLama">Dosen</label>
                  <div class="input-group col-sm-9">
                    <p>: Grezio</p>
                  </div>
                <div class="modal-footer col-12 tambahkan-modal-parent text-right">
                  <button type="submit" class="btn tambahkan-modal ">Konfirmasi</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>