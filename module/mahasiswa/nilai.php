<?php

include "../config/connection.php";

$idUser = $_SESSION['id'];

$queryUser = "SELECT a.*, b.*, c.nama as prodi FROM tabel_user a, tabel_mahasiswa b, tabel_prodi c WHERE a.id_user=$idUser and a.id_user=b.id_user and b.id_prodi = c.id_prodi";
$resultUser = mysqli_query($con, $queryUser);
$rowUser = mysqli_fetch_assoc($resultUser);

$namaUser = $rowUser["nama"];
$nimUser = $rowUser["nim"];
$prodiUser = $rowUser["prodi"];

?>

<main role="main" class="container-fluid">
    <div id="nilai" class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <nav class="nav nav-underline">
                <h5><span class="nav-link">KARTU HASIL STUDI</span></h5>
                </nav>
            </div>
        </div>
        <div class="col-md-3 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <div class="media text-muted pt-3">
                    <div class="media-body pb-3 mb-0 small lh-125">
                        <center><img src="../attachment/img/avatar.jpeg" class="gambar-profil img-circle" height="170" width="170"></center>
                        <br><br>
                        <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $namaUser; ?></h6>
                        <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $nimUser; ?></h6>
                        <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $prodiUser; ?></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">TRANSKIP NILAI</h6>
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125">
                    <strong class="d-block text-dark">Nilai Akademik Per Semester</strong>
                    </p>
                </div>
            
                <select class="semester custom-select" style="width:216px">
                    <option selected>-</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="3">Semester 4</option>
                    <option value="3">Semester 5</option>
                    <option value="3">Semester 6</option>
                    <option value="3">Semester 7</option>
                    <option value="3">Semester 8</option>
                </select>
                <button type="button" class="tmbl-filter btn btn-success">Filter</button><br><br>

                <p>Indeks Prestasi Semester: </p>
                <p>Indeks Prestasi Kumulatif: </p>

                <table class="table table-striped table-bordered">
                    <thead class="text-white bg-blue">
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Jam</th>
                            <th>Nilai</th>
                            <!-- <th>Nilai</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT 
                            -- tabel_matkul.id_matkul,
                            tabel_matkul.nama, 
                            tabel_matkul.sks,
                            tabel_matkul.jam,

                            tabel_khs.nilai

                            FROM tabel_matkul INNER JOIN
                            tabel_khs ON 
                            tabel_matkul.id_matkul = tabel_khs.id_matkul
                            ";
                            
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                                $index = 1;
                                while($row = mysqli_fetch_assoc($result)){
                                    $id_khs = $row["nilai"];
                                    echo"
                                    <tr>
                                        <td>". $index++ ."</td>
                                        
                                        <td>". $row["nama"] ."</td>
                                        <td>". $row["sks"] ."</td>
                                        <td>". $row["jam"] ."</td>
                                        <td>". $row["nilai"] ."</td>
                                    </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>

                <center>
                <div class="warna-card col-md-12 border border-danger mt-3">
                    <div class="teks card-body" style="position: center">
                        <!-- <p class="card-title">| <img src="../img/navigation/icon.svg"></a> Informasi|</p> -->
                        <p class="card-title">| <i class="fas fa-info"></i>  Informasi |</p>
                        <p class="card-text" style="color:#950101">*Tidak dapat menampilkan data*</p>
                        <p class="card-text">- Anda belum menempuh semester ini</p>
                    </div>
                </center>
                </div>
            </div>
        </div>
    </div>
</main>