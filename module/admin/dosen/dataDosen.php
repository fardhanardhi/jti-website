<?php
    include "../config/connection.php";
    include "../process/CRUD_dataDosen.php";
?>

<!DOCTYPE html>
<html>

<head>
</head>

<body onload="setupDosen();">
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
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="media text-muted">
                                    <div class="media-body pb-3 mb-0 small lh-125">
                                        <div class="isi">
                                            <div class="card border border-secondary">
                                                <div class="judul-card card-header">
                                                    <h6>Tambah Data Dosen</h6>
                                                </div>
                                                <div class="card-body row">
                                                    <div class="col-md-12">
                                                        <form action="../process/CRUD_dataDosen.php?module=dataDosen&act=tambah" id="formAdminDosen" method="POST">
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
                                                                                <input id='file' type='file' name='filename'
                                                                                    onchange="preview_images(event);" hidden required />
                                                                                <input id='tombolid' type='button' value='Load Gambar'
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
                                                                            <label class="col-sm-2 col-form-label">NIP</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="NIP Dosen" id="nimDosenAdmin"
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
                                                                                <select class="custom-select" name="tgl" style="width:110px;">
                                                                                    <option value="" disabled selected>Tanggal</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                    <option value="10">10</option>
                                                                                    <!-- <option value="">11</option>
                                                                                    <option value="">12</option>
                                                                                    <option value="">13</option>
                                                                                    <option value="">14</option>
                                                                                    <option value="">15</option>
                                                                                    <option value="">16</option>
                                                                                    <option value="">17</option>
                                                                                    <option value="">18</option>
                                                                                    <option value="">19</option>
                                                                                    <option value="">20</option>
                                                                                    <option value="">21</option>
                                                                                    <option value="">22</option>
                                                                                    <option value="">23</option>
                                                                                    <option value="">24</option>
                                                                                    <option value="">25</option>
                                                                                    <option value="">26</option>
                                                                                    <option value="">27</option>
                                                                                    <option value="">28</option>
                                                                                    <option value="">29</option>
                                                                                    <option value="">30</option>
                                                                                    <option value="">31</option> -->
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <select class="custom-select" name="bulan" style="width:110px;">
                                                                                    <option value="" disabled selected>Bulan</option>
                                                                                    <option value="Januari">Januari</option>
                                                                                    <option value="Februari">Februari</option>
                                                                                    <option value="Maret">Maret</option>
                                                                                    <option value="April">April</option>
                                                                                    <option value="Mei">Mei</option>
                                                                                    <option value="Juni">Juni</option>
                                                                                    <option value="Juli">Juli</option>
                                                                                    <option value="Agustus">Agustus</option>
                                                                                    <option value="September">September</option>
                                                                                    <option value="Oktober">Oktober</option>
                                                                                    <option value="November">November</option>
                                                                                    <option value="Desember">Desember</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <select class="custom-select" name="tahun" style="width:110px;">
                                                                                    <option value="" disabled selected>Tahun</option>
                                                                                    <option value="1980">1980</option>
                                                                                    <option value="1981">1981</option>
                                                                                    <option value="1982">1982</option>
                                                                                    <option value="1983">1983</option>
                                                                                    <option value="1984">1984</option>
                                                                                    <option value="1985">1985</option>
                                                                                    <option value="1986">1986</option>
                                                                                    <option value="1987">1987</option>
                                                                                    <option value="1988">1988</option>
                                                                                    <option value="1989">1989</option>
                                                                                    <option value="1990">1990</option>
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
                                                                                <button type="submit" name="tambahDosen" class="btn btn-success" name="insert"
                                                                                    onclick="eror();  showFilesSizes();">Tambahkan</button>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-inline ml-4">
                                    <img src="../img/search.svg" alt="" id="icon-search">
                                    <input type="search" class="form-control mr-sm-2" name="txtCariDataDosen" id="txtCariDataDosen"  placeholder="Pencarian">
                                </div>

                                <div class="scrollbar scrollbar-x mt-3" style="overflow:auto; max-height:78vh;">
                                    <table class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Gambar</th>
                                                <th>NIP</th>
                                                <th class="text-nowrap">Nama Lengkap</th>
                                                <th class="text-nowrap">Tempat Lahir</th>
                                                <th class="text-nowrap">Tanggal Lahir</th>
                                                <th class="text-nowrap">Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th colspan="2">Proses</th>
                                            </tr>
                                        </thead>
                                        <?php
                                                $query = "SELECT 
                                                
                                                tabel_user.username, 
                                                tabel_user.password, 
                                                tabel_user.id_user,

                                                tabel_dosen.id_dosen,
                                                tabel_dosen.nip, 
                                                tabel_dosen.nama, 
                                                tabel_dosen.alamat, 
                                                tabel_dosen.jenis_kelamin, 
                                                tabel_dosen.tempat_lahir, 
                                                tabel_dosen.tanggal_lahir, 
                                                tabel_dosen.foto
                                                
                                                FROM tabel_user INNER JOIN

                                                tabel_dosen ON 
                                                tabel_user.username = tabel_dosen.nip

                                                ";
                                                $result = mysqli_query($con, $query);
                                            
                                                $index = 1;
                                                
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $id_delete = $row["id_user"];
                                                    $id = $row["id_dosen"];
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $index; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["username"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["password"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["foto"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["nip"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["nama"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["tempat_lahir"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["tanggal_lahir"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["jenis_kelamin"]; ?></td>
                                                        <td class="text-nowrap"><?php echo $row["alamat"]; ?></td>
                                                        <td class="text-nowrap"><button type="button" id="<?php echo $rowKompen["id_kompen"];?>" class="btn btn-primary edit-kompen ml-4 mr-4" data-toggle="modal" data-target="#editModal">Edit</button></td>
                                                        <td><button type="button" id="<?php echo $row["id_user"]?>"  class="btn btn-danger hapus-kompen mr-4 ml-4" data-toggle="modal" data-target="#hapus">Hapus</button></td>    
                                                    </tr>
                                                    <?php $index++;
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
                    
                    <div class="card-body">
                        <div class="col-md-12 p-0">
                            <form action="" id="formEditAdminDosen" method="POST">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Username"
                                                        id="usernameDosenAdmin2" name="usernameDosenAdmin2"
                                                        required />
                                                </div>
                                                <div class="col-sm-3 col-form-label"></div>
                                                <div class="col-sm-9">
                                                    <div id="usernameDosenAdminBlank2" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="**********"
                                                        id="passwordDosenAdmin2" name="passwordDosenAdmin2"
                                                        required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="passwordDosenAdminBlank2" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Gambar</label>
                                                <div class="input-group col-md-9">
                                                    <img src="../attachment/img/avatar.jpeg"
                                                        id="fotoPrevDosenAdmin2" height="150px" width="150px">
                                                </div>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">
                                                    <br>
                                                    <input id='fileid3' type='file' name='filename' onchange="preview_images6(event);"  hidden
                                                        required />
                                                    <input id='buttonid3' type='button' value='Load Gambar'
                                                        class="btn btn-loading btn-primary tmbl-loading ml-2"  />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="fileidDosenAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">NIM</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="NIM Dosen"
                                                        id="nimDosenAdmin2" name="nimDosenAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="nimDosenAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Nama Dosen"
                                                        id="namaDosenAdmin2" name="namaDosenAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="namaDosenAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        placeholder="Tempat Lahir Dosen"
                                                        id="tempatlahirDosenAdmin2"
                                                        name="tempatlahirDosenAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="tempatlahirDosenAdminBlank2" class="text-danger"></div>
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
                                                        <label class="form-check-label" for="genderDosenAdmin1">
                                                            <input class="mt-2" type="radio" name="genderDosenAdmin"
                                                                id="genderDosenAdmin1" value="Laki-laki" checked>
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="genderDosenAdmin2">
                                                            <input class="mt-2" type="radio" name="genderDosenAdmin"
                                                                id="genderDosenAdmin2" value="Perempuan">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="alamatDosenAdmin2"
                                                        name="alamatDosenAdmin2" rows="3"
                                                        placeholder="Alamat Dosen" required></textarea>
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="alamatDosenAdminBlank2" class="text-danger">
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
                                                        style="width:160px;" id="kelasDosenAdmin2"
                                                        name="kelasDosenAdmin2" required />
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <div id="kelasDosenAdminBlank2" class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9"></div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-tambahkan btn-success tmbl-tambahkan" 
                                                        onclick="Tambah(); 
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
</body>
    <!-- modal hapus -->
    <!-- <div class="modal fade hapusKompen-modal" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true"        data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content konten-modal">
            <form action="../process/CRUD_dataDosen.php?module=dataDosen&act=hapus" method="post">
                <div class="modal-body ">
                <input type="hidden" name="id_delete" id="id_delete" value="<?php echo $id_delete ?>">
                <input type="hidden" name="id_dosen" id="id_dosen" value="<?php echo $id ?>">
                    <h5 class="isiHapusKompen text-center">Apakah Anda Yakin?</h5>
                    <div class="tombolAksiHapusKompen text-center">
                        <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="delete" class="btn btn-iya">Ya</button>
                    </div>
                </div>                 
            </div>
        </div>
    </div> -->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <form action="../process/CRUD_dataDosen.php?module=dataDosen&act=hapus" method="post">
                <div class="modal-body pt-5 text-center">
                    <input type="hidden" name="id_delete" id="id_delete" value="<?php echo $id_delete ?>">
                    <input type="hidden" name="id_dosen" id="id_dosen" value="<?php echo $id ?>">
                  <input type="hidden" name="id_kompen" id="id_kompenHapus">
                  <strong>Apakah Anda yakin?</strong>
                </div>
                <div class="pb-4 pt-4 d-flex justify-content-around">
                  <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                  <!-- <button type="submit" name="hapusKompen" class="btn btn-success btn-ok">Ya</button> -->
                  <button type="submit" name="delete" class="btn btn-success btn-ok">Ya</button>
                </div>
              </form>
            </div>
          </div>
        </div>
</html>