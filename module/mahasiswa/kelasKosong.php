<main role="main" class="container-fluid" id="kelasKosong">
  <div class="row">
    <div class="col-md-3 p-0">
      <div class="ml-2 mr-2 mt-2 p-1 bg-blue rounded-top shadow-sm">
        <h5 class="text-white pl-3">Pemesanan</h5>
      </div>
      <div class="ml-2 mr-2 mb-2 mt-0 bg-white rounded-bottom shadow-sm">

        <!-- Jika tidak ada kelas dipesan -->
        <div class="text-center pt-5 pb-5 container-fluid">
          <strong>Tidak ada ruang yang dipesan!</strong>
        </div>

        <!-- Jika ada kelas yang dipesan -->
        <div class="pesanan p-3 container-fluid border-top">
          <div class="row d-flex align-items-center">
            <div class="col-7 text-left">
              <strong><span class="p-0 m-0 kelas">LPR1</span></strong>
              <span class="text-secondary lantai pl-1 pt-3">(Lantai 9)</span>
              <br>
              <strong>09.00 - 12.00</strong>
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

          <!-- Modal -->
          <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body pt-5 text-center">
                  <strong>Apakah Anda yakin?</strong>
                </div>
                <div class="container-fluid pb-4 pt-4 d-flex justify-content-around">
                  <button type="button" class="btn btn-danger btn-confirm" data-dismiss="modal">Tidak</button>
                  <button type="button" class="btn btn-success btn-confirm">Ya</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="pesanan p-3 border-top border-dark">
          <div class="row d-flex align-items-center">
            <div class="col-7 text-left">
              <strong><span class="p-0 m-0 kelas">LPR1</span></strong>
              <span class="text-secondary lantai pl-1 pt-3">(Lantai 9)</span>
              <br>
              <strong>09.00 - 12.00</strong>
            </div>
            <div class="col-5 text-right">
              <h4>Jumat</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-right">
              <button class="btn btn-danger btn-checkout text-white">Checkout</button>
            </div>
          </div>
        </div>
        <!-- Jika ada kelas dipesan -->
      </div>
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
              <select class="optionJam">
                <option>08.00</option>
                <option selected="selected">09.00</option>
                <option>10.00</option>
              </select>
            </div>
            <div class="col-2 p-0 m-0 text-right">
              <input type="submit" class="btn btn-success btn-cari mr-4" value="Cari">
            </div>
          </div>

          <div class="row p-3">
            <div class="col-md-6 col-sm-12 p-2">
              <div class="rounded ruang p-3">
                <div class="row d-flex align-items-center">
                  <div class="col-3 text-center">
                    <h4 class="p-0 m-0">LPR1</h4>
                    <span class="text-secondary">(Lantai 9)</span>
                  </div>
                  <div class="col-5">
                    <h5>09.00 - 12.00</h5>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                    <a tabindex="0" class="btn btn-danger" role="button" data-toggle="popover" data-trigger="focus" data-content="*Kelas anda telah melakukan pemesanan ruangan!" data-placement="bottom">Popover</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Ruangan yang dipesan, button Pesan akan hidden -->
            <div class="col-md-6 col-sm-12 p-2">
              <div class="rounded ruang p-3 dipesan">
                <div class="row d-flex align-items-center">
                  <div class="col-3 text-center">
                    <h4 class="p-0 m-0">LPR1</h4>
                    <span class="text-secondary">(Lantai 9)</span>
                  </div>
                  <div class="col-5">
                    <h5>09.00 - 12.00</h5>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end -->

            <div class="col-md-6 col-sm-12 p-2">
              <div class="rounded ruang p-3">
                <div class="row d-flex align-items-center">
                  <div class="col-3 text-center">
                    <h4 class="p-0 m-0">LPR1</h4>
                    <span class="text-secondary">(Lantai 9)</span>
                  </div>
                  <div class="col-5">
                    <h5>09.00 - 12.00</h5>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-12 p-2">
              <div class="rounded ruang p-3">
                <div class="row d-flex align-items-center">
                  <div class="col-3 text-center">
                    <h4 class="p-0 m-0">LPR1</h4>
                    <span class="text-secondary">(Lantai 9)</span>
                  </div>
                  <div class="col-5">
                    <h5>09.00 - 12.00</h5>
                  </div>
                  <div class="col-4 text-right">
                    <button class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>