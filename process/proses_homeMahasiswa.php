<?php
include "../config/connection.php";

function info($con)
{
  $info = "select * from tabel_info";
  $resultInfo = mysqli_query($con, $info);
  return $resultInfo;
}

function attachment($con, $id_info)
{
  $attachment =
    "SELECT
      a.*
    FROM
      tabel_attachment a,
      tabel_info b
    WHERE
      a.id_info = b.id_info 
    AND 
      a.id_info = '$id_info'
    ";

  $resultAttachment = mysqli_query($con, $attachment);
  return $resultAttachment;
}

function tampilTanggal($tanggal)
{
  return date('d F Y', strtotime($tanggal));
}

function komentar($con, $id_info)
{
  $komentar = "select a.*, b.*, c.* from tabel_komentar a, tabel_info b, tabel_user c where a.id_info=b.id_info and a.id_user=c.id_user and a.id_info='$id_info'";
  $resultKomentar = mysqli_query($con, $komentar);
  return $resultKomentar;
}

function tampilUser($con, $id_user)
{
  $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_admin b WHERE a.id_user=$id_user and a.id_user=b.id_user";
  $resultUser = mysqli_query($con, $queryUser);
  if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    return $namaUser = "Admin";
  }

  $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_mahasiswa b WHERE a.id_user=$id_user and a.id_user=b.id_user";
  $resultUser = mysqli_query($con, $queryUser);
  if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    return $namaUser = $rowUser["nama"];
  }

  $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_dosen b WHERE a.id_user=$id_user and a.id_user=b.id_user";
  $resultUser = mysqli_query($con, $queryUser);
  if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    return $namaUser = $rowUser["nama"];
  }
}

function replyKomentar($con, $id_komentar)
{
  $replyKomentar = "select a.*, b.* from tabel_reply_komentar a, tabel_komentar b where a.id_komentar=b.id_komentar and  a.id_komentar='$id_komentar'";
  $resultReplyKomentar = mysqli_query($con, $replyKomentar);
  return $resultReplyKomentar;
}

function dosenKuisioner($con)
{
  $dosenKuisioner = "SELECT id_dosen FROM tabel_jadwal";

  $resultDosenKuisioner = mysqli_query ($con, $dosenKuisioner);
  return $resultDosenKuisioner;
}

if(isset($_POST["kirimKuisioner"])){
  if($_GET["module"] == "home" && $_GET["act"]=="tambah"){
    
  }
}