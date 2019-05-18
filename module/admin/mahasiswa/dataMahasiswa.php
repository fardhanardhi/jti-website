<!DOCTYPE html>
<html>

<head>
    <?php 
        include "../config/connection.php";
        include "../process/proses_adminMahasiswa.php";
    
    ?>
</head>

<body onload="setup2(); setup3();">
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
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="media-body pb-3 mb-0 small lh-125">
                                    <div class="isi">
                                        <div class="card border border-secondary">
                                            <div class="card-header">
                                                Tambah Data Mahasiswa
                                            </div>
                                            <div class="card-body">
                                                <div class="col-md-12 p-0">
                                                    <form action="../process/proses_adminMahasiswa.php?module=dataMahasiswa&act=tambah" id="formAdminMahasiswa" method="POST" enctype="multipart/form-data">
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
                                                                                placeholder="**********" name="passwordMahasiswaAdmin" 
                                                                                
                                                                                id="passwordMahasiswaAdmin"
                                                                                required/>
                                                                        </div>
                                                                        <div class="col-sm-3"></div>
                                                                        <div class="col-sm-9">
                                                                            <div id="passwordMahasiswaAdminBlank"
                                                                                class="text-danger"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Gambar</label>
                                                            <div class="input-group col-sm-10">
                                                                <img src="../attachment/img/avatar.jpeg"
                                                                    id="fotoPrevMahasiswaAdmin3" height="150px" width="150px">
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-10">
                                                                <br>
                                                                <input id='fileid2' type='file' name='fileid2' onchange="preview_images22(event);"  hidden
                                                                    required />
                                                                <input id='buttonid2' type='button' value='Load Gambar'
                                                                    class="btn btn-loading btn-primary tmbl-loading ml-2"  />
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
                                                                            <?php echo opsiTanggal($row["tanggal_lahir"]);?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <select class="custom-select" style="width:110px;" id="bulanLahirMahasiswa" name="bulanLahirMahasiswa">
                                                                                <?php echo opsiBulan($row["tanggal_lahir"]);?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <select class="custom-select" style="width:110px;" id="tahunLahirMahasiswa" name="tahunLahirMahasiswa">
                                                                            <?php echo opsiTahun($row["tanggal_lahir"]);?>
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
                                                                            <select name="prodiMahasiswa" class="custom-select" 
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
                                                                        <select class="semester custom-select kelas" style="width:120px;" name="kelasMahasiswa">
                                                                            
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
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2">Semester</label>
                                                                        <div class="col-sm-10">
                                                                        <select class="semester custom-select kelas" style="width:120px;"  name="semesterMahasiswa">
                                                                            
                                                                            <?php
                                                                                $resultSemester=tampilSemester($con);
                                                                                if(mysqli_num_rows($resultSemester)){
                                                                                while($rowSemester=mysqli_fetch_assoc($resultSemester)){
                                                                                    ?>
                                                                                    <option value="<?php echo $rowSemester["id_semester"];?>"><?php echo $rowSemester["semester"];?></option>
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
                                                                            <button type="submit" class="btn btn-kumpulkan btn-success tmbl-kumpulkan ml-2" name="insert" onclick="ValidasiTambah(); preventDefaultAction(event);">Tambahkan</button>
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
                    
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <form class="form-inline">
                                    <i class="fas fa-search mr-2"></i>
                                    <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="" aria-label="Search" name="txtCariDataMahasiswa" id="txtCariDataMahasiswa">
                                   
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="scrollbar scrollbar-x" id="dataAdminMahasiswa" style="overflow:auto; max-height:100vh;">
                                    <table class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Gambar</th>
                                                <th>NIM</th>
                                                <th class="">Nama Lengkap</th>
                                                <th class="">Tempat Lahir</th>
                                                <th class="">Tanggal Lahir</th>
                                                <th class="">Jenis Kelamin</th>
                                                <th style>Alamat</th>
                                                <th>Prodi</th>
                                                <th>Kelas</th>
                                                <th colspan="2">Proses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = "select tp.kode, tk.tingkat, tm.id_mahasiswa, tm.id_user, tu.username,tu.password,tm.foto,tm.nim,tm.nama as nama_mahasiswa,tm.tempat_lahir,tm.tanggal_lahir,tm.jenis_kelamin,tm.alamat,tp.nama as nama_prodi,tk.kode_kelas 
                                                from tabel_mahasiswa tm,tabel_prodi tp,tabel_user tu,tabel_kelas tk
                                                where tm.id_prodi = tp.id_prodi
                                                and tm.id_user = tu.id_user
                                                and tm.id_kelas = tk.id_kelas;

                                                
                                                ";
                            
                                                $result = mysqli_query($con, $query);
                                                
                                                    $index = 1;
                                                
                                                    if(mysqli_num_rows($result) > 0){
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            // $id_delete = $row["id_user"];
                                                            // $id = $row["id_mahasiswa"];
        
                                                        
                                                        ?>
                                                            <tr id="<?php echo $row["id_mahasiswa"] ?>" class="itemDataMahasiswa">
                                                                <td><?php echo $index; ?></td>
                                                                <td class="usernameMahasiswa "><?php echo $row["username"]; ?></td>
                                                                <td class="passwordMahasiswa ">**********</td>
                                                                <td class="fotoMahasiswa "><img src="../attachment/img/<?php echo ($row['foto'] == null)? 'avatar.jpeg' : $row['foto'] ; ?>" style="width:50px;height:50px;border-radius:50%;"></td>
                                                                <td class="nimMahasiswa "><?php echo $row["nim"]; ?></td>
                                                                <td class="namaMahasiswa "><?php echo $row["nama_mahasiswa"]; ?></td>
                                                                <td class="tempatLahirMahasiswa "><?php echo $row["tempat_lahir"]; ?></td>
                                                                <td class="tanggalLahirMahasiswa "><?php echo date("d M Y", strtotime($row["tanggal_lahir"])) ?></td>
                                                                <td class="jenisKelaminMahasiswa "><?php echo $row["jenis_kelamin"]; ?></td>
                                                                <td class="alamatMahasiswa "><?php echo $row["alamat"]; ?></td>
                                                                <td class="namaProdiMahasiswa "><?php echo $row["nama_prodi"];?></td>
                                                                <td class="kodeKelasMahasiswa "><?php echo $row["kode"]; ?>-<?php echo $row["tingkat"]; echo $row["kode_kelas"] ?></td>
        
                                                                <td>
                                                                <a id_userEdit="<?php echo $row["id_user"]; ?>"
                                                            id_mahasiswaEdit="<?php echo $row["id_mahasiswa"]; ?>" class='btn btn-primary btn-edit edit-mahasiswa-admin text-white' data-toggle='modal' data-target='#modalEditAdminMahasiswa'>Edit</a>
                                                                                    
                                                                </td>
                                                                <td>
                                                                <a id_user="<?php echo $row["id_user"]; ?>"
                                                            id_mahasiswa="<?php echo $row["id_mahasiswa"]; ?>" class='btn btn-danger btn-hapus hapus-mahasiswa-admin text-white' data-toggle='modal' data-target='#modalHapusDataMahasiswa'>Hapus</a>
                                                                    
                                                                </td>    
                                                            </tr>
                                                            <?php $index++;
                                                        }
                                                        ?>
                                                    <?php    
                                                    }  else{
                                                    ?>
                                                        <div>
                                                            <p>Data mahasiswa tidak tersedia</p>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="tidakDapatDitemukan" style="display:none" class="col-12 mt-5 text-center">
                                    <i class="fas fa-search mb-3" style="font-size: 5em;"></i>
                                    <p>Data yang anda cari tidak dapat ditemukan</h>
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
                            <form action="../process/proses_adminMahasiswa.php?module=dataMahasiswa&act=edit" id="formEditAdminMahasiswa" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" id="id_userUpdate" >
                            <input type="hidden" name="id_mahasiswa" id="id_mahasiswaUpdate" >
                                <div class="container-fluid" id="edit-dataMahasiswa">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
  
</body>
  <!-- modal hapus -->
    <div class="modal fade hapusMahasiswa-modal" id="modalHapusDataMahasiswa" tabindex="-1" role="dialog"
        aria-labelledby="hapusDataMahasiswaTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content kontent-modal">
                <form action="../process/proses_adminMahasiswa.php?module=dataMahasiswa&act=hapus" method="post">
                    <div clas="modal-body">
                        <input type="hidden" name="id_user" id="id_userHapus" >
                        <input type="hidden" name="id_mahasiswa" id="id_mahasiswaHapus" >
                        <h5 class="isiHapusDataMahasiswa text-center">Apakah Anda Yakin ?</h5>
                        <div class="tombolAksiHapusDataMahasiswa text-center">
                            <button type="button" class="btn btn-danger btn-tidakdak" data-dismiss="modal">Tidak</button>
                            
                            <button type='submit' class='btn btn-success btn-iyaya' name='hapusMahasiswa'>Ya</button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>
