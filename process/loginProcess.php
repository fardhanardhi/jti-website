<?php

  $username = $_POST["username"];
  $password = $_POST["password"];

  if (isset($_POST["submit"])) {
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