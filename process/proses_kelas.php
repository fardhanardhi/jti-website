<?php
include "../config/connection.php";

//Data Mahasiswa Kelas
function kelasData($con)
{
    $kelasData = "select tp.kode, tk.tingkat, tm.id_mahasiswa, tm.id_user, tu.username,tu.password,tm.foto,tm.nim,tm.nama as nama_mahasiswa,tm.tempat_lahir,tm.tanggal_lahir,tm.jenis_kelamin,tm.alamat,tp.nama as nama_prodi,tk.kode_kelas 
    from tabel_mahasiswa tm,tabel_prodi tp,tabel_user tu,tabel_kelas tk
    where tm.id_prodi = tp.id_prodi
    and tm.id_user = tu.id_user
    and tm.id_kelas = tk.id_kelas";
    $resultKelasData = mysqli_query($con, $kelasData);
    return $resultKelasData;
}

function kelas($con)
{
	$kelas="select * from tabel_kelas";
	$resultKelas=mysqli_query($con, $kelas);
	return $resultKelas;
}

function tampilKelas($con, $id_kelas)
{
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    if(mysqli_num_rows($resultKelas)>0){
      $row=mysqli_fetch_assoc($resultKelas);
      $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
      return $hasil;
    }
    else
    {
      return "-";
    }
}

function minKelas($con)
{
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}
?>