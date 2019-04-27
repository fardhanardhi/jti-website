<?php
include "../config/connection.php";

function khs($con, $kelas, $semester)
{
    $khs = "select distinct(a.id_mahasiswa), b.*, b.nim, 
    b.nama as nm_mahasiswa, c.*, SUM(c.sks) as sks , d.*, d.id_kelas, e.*, e.semester from 
    tabel_khs a, tabel_mahasiswa b, tabel_matkul c, tabel_kelas d, tabel_semester e
    where a.id_mahasiswa = b.id_mahasiswa
    and a.id_matkul = c.id_matkul
    and a.id_kelas = d.id_kelas
    and a.id_semester = e.id_semester
    and a.id_kelas = $kelas
    and a.id_semester = $semester group by a.id_mahasiswa";
    
    $resultTampilKhs = mysqli_query($con, $khs);
    return $resultTampilKhs;
}

function khsKelas($con, $kelas)
{
    $khsKelas = "select distinct(a.id_mahasiswa), b.*, b.nim, 
    b.nama as nm_mahasiswa, c.*, SUM(c.sks) as sks , d.*, d.id_kelas, e.*, e.semester , f.*, f.nama as nm_prodi,
    SUM(c.sks * a.nilai)/SUM(c.sks) as ip from 
    tabel_khs a, tabel_mahasiswa b, tabel_matkul c, tabel_kelas d, tabel_semester e, tabel_prodi f
    where a.id_mahasiswa = b.id_mahasiswa
    and a.id_matkul = c.id_matkul
    and a.id_kelas = d.id_kelas
    and d.id_prodi = f.id_prodi
    and a.id_semester = e.id_semester 
    and a.id_kelas = $kelas group by a.id_mahasiswa";

    $resultTampilKhsKelas = mysqli_query($con, $khsKelas);
    return $resultTampilKhsKelas;
}

function khsLihat($con)
{
    $khsLihat = "select distinct(a.id_mahasiswa), b.*, b.nim, 
    b.nama as nm_mahasiswa, c.*, SUM(c.sks) as sks , d.*, d.id_kelas, e.*, e.semester , f.*, f.nama as nm_prodi,
    SUM(c.sks * a.nilai)/SUM(c.sks) as ip from 
    tabel_khs a, tabel_mahasiswa b, tabel_matkul c, tabel_kelas d, tabel_semester e, tabel_prodi f
    where a.id_mahasiswa = b.id_mahasiswa
    and a.id_matkul = c.id_matkul
    and a.id_kelas = d.id_kelas
    and d.id_prodi = f.id_prodi
    and a.id_semester = e.id_semester group by a.id_mahasiswa";
    
    $resultTampilKhsLihat = mysqli_query($con, $khsLihat);
    return $resultTampilKhsLihat;
}

function khsNilai($con){
    $khsNilai = "select distinct(a.id_mahasiswa),
    a.nilai as nilai, b.*, c.*, c.nama as nm_matkul,
    c.sks as sks, c.jam as jam from tabel_khs a, tabel_mahasiswa b, tabel_matkul c
    where a.id_mahasiswa = b.id_mahasiswa
    and a.id_matkul = c.id_matkul group by a.id_mahasiswa";

    $resultTampilKhsNilai = mysqli_query($con, $khsNilai);
    return $resultTampilKhsNilai;
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

function tampilTahun($con){
    $tahun="select distinct(YEAR(waktu_edit)) as tahun from tabel_hasil_kuisioner order by waktu_edit desc limit 5";
    $resultTahun = mysqli_query($con, $tahun);
    return $resultTahun;
}

// function tampilKelasDis($con){
//     $tampilKelasDis = "select distinct(a.id_mahasiswa), 
//     b.*, c.* from tabel_kelas a, tabel_mahasiswa b, 
//     tabel_prodi c where 
//     a.id_mahasiswa = b.id_mahasiswa
//     and a.id_prodi=c.id_prodi group by a.id_mahasiswa";
//     $resultTampilKelasDis = mysqli_query($con, $tampilKelasDis);  
//     $rowKelasDis=mysqli_fetch_assoc($resultTampilKelasDis);
//     $hasil= $rowKelasDis["kode"]." - ".$rowKelasDis["tingkat"].$rowKelasDis["kode_kelas"];
//     return $hasil;
// }

function dosen($con)
{
    $dosen = "select * from tabel_dosen";

    $resultDosen = mysqli_query($con,$dosen);
    return $resultDosen;
}

function matkul($con)
{
    $matkul = "select * from tabel_matkul";

    $resultMatkul = mysqli_query($con,$matkul);
    return $resultMatkul;
}
?>