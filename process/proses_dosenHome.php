<?php
include "../config/connection.php";

function tampilDataProfilDosen($con, $idUser){
 $tampilProfilDosen="SELECT * FROM tabel_dosen td INNER JOIN tabel_user tu
                     ON tu.username = td.nip where tu.id_user = '$idUser'";
 $resultTampilProfilDosen=mysqli_query($con, $tampilProfilDosen);
 return $resultTampilProfilDosen;
}

function ambilJadwalDosen($con, $idUser){
 $queryJadwalDosen = "SELECT tr.kode, tr.lantai, tm.sks, tj.jam_mulai, tj.jam_selesai, tj.hari, tm.nama 
                      FROM tabel_jadwal tj INNER JOIN tabel_dosen td
                      ON tj.id_dosen = td.id_dosen INNER JOIN tabel_matkul tm 
                      ON tj.id_matkul = tm.id_matkul INNER JOIN tabel_ruang tr
                      ON tj.id_ruang = tr.id_ruang WHERE td.id_user = '$idUser'";
 $resultQueryJadwalDosen = mysqli_query($con, $queryJadwalDosen);
 return $resultQueryJadwalDosen;
}

function tampilTaskDosen($con, $idUser){
 $queryTask = "SELECT td.id_dosen, tt.id_task, tt.pekerjaan, tt.kuota FROM tabel_task tt INNER JOIN tabel_dosen td
               ON tt.id_dosen = td.id_dosen WHERE td.id_user = '$idUser' AND tt.status='1'";
 $resultQueryTask = mysqli_query($con, $queryTask);
 return $resultQueryTask;
}

function ambilIdDosen($con, $idUser){
 $queryAmbilId = "SELECT td.id_dosen FROM tabel_dosen td WHERE td.id_user='$idUser'";
 $resultQueryAmbilId = mysqli_query($con, $queryAmbilId);
 $resultFinal = mysqli_fetch_assoc($resultQueryAmbilId);
 return $resultFinal["id_dosen"];
}

function SumbitKompenDosen($con, $idDosenKompen, $idTask){
  $queryDosenKompen = "UPDATE tabel_task SET status='0' 
                      where id_dosen='$idDosenKompen' AND id_task='$idTask'";
  $resultQueryDosenKompen = mysqli_query($con,$queryDosenKompen);
}

if(isset($_POST["tambahTask"]) || isset($_POST["submitKompenDosen"]) || isset($_POST["hapusTask"])){

 if($_GET["module"]=="home" && $_GET["act"]=="tambah"){
   $result=ambilIdDosen($con,$_POST["idDosen"]);
   $tambahTaskQuery= "INSERT INTO tabel_task (pekerjaan, kuota, id_dosen)  
                   VALUES ('$_POST[taskPekerjaan]','$_POST[kuotaMhs]', $result)";
   mysqli_query($con, $tambahTaskQuery);
   header('location:../module/index.php?module=' . $_GET["module"]);
 }
 
 else if($_GET["module"]=="home" && $_GET["act"]=="hapus"){
   $hapusTask="DELETE FROM tabel_task WHERE id_task='$_POST[idTask]'";
   mysqli_query($con, $hapusTask);
   header('location:../module/index.php?module=' . $_GET["module"]);
 }

 else if($_GET["module"]=="home" && $_GET["act"]=="sumbitTask"){
  SumbitKompenDosen($con, $_POST['idDsnSubmitKmpn'], $_POST['idTask'] );
  header('location:../module/index.php?module=' . $_GET["module"]);
  }
}


?>

<?php
if(isset($_POST["kompenDosenSumbit"])){
  // $resultQueryDosenKompen=SumbitKompenDosen($con, $_POST['idDosenKmpn'], $_POST["idTaskKmpn"]);
  $resultQueryTask= tampilTaskDosen($con, $idUser);
  $index=1;
  if (mysqli_num_rows($resultQueryTask) > 0){
    while ($row = mysqli_fetch_assoc($resultQueryTask)) {
      ?>
      <div class="col-md-7">
        <div class="row">
          <div class="col-md-1 my-auto">
          <?= $index ?>.
          <input type="hidden" id="idDsnSubmitKmpn" value="<?= $row['id_dosen']?>">
          <input type="hidden" id="idTask" value="<?= $row['id_task']?>">
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-12">
                <?= $row["pekerjaan"]?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                kuota: <?= $row["kuota"]?> mahasiswa
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 my-auto">
        <button type="submit" class="btn btn-success kompen-submit-btn" id="submitKompenDosen">Submit</button>
      </div>
      <div class="col-md-auto my-auto">
        <div class="dropdown">
          <a data-toggle="dropdown"><i class="fa fa-ellipsis-v fa-2x waves-effect"></i></a>
          <div class="dropdown-kompen dropdown-menu">
            <a class="dropdown-item" data-toggle="modal" data-target="#hapusKompen<?= $row["id_task"]?>"><i class="far fa-trash-alt"></i> Hapus</a>
          </div>
        </div>
      </div>
    
      <?php
    }
  }else{
      ?>
      <div class="text-center">
        <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
        <p class="text-muted">Tidak ada beasiswa pada "<?php echo tampilTanggal(formatTanggalBeasiswa($_POST["tanggal"]));?>"</p>
      </div>
      <?php
  }
}
?>