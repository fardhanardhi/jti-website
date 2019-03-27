<?php 
  session_start();
  $level=$_SESSION['level'];
  if($level=="mahasiswa" || $level=="dosen" || $level=="admin"){
    header("location: module/index.php?module=home");
        exit();
  }else{
    header("location: module/login.php");
        exit();
  }
?>