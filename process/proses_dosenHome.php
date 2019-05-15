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
 $queryTask = "SELECT tt.id_task, tt.pekerjaan, tt.kuota FROM tabel_task tt INNER JOIN tabel_dosen td
               ON tt.id_dosen = td.id_dosen WHERE td.id_user = '$idUser'";
 $resultQueryTask = mysqli_query($con, $queryTask);
 return $resultQueryTask;
}

function ambilIdDosen($con, $idUser){
 $queryAmbilId = "SELECT td.id_dosen FROM tabel_dosen td WHERE td.id_user='$idUser'";
 $resultQueryAmbilId = mysqli_query($con, $queryAmbilId);
 $resultFinal = mysqli_fetch_assoc($resultQueryAmbilId);
 return $resultFinal["id_dosen"];
}

if(isset($_POST["tambahTask"]) || isset($_POST["editIsi"]) || isset($_POST["hapusTask"])){

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
}

?>