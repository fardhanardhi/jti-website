<?php
session_start();
include "../config/connection.php";

  if(isset($_POST["dosen"])){
    $_SESSION["level"]="dosen";
    $_SESSION["id"]=3;
    header("location: ../index.php");
  }
  else if(isset($_POST["mahasiswa"])){
    $_SESSION["level"]="mahasiswa";
    $_SESSION["id"]=4;
    header("location: ../index.php");
  }
  else if(isset($_POST["admin"])){
    $_SESSION["level"]="admin";
    $_SESSION["id"]=1;
    header("location: ../index.php");
  }

  if (isset($_POST["submit"])==true) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $queryUser = "SELECT * FROM tabel_user WHERE username='$username'";
    $resultUser = mysqli_query($con, $queryUser);

    if(mysqli_num_rows($resultUser) == 1) {
      $row = mysqli_fetch_assoc($resultUser);

      if ($password != $row["password"]) {
        $error = "*Password salah";
        header("Location: ../module/login.php?error=$error");
      } else {
        $_SESSION["id"]=$row["id_user"];
        $_SESSION["level"]=$row["level"];
        header("location: ../index.php");
      }
    }else{
      $error = "*Username tidak ditemukan";
        header("Location: ../module/login.php?error=$error");
    }
  }
?>