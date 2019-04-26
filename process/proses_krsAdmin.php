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

function krsCari($con, $kelas)
{
    $krs = "SELECT DISTINCT tabel_krs_admin.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs_admin.status_daftar_ulang, tabel_krs_admin.gambar_krs, tabel_mahasiswa.id_kelas
    FROM tabel_krs_admin INNER JOIN tabel_mahasiswa ON tabel_krs_admin.id_mahasiswa = tabel_mahasiswa.id_mahasiswa
    AND tabel_mahasiswa.id_kelas='$kelas'";
    
    $resultTampilKrs = mysqli_query($con, $krs);
    return $resultTampilKrs;
}

function krsCariSemester($con, $kelas, $semester)
{
    $krs = "SELECT DISTINCT tabel_krs_admin.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs_admin.status_daftar_ulang, tabel_krs_admin.gambar_krs, tabel_mahasiswa.id_kelas, tabel_krs_admin.id_semester
    FROM tabel_krs_admin INNER JOIN tabel_mahasiswa ON tabel_krs_admin.id_mahasiswa = tabel_mahasiswa.id_mahasiswa
    AND tabel_mahasiswa.id_kelas='$kelas' AND tabel_krs_admin.id_semester='$semester'";
    
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

function minKelas($con){
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}

function minSemester($con){
	$minSemester = "select min(id_semester) as minSemester from tabel_semester";
	$resultMinSemester = mysqli_query($con, $minSemester);
	$rowMinSemester=mysqli_fetch_assoc($resultMinSemester);
	return $rowMinSemester["minSemester"];
}

function tampilKelas($con, $id_kelas){
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
}

if(isset($_POST["hapusKrs"])){
    if($_GET["module"]=="krs" || $_GET["module"]=="krsPerKelas" && $_GET["act"]=="hapus"){
        $hapusKrs="delete from tabel_krs_admin where id_krs = '$_POST[id_krs]'";
        mysqli_query($con, $hapusKrs);
        header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

?>