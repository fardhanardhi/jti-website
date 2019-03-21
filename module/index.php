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
      <a class="btn btn-primary">oke</a>
    </div>


    <!-- navbar -->
    <nav class="app-navbar navbar navbar-expand-md navbar-dark bg-blue shadow-sm sticky-top">
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
            <a class="dropdown-item" href="#">Ganti Password</a>
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
                        include "mahasiswa/coba.php";
                    break;
                    case "jadwal":
                        include "mahasiswa/jadwal.php";
                    break;
                    case "homeHafiz":
                        include "mahasiswa/home.php";
                    break;
                    default:
                    include "mahasiswa/coba.php";
                }
            }
        ?>
    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <!-- bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="../js/script.js"></script>
  </body>

  </html>

