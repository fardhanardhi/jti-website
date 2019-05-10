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
                                <a href="#"><strong>Lihat KHS</strong></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="?module=home">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="index.php?module=khs">Kartu Hasil Studi(KHS)</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Lihat KHS
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
                        <form action="?module=khsLihat" method="post">
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
                                <select class="form-control form-control-sm w-auto mr-1" name="semester">
                                    <option value="0">Pilih Semester</option>
                                    <?php
                                    $resultSemester=tampilSemester($con);
                                        if(mysqli_num_rows($resultSemester)){
                                            while($rowSemester=mysqli_fetch_assoc($resultSemester)){
                                            ?>
                                                <option value="<?php echo $rowSemester["id_semester"];?>">Semester <?php echo $rowSemester["semester"];?></option>
                                            <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <input type="submit" class="tmbl-filter btn btn-success ml-3" value="Search" name="cariKhs">
                            </div>
                            <!-- pencarian kelas end-->
                        </form>
                        <!-- Tabel -->
                        <div class="media text-muted pt-8">
                            <!-- isi tabel -->
                            <div class="media-body pb-8 mb-0">
                                <?php
                                    if(isset($_POST["cariKhs"])){
                                        $result=khs($con, $_POST["kelas"], $_POST["semester"]);
                                    }
                                    else{
                                        $result = khsLihat($con);
                                    }
                                    
                                    if (mysqli_num_rows($result) > 0){
                                    ?>
                                    <table class="table table-striped table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>SKS</th>
                                            <th>Proses</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(mysqli_num_rows($result) > 0){
                                                $no=1;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $row["nim"];?></td>
                                                        <td><?php echo $row["nm_mahasiswa"];?></td>
                                                        <td><?php echo $row["sks"];?></td>
                                                        <td><button class='tmbl-table lihat btn btn-info tampil-detail' type='button' class='pratinjau btn' 
                                                            data-toggle='modal' data-target='#myModal' class='edit' data-mhs="<?php echo $row["id_mahasiswa"];?>" data-semester="<?php echo $row["id_semester"];?>">Lihat</button>
                                                        </td>
                                                    </tr>
                                                    <?php
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
                                        <p class="text-muted">Data Mahasiswa Tidak Ditemukan</p>
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
                    <div class="modal-content pl-3 pr-3 text-left">
                        <!-- Modal Header -->
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100">Kartu Hasil Studi</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="container-fluid p-0" id="detail-nilaiMhs">
                        <!-- Modal Header End-->
                        <!-- Modal body -->
                        <!-- Modal body End-->
                    </div>
                </div>
            </div>
            <!-- Modal Lihat END-->
        </div>
    </main>
<body>