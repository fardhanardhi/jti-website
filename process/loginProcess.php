<?php
session_start();
include "../config/connection.php";


if (isset($_POST["dosen"]) || isset($_POST["admin"]) || isset($_POST["mahasiswa"])) {
  $level = "";
  if (isset($_POST["dosen"])) {
    $level = "dosen";
  } else if (isset($_POST["mahasiswa"])) {
    $level = "mahasiswa";
  } else if (isset($_POST["admin"])) {
    $level = "admin";
  }

  $query = "SELECT id_user FROM tabel_user WHERE level = '$level' LIMIT 1";
  $result = mysqli_query($con, $query);
  $row   = mysqli_fetch_assoc($result);
  $_SESSION["id"] = $row["id_user"];
  $_SESSION["level"] = $level;
  header("location: ../index.php");
}

if (isset($_POST["submit"]) == true) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $queryUser = "SELECT * FROM tabel_user WHERE username='$username'";
  $resultUser = mysqli_query($con, $queryUser);

  if (mysqli_num_rows($resultUser) == 1) {
    $row = mysqli_fetch_assoc($resultUser);

    if ($password != $row["password"]) {
      $error = "*Password salah";
      header("Location: ../module/login.php?error=$error");
    } else {
      $_SESSION["id"] = $row["id_user"];
      $_SESSION["level"] = $row["level"];
      header("location: ../index.php");
    }
  } else {
    $error = "*Username tidak ditemukan";
    header("Location: ../module/login.php?error=$error");
  }
}
