<?php
  include "../config/connection.php";
  include "../process/proses_khs.php";
?>
<body onload="setup();">
<main role="main" class="container-fluid">
    <div id="khs" class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="pr-4 title"><a href="#"><strong>Lihat KHS</strong></a></li>
                        <li class="breadcrumb-item"><a href="?module=home">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="index.php?module=khs">Kartu Hasil Studi(KHS)</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.php?module=khsLihat">Lihat KHS</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <h4>Daftar Kartu Hasil Studi</h4>
                <hr>
                <form action="?module=khsLihat" method="post">
                <select class="kelas custom-select" style="width:150px" name="kelas">
                    <option value="0">Pilih Kelas</option>
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
                <select class="kelas custom-select ml-3" style="width:150px" name="semester">
                    <option value="0">Pilih Semester</option>
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
                <input type="submit" value="Cari" class="tmbl-filter btn btn-success ml-3" name="cariKhs">
                </form>
                <div class="media text-muted pt-8">
                    <div class="media-body pb-8 mb-0">
                    <?php
                        if(isset($_POST["cariKhs"])){
                            $result=khs($con, $_POST["kelas"], $_POST["semester"]);
                        }
                        else{
                            $result = khsLihat($con);
                        }
                        if(mysqli_num_rows($result) > 0){
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
                                $no=1;
                                if(mysqli_num_rows($result) > 0){
                                    
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row["nim"];?></td>
                                    <td><?php echo $row["nm_mahasiswa"];?></td>
                                    <td><?php echo $row["sks"];?></td>
                                    <td><?php echo "<button class='tmbl-table lihat btn btn-info' type='button' class='pratinjau btn' 
                                    data-toggle='modal' data-target='#myModal".$no."' class='edit'>Lihat</button>"?>
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
                    }else{
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
        <?php 
            #include('khsModalLihat.php');
        ?>
    </div>
</main>