<?php

include "../config/connection.php";
include "../process/proses_jadwalKuliah.php";

$idUser = $_SESSION['id'];

$queryUser = "SELECT a.*, b.*, c.nama as prodi FROM tabel_user a, tabel_mahasiswa b, tabel_prodi c WHERE a.id_user=$idUser and a.id_user=b.id_user and b.id_prodi = c.id_prodi";
$resultUser = mysqli_query($con, $queryUser);
$rowUser = mysqli_fetch_assoc($resultUser);

$idMhsUser = $rowUser["id_mahasiswa"];
$namaUser = $rowUser["nama"];
$nimUser = $rowUser["nim"];
$namaProdiUser = $rowUser["prodi"];
$prodiUser = $rowUser["id_prodi"];
$kelasUser = $rowUser["id_kelas"];

?>

<main role="main" class="container-fluid">
  <div id="jadwal" class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <nav class="nav nav-underline">
          <span class="nav-link">JADWAL PERKULIAHAN</span>
        </nav>
      </div>
    </div>
    <div class="col-md-3 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125">
            <center><img src="../attachment/img/avatar.jpeg" class="gambar-profil img-circle" height="170" width="170">
            </center>
            <br><br>
            <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $namaUser; ?></h5>
            <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $nimUser; ?></h5>
            <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $namaProdiUser; ?></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-2">Jadwal Kuliah</h6>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125">
            <strong class="d-block text-dark">Periode Semester</strong>
          </p>
        </div>
        <!-- jika sudah terverifikasi -->
        <?php
        if(isset($_POST["cariJadwal"]))
        { 
          $queryVerifikasi = jadwalKuliahCariStatusVerifikasi($con,$idMhsUser,$_POST["semester"]);
          $resultVerifikasi = mysqli_fetch_assoc($queryVerifikasi);
          if($resultVerifikasi["status_verifikasi"] == "Sudah")
          {
          ?>
          <div class="col-md-12 p-1 text-center alert alert-success alert-dismissible fade show" role="alert">
              <p>Sudah Terverifikasi oleh DPA</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <!-- end if -->
        <?php } else {}
        } ?>
        <form action="?module=jadwal" class="p-0 m-0" method="post">
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
          <button type="submit" name="cariJadwal" class="tmbl-filter btn btn-success ml-2">Filter</button>
          <a href="?module=kelasKosong"><button type="button"
              class="tmbl-ruangan btn btn-info float-right">Ruangan</button></a>
        </form>
        <br>
        <?php
        if(isset($_POST["cariJadwal"])){
          $resultJadwalKuliah = jadwalKuliahCariSemester($con,$prodiUser,$kelasUser,$_POST["semester"]);
        }
        else{
          $resultJadwalKuliah = jadwalKuliah($con,$prodiUser,$kelasUser);
        }
        if (mysqli_num_rows($resultJadwalKuliah) > 0)
        {
        ?>
        <table class="table table-striped table-bordered">
          <thead class="text-white bg-blue">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Mata Kuliah</th>
              <th scope="col">Dosen</th>
              <th scope="col">Hari</th>
              <th scope="col">SKS/JAM</th>
              <th scope="col">Ruang</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              while($row = mysqli_fetch_assoc($resultJadwalKuliah)){
              ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $row["nm_matkul"]; ?></td>
              <td><?php echo $row["nama"]; ?></td>
              <td><?php echo $row["hari"]; ?></td>
              <td><?php echo $row["sks"]; ?> SKS / <?php echo $row["jam"]; ?> JAM</td>
              <td><?php echo $row["kode"]; ?> (Lt<?php echo $row["lantai"]; ?>)</td>
            </tr>
            <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
      <?php } else { ?>
      <center>
        <div class="warna-card col-md-12 border border-danger mt-3">
          <div class="teks card-body" style="position: center">
            <!-- <p class="card-title">| <img src="../img/navigation/icon.svg"></a> Informasi|</p> -->
            <p class="card-title">| <i class="fas fa-info"></i> Informasi |</p>

            <p class="card-text">- Anda belum menempuh semester ini</p>
          </div>
      </center>
      <?php } ?>
    </div>