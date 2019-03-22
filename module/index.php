<?php
    $level="mahasiswa";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>JTI Website</title>

  <?php
      include "../config/styles.php";
    ?>
</head>

<body>
  <!-- navigation -->
  <div id="navigation" class="container-fluid h-100">
    <div class="row h-100">
      <div class="col-md-12 my-auto">
        <div class="row text-center text-white font-weight-bold">
          <div class="col-md-0 col-lg"></div>
          <div onclick="location.href='index.php?module=home';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/home.svg">
            <p class="mt-3">HOME</p>
          </div>
          <div onclick="location.href='index.php?module=jadwal';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/jadwalKuliah.svg">
            <p class="mt-3">JADWAL KULIAH</p>
          </div>
          <div onclick="location.href='index.php?module=nilai';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/nilaiMahasiswa.svg">
            <p class="mt-3">NILAI MAHASISWA</p>
          </div>
          <div onclick="location.href='index.php?module=kompenAbsen';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/absensi.svg">
            <p class="mt-3">ABSENSI & KOMPEN</p>
          </div>
          <div class="col-md-0 col-lg"></div>
        </div>
      </div>
    </div>
  </div>


  <!-- navbar -->
  <nav class="app-navbar navbar navbar-expand-md navbar-dark bg-blue shadow-sm sticky-top mb-2">
    <a class="ml-5 mr-5" id="navigation-btn"> <i class="fas fa-bars text-white burger-icon"></i></a>
    <a class="navbar-brand " href="#"><b>JTI Website</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- memberi space ditengah navbar -->
      <div class="mx-auto"></div>
      <i class="notification-icon text-white far fa-bell">

        <!-- bagian notification bubble -->
        <span class="fas fa-circle notification-bubble"></span>
        <span class="notification-bubble-num">10</span>
      </i>

      <div class="dropdown mr-5">
        <img class="dropdown-toggle nav-profile-photo ml-4 " src="../attachment/img/avatar.jpeg" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
        <a href="#" class="dropdown-toggle ml-2 profile-link" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Avatar <b class="caret"></b></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <b class="caret d-none d-lg-block d-xl-block"></b>
          <a class="dropdown-item" href="#">Pengaturan</a>
          <hr class="hr-light m-0">
          <a class="dropdown-item" href="#">Log Out</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- konten -->
  <div class="container-fluid px-5">
    <?php
      $module=$_GET["module"];
      if($level=="mahasiswa"){
          switch($module){
              case "home":
                  include "mahasiswa/home.php";
              break;
              case "kompenAbsen":
                  include "mahasiswa/kompenAbsen.php";
              break;
              case "coba":
                  include "mahasiswa/coba.php";
              break;
              case "jadwal":
                  include "mahasiswa/jadwal.php";
              break;
              case "nilai":
                  include "mahasiswa/nilai.php";
              break;
              case "nilaiError":
                  include "mahasiswa/nilaiError.php";
              break;
              case "kelasKosong":
                  include "mahasiswa/kelasKosong.php";
              break;
              default:
                include "404.php";
          }
      }
            
      if($level=="mahasiswa" || $level=="admin"){
      ?>
    <div class="circle">
      <i class="fas fa-comments"></i>
    </div>
    <?php
      }
      ?>
  </div>

  <?php
      include "../config/scripts.php";
    ?>

</body>

</html>