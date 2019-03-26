<?php 
  $level="mahasiswa";
  if($level=="mahasiswa" || $level=="dosen" || $level=="admin"){
    header("location: module/index.php?level=$level&module=home");
        exit();
  }else{
    header("location: module/login.php");
        exit();
  }
?>