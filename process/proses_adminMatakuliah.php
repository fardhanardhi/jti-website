<?php
include "../config/connection.php";

function matakuliah($con){
  $matakuliah="select * from tabel_matkul";
  $resultMatakuliah = mysqli_query($con, $matakuliah);
  return $resultMatakuliah;
}

?>