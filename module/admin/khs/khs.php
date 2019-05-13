<?php
  include "../config/connection.php";
  include "../process/proses_khs.php";
?>

<body>
    <main role="main" class="container-fluid">
        <div id="khs" class="row">
            <!-- breadcrumb -->
            <div class="col-md-12 p-0">
                <div class="m-2 bg-white shadow-sm rounded">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="pr-4 title">
                                <a href="#"><strong>Kartu Hasil Studi</strong></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="index.php?module=khs">Kartu Hasil Studi(KHS)</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- breadcrumb end-->
            <!-- isi -->
            <div class="col-md-12 p-0">
                <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
                    <div class="container-fluid mt-0 p-0 m-0">
                        <h4>SEMESTER 4 (2019/2020)</h4>
                        <hr>
                        <form action="?module=khs" method="post">
                            <!-- pencarian kelas -->
                            <div class="col-md-12 p-0 d-flex">
                                <select class="form-control form-control-sm w-auto mr-1" name="kelas">
                                    <option value="0" class="text">Pilih Kelas</option>
                                    <?php
                                    $resultKelas=kelas($con);
                                    if(mysqli_num_rows($resultKelas)){
                                        while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                                            ?>
                                            <option value="<?php echo $rowKelas["id_kelas"];?>">
                                            <?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <option value="0">Kelas Kosong</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <input type="submit" class="tmbl-filter btn btn-success ml-3" value="Search" name="cariKhsKelas">
                                <input type="button" class="tmbl-ruangan btn btn-info ml-auto" value="Lihat KHS" onclick="window.location.href = 'index.php?module=khsLihat';">
                            </div>
                            <!-- pencarian kelas end-->
                        </form>
                        <!-- Tabel -->
                        <div class="media text-muted pt-8">
                            <!-- isi tabel -->
                            <div class="media-body pb-8 mb-0">
                                <?php
                                    if(isset($_POST["cariKhsKelas"])){
                                        $result=khsKelas($con, $_POST["kelas"]);
                                    }
                                    else{
                                        $result=khsKelas($con, minKelas($con));
                                    }
                                    
                                    if (mysqli_num_rows($result) > 0){
                                    ?>
                                    <table class="table table-striped table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Semester</th>
                                            <th>SKS</th>
                                            <th>IP</th>
                                            <th>Proses</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(mysqli_num_rows($result) > 0){
                                                $no=1;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    if(khsNilai($con, $row["id_mahasiswa"], $row["id_semester"])!=0){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $row["nim"];?></td>
                                                        <td><?php echo $row["nm_mahasiswa"];?></td>
                                                        <td><?php echo $row["semester"];?></td>
                                                        <td><?php echo $row["sks"];?></td>
                                                        <td><?php echo khsNilai($con, $row["id_mahasiswa"], $row["id_semester"]) ?></td>
                                                        <td><button class="edit tmbl-table btn btn-success" type="button" class="pratinjau btn" data-toggle="modal"
                                                            data-target="#myModal" class="edit">Edit</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    } else if(khsNilai($con, $row["id_mahasiswa"], $row["id_semester"])==0){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $row["nim"];?></td>
                                                        <td><?php echo $row["nm_mahasiswa"];?></td>
                                                        <td><?php echo $row["semester"];?></td>
                                                        <td><?php echo $row["sks"];?></td>
                                                        <td><?php echo khsNilai($con, $row["id_mahasiswa"], $row["id_semester"]) ?></td>
                                                        <td><button class="lihat tmbl-table btn btn-info" type="button" class="pratinjau btn" data-toggle="modal"
                                                            data-target="#myModal" class="edit">Update</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                $no++;
                                                }
                                                ?>
                                        </tbody>
                                        <?php
                                        } else{
                                        ?>
                                        <div class="text-center">
                                            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                                            <p class="text-muted">Mahasiswa Tidak Ditemukan</p>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    } else{
                                    ?>
                                    <div class="text-center">
                                        <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                                        <p class="text-muted">Data Mahasiswa Per-Kelas Tidak Ditemukan</p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                            </div>
                            <!-- isi tabel end -->
                        </div>
                        <!-- Tabel end-->
                    </div>
                </div>
            </div>
            <!-- Modal Lihat-->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100">Kartu Hasil Studi</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Header End-->
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="isi-modaLihat">
                                <p>Nama : Mahasiswa A</p>
                                <p>Nim : 1741720060</p>                                    
                            </div>
                            <form action="">
                                <div class="border-bottom border-gray">
                                    <div class="row">
                                        <div class="col-sm-5">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="row isi-modaLihat">
                                                <p class="col">A</p>
                                                <p class="col">B+</p>
                                                <p class="col">B</p>
                                                <p class="col">C</p>
                                                <p class="col">C+</p>
                                                <p class="col">D</p>
                                                <p class="col">E</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal isi-->
                                <div>
                                    <div class="row isi-modaLihat">
                                        <div class="col-sm-5">
                                            <p>Sistem Manajemen Basis Data</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="col"><input type="radio" name="name1" value="nilai1" /></div>
                                                <div class="col"><input type="radio" name="name1" value="nilai2" /></div>
                                                <div class="col"><input type="radio" name="name1" value="nilai3" /></div>
                                                <div class="col"><input type="radio" name="name1" value="nilai4" /></div>
                                                <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                                <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                                <div class="col"><input type="radio" name="name1" value="nilai5" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal isi End-->
                            </form>
                        </div>
                        <!-- Modal body End-->
                        <div class="modal-footer">
                            <button type="button" class="tmbl-kirim btn btn-success float-right">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Lihat END-->
        </div>
    </main>
<body>