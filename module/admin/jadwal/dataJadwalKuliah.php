<?php
    include "../config/connection.php";
    include "../process/proses_adminJadwalKuliah.php";
?>

<main role="main" class="container-fluid">
    <div id="dataDosen" class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <div class="row">
                    <div class="col-md-auto pr-0">
                        <span class="nav-link">Jadwal Kuliah</span>
                    </div>
                    <div class="col pl-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb p-2 m-0 bg-white">
                                <li class="breadcrumb-item"><a href="index.php?module=home">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Jadwal Kuliah</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <div class="media text-muted pt-3">
                    <div class="media-body pb-3 mb-0 small lh-125">
                        <div class="isi">
                            <div class="card border border-secondary">
                                <div class="card-header">
                                    Tambah Jadwal Kuliah
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 p-0">
                                        <form
                                            action="../process/proses_adminJadwalKuliah.php?module=dataJadwalKuliah&act=tambah"
                                            method="POST">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                                            <div class="col-sm-10">
                                                                <select class="semester custom-select" id="id_kelas"
                                                                    name="id_kelas">
                                                                    <option selected disabled>Pilih Kelas</option>
                                                                    <?php 
                                                                    $resultKelas=kelas($con); 
                                                                    if(mysqli_num_rows($resultKelas))
                                                                    {
                                                                        while($rowKelas=mysqli_fetch_assoc($resultKelas))
                                                                        {
                                                                        ?>
                                                                    <option value="<?php echo $rowKelas["id_kelas"];?>">
                                                                        <?php echo $rowKelas["kode"];?>-<?php echo $rowKelas["tingkat"]; echo $rowKelas["kode_kelas"];?>
                                                                    </option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Hari</label>
                                                            <div class="col-sm-10">
                                                                <select class="semester custom-select" id="hari"
                                                                    name="hari">
                                                                    <option selected disabled>Pilih Hari</option>
                                                                    <option value="Senin">Senin</option>
                                                                    <option value="Selasa">Selasa</option>
                                                                    <option value="Rabu">Rabu</option>
                                                                    <option value="Kamis">Kamis</option>
                                                                    <option value="Jum'at">Jum'at</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Jam</label>
                                                            <div class="col-sm-5">
                                                                <select class="semester custom-select" id="jam_mulai"
                                                                    name="jam_mulai">
                                                                    <option selected disabled>Mulai</option>
                                                                    <option value="07:00:00">07.00</option>
                                                                    <option value="07:45:00">07.45</option>
                                                                    <option value="08:30:00">08.30</option>
                                                                    <option value="08:40:00">08.40</option>
                                                                    <option value="09:15:00">09.15</option>
                                                                    <option value="09:30:00">09.30</option>
                                                                    <option value="09:45:00">09.45</option>
                                                                    <option value="10:00:00">10.00</option>
                                                                    <option value="10:35:00">10.35</option>
                                                                    <option value="10:45:00">10.45</option>
                                                                    <option value="11:00:00">11.00</option>
                                                                    <option value="12:30:00">12.30</option>
                                                                    <option value="12:45:00">12.45</option>
                                                                    <option value="13:15:00">13.15</option>
                                                                    <option value="13:35:00">13.35</option>
                                                                    <option value="13:45:00">13.45</option>
                                                                    <option value="14:25:00">14.25</option>
                                                                    <option value="14:30:00">14.30</option>
                                                                    <option value="15:15:00">15.15</option>
                                                                    <option value="15:30:00">15.30</option>
                                                                    <option value="16:15:00">16.15</option>
                                                                    <option value="16:20:00">16.20</option>
                                                                    <option value="16:40:00">16.40</option>
                                                                    <option value="17:10:00">17.10</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <center>
                                                                    <h3>/</h3>
                                                                </center>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <select class="semester custom-select">
                                                                    <option selected disabled id="jam_selesai"
                                                                        name="jam_selesai">Berakhir</option>
                                                                    <option value="07:45:00">07.45</option>
                                                                    <option value="07:50:00">07.50</option>
                                                                    <option value="08:30:00">08.30</option>
                                                                    <option value="08:40:00">08.40</option>
                                                                    <option value="09:15:00">09.15</option>
                                                                    <option value="09:30:00">09.30</option>
                                                                    <option value="09:45:00">09.45</option>
                                                                    <option value="10:00:00">10.00</option>
                                                                    <option value="10:35:00">10.35</option>
                                                                    <option value="10:45:00">10.45</option>
                                                                    <option value="11:00:00">11.00</option>
                                                                    <option value="12:30:00">12.30</option>
                                                                    <option value="12:45:00">12.45</option>
                                                                    <option value="13:15:00">13.15</option>
                                                                    <option value="13:35:00">13.35</option>
                                                                    <option value="13:45:00">13.45</option>
                                                                    <option value="14:25:00">14.25</option>
                                                                    <option value="14:30:00">14.30</option>
                                                                    <option value="15:15:00">15.15</option>
                                                                    <option value="15:30:00">15.30</option>
                                                                    <option value="16:15:00">16.15</option>
                                                                    <option value="16:20:00">16.20</option>
                                                                    <option value="16:40:00">16.40</option>
                                                                    <option value="17:10:00">17.10</option>
                                                                    <option value="18:00:00">18.00</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                                                            <div class="col-sm-10">
                                                                <select class="semester custom-select" id="id_matkul"
                                                                    name="id_matkul">
                                                                    <option selected disabled>Pilih Mata Kuliah</option>
                                                                    <?php 
                                                                    $resultMatkul=matkul($con); 
                                                                    if(mysqli_num_rows($resultMatkul))
                                                                    {
                                                                        while($rowMatkul=mysqli_fetch_assoc($resultMatkul))
                                                                        {
                                                                        ?>
                                                                    <option
                                                                        value="<?php echo $rowMatkul["id_matkul"];?>">
                                                                        <?php echo $rowMatkul["nama"];?></option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Ruangan</label>
                                                            <div class="col-sm-10">
                                                                <select class="semester custom-select" id="id_ruang"
                                                                    name="id_ruang">
                                                                    <option selected disabled>Pilih Ruangan</option>
                                                                    <?php 
                                                                    $resultRuang=ruang($con); 
                                                                    if(mysqli_num_rows($resultRuang))
                                                                    {
                                                                        while($rowRuang=mysqli_fetch_assoc($resultRuang))
                                                                        {
                                                                        ?>
                                                                    <option value="<?php echo $rowRuang["id_ruang"];?>">
                                                                        <?php echo $rowRuang["kode"];?></option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Dosen
                                                                Pengajar</label>
                                                            <div class="col-sm-10">
                                                                <select class="semester custom-select" id="id_dosen"
                                                                    name="id_dosen">
                                                                    <option selected disabled>Pilih Dosen Pengajar
                                                                    </option>
                                                                    <?php 
                                                                    $resultDosen=dosen($con); 
                                                                    if(mysqli_num_rows($resultDosen))
                                                                    {
                                                                        while($rowDosen=mysqli_fetch_assoc($resultDosen))
                                                                        {
                                                                        ?>
                                                                    <option value="<?php echo $rowDosen["id_dosen"];?>">
                                                                        <?php echo $rowDosen["nama"];?></option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <button type="submit" name="insert"
                                                                    class="btn btn-success btn-tambahkan float-right">Tambahkan</button>
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
                                <button class="btn btn-success btn-mencari" type="submit">Cari</button>
                            </form>
                            <div class="scrolltable scrollbar-x">
                                <?php

                                    $resultJadwalKuliah=jadwalKuliah($con);
                                

                                if (mysqli_num_rows($resultJadwalKuliah) > 0){
                                ?>
                                <table class="table table-striped table-bordered text-center mt-3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Prodi</th>
                                            <th>Semester</th>
                                            <th>Jumlah Matkul</th>
                                            <th>Jumlah SKS</th>
                                            <th colspan="2">Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        while($row = mysqli_fetch_assoc($resultJadwalKuliah)){
                                            $idKelasFix = $row["id_kelas"];
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row["kode"]; ?>-<?php echo $row["tingkat"]; echo $row["kode_kelas"] ?>
                                            </td>
                                            <td><?php echo $row["nama"]; ?></td>
                                            <td><?php echo $row["semester"]; ?></td>
                                            <td><?php echo $row["jumlah_matkul"]; ?></td>
                                            <td><?php echo $row["jumlah_sks"]; ?></td>
                                            <td><button class="tmbl-table btn btn-primary"
                                                    id="<?php echo $row["id_kelas"]; ?>" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                                    class="edit">Edit</button></td>
                                            <td><button class="tmbl-table btn btn-danger"
                                                    id="<?php echo $row["id_kelas"]; ?>" type="button"
                                                    class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                                    class="hapus">Hapus</button></td>
                                        </tr>
                                        <?php
                                        $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } else { ?>
                            <div class="col-12 mt-5 text-center">
                                <i class="fas fa-search mb-3" style="font-size: 5em;"></i>
                                <p>Nama, kelas atau prodi tidak dapat ditemukan</h>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal hapus -->
        <div class="modal fade hapusJadwal-modal" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusTitle"
            aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content konten-modal">
                    <form action="../process/proses_adminJadwalKuliah.php?module=dataJadwalKuliah&act=hapus"
                        method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $idKelasFix; ?>">
                            <h5 class="isiHapusJadwal text-center">Apakah Anda Yakin?</h5>
                            <div class="tombolAksiHapusJadwal text-center">
                                <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                                <button type="submit" name="delete" class="btn btn-iya">Ya</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal edit -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="col-11 modal-title text-center">Edit Data Jadwal Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- isi -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <h5>Kelas : TI-2F</h5>
                    </div>
                    <div class="col-sm-9">
                        <h5>Semester : 4</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            <h6 class="mb-0">
                                Collapsible Group Item #1 <i class="fas fa-caret-down float-right"></i>
                            </h6>

                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="col-md-12 p-0">
                                    <form action="" method="post">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Jam</label>
                                                        <div class="col-sm-4">
                                                            <select class="semester custom-select">
                                                                <option selected>Mulai</option>
                                                                <option>07.00</option>
                                                                <option>07.45</option>
                                                                <option>08.30</option>
                                                                <option>08.40</option>
                                                                <option>09.15</option>
                                                                <option>09.30</option>
                                                                <option>09.45</option>
                                                                <option>10.00</option>
                                                                <option>10.35</option>
                                                                <option>10.45</option>
                                                                <option>11.00</option>
                                                                <option>12.30</option>
                                                                <option>12.45</option>
                                                                <option>13.15</option>
                                                                <option>13.35</option>
                                                                <option>13.45</option>
                                                                <option>14.25</option>
                                                                <option>14.30</option>
                                                                <option>15.15</option>
                                                                <option>15.30</option>
                                                                <option>16.15</option>
                                                                <option>16.20</option>
                                                                <option>16.40</option>
                                                                <option>17.10</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <center>
                                                                <h3>/</h3>
                                                            </center>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <select class="semester custom-select">
                                                                <option selected>Berakhir</option>
                                                                <option>07.45</option>
                                                                <option>07.50</option>
                                                                <option>08.30</option>
                                                                <option>08.40</option>
                                                                <option>09.15</option>
                                                                <option>09.30</option>
                                                                <option>09.45</option>
                                                                <option>10.00</option>
                                                                <option>10.35</option>
                                                                <option>10.45</option>
                                                                <option>11.00</option>
                                                                <option>12.30</option>
                                                                <option>12.45</option>
                                                                <option>13.15</option>
                                                                <option>13.35</option>
                                                                <option>13.45</option>
                                                                <option>14.25</option>
                                                                <option>14.30</option>
                                                                <option>15.15</option>
                                                                <option>15.30</option>
                                                                <option>16.15</option>
                                                                <option>16.20</option>
                                                                <option>16.40</option>
                                                                <option>17.10</option>
                                                                <option>18.00</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Hari</label>
                                                        <div class="col-sm-9">
                                                            <select class="semester custom-select">
                                                                <option selected>Pilih Hari</option>
                                                                <option>Senin</option>
                                                                <option>Selasa</option>
                                                                <option>Rabu</option>
                                                                <option>Kamis</option>
                                                                <option>Jum'at</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Dosen Pengajar</label>
                                                        <div class="col-sm-9">
                                                            <select class="semester custom-select">
                                                                <option selected>Pilih Dosen Pengajar</option>
                                                                <option>Bapak/Ibu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Ruangan</label>
                                                        <div class="col-sm-9">
                                                            <select class="semester custom-select">
                                                                <option selected>Pilih Ruangan</option>
                                                                <option>Ruangan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">SKS</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="sks" id="sks" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Mata Kuliah</label>
                                                        <div class="col-sm-9">
                                                            <select class="semester custom-select">
                                                                <option selected>Pilih Mata Kuliah</option>
                                                                <option>Proyek 1</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <button type="button"
                                                                class="btn btn-success float-right btn-edit">Edit</button>
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
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item #2
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                                squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                                nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Collapsible Group Item #3
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                                squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                                butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                                nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>