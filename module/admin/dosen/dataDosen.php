<!DOCTYPE html>
<html>

<head>
</head>

<body onload="setup();">
    <main role="main" class="container-fluid">
        <div id="dataDosen" class="row">
            <div class="col-md-12 p-0">
                <div class="m-2 bg-white shadow-sm rounded">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="pr-4 title "><a href="#"><strong>Dosen</strong></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dosen</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-12 p-0">
                <div class="m-2 p-3 bg-white rounded shadow-sm">
                    <div class="media text-muted">
                        <div class="media-body pb-3 mb-0 small lh-125">
                            <div class="isi">
                                <div class="card border border-secondary">
                                    <div class="judul-card card-header">
                                        <h6>Tambah Data Dosen</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12 p-0">
                                            <form action="" id="formAdminDosen" method="POST">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Username</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Username" id="usernameDosenAdmin"
                                                                        name="usernameDosenAdmin" required />
                                                                </div>
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9">
                                                                    <div id="usernameDosenAdminBlank"
                                                                        class="text-danger"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" class="form-control"
                                                                        placeholder="**********" id="passwordDosenAdmin"
                                                                        name="passwordDosenAdmin" required />
                                                                </div>
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9">
                                                                    <div id="passwordDosenAdminBlank"
                                                                        class="text-danger"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-2 col-form-label">Gambar</label>
                                                                <div class="input-group col-md-10">
                                                                    <img src="../attachment/img/avatar.jpeg"
                                                                        id="fotoPrevDosenAdmin" height="150px"
                                                                        width="150px">
                                                                </div>
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-10">
                                                                    <br>
                                                                    <input id='fileid' type='file' name='filename'
                                                                        onchange="preview_images(event);" hidden required />
                                                                    <input id='buttonid' type='button' value='Load Gambar'
                                                                        class="loadgambar btn btn-primary"/>
                                                                </div>
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9">
                                                                    <div id="fileidDosenAdminBlank" class="text-danger">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">NIM</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="NIM Dosen" id="nimDosenAdmin"
                                                                        name="nimDosenAdmin" required />
                                                                </div>
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9">
                                                                    <div id="nimDosenAdminBlank" class="text-danger">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Nama Dosen" id="namaDosenAdmin"
                                                                        name="namaDosenAdmin" required />
                                                                </div>
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9">
                                                                    <div id="namaDosenAdminBlank" class="text-danger">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Tempat Lahir Dosen"
                                                                        id="tempatlahirDosenAdmin"
                                                                        name="tempatlahirDosenAdmin" required />
                                                                </div>
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9">
                                                                    <div id="tempatlahirDosenAdminBlank"
                                                                        class="text-danger"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                                <br>
                                                                <div class="col-sm-2">
                                                                    <select class="custom-select" style="width:110px;">
                                                                        <option value="" disabled selected>Tanggal</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                        <option>10</option>
                                                                        <option>11</option>
                                                                        <option>12</option>
                                                                        <option>13</option>
                                                                        <option>14</option>
                                                                        <option>15</option>
                                                                        <option>16</option>
                                                                        <option>17</option>
                                                                        <option>18</option>
                                                                        <option>19</option>
                                                                        <option>20</option>
                                                                        <option>21</option>
                                                                        <option>22</option>
                                                                        <option>23</option>
                                                                        <option>24</option>
                                                                        <option>25</option>
                                                                        <option>26</option>
                                                                        <option>27</option>
                                                                        <option>28</option>
                                                                        <option>29</option>
                                                                        <option>30</option>
                                                                        <option>31</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <select class="custom-select" style="width:110px;">
                                                                        <option value="" disabled selected>Bulan</option>
                                                                        <option>Januari</option>
                                                                        <option>Februari</option>
                                                                        <option>Maret</option>
                                                                        <option>April</option>
                                                                        <option>Mei</option>
                                                                        <option>Juni</option>
                                                                        <option>Juli</option>
                                                                        <option>Agustus</option>
                                                                        <option>September</option>
                                                                        <option>Oktober</option>
                                                                        <option>November</option>
                                                                        <option>Desember</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <select class="custom-select" style="width:110px;">
                                                                        <option value="" disabled selected>Tahun</option>
                                                                        <option>1980</option>
                                                                        <option>1981</option>
                                                                        <option>1982</option>
                                                                        <option>1983</option>
                                                                        <option>1984</option>
                                                                        <option>1985</option>
                                                                        <option>1986</option>
                                                                        <option>1987</option>
                                                                        <option>1988</option>
                                                                        <option>1989</option>
                                                                        <option>1990</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                                <br>
                                                                <div class="col-sm-10">
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label"
                                                                            for="genderDosenAdmin1">
                                                                            <input class="mt-2" type="radio"
                                                                                name="genderDosenAdmin"
                                                                                id="genderDosenAdmin1" value="Laki-laki"
                                                                                checked>
                                                                            Laki-laki
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label"
                                                                            for="genderDosenAdmin2">
                                                                            <input class="mt-2" type="radio"
                                                                                name="genderDosenAdmin"
                                                                                id="genderDosenAdmin2"
                                                                                value="Perempuan">
                                                                            Perempuan
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Alamat</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="alamatDosenAdmin"
                                                                        name="alamatDosenAdmin" rows="3"
                                                                        placeholder="Alamat Dosen" required></textarea>
                                                                </div>
                                                                <div class="col-sm-3"></div>
                                                                <div class="col-sm-9">
                                                                    <div id="alamatDosenAdminBlank" class="text-danger">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-9"></div>
                                                                <div class="col-sm-3">
                                                                    <button type="submit" class="btn btn-success"
                                                                        onclick="eror(); showFilesSizes();">Tambahkan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <form class="form-inline ml-4">
                                    <img src="../img/search.svg" alt="" id="icon-search">
                                    <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
                                    <button class="btn btn-success" type="submit">Cari</button>
                                </form>
                                <div class="scrolltable scrollbar-x">
                                    <table class="table table-striped table-bordered text-center" style="width:120% ;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Gambar</th>
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th colspan="2">Proses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>fulan</td>
                                                <td>123</td>
                                                <td><img src="../attachment/img/avatar.jpeg" style="height:40px; width:40px; border-radius:50%;" alt=""></td>
                                                <td>1741720001</td>
                                                <td>Nama Dosen</td>
                                                <td>Malang</td>
                                                <td>1 Januari 1945</td>
                                                <td>Laki-laki</td>
                                                <td>Jl.soekarno hatta</td>
                                                
                                                <td><button type="button" class="tmbl-table btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button></td>
                                                <td><button class=" tmbl-table btn btn-danger"  type="button" class="pratinjau btn" data-toggle="modal" data-target="#hapus" class="hapus">Hapus</button></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>fulan</td>
                                                <td>123</td>
                                                <td><img src="../attachment/img/avatar.jpeg" style="height:40px; width:40px; border-radius:50%;" alt=""></td>
                                                <td>1741720001</td>
                                                <td>Nama Dosen</td>
                                                <td>Malang</td>
                                                <td>1 Januari 1945</td>
                                                <td>Laki-laki</td>
                                                <td>Jl.soekarno hatta</td>
                                                <td><button type="button" class="tmbl-table btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</button></td>
                                                <td><button class=" tmbl-table btn btn-danger" type="button" class="pratinjau btn" data-toggle="modal" data-target="#hapus">Hapus</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal hapus -->
            <div class="modal fade hapusKompen-modal" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content konten-modal">
                        <div class="modal-body ">
                            <h5 class="isiHapusKompen text-center">Apakah Anda Yakin?</h5>
                            <div class="tombolAksiHapusKompen text-center">
                                <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                                <button type="button" class="btn btn-iya">Ya</button>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal edit -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">Edit Data Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- isi -->
                <div class="card-body">
                    <div class="col-md-12 p-0">
                        <form action="" method="post">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Username</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="hargaBarang" id="hargaBarang" class="form-control" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="hargaBarang" id="hargaBarang" class="form-control" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Gambar</label>
                                            <div class="col-md-8">
                                                <img src="../attachment/img/avatar.jpeg" alt="dosen" style="width:150px;height:150px;"><br>
                                                <br>
                                                <input id='buttonid' type='button' value='Load Gambar' class="loadgambar btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NIP</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="hargaBarang" id="hargaBarang" class="form-control" placeholder="NIP Dosen" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="hargaBarang" id="hargaBarang" class="form-control" placeholder="Nama Dosen" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="hargaBarang" id="hargaBarang" class="form-control" placeholder="Tempat Lahir Dosen" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-2">
                                                <select class="semester custom-select">
                                                    <option selected>Tgl</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="semester custom-select">
                                                    <option selected>Bulan</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="semester custom-select">
                                                    <option selected>Tahun</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label"
                                                        for="genderDosenAdmin1">
                                                        <input class="mt-2" type="radio"
                                                            name="genderDosenAdmin"
                                                            id="genderDosenAdmin1" value="Laki-laki">
                                                        Laki-laki
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label"
                                                        for="genderDosenAdmin2">
                                                        <input class="mt-2" type="radio"
                                                            name="genderDosenAdmin"
                                                            id="genderDosenAdmin2"
                                                            value="Perempuan">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="alamatDosenAdmin"
                                                    name="alamatDosenAdmin" rows="5"
                                                    placeholder="Alamat Dosen" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jurusan</label>
                                            <div class="col-sm-5">
                                                <select class="kelas custom-select">
                                                    <option selected>Jurusan</option>
                                                    <option value="1">Teknik Informatika</option>
                                                    <option value="2">Manajemen Informatika</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kelas</label>
                                            <div class="col-sm-5">
                                                <select class="kelas custom-select">
                                                    <option selected>Kelas</option>
                                                    <option value="1">TI-2F</option>
                                                    <option value="2">TI-2C</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>