<?php
session_start();

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

    if ($username != "123") {
      $error = "*Username invalid";
      header("Location: ../module/login.php?error=$error");
    } elseif ($password != "123") {
      $error = "*Password salah";
      header("Location: ../module/login.php?error=$error");
    } else {
      echo "<script>alert('Login sukses')</script>";
    }
  }

?>