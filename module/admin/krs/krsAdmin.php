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
                            <li class="breadcrumb-item active" aria-current="page">Kartu Rencana Studi (KRS)</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
                <h5 class="border-bottom border-gray pb-2 mb-2">SEMESTER 4 (2019/2020)</h5>
                <div class="container-fluid mt-0 p-0 m-0">
                <form action="?module=krs" method="post">
                <div class="col-md-12 p-0">
                <select class="optionKelas custom-select" name="kelas" style="width:150px">
                <option value="0">Pilih Kelas</option>
                    <?php
                    $resultKelas=kelas($con);
                    if(mysqli_num_rows($resultKelas)){
                        while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                        ?>
                        <option value="<?php echo $rowKelas["id_kelas"];?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                        <?php
                        }
                    }else{
                        ?>
                        <option value="0">Kelas Kosong</option>
                        <?php
                    }
                    ?>
                    </select>
                    <input type="submit" name="searchKrs" class="btn btn-cari btn-success ml-2" value="Search">
                    
                    <a href="index.php?module=krsPerKelas" class="btn btn-lihat btn-primary float-right">Lihat
                                KRS</a>
                </div>
                    </form>
                            <div class="row scrollbar mr-0" id="cariKrs">
                                <div class="col-md-12 pr-1 d-flex justify-content-center">
                                    <?php
                                    if(isset($_POST["searchKrs"])){
                                    $result=krsCari($con, $_POST["kelas"]);
                                    }
                                    else{
                                    $result=krsCari($con, minKelas($con));
                                    }
                                    
                                    if (mysqli_num_rows($result) > 0){
                                    ?>
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
                                                <button type="button" class="btn btn-danger btn-hapus hapus-krs ml-2" id="<?php echo $row["id_krs"];?>"
                                                data-toggle="modal" data-target="#modalHapus">Hapus</button></td>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                            ?>
                                        </tbody>
                                        </table>
                                        <?php
                                        } else{
                                        ?>
                                        <div class="text-center">
                                        <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                                        <p class="text-muted">Data Tidak Ditemukan</p>
                                        </div>
                                        <?php
                                        }
                                    } else{
                                        ?>
                                        <div class="text-center">
                                        <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                                        <p class="text-muted">Data Tidak Ditemukan</p>
                                        </div>
                                        <?php
                                    }
                                        ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
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