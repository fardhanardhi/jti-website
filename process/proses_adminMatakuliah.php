<?php
include "../config/connection.php";

function matakuliah($con){
  $matakuliah="select * from tabel_matkul";
  $resultMatakuliah = mysqli_query($con, $matakuliah);
  return $resultMatakuliah;
}

if(isset($_POST["tambahMatakuliah"]) || isset($_POST["hapusMatakuliah"])){
  session_start();

  if($_GET["module"]=="mataKuliah" && $_GET["act"]=="tambah"){
    mysqli_query($con, "insert into tabel_matkul (nama, sks, jam) values ('$_POST[nama]','$_POST[sks]' ,'$_POST[jam]')");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  else if ($_GET["module"]=="mataKuliah" && $_GET["act"]=="hapus"){
    mysqli_query($con, "delete from tabel_matkul where id_matkul='$_POST[id_matkul]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
}

?>