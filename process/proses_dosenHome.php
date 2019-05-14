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
?>