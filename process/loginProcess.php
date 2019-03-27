<?php
session_start();
include "../config/connection.php";

  if(isset($_POST["dosen"])){
    $_SESSION["level"]="dosen";
    header("location: ../index.php");
  }
  else if(isset($_POST["mahasiswa"])){
    $_SESSION["level"]="mahasiswa";
    header("location: ../index.php");
  }

  if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $queryDosen = "SELECT * FROM tabel_dosen WHERE username='$username' AND password='$password'";
    $resultDosen = mysqli_query($con, $queryDosen);

    $queryMhs = "SELECT * FROM tabel_mahasiswa WHERE username='$username' AND password='$password'";
    $resultMhs = mysqli_query($con, $queryMhs);

    if(mysqli_num_rows($resultDosen) == 1) {
      $row = mysqli_fetch_assoc($resultDosen);

      if ($username != $row["username"]) {
        $error = "*Username invalid";
        header("Location: ../module/login.php?error=$error");
      } elseif ($password != $row["password"]) {
        $error = "*Password salah";
        header("Location: ../module/login.php?error=$error");
      } else {
        echo "<script>alert('Login sukses')</script>";

        $_SESSION["level"]="dosen";
        header("location: ../index.php");
      }
    }
    else if(mysqli_num_rows($resultMhs) == 1) {
      $row = mysqli_fetch_assoc($resultMhs);

      if ($username != $row["username"]) {
        $error = "*Username invalid";
        header("Location: ../module/login.php?error=$error");
      } elseif ($password != $row["password"]) {
        $error = "*Password salah";
        header("Location: ../module/login.php?error=$error");
      } else {
        echo "<script>alert('Login sukses')</script>";
        
        $_SESSION["level"]="mahasiswa";
        header("location: ../index.php");
      }
    }
    else{
      $error = "*Username atau Password salah";
        header("Location: ../module/login.php?error=$error");
    }
    
  }

?>