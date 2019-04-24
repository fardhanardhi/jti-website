<?php
  include "../config/connection.php";
  include "../process/proses_khs.php";
?>
<main role="main" class="container-fluid">
    <div id="khs" class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="pr-4 title"><a href="#"><strong>Kartu Hasil Studi</strong></a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.php?module=khsUpload">Kartu Hasil Studi(KHS)</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <h4>SEMESTER 4 (2019/2020)</h4>
                <hr>
                <form action="?module=khs" method="post">
                <select class="kelas custom-select" style="width:150px">
                    <option selected>Pilih Kelas</option>
                    <?php
                  $resultKelas=kelas($con);
                  if(mysqli_num_rows($resultKelas)){
                    while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                      ?>
                      <option value="<?php echo $rowKelas["id_kelas"];?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
                <input type="submit" class="tmbl-filter btn btn-success ml-3" value="Cari">
                <a href ="index.php?module=khsLihat" class="tmbl-ruangan btn btn-info float-right">Lihat KHS</a>
                </form>
                <div class="media text-muted pt-8">
                    <div class="media-body pb-8 mb-0">
                    <?php
                        $resultTampilKhsLihat=khsLihat($con);
                        if(mysqli_num_rows($resultTampilKhsLihat) > 0){
                        ?>
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>SKS</th>
                                    <th>IP</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no=1;
                                while($row = mysqli_fetch_assoc($resultTampilKhsLihat)){
                                    ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row["nim"];?></td>
                                    <td><?php echo $row["nm_mahasiswa"];?></td>
                                    <td><?php echo $row["sks"];?></td>
                                    <td><?php echo $row["ip"];?></td>
                                    <td><button class="lihat tmbl-table btn btn-info" type="button" class="pratinjau btn" data-toggle="modal"
                                            data-target="#myModal" class="edit">Edit</button>
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
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
                    </div>
                </div>
            </div>
            <?php 
            include('khsUploadModal.php');
        ?>
        </div>
    </div>
</main>