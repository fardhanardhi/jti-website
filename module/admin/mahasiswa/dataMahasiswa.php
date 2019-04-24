<!DOCTYPE html>
<html>

<head>
    <?php 
        include "../config/connection.php";
        include "../process/proses_adminMahasiswa.php";
    
    ?>
</head>

<body onload="setup(); setup2();">
    <main role="main" class="container-fluid">
        <div id="dataMahasiswa" class="row">
            <div class="col-md-12 p-0">
                <div class="m-2 bg-white shadow-sm rounded">
                    <div class="row">
                        <div class="col-md-auto pr-0">
                            <span class="nav-link">Mahasiswa</span>
                        </div>
                        <div class="col pl-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-2 m-0 bg-white">
                                    <li class="breadcrumb-item"><a href="index.php?module=home">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
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
                                        <form action="../process/proses_adminMahasiswa.php?module=dataMahasiswa&act=tambah" id="formAdminMahasiswa" method="POST">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Username</label>
                                                            <div class="col-sm-10">
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
                                                            <div class="col-sm-10">
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
                                                                    id="fotoPrevCoba" height="150px" width="150px">
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-10">
                                                                <br>
                                                                <input id='fileid' type='file' name='filename'
                                                                    onchange="preview_images2(event);" hidden
                                                                    required />
                                                                <input id='buttonid' type='button' value='Load Gambar'
                                                                    class="btn btn-load btn-primary tmbl-load ml-2" />
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9">
                                                                <div id="fileidMahasiswaAdminBlank" class="text-danger">
                                                                </div>
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
                                                                <select class="custom-select" style="width:110px;" id="tanggalLahirMahasiswa" name="tanggalLahirMahasiswa">
                                                                    <option value="" disabled selected>Tanggal</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <select class="custom-select" style="width:110px;" id="bulanLahirMahasiswa" name="bulanLahirMahasiswa">
                                                                    <option value="" disabled selected>Bulan</option>
                                                                    <option value="Januari">Januari</option>
                                                                    <option value="Februari">Februari</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <select class="custom-select" style="width:110px;" id="tahunLahirMahasiswa" name="tahunLahirMahasiswa">
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

                                                            <?php
                                                                $resultnyaProdi = tampilProdi($con); 
                                                            ?>
                                                                <select name="prodi" class="custom-select" id="prodiMahasiswa"
                                                                    style="width:220px;">

                                                                    <?php 
                                                                    
                                                                    if(mysqli_num_rows($resultnyaProdi) > 0){

                                                                        while($row = mysqli_fetch_assoc($resultnyaProdi)){
                                                                            echo "<option value='".$row['id_prodi']."'>".$row['nama']."</option>";
                                                                        }

                                                                    }
                                                                    
                                                                    ?>
                                                                 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2">Kelas</label>
                                                            <div class="col-sm-10">
                                                            <select class="semester custom-select kelas" style="width:120px;" id="kelasMahasiswa" name="kelasMahasiswa">
                                                                
                                                                <?php
                                                                $resultKelas=kelas($con);

                                                                if(mysqli_num_rows($resultKelas)){
                                                                    while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                                                                        ?>
                                                                        <option value="<?php echo $rowKelas["id_kelas"];
                                                                        ?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);
                                                                        ?></option>
                                                                        <?php
                                                                    }
                                                                }        
                                                                ?>
                                                                </select>
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
                                                                <button type="submit" class="btn btn-kumpulkan btn-success tmbl-kumpulkan ml-2" name="insert" onclick="Cobacoba(); 
                                                                    
                                                                    showFilesSizes2();">Tambahkan</button>
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
                                <i class="fas fa-search mr-2"></i>
                                <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
                                <button class="btn btn-mencari btn-success tmbl-mencari"type="submit">Cari</button>
                            </form>
                            <div class="scrolltable">
                                <table class="table table-striped table-bordered text-center mt-3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Gambar</th>
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Prodi</th>
                                            <th>Kelas</th>
                                            <th colspan="2">Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT 
                                            
                                            tabel_user.username, 
                                            tabel_user.password, 

                                            tabel_mahasiswa.id_mahasiswa,
                                            tabel_mahasiswa.nim, 
                                            tabel_mahasiswa.nama, 
                                            tabel_mahasiswa.alamat, 
                                            tabel_mahasiswa.jenis_kelamin, 
                                            tabel_mahasiswa.tempat_lahir, 
                                            tabel_mahasiswa.tanggal_lahir, 
                                            tabel_mahasiswa.foto, 

                                            tabel_prodi.nama,
                                            tabel_kelas.kode_kelas 
                                            
                                            FROM tabel_user INNER JOIN

                                            tabel_mahasiswa ON 
                                            tabel_user.username = tabel_mahasiswa.nim

                                            INNER JOIN tabel_prodi ON
                                            tabel_mahasiswa.id_prodi = tabel_prodi.id_prodi

                                            INNER JOIN tabel_kelas ON
                                            tabel_mahasiswa.id_kelas = tabel_kelas.id_kelas


                                            ";
                                            $result = mysqli_query($con, $query);

                                            if(mysqli_num_rows($result) > 0){
                                                $index = 1;
                                                
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $id_mahasiswa = $row["id_mahasiswa"];
                                                    echo"
                                                    <tr>
                                                        <td>". $index++ ."</td>
                                                        <td>". $row["username"] ."</td>
                                                        <td>". $row["password"] ."</td>
                                                        <td>". $row["foto"] ."</td>
                                                        <td>". $row["nim"] ."</td>
                                                        <td>". $row["nama"] ."</td>
                                                        <td>". $row["tempat_lahir"] ."</td>
                                                        <td>". $row["tanggal_lahir"] ."</td>
                                                        <td>". $row["jenis_kelamin"] ."</td>
                                                        <td>". $row["alamat"] ."</td>
                                                        <td>". $row["nama"]."</td>
                                                        <td>". $row["kode_kelas"]."</td>

                                                        <td>
                                                        <a href='' class='btn btn-primary btn-edit ml-2' data-toggle='modal' data-target='#modalEditAdminMahasiswa'>Edit</a>
                                                                            
                                                        </td>
                                                        <td>
                                                        <a href='' class='btn btn-danger btn-hapus ml-2' data-toggle='modal' data-target='#modalHapusDataMahasiswa'>Hapus</a>
                                                             
                                                        </td>    
                                                    </tr>
                                                    ";
                                                }
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal edit mahasiswa -->

    <div class="modal fade" id="modalEditAdminMahasiswa">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    
                        <h5 class="modal-title">Edit Data Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                    
                    <div class="card-body">
                        <div class="col-md-12 p-0">
                            <form action="" id="formEditAdminMahasiswa" method="POST">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Username"
                                                        id="usernameMahasiswaAdmin2" name="usernameMahasiswaAdmin2"
                                                        required />
                                                </div>
                                                <div class="col-sm-3 col-form-label"></div>
                                                <div class="col-sm-9">
                                                    <div id="usernameMahasiswaAdminBlank2" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="**********"
                                                        id="passwordMahasiswaAdmin2" name="passwordMahasiswaAdmin2"
                                                        required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="passwordMahasiswaAdminBlank2" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Gambar</label>
                                                <div class="input-group col-md-9">
                                                    <img src="../attachment/img/avatar.jpeg"
                                                        id="fotoPrevMahasiswaAdmin2" height="150px" width="150px">
                                                </div>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">
                                                    <br>
                                                    <input id='fileid2' type='file' name='filename' onchange="preview_images22(event);"  hidden
                                                        required />
                                                    <input id='buttonid2' type='button' value='Load Gambar'
                                                        class="btn btn-loading btn-primary tmbl-loading ml-2"  />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="fileidMahasiswaAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIM</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="NIM Mahasiswa"
                                                        id="nimMahasiswaAdmin2" name="nimMahasiswaAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="nimMahasiswaAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nama Mahasiswa"
                                                        id="namaMahasiswaAdmin2" name="namaMahasiswaAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="namaMahasiswaAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        placeholder="Tempat Lahir Mahasiswa"
                                                        id="tempatlahirMahasiswaAdmin2"
                                                        name="tempatlahirMahasiswaAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="tempatlahirMahasiswaAdminBlank2" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                <br>
                                                <div class="col-sm-3">
                                                    <select class="custom-select">
                                                        <option value="" disabled selected>Tanggal</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select class="custom-select">
                                                        <option value="" disabled selected>Bulan</option>
                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select class="custom-select">
                                                        <option value="" disabled selected>Tahun</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2018">2018</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <br>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="genderMahasiswaAdmin1">
                                                            <input class="mt-2" type="radio" name="genderMahasiswaAdmin"
                                                                id="genderMahasiswaAdmin1" value="Laki-laki" checked>
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="genderMahasiswaAdmin2">
                                                            <input class="mt-2" type="radio" name="genderMahasiswaAdmin"
                                                                id="genderMahasiswaAdmin2" value="Perempuan">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="alamatMahasiswaAdmin2"
                                                        name="alamatMahasiswaAdmin2" rows="3"
                                                        placeholder="Alamat Mahasiswa" required></textarea>
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="alamatMahasiswaAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3">Prodi</label>
                                                <br>
                                                <div class="col-sm-9">
                                                    <select name="prodi" class="custom-select" style="width:220px;">
                                                        <option value="Teknik Informatika">Teknik
                                                            Informatika</option>
                                                        <option value="Manajemen Informatika">Manajemen
                                                            Informatika</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3">Kelas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Kelas"
                                                        style="width:160px;" id="kelasMahasiswaAdmin2"
                                                        name="kelasMahasiswaAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="kelasMahasiswaAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9"></div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-tambahkan btn-success tmbl-tambahkan" 
                                                        onclick="Testing(); 
                                                                    showFilesSizes22();">Simpan</button>
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
    <!-- modal hapus -->
    <div class="modal fade hapusMahasiswa-modal" id="modalHapusDataMahasiswa" tabindex="-1" role="dialog"
        aria-labelledby="hapusDataMahasiswaTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content kontent-modal">
                <div clas="modal-body">
                    <h5 class="isiHapusDataMahasiswa text-center">Apakah Anda Yakin ?</h5>
                    <div class="tombolAksiHapusDataMahasiswa text-center">
                        <button type="button" class="btn btn-danger btn-tidakdak" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-success btn-iyaya">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>