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
          <div class="container-fluid mt-3 p-0 m-0 d-flex">
            <div class="row scrollbar mr-0" id="absen">
              <div class="col-md-12 pr-1 d-flex">
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
                    <tr>
                      <td>1</td>
                      <td class="text-left">Chintya Puspa Dewi</td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="sakit"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="ijin"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="alpha"></td>
                      <td><input type="submit" value="Simpan" class="btn btn-success"></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td class="text-left">Chintya Puspa Dewi</td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="sakit"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="ijin"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="alpha"></td>
                      <td><input type="submit" value="Simpan" class="btn btn-success"></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td class="text-left">Chintya Puspa Dewi</td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="sakit"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="ijin"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="alpha"></td>
                      <td><input type="submit" value="Simpan" class="btn btn-success"></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td class="text-left">Chintya Puspa Dewi</td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="sakit"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="ijin"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="alpha"></td>
                      <td><input type="submit" value="Simpan" class="btn btn-success"></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td class="text-left">Chintya Puspa Dewi</td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="sakit"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="ijin"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="alpha"></td>
                      <td><input type="submit" value="Simpan" class="btn btn-success"></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td class="text-left">Chintya Puspa Dewi</td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="sakit"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="ijin"></td>
                      <td><input type="number" class="form-control bg-transparent" min="0" value="0" name="alpha"></td>
                      <td><input type="submit" value="Simpan" class="btn btn-success"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
    
    <div class="col-md-3 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Total Absensi Mahasiswa</h6>

        <div class="container-fluid">
          <form class="row mb-3 mt-3">
            <div class="col-md-8 pr-3 p-0">
              <select class="absenOptionJam" name="jam">
                <option value="07:00:00">07.00</option>
              </select>
            </div>

            <div class="col-md-4 pl-3 p-0">
              <input type="submit" name="cari" class="btn btn-success absenCari" value="Cari">
            </div>
          </form>
        </div>
          
        <div class="container-fluid scrollbar m-0 pr-0" id="totalAbsen">
          <!-- Loop data -->
          <div class="row border-bottom border-top pt-1 pb-1 mr-1">
            <div class="col-md-1 align-self-center p-0">
              <span>1</span>
            </div>
            <div class="col-md-8 p-0 align-self-center">
              <span>Veronica Dewi Ayu</span> <br>
              <small class="text-muted">
                <span class="mr-3">A: 10</span>
                <span class="mr-3">I: 10</span>
                <span class="mr-3">S: 10</span>
              </small>
            </div>
            <div class="col-md-3 text-right align-self-center p-0">
              <small><span class="bg-danger text-white pt-1 pb-1 pr-3 pl-3 rounded">SP 3</span></small>
            </div>
          </div>

          <div class="row border-bottom border-top pt-1 pb-1 mr-1">
            <div class="col-md-1 align-self-center p-0">
              <span>1</span>
            </div>
            <div class="col-md-8 p-0 align-self-center">
              <span>Veronica Dewi Ayu</span> <br>
              <small class="text-muted">
                <span class="mr-3">A: 10</span>
                <span class="mr-3">I: 10</span>
                <span class="mr-3">S: 10</span>
              </small>
            </div>
            <div class="col-md-3 text-right align-self-center p-0">
              <small><span class="bg-success text-white pt-1 pb-1 pr-3 pl-3 rounded">SP 1</span></small>
            </div>
          </div>

          <div class="row border-bottom border-top pt-1 pb-1 mr-1">
            <div class="col-md-1 align-self-center p-0">
              <span>1</span>
            </div>
            <div class="col-md-8 p-0 align-self-center">
              <span>Veronica Dewi Ayu</span> <br>
              <small class="text-muted">
                <span class="mr-3">A: 10</span>
                <span class="mr-3">I: 10</span>
                <span class="mr-3">S: 10</span>
              </small>
            </div>
            <div class="col-md-3 text-right align-self-center p-0">
              <small><span class="bg-orange text-white pt-1 pb-1 pr-3 pl-3 rounded">SP 2</span></small>
            </div>
          </div>

          <div class="row border-bottom border-top pt-1 pb-1 mr-1">
            <div class="col-md-1 align-self-center p-0">
              <span>1</span>
            </div>
            <div class="col-md-8 p-0 align-self-center">
              <span>Veronica Dewi Ayu</span> <br>
              <small class="text-muted">
                <span class="mr-3">A: 10</span>
                <span class="mr-3">I: 10</span>
                <span class="mr-3">S: 10</span>
              </small>
            </div>
            <div class="col-md-3 text-right align-self-center p-0">
              <small><span class="bg-danger text-white pt-1 pb-1 pr-3 pl-3 rounded">SP 1</span></small>
            </div>
          </div>
          <!-- End Loop Data -->
        </div>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Kompensasi Mahasiswa</h6>
        <div class="container-fluid mt-3 p-0">
          <div class="row">
            <div class="col-md-12">
              <form class="form-inline">
                <img src="../img/search.svg" alt="" id="icon-search">
                <input type="search" class="form-control txtCariKompen mr-3" name="cari" placeholder="Pencarian">
                <input type="submit" value="Cari" class="btn btn-success cariKompen">
              </form>
            </div>
          </div>

          <div class="row mt-3 mr-0 pr-0 scrollbar" id="dataKompen">
            <div class="col-md-12 pr-1">
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
                  <tr>
                    <td data-toggle="modal" data-target="#modalPreview">1</td>
                    <td data-toggle="modal" data-target="#modalPreview">1741720086</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Chintya Puspa Dewi</td>
                    <td data-toggle="modal" data-target="#modalPreview">D3 - MI</td>
                    <td data-toggle="modal" data-target="#modalPreview">12 Desember 2019</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Ridwan Rismanto, SST., M.KOM</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditKompen">Edit</button></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusKompen">Hapus</button></td>

                    <!-- Modal Hapus Kompen-->
                    <div class="modal fade" id="modalHapusKompen" tabindex="-1" role="dialog" aria-labelledby="modalHapusKompen"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=checkout&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
                              <div class="modal-body pt-5 text-center">
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
                      <!-- End Modal Hapus Kompen -->

                      <!-- Modal preview -->
                      <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <h5 class="border-bottom border-dark text-center pb-2 mb-3">Form Kompensasi</h5>
                              <div class="row px-5">
                                <div class="col-md-3">NIM</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">1741720086</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Nama</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Chintya Puspa Dewi</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Tanggal</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">12 Desember 2019</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Jenis Kompensasi</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Menyiram tanaman bunga</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Total Jam</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">20 Jam</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Dosen</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Ridwan Rismanto, SST., M.KOM</div>
                              </div>
                              <div class="row px-5 mt-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-batal" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End modal preview -->

                  </tr>
                  <tr>
                    <td data-toggle="modal" data-target="#modalPreview">1</td>
                    <td data-toggle="modal" data-target="#modalPreview">1741720086</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Chintya Puspa Dewi</td>
                    <td data-toggle="modal" data-target="#modalPreview">D3 - MI</td>
                    <td data-toggle="modal" data-target="#modalPreview">12 Desember 2019</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Ridwan Rismanto, SST., M.KOM</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditKompen">Edit</button></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusKompen">Hapus</button></td>

                    <!-- Modal Hapus Kompen-->
                    <div class="modal fade" id="modalHapusKompen" tabindex="-1" role="dialog" aria-labelledby="modalHapusKompen"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=checkout&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
                              <div class="modal-body pt-5 text-center">
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
                      <!-- End Modal Hapus Kompen -->

                      <!-- Modal preview -->
                      <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <h5 class="border-bottom border-dark text-center pb-2 mb-3">Form Kompensasi</h5>
                              <div class="row px-5">
                                <div class="col-md-3">NIM</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">1741720086</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Nama</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Chintya Puspa Dewi</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Tanggal</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">12 Desember 2019</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Jenis Kompensasi</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Menyiram tanaman bunga</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Total Jam</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">20 Jam</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Dosen</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Ridwan Rismanto, SST., M.KOM</div>
                              </div>
                              <div class="row px-5 mt-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-batal" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End modal preview -->

                  </tr>
                  <tr>
                    <td data-toggle="modal" data-target="#modalPreview">1</td>
                    <td data-toggle="modal" data-target="#modalPreview">1741720086</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Chintya Puspa Dewi</td>
                    <td data-toggle="modal" data-target="#modalPreview">D3 - MI</td>
                    <td data-toggle="modal" data-target="#modalPreview">12 Desember 2019</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Ridwan Rismanto, SST., M.KOM</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditKompen">Edit</button></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusKompen">Hapus</button></td>

                    <!-- Modal Hapus Kompen-->
                    <div class="modal fade" id="modalHapusKompen" tabindex="-1" role="dialog" aria-labelledby="modalHapusKompen"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=checkout&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
                              <div class="modal-body pt-5 text-center">
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
                      <!-- End Modal Hapus Kompen -->

                      <!-- Modal preview -->
                      <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <h5 class="border-bottom border-dark text-center pb-2 mb-3">Form Kompensasi</h5>
                              <div class="row px-5">
                                <div class="col-md-3">NIM</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">1741720086</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Nama</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Chintya Puspa Dewi</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Tanggal</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">12 Desember 2019</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Jenis Kompensasi</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Menyiram tanaman bunga</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Total Jam</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">20 Jam</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Dosen</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Ridwan Rismanto, SST., M.KOM</div>
                              </div>
                              <div class="row px-5 mt-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-batal" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End modal preview -->

                  </tr>
                  <tr>
                    <td data-toggle="modal" data-target="#modalPreview">1</td>
                    <td data-toggle="modal" data-target="#modalPreview">1741720086</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Chintya Puspa Dewi</td>
                    <td data-toggle="modal" data-target="#modalPreview">D3 - MI</td>
                    <td data-toggle="modal" data-target="#modalPreview">12 Desember 2019</td>
                    <td class="text-left" data-toggle="modal" data-target="#modalPreview">Ridwan Rismanto, SST., M.KOM</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditKompen">Edit</button></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusKompen">Hapus</button></td>

                    <!-- Modal Hapus Kompen-->
                    <div class="modal fade" id="modalHapusKompen" tabindex="-1" role="dialog" aria-labelledby="modalHapusKompen"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=checkout&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
                              <div class="modal-body pt-5 text-center">
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
                      <!-- End Modal Hapus Kompen -->

                      <!-- Modal preview -->
                      <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <h5 class="border-bottom border-dark text-center pb-2 mb-3">Form Kompensasi</h5>
                              <div class="row px-5">
                                <div class="col-md-3">NIM</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">1741720086</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Nama</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Chintya Puspa Dewi</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Tanggal</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">12 Desember 2019</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Jenis Kompensasi</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Menyiram tanaman bunga</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Total Jam</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">20 Jam</div>
                              </div>
                              <div class="row px-5">
                                <div class="col-md-3">Dosen</div>
                                <div class="col-md-1 text-right pr-0">:</div>
                                <div class="col-md-8">Ridwan Rismanto, SST., M.KOM</div>
                              </div>
                              <div class="row px-5 mt-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-batal" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End modal preview -->

                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Pekerjaan dari Dosen</h6>
        <div class="container-fluid mt-3 p-0">
          <div class="row">
            <div class="col-md-12">
              <form class="form-inline">
                <img src="../img/search.svg" alt="" id="icon-search">
                <input type="search" class="form-control txtCariPekerjaan mr-3" name="cari" placeholder="Pencarian">
                <input type="submit" value="Cari" class="btn btn-success cariKompen">
              </form>
            </div>
          </div>

          <div class="row mt-3 mr-0 pr-0 scrollbar" id="dataPekerjaan">
            <div class="col-md-12 pr-1">
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
                  <tr>
                    <td>1</td>
                    <td>19663636356125</td>
                    <td class="text-left">Ridwan Rismanto, SST., M.KOM</td>
                    <td class="text-left">Menyapu semua lorong di gedung sipil dan mengepelnya juga wkwk</td>
                    <td>5</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>19663636356125</td>
                    <td class="text-left">Ridwan Rismanto, SST., M.KOM</td>
                    <td class="text-left">Menyapu semua lorong di gedung sipil dan mengepelnya juga wkwk lorem</td>
                    <td>5</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>19663636356125</td>
                    <td class="text-left">Ridwan Rismanto, SST., M.KOM</td>
                    <td class="text-left">Menyapu semua lorong di gedung sipil dan mengepelnya juga wkwk</td>
                    <td>5</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>19663636356125</td>
                    <td class="text-left">Ridwan Rismanto, SST., M.KOM</td>
                    <td class="text-left">Menyapu semua lorong di gedung sipil dan mengepelnya juga wkwk</td>
                    <td>5</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>19663636356125</td>
                    <td class="text-left">Ridwan Rismanto, SST., M.KOM</td>
                    <td class="text-left">Menyapu semua lorong di gedung sipil dan mengepelnya juga wkwk</td>
                    <td>5</td>
                    <td>4</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Rekap Kompen</h6>
        <div class="container-fluid mt-3 p-0">
          <div class="row">
            <div class="col-md-12">
              <form class="form-inline">
                <img src="../img/search.svg" alt="" id="icon-search">
                <input type="search" class="form-control txtCariRekap mr-3" name="cari" placeholder="Pencarian">
                <input type="submit" value="Cari" class="btn btn-success cariKompen">
              </form>
            </div>
          </div>

          <div class="row mt-3 mr-0 pr-0 scrollbar" id="rekapKompen">
            <div class="col-md-12 pr-1">
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
                  <tr>
                    <td>1</td>
                    <td>1741720086</td>
                    <td>D3 - MI</td>
                    <td>10</td>
                    <td>30</td>
                    <td>25</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1741720086</td>
                    <td>D3 - MI</td>
                    <td>10</td>
                    <td>30</td>
                    <td>25</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1741720086</td>
                    <td>D3 - MI</td>
                    <td>10</td>
                    <td>30</td>
                    <td>25</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1741720086</td>
                    <td>D3 - MI</td>
                    <td>10</td>
                    <td>30</td>
                    <td>25</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>1741720086</td>
                    <td>D3 - MI</td>
                    <td>10</td>
                    <td>30</td>
                    <td>25</td>
                    <td>5</td>
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