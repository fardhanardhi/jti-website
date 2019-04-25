<?php
include "../config/connection.php";

function krs($con)
{
    $krs = "SELECT DISTINCT tabel_krs_admin.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs_admin.status_daftar_ulang, tabel_krs_admin.gambar_krs
    FROM tabel_krs_admin INNER JOIN tabel_mahasiswa ON tabel_krs_admin.id_mahasiswa = tabel_mahasiswa.id_mahasiswa";
    
    $resultTampilKrs = mysqli_query($con, $krs);
    return $resultTampilKrs;
}

function kelas($con){
    $kelas="select * from tabel_kelas";
    $resultKelas = mysqli_query($con, $kelas);
    return $resultKelas;
}

function tampilSemester($con){
    $semester="select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

function tampilKelas($con, $id_kelas){
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
}
?>