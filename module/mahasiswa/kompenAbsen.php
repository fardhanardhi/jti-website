<main role="main" class="container-fluid">
  <div id="kompenAbsen" class="row">
    <div class="col-md-12 p-0 ">
      <div class="m-2 bg-white shadow-sm rounded p-3">
        <nav class="nav nav-underline">
            <div class="col-md-2 pt-3 pb-3 pr-0">
            <img src="../attachment/img/avatar.jpeg" class="gambar-profil img-circle" height="150" width="150">
            </div>
            <div class="col-md pt-3 pb-3 pl-0">
              <h2>Avatar</h2>
              <br>
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-md-4"><h1>A</h1></div>
                  <div class="col-md-4"><h1>I</h1></div>
                  <div class="col-md-4"><h1>S</h1></div>
                </div>
                <div class="row text-center">
                  <div class="col-md-4"><h1>02</h1></div>
                  <div class="col-md-4"><h1>08</h1></div>
                  <div class="col-md-4"><h1>13</h1></div>
                </div>
                <div class="row text-center" style="margin-top:-10px;">
                  <div class="col-md-4"><h4>Jam</h4></div>
                  <div class="col-md-4"><h4>Jam</h4></div>
                  <div class="col-md-4"><h4>Jam</h4></div>
                </div>
              </div>
              </div>
            <div class="col-md-7"></div>
        </nav>
        <nav class="nav nav-underline">
        <div class="col-md-12">
        <div class="col-md p-0">
        <div class="container-fluid p-0 m-0">
          <div class="row">
            <div class="col">
              <button type="button" class="btn btn-primary tmbh-kmpn">Tambah Kompen</button>
              <button type="button" class="btn btn-success float-right tbl-info" data-target="#informasiKompen" data-toggle="modal">Informasi</button>  
              <br>
              <br>
            </div>
          </div>
        </div>

          <table class="table table-striped table-bordered text-center">
            <thead class="bg-blue text-white">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jenis Kompensasi</th>
                <th scope="col">Total Jam</th>
                <th scope="col">Dosen</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>1 Januari 2019</td>
                <td>Dosen A</td>
                <td>2 Jam</td>
                <td>Dosen</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>1 Januari 2019</td>
                <td>Dosen B</td>
                <td>3 Jam</td>
                <td>Dosen</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>1 Januari 2019</td>
                <td>Dosen C</td>
                <td>8 Jam</td>
                <td>Dosen</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>1 Januari 2019</td>
                <td>Dosen C</td>
                <td>8 Jam</td>
                <td>Dosen</td>
              </tr>
            </tbody>
          </table>
    </div>

<!-- The modal pengaturan -->
<div class="modal fade" id="informasiKompen" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body pb-0">
          <h5 class="modal-title text-center">Informasi</h5>
          <hr class="pl-4 pr-4 bg-dark">

          <div class="row">
            <div class="col-md-12">
            <h6>1. Kompen = Alpha x 2</h6>
            <br>
            <h6>2. Jika mahasiswa ingin membayar kompen sebagai pengganti pekerjaan maka membayar Rp.10.000/Jam</h6>
            <br>
            <h6>3. Kompen akan dikalikan 2(dua) jika kompen pada semester sebelumnya belum diselesaikan</h6>
          </div>
        </div>
        <div class="align-self-end p-2">
          <button type="button" name="" class="btn btn-danger float-right" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
