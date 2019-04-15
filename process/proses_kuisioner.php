<?php
include "../config/connection.php";

function kuisioner($con, $tahun, $semester)
{
  $kuisioner = "select distinct(a.id_dosen), b.*, b.nama as namaDosen, c.id_semester, d.* from tabel_hasil_kuisioner a, tabel_dosen b, tabel_mahasiswa c, tabel_semester d where a.id_dosen=b.id_dosen and a.id_mahasiswa=c.id_mahasiswa and c.id_semester=d.id_semester and YEAR(a.waktu_edit)=$tahun and c.id_semester=$semester";
  $resultKuisioner = mysqli_query($con, $kuisioner);
  return $resultKuisioner;
}

function kuisionerCariDosen($con, $txtCariDosen){
  $kuisionerCariDosen="select distinct(a.id_dosen), b.*, b.nama as namaDosen, c.id_semester from tabel_hasil_kuisioner a, tabel_dosen b, tabel_mahasiswa c where a.id_dosen=b.id_dosen and a.id_mahasiswa=c.id_mahasiswa and (b.nama like '%$txtCariDosen%' or b.nip like '%$txtCariDosen%')";
  $resultKuisionerCariDosen = mysqli_query($con, $kuisionerCariDosen);
  return $resultKuisionerCariDosen;
}
function minIdSemester($con){
  $minIdSemester="select min(id_semester) as minIdSemester from tabel_semester";
  $resultIdSemester=mysqli_query($con, $minIdSemester);
  $row=mysqli_fetch_assoc($resultIdSemester);
  return $row["minIdSemester"];
}

function kelasDosen($con, $id_dosen)
{
  $kelasDosen = "select a.*, b.id_kelas, c.id_kelas from tabel_dosen a, tabel_jadwal b, tabel_kelas c where b.id_kelas=c.id_kelas and a.id_dosen=b.id_dosen and a.id_dosen=$id_dosen";
  $resultKelasDosen = mysqli_query($con, $kelasDosen);
  return $resultKelasDosen;
}

function tampilKelas($con, $id_kelas){
  $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
  $resultKelas = mysqli_query($con, $kelas);  
  $row=mysqli_fetch_assoc($resultKelas);
  $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
  return $hasil;
}
