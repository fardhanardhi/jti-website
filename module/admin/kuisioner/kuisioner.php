<main role="main" class="container-fluid" id="kuisioner">
  <div class="row">

    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="pr-4 title "><a href="#"><strong>Kuisioner</strong></a></li>
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
            <form class="col-md-12 d-flex">
              <small class="my-auto"><img src="../img/search.svg" alt="" id="icon-search"></small>
              <input type="search" class="pencarian form-control mr-4" name="cari" id="cari">
              <input type="submit" value="Cari Dosen" name="cariDosen" class="btn btn-success btn-cariDosen">
            </form>
          </div>

          <div class="row mt-3">
            <div class="col-md-12 d-flex">
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
                  <tr>
                    <td>1</td>
                    <td>192197292832883</td>
                    <td>Ridwan Rismanto, SST., M.KOM</td>
                    <td>TI - 2F, MI - 2F, TI - 1F, MI - 3F</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLihatHasil">Lihat Hasil</button></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>192197292832883</td>
                    <td>Ridwan Rismanto, SST., M.KOM</td>
                    <td>TI - 2F, MI - 2F, TI - 1F, MI - 3F</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLihatHasil">Lihat Hasil</button>

                      <!-- Modal Lihat Hasil-->
                      <div class="modal fade" id="modalLihatHasil" tabindex="-1" role="dialog" aria-labelledby="modalLihatHasil"
                          aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <button type="button" class="close close-setting" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h5 class="modal-title text-center">Ridwan Rismanto, SST., M.KOM</h5>
                              <hr class="mt-2 text-muted mr-4 ml-4">

                              <div class="container-fluid">
                                <div class="row mt-2">
                                  <form action="" class="col-md-12 p-0 pl-3 d-flex">
                                    <select class="form-control form-control-sm w-auto mr-2" name="kelas">
                                        <option>TI - 2F</option>
                                    </select>
                                    <select class="form-control form-control-sm w-auto mr-2" name="tahun">
                                        <option>Pilih Tahun Ajaran</option>
                                    </select>
                                    <select class="form-control form-control-sm w-auto mr-2" name="semester">
                                        <option>Pilih Semester</option>
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
                                          <th>Kelas</th>
                                          <th>Nilai Kuisioner</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>1</td>
                                          <td>1741720086</td>
                                          <td>Chintya Puspa Dewi</td>
                                          <td>TI - 2F</td>
                                          <td>4</td>
                                        </tr>
                                        <tr>
                                          <td>1</td>
                                          <td>1741720086</td>
                                          <td>Chintya Puspa Dewi</td>
                                          <td>TI - 2F</td>
                                          <td>4</td>
                                        </tr>
                                        <tr>
                                          <td>1</td>
                                          <td>1741720086</td>
                                          <td>Chintya Puspa Dewi</td>
                                          <td>TI - 2F</td>
                                          <td>4</td>
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
                      <!-- End Modal Lihat Hasil -->

                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</main>