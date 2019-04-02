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

  if (isset($_POST["submit"])==true) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $queryDosen = "SELECT * FROM tabel_dosen WHERE username='$username'";
    $resultDosen = mysqli_query($con, $queryDosen);

    $queryMhs = "SELECT * FROM tabel_mahasiswa WHERE username='$username'";
    $resultMhs = mysqli_query($con, $queryMhs);

    if(mysqli_num_rows($resultDosen) == 1) {
      $row = mysqli_fetch_assoc($resultDosen);

      if ($password != $row["password"]) {
        $error = "*Password salah";
        header("Location: ../module/login.php?error=$error");
      } else {
        $_SESSION["id"]=$row["id_dosen"];
        $_SESSION["level"]="dosen";
        header("location: ../index.php");
      }
    }else if(mysqli_num_rows($resultMhs) == 1) {
      $row = mysqli_fetch_assoc($resultMhs);

      if ($password != $row["password"]) {
        $error = "*Password salah";
        header("Location: ../module/login.php?error=$error");
      } else {
        $_SESSION["id"]=$row["id_mahasiswa"];
        $_SESSION["level"]="mahasiswa";
        header("location: ../index.php");
      }
    }else{
      $error = "*Username tidak ditemukan";
        header("Location: ../module/login.php?error=$error");
    }
  }
?>