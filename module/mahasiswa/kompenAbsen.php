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
              <button type="button" class="btn btn-primary tmbh-kmpn" data-target="#kompenTambah" data-toggle="modal">Tambah Kompen</button>
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
<div class="modal fade" id="informasiKompen" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- The modal pengaturan -->
<div class="modal fade" id="kompenTambah" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="modal-title text-center">Form Konfirmasi Kompensasi</h5>
        <hr class="pl-4 pr-4 bg-dark">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" class="form-control" id="tanggal">
            </div>
            <div class="form-group">
              <label for="jeniskompensasi">Jenis Kompensasi </label>
              <textarea class="form-control" rows="5" id="jeniskompensasi"></textarea>
            </div>

            <div class="form-group">
              <label for="totaljam">Total Jam</label>
              <input type="text" class="form-control" id="totaljam">
            </div>
            <div class="form-group">
              <div>
                <label for="jeniskelamin">Dosen</label>
                <select id="jeniskelamin" class="form-control">
                  <option value="lakilaki">Dosen A</option>
                  <option value="perempuan">Dosen B</option>
                  <option value="perempuan">Dosen C</option>
                  <option value="perempuan">Dosen D</option>
                  <option value="perempuan">Dosen E</option>
                  <option value="perempuan">Dosen F</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>
