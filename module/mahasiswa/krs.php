<?php

include "../config/connection.php";
include "../process/proses_krs.php";

$idUser = $_SESSION['id'];

$queryUser = "SELECT a.*, b.*, c.nama as prodi, c.kode, d.tingkat, d.kode_kelas FROM tabel_user a, tabel_mahasiswa b, tabel_prodi c,tabel_kelas d WHERE a.id_user=b.id_user and b.id_prodi = c.id_prodi 
and b.id_kelas = d.id_kelas and a.id_user=$idUser";
$resultUser = mysqli_query($con, $queryUser);
$rowUser = mysqli_fetch_assoc($resultUser);

$namaUser = $rowUser["nama"];
$nimUser = $rowUser["nim"];
$namaProdiUser = $rowUser["prodi"];
$kodeProdiUser = $rowUser["kode"];
$tingkatUser = $rowUser["tingkat"];
$kodeKelasUser = $rowUser["kode_kelas"];

$idMahasiswaUser = $rowUser["id_mahasiswa"];

// $prodiUser = $rowUser["id_prodi"];
// $kelasUser = $rowUser["id_kelas"];

$row = 0;
$statusVerifikasi = '';

?>

<main role="main" class="container-fluid">
    <div id="krs" class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <nav class="nav nav-underline">
                    <span class="nav-link">KARTU RENCANA STUDI</span>
                </nav>
            </div>
        </div>
        <div class="col-md-3 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <div class="media text-muted pt-3">
                    <div class="media-body pb-3 mb-0 small lh-125">
                        <center><img src="../attachment/img/avatar.jpeg" class="gambar-profil img-circle" height="170"
                                width="170">
                        </center>
                        <br><br>
                        <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $namaUser; ?></h5>
                        <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $nimUser; ?></h5>
                        <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $namaProdiUser; ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-2">SEMESTER 4 (2019/2020) | <?php echo $namaProdiUser; ?> -
                    <?php echo $kodeProdiUser; ?>-<?php echo $tingkatUser; echo $kodeKelasUser; ?></h6>
                <center>
                    <?php 
                    if($row != 0)
                    {
                    ?>
                    <div class="warna-card col-md-12 mt-3 p-2">
                        <p class="card-title">Belum terverifikasi oleh DPA</p>
                    </div>
                    <?php
                    }
                    ?>
                </center>
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125">
                        <strong class="d-block text-dark">Periode Semester</strong>
                    </p>
                </div>
                <form action="?module=krs" class="p-0 m-0" method="post">
                    <select class="semester custom-select" style="width:250px" name="semester">
                        <option selected disabled>-</option>
                        <?php 
                        $resultSemester=semester($con); 
                        if(mysqli_num_rows($resultSemester))
                        {
                            while($rowSemester=mysqli_fetch_assoc($resultSemester))
                            {
                            if($rowSemester["id_semester"] == $_POST["semester"])
                            {
                                $selected = "selected";
                            }
                            else
                            {
                                $selected = "";
                            }
                            ?>
                        <option <?php echo $selected; ?> value="<?php echo $rowSemester["id_semester"];?>">
                            Semester <?php echo $rowSemester["semester"];?>
                        </option>
                        <?php
                            }
                        }
                    ?>
                    </select>
                    <button type="submit" name="cariKrs" class="tmbl-filter btn btn-success ml-2">Filter</button>
                    <?php
                    if($statusVerifikasi == "Belum")
                    {
                    ?>
                    <button type="button" class="btn btn-success float-right">Kirim ke DPA &nbsp&nbsp<i
                        class="fas fa-arrow-circle-up"></i></button>
                    <?php
                    }
                    ?>
                </form>

                
                <br><br>
                <?php
                if(isset($_POST["cariKrs"]))
                {
                    $resultKrs = krsCariSemester($con,$idMahasiswaUser,$_POST["semester"]);
                    $row = mysqli_fetch_assoc($resultKrs);
                    $statusVerifikasi = $row["status_verifikasi"];
                }
                ?>

                <?php  
                if($row["status_daftar_ulang"] == "Sudah")
                {
                ?>
                    <img src="../attachment/img/krs.png" width="100%" alt="">
                <?php
                }
                else if($row["status_daftar_ulang"] == "Belum")
                {
                ?>
                    <center>
                        <div class="warna-card col-md-12 border border-danger mt-3">
                            <div class="teks card-body" style="position: center">
                                <!-- <p class="card-title">| <img src="../img/navigation/icon.svg"></a> Informasi|</p> -->
                                <p class="card-title">| <i class="fas fa-info"></i> Informasi |</p>
                                <p class="card-text" style="color:#950101">*Tidak dapat menampilkan data*</p>
                                <p class="card-text">- Mahasiswa wajib membayar UKT sebelum masa KRS</p>
                            </div>
                    </center>
                <?php
                }
                else
                {}
                ?>
            </div>
        </div>