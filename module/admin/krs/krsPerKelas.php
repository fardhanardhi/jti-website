<?php
  include "../config/connection.php";
  include "../process/proses_krsAdmin.php";
?>

<body onload="setup();">
    <main role="main" class="container-fluid">
        <div id="krsAdmin" class="row">
            <div class="col-md-12 p-0">
                <div class="m-2 bg-white shadow-sm rounded">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="pr-4 title"><a href="index.php?module=krs"><strong>Kartu Rencana
                                        Studi</strong></a></li>
                            <li class="breadcrumb-item"><a href="index.php?module=krs">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="index.php?module=krs">Kartu
                                    Rencana Studi (KRS)</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lihat KRS per Kelas</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-md-12 p-0">
                <div class="m-2 p-3 bg-white rounded shadow-sm">
                    <div class="col-md-12 p-0">
                        <select class="optionKelas custom-select" name="kelas" style="width:150px">
                            <form action="?module=krsPerKelas" method="post">
                                <option value="0">Pilih Kelas</option>
                                <?php
                  $resultKelas=kelas($con);
                  if(mysqli_num_rows($resultKelas)){
                    while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                      ?>
                                <option value="<?php echo $rowKelas["id_kelas"];?>">
                                    <?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                        <select class="optionSemester custom-select" name="semester" style="width:150px">
                            <option value="0">Pilih Semester</option>
                            <?php
                    $resultSemester=tampilSemester($con);
                    if(mysqli_num_rows($resultSemester)){
                      while($rowSemester=mysqli_fetch_assoc($resultSemester)){
                        ?>
                            <option value="<?php echo $rowSemester["id_semester"];?>">
                                <?php echo $rowSemester["semester"];?></option>
                            <?php
                            }
                            }
                        ?>
                        </select>
                        <button type="button" class="btn btn-cari btn-success ml-2">Cari</button>
                        </form>
                        <br><br>
                        <table class="table tabel table-bordered">
                            <thead class="text-white bg-blue">
                                <tr>
                                    <th scope="col" style="text-align:center">No</th>
                                    <th scope="col" style="text-align:center; width: 300px">NIM</th>
                                    <th scope="col" style="text-align:center; width: 600px">Nama Mahasiswa</th>
                                    <th scope="col" style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result=krs($con);
                                    if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        if($row["status_daftar_ulang"]=="Sudah" && $row["gambar_krs"]==NULL){
                                            ?>
                                            <tr class="ukt-lunas-belum-upload">
                                            <td><?php echo $row["id_krs"]?></td>
                                            <td><?php echo $row["nim"]?></td>
                                            <td><?php echo $row["nama"]?></td>
                                            <td>
                                            <input id="fileid" type="file" name= "filename" hidden required />
                                            <input id="buttonid" type="button" value="Upload" class="btn  btn-upload btn-success ml-2"/>
                                            </td>
                                        </tr>
                                        <?php
                                        } else if($row["status_daftar_ulang"]=="Belum"){
                                            ?>
                                            <tr class="ukt-belum-lunas">
                                            <td><?php echo $row["id_krs"]?></td>
                                            <td><?php echo $row["nim"]?></td>
                                            <td><?php echo $row["nama"]?></td>
                                            <td>
                                            <input id="fileid" type="file" name= "filename" hidden required />
                                            <input id="buttonid" type="button" value="Upload" class="btn btn-upload btn-success ml-2"
                                            style="visibility: hidden"/>
                                            </td>
                                            </tr>
                                            <?php
                                        } else if($row["status_daftar_ulang"]=="Sudah" && $row["gambar_krs"]!=NULL){
                                            $id_krs = $row["id_krs"];
                                            ?>
                                            <tr class="ukt-lunas-sudah-upload">
                                            <td><?php echo $row["id_krs"]?></td>
                                            <td><?php echo $row["nim"]?></td>
                                            <td><?php echo $row["nama"]?></td>
                                            <td><button type="button" class="btn btn-lihat btn-primary tmbl-lihat ml-2" data-toggle="modal"
                                            data-target="#modalGambar">Lihat</button>
                                            <button type="submit" class="btn btn-danger btn-hapus ml-2" id="<?php echo $row["id_krs"];?>"
                                            data-toggle="modal" data-target="#modalHapus">Hapus</button></td>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                ?>
                                </tbody>
                            <?php 
                        }else{
                            ?>
                            <div class="text-center">
                            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                            <p class="text-muted">Mahasiswa Tidak Ditemukan</p>
                            </div>
                            <?php
                        }
                        ?>
                        </table>
                        <!-- Modal Hapus-->
                        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapus"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <form action="../process/proses_krsAdmin.php?module=krs&act=hapus" method="post">
                                    <div class="modal-body pt-5 text-center">
                                    <input type="hidden" name="id_krs" id="id_krsHapus">
                                    <strong>Apakah Anda yakin?</strong>
                                    </div>
                                    <div class="pb-4 pt-4 d-flex justify-content-around">
                                    <button type="button" class="btn btn-tidak btn-danger btn-confirm" data-dismiss="modal">Tidak</button>
                                    <button type="submit" name="hapusKrs" class="btn btn-ya btn-success btn-confirm">Ya</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <!-- End Modal Hapus -->
                        </div>
                        
                        <div class="modal fade" id="modalGambar" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="padding:10px">
                                    <center>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="false">&times;</span></button>
                                        <img src="../attachment/img/krs1.png" width="100%" alt="">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>