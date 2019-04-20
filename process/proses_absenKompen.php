<?php
include "../config/connection.php";

// Absensi & Total Absensi
function absensi($con, $kelas)
{
  $absensi = "select a.*, b.*, c.id_kelas, d.* from tabel_absensi a, tabel_mahasiswa b, tabel_kelas c, tabel_status_mahasiswa d where a.id_mahasiswa=b.id_mahasiswa and b.id_kelas=b.id_kelas and b.id_kelas=c.id_kelas and a.id_status_mahasiswa=d.id_status_mahasiswa and b.id_kelas='$kelas'";
  $resultAbsensi = mysqli_query($con, $absensi);
  return $resultAbsensi;
}

function kelas($con){
	$kelas="select * from tabel_kelas";
	$resultKelas=mysqli_query($con, $kelas);
	return $resultKelas;
}

function tampilKelas($con, $id_kelas){
  $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
  $resultKelas = mysqli_query($con, $kelas);  
  $row=mysqli_fetch_assoc($resultKelas);
  $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
  return $hasil;
}

function minKelas($con){
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}

// Kompen
function kompen($con)
{
  $kompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.* from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_prodi d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and b.id_prodi=d.id_prodi";
  $resultKompen = mysqli_query($con, $kompen);
  return $resultKompen;
}

function cariKompen($con, $txtCariKompen)
{
  $kompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.* from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_prodi d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and b.id_prodi=d.id_prodi and (b.nim like '%$txtCariKompen%' or b.nama like '%$txtCariKompen%' or d.kode like '%$txtCariKompen%' or c.nama like '%$txtCariKompen%' or a.waktu like '%$txtCariKompen%') order by b.nama asc";
  $resultKompen = mysqli_query($con, $kompen);
  return $resultKompen;
}

function tampilTanggal($tanggal)
{
  return date('d F Y', strtotime($tanggal));
}