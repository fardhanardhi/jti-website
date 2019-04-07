<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JTI Website</title>
    <?php
        include "../config/styles.php";
    ?>
</head>

<body>
    <main role="main" class="container-fluid">
        <div id="mahasiswa" class="row">
            <div class="col-md-12 p-0">
                <div class="m-2 bg-white shadow-sm rounded">
                    <nav class="nav nav-underline">
                        <h5><span class="nav-link">Mahasiswa</span></h5>
                        <a href="#" class="nav-link">Dashboard / Mahasiswa</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-12 p-0" style="font-size:20px;">
                <div class="m-2 p-3 bg-white rounded shadow-sm">
                    <div class="media-body pb-3 mb-0 small lh-125">
                        <div class="isi">
                            <div class="card border border-secondary">
                                <div class="card-header">
                                    Tambah Data Mahasiswa
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 p-0">
                                        <form action="" id="formAdminMahasiswa" method="POST">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Username</label>
                                                            <div class="input-group col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Username" id="usernameMahasiswaAdmin"
                                                                    name="usernameMahasiswaAdmin" required />
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="usernameMahasiswaAdminBlank"
                                                                    class="text-danger"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Password</label>
                                                            <div class="input-group col-sm-10">
                                                                <input type="password" class="form-control"
                                                                    placeholder="**********" id="passwordMahasiswaAdmin"
                                                                    name="passwordMahasiswaAdmin" required />
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="passwordMahasiswaAdminBlank"
                                                                    class="text-danger"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label">Gambar</label>
                                                            <div class="input-group col-md-10">
                                                                <img src="../attachment/img/avatar.jpeg"
                                                                    id="fotoPrevMahasiswaAdmin" height="150px"
                                                                    width="150px">
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-10">
                                                                <br>
                                                                <input id='fileid' type='file' name='filename'
                                                                    onchange="preview_image(event);" hidden required />
                                                                <input id='buttonid' type='button' value='Load Gambar'
                                                                    class="btn btn-primary" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">NIM</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    placeholder="NIM Mahasiswa" id="nimMahasiswaAdmin"
                                                                    name="nimMahasiswaAdmin" required />
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="nimMahasiswaAdminBlank" class="text-danger">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nama Mahasiswa" id="namaMahasiswaAdmin"
                                                                    name="namaMahasiswaAdmin" required />
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="namaMahasiswaAdminBlank" class="text-danger">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tempat Lahir Mahasiswa"
                                                                    id="tempatlahirMahasiswaAdmin"
                                                                    name="tempatlahirMahasiswaAdmin" required />
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="tempatlahirMahasiswaAdminBlank"
                                                                    class="text-danger"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                            <br>
                                                            <div class="col-sm-2">
                                                                <select class="custom-select" style="width:110px;">
                                                                    <option value="" disabled selected>Tanggal</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <select class="custom-select" style="width:110px;">
                                                                    <option value="" disabled selected>Bulan</option>
                                                                    <option value="Januari">Januari</option>
                                                                    <option value="Februari">Februari</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <select class="custom-select" style="width:110px;">
                                                                    <option value="" disabled selected>Tahun</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2018">2018</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                            <br>
                                                            <div class="col-sm-10">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label"
                                                                        for="genderMahasiswaAdmin1">
                                                                        <input class="mt-2" type="radio"
                                                                            name="genderMahasiswaAdmin"
                                                                            id="genderMahasiswaAdmin1" value="Laki-laki"
                                                                            checked>
                                                                        Laki-laki
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label"
                                                                        for="genderMahasiswaAdmin2">
                                                                        <input class="mt-2" type="radio"
                                                                            name="genderMahasiswaAdmin"
                                                                            id="genderMahasiswaAdmin2"
                                                                            value="Perempuan">
                                                                        Perempuan
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="alamatMahasiswaAdmin"
                                                                    name="alamatMahasiswaAdmin" rows="3"
                                                                    placeholder="Alamat Mahasiswa" required></textarea>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="alamatMahasiswaAdminBlank" class="text-danger">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2">Prodi</label>
                                                            <br>
                                                            <div class="col-sm-10">
                                                                <select name="prodi" class="custom-select"
                                                                    style="width:220px;">
                                                                    <option value="Teknik Informatika">Teknik
                                                                        Informatika</option>
                                                                    <option value="Manajemen Informatika">Manajemen
                                                                        Informatika</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2">Kelas</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Kelas" style="width:160px;"
                                                                    id="kelasMahasiswaAdmin" name="kelasMahasiswaAdmin"
                                                                    required />
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="kelasMahasiswaAdminBlank" class="text-danger">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-9"></div>
                                                            <div class="col-sm-3">
                                                                <button type="submit" class="btn btn-success"
                                                                onclick="Coba();">Tambahkan</button>
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
                </div>
            </div>
        </div>
    </main>
</body>
</html>