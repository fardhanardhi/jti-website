<?php
session_start();
include "../config/connection.php";
include "../process/proses_modalPengaturan.php";

$level = $_SESSION['level'];
$idUser = $_SESSION['id'];

$queryModalPengaturan = "SELECT * FROM tabel_user WHERE id_user = '$idUser';";
$resultModalPengaturan = mysqli_query($con, $queryModalPengaturan);

$item = '';
if(mysqli_num_rows($resultModalPengaturan) == 1){
  $item = mysqli_fetch_assoc($resultModalPengaturan);
}

?>
<input id="idUser" type="hidden" name="idUser" value="<?php echo $idUser ?>">
<?php

switch ($level) {
  case 'admin':
    $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_admin b WHERE a.id_user=$idUser and a.id_user=b.id_user";
    $resultUser = mysqli_query($con, $queryUser);
    $rowUser = mysqli_fetch_assoc($resultUser);
    $namaUser = $rowUser["nama"];
    break;
  case 'dosen':
    $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_dosen b WHERE a.id_user=$idUser and a.id_user=b.id_user";
    $resultUser = mysqli_query($con, $queryUser);
    $rowUser = mysqli_fetch_assoc($resultUser);
    $namaUser = $rowUser["nama"];
    break;
  case 'mahasiswa':
    $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_mahasiswa b WHERE a.id_user=$idUser and a.id_user=b.id_user";
    $resultUser = mysqli_query($con, $queryUser);
    $rowUser = mysqli_fetch_assoc($resultUser);
    $namaUser = $rowUser["nama"];
    break;
  default:
    $namaUser = "User tidak ditemukan";
    break;
}

// Melihat status pembayaran ukt
$queryStatus = "SELECT tk.status_daftar_ulang FROM tabel_krs tk,tabel_mahasiswa tm
                where tk.id_mahasiswa = tm.id_mahasiswa
                and tm.id_user = $idUser";
$resultStatus = mysqli_query($con, $queryStatus);
$rowStatus = mysqli_fetch_assoc($resultStatus);
$statusPembayaran = $rowStatus["status_daftar_ulang"];

if ($level != 'admin') {
  include "../process/proses_indexChat.php";
}
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
  <!-- navigation mahasiswa & dosen -->
  <?php
  if ($level != "admin") {
    ?>
    <div id="navigation" class="container-fluid h-100">
      <div class="row h-100">
        <div class="col-md-12 my-auto">
          <div class="row text-center text-white font-weight-bold">
            <div class="col-md-0 col-lg"></div>
            <div onclick="location.href='index.php?module=home';" class="navigation-menu col-md-3 col-lg-2 my-1">
              <img src="../img/navigation/home.svg">
              <p class="mt-3">HOME</p>
            </div>
            <?php
            if ($level == "dosen" || $statusPembayaran == "Sudah") { ?>
              <div onclick="location.href='index.php?module=jadwal';" class="navigation-menu col-md-3 col-lg-2 my-1">
              <?php
            } elseif ($level == "mahasiswa" || $statusPembayaran == "Belum") { ?>
                <div onclick="location.href='index.php?module=krs';" class="navigation-menu col-md-3 col-lg-2 my-1">
                <?php } ?>
                <?php
                if ($level == "mahasiswa") {
                  ?>
                  <img src="../img/navigation/jadwalKuliah.svg">
                  <p class="mt-3">JADWAL KULIAH</p>
                <?php
              } elseif ($level == "dosen") {
                ?>
                  <img src="../img/navigation/pesanKelas.svg">
                  <p class="mt-3">PESAN KELAS</p>
                <?php
              }
              ?>
              </div>
              <div onclick="location.href='index.php?module=nilai';" class="navigation-menu col-md-3 col-lg-2 my-1">
                <?php
                if ($level == "mahasiswa") {
                  ?>
                  <img src="../img/navigation/nilaiMahasiswa.svg">
                  <p class="mt-3">NILAI MAHASISWA</p>
                <?php
              } elseif ($level == "dosen") {
                ?>
                  <img src="../img/navigation/pengajuanKRS.svg">
                  <p class="mt-3">PENGAJUAN KRS MAHASISWA</p>
                <?php
              }
              ?>
              </div>
              <div onclick="location.href='index.php?module=kompenAbsen';" class="navigation-menu col-md-3 col-lg-2 my-1">
                <?php
                if ($level == "mahasiswa") {
                  ?>
                  <img src="../img/navigation/absensi.svg">
                  <p class="mt-3">ABSENSI & KOMPEN</p>
                <?php
              } elseif ($level == "dosen") {
                ?>
                  <img src="../img/navigation/absensi.svg">
                  <p class="mt-3">KOMPENSASI MAHASISWA</p>
                <?php
              }
              ?>
              </div>
              <div class="col-md-0 col-lg"></div>
            </div>
          </div>
        </div>
      </div>
    <?php
  } else {
    ?>

      <!-- navbar -->
      <div id="navigation-admin" class="container-fluid h-100">
        <div class="row h-100">
          <div class="col-md-3 h-100 bg-sidebar px-0">
            <div class="app-navbar navbar navbar-expand-md navbar-dark bg-blue border-bottom border-white">
              <a class="ml-5 mr-5 pointer" id="navigation-admin-close"> <i class="fas fa-bars text-white burger-icon"></i></a>
              <a class="navbar-brand " href="index.php?module=home"><b>JTI Website</b></a>
            </div>
            <ul class="text-white pl-0">
              <a href="index.php?module=home">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-dashboard.svg">
                    </div>
                    <div class="col-md-10">
                      Dashboard
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=eComplain">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-eComplain.svg">
                    </div>
                    <div class="col-md-10">
                      E - Complain
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=beritaPengumuman">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-news.svg">
                    </div>
                    <div class="col-md-10">
                      Berita dan Pengumuman
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=beasiswa">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-beasiswa.svg">
                    </div>
                    <div class="col-md-10">
                      Beasiswa
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=absenKompen">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-absen.svg">
                    </div>
                    <div class="col-md-10">
                      Absen dan Kompen
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=ruang">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-ruangan.svg">
                    </div>
                    <div class="col-md-10">
                      Ruangan
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=dataMahasiswa">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-mahasiswa.svg">
                    </div>
                    <div class="col-md-10">
                      Data Mahasiswa
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=dataDosen">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-dosen.svg">
                    </div>
                    <div class="col-md-10">
                      Data Dosen
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=kuisioner">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-kuisioner.svg">
                    </div>
                    <div class="col-md-10">
                      Kuisioner
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=khs">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-khs.svg">
                    </div>
                    <div class="col-md-10">
                      KHS ( Kartu Hasil Studi )
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=krs">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-krs.svg">
                    </div>
                    <div class="col-md-10">
                      KRS ( Kartu Rencana Studi )
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=kelas">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-kelas.svg">
                    </div>
                    <div class="col-md-10">
                      Kelas
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=dataJadwalKuliah">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-jadwal.svg">
                    </div>
                    <div class="col-md-10">
                      Jadwal Kuliah
                    </div>
                  </div>
                </li>
              </a>
              <a href="index.php?module=mataKuliah">
                <li class="border-bottom border-white px-4 py-2 sidebar-nav text-white">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="../img/sidebar-matkul.svg">
                    </div>
                    <div class="col-md-10">
                      Mata Kuliah
                    </div>
                  </div>
                </li>
              </a>
            </ul>
          </div>
          <div class="col-md-9 h-100" id="navigation-admin-close2"></div>
        </div>
      </div>

    <?php
  }
  ?>

    <!-- navbar -->
    <nav class="app-navbar navbar navbar-expand-md navbar-dark bg-blue shadow-sm sticky-top mb-2">
      <?php
      if ($level == "admin") {
        ?>
        <a class="ml-5 mr-5" id="navigation-admin-btn"> <i class="fas fa-bars text-white burger-icon"></i></a>
      <?php
    } else {
      ?>
        <a class="ml-5 mr-5" id="navigation-btn"> <i class="fas fa-bars text-white burger-icon"></i></a>
      <?php
    }
    ?>
      <a class="navbar-brand " href="index.php?module=home"><b>JTI Website</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- memberi space ditengah navbar -->
        <div class="mx-auto"></div>
        <i class="notification-icon text-white far fa-bell" onclick="location.href='index.php?module=notifikasi';">

          <!-- bagian notification bubble -->
          <span class="fas fa-circle notification-bubble"></span>
          <span class="notification-bubble-num">10</span>
        </i>

        <div class="dropdown mr-5">
          <img class="dropdown-toggle nav-profile-photo ml-4 " src="../attachment/img/avatar.jpeg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <a href="#" class="dropdown-toggle ml-2 profile-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ($namaUser); ?>&nbsp;<b class="caret"></b></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <b class="caret d-none d-lg-block d-xl-block"></b>
            <a class="dropdown-item" href="#" data-target="#largeShoes" data-toggle="modal">Pengaturan</a>
            <hr class="hr-light m-0">
            <a class="dropdown-item" href="../process/logout.php">Log Out</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- The modal pengaturan -->
    <div class="modal fade hahaha" id="largeShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body pb-0">
            <button type="button" class="close close-setting" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title text-center">Pengaturan</h5>
            <hr class="pl-4 pr-4 bg-dark">
            <input type="text" id="passwordModal" value="<?php echo $item["password"]?>">
            <div class="row">
              <div class="col-md-12">
                <center><img src="../attachment/img/avatar.jpeg" id="fotoPrev" height="150px" width="150px" class="rounded-circle" /></center>
                <br>
                <center><?php echo ($namaUser); ?></center>
                <br>
                <form class="px-2" action="../process/proses_modalPengaturan.php?module=modalPengaturan&act=edit" id="formModalPengaturan2" method="POST" enctype="multipart/form-data">
                  <div class="form-group row">
                    <input type="hidden" name="id_usernya" id="id_usernya" value="<?php echo $idUser?>">
                    <input type="hidden" name="id_levelnya" id="id_levelnya" value="<?php echo $level?>">
                    <label class="col-md-3" for="foto">Ganti Foto</label>
                    <div class="input-group col-md-9">
                      <label for="foto" class="file form-control text-secondary" id="label-file">
                        <input type="file" class="form-control shadow-none" id="foto" name="foto" onblur="reset_Blank(); reset_Size(); reset_Check();" onchange="preview_image(event);" accept="image/*" required>
                        <span class="file-custom" id="browse"></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3" for="passwordLama">Password Lama</label>
                    <div class="input-group col-md-9">
                      <input type="password" id="passwordLama" placeholder="Password Lama" name="passwordLama" onblur="reset_Blank();" class="form-control border-right-0 shadow-none" required>
                      <div class="input-group-append">
                        <span class="far fa-eye form-control" id="eyeA" onclick="showPasswordLama();"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3" for="passwordBaru">Password Baru</label>
                    <div class="input-group col-md-9">
                      <input type="password" class="form-control border-right-0 shadow-none" id="passwordBaru" placeholder="Password Baru" name="passwordBaru" onblur="reset_Blank();" required>
                      <div class="input-group-append">
                        <span class="far fa-eye form-control" id="eyeB" onclick="showPasswordBaru();"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3" for="konfirmasiPassword">Konfirmasi Password</label>
                    <div class="input-group col-md-9">
                      <input type="password" class="form-control border-right-0 shadow-none" id="konfirmasiPassword" placeholder="Konfirmasi Password" name="konfirmasiPassword" onblur="reset_Blank();" required>
                      <div class="input-group-append">
                        <span class="far fa-eye form-control" id="eyeC" onclick="showPasswordKonfirmasi();"></span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div id="Blank" class="text-danger"></div>
                    <div id="fotoSize" class="text-danger"></div>
                    <div id="fotoType" class="text-danger"></div>
                    <div id="konfirmasipasswordSalah" class="text-danger"></div>
                    <div id="konfirmasipasswordLamaSalah" class="text-danger"></div>
                  </div>
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9">
                      <button type="submit" class="btn btn-success" name="update" onclick="Coba(); showFilesSize(event); cekPasword(event); checkFoto();">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- konten -->
    <div class="container-fluid px-5">
      <?php
      $module = $_GET["module"];
      if ($level == "mahasiswa") {
        switch ($module) {
          case "home":
            include "mahasiswa/home.php";
            break;
          case "kompenAbsen":
            include "mahasiswa/kompenAbsen.php";
            break;
          case "coba":
            include "mahasiswa/coba.php";
            break;
          case "krs":
            include "mahasiswa/krs.php";
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
          case "notifikasi":
            include "notifikasi.php";
            break;
          default:
            include "404.php";
        }
      } else if ($level == "dosen") {
        switch ($module) {
          case "home":
            include "dosen/home.php";
            break;
          case "kompenAbsen":
            include "dosen/dosenKompen.php";
            break;
          case "notifikasi":
            include "notifikasi.php";
            break;
          default:
            include "404.php";
        }
      } else if ($level == "admin") {
        switch ($module) {
          case "home":
            include "admin/home.php";
            break;
          case "ruang":
            include "admin/ruang/ruangan.php";
            break;
          case "khs":
            include "admin/khs/khs.php";
            break;
          case "khsLihat":
            include "admin/khs/khsLihat.php";
            break;
          case "dataDosen":
            include "admin/dosen/dataDosen.php";
            break;
          case "dataMahasiswa":
            include "admin/mahasiswa/dataMahasiswa.php";
            break;
          case "mataKuliah":
            include "admin/matakuliah/mataKuliah.php";
            break;
          case "krs":
            include "admin/krs/krsAdmin.php";
            break;
          case "krsPerKelas":
            include "admin/krs/krsPerKelas.php";
            break;
          case "dataJadwalKuliah":
            include "admin/jadwal/dataJadwalKuliah.php";
            break;
          case "beasiswa":
            include "admin/mahasiswa/beasiswa.php";
            break;
          case "eComplain":
            include "admin/eComplain/eComplain.php";
            break;
          case "beritaPengumuman":
            include "admin/berita/beritaPengumuman.php";
            break;
          case "kuisioner":
            include "admin/kuisioner/kuisioner.php";
            break;
          case "kriteriaKuisioner":
            include "admin/kuisioner/kriteriaKuisioner.php";
            break;
          case "absenKompen":
            include "admin/absen & kompen/absenKompen.php";
            break;
          case "kelas":
            include "admin/kelas/kelas.php";
            break;
          case "notifikasi":
            include "notifikasi.php";
            break;
          default:
            include "404.php";
        }
      }

      if ($level != "admin") {
        ?>
        <img id="toggleChat" src="../img/Chat.svg" alt="chat" class="chat-bubble">

        <div class="chat-popup row shadow-lg" id="chatPopup">
          <div class="col ">
            <div class="chat-head row px-1 py-1 text-white bg-dark">
              <div class="col">
                <h6>E - Complain</h6>
              </div>
              <div id="closeChatPopup" class="col-auto">
                X
              </div>
            </div>
            <div class="row">
              <div id="globalChatWindow" class="col global-chat-window scrollbar pt-3">
                Loading...
              </div>
            </div>
            <div class="row">
              <div class="col global-chat-input">
                <div class="row py-2 align-items-center justify-content-center h-100">
                  <div class="col pr-0 pl-2">
                    <input id="globalInputChat" type="text" class="form-control" placeholder="Ketik Pesan">
                  </div>
                  <div class="col-md-auto pr-3 pl-1">
                    <img class="global-btn-send" src="../img/send.svg" alt="search">
                  </div>
                </div>
              </div>
            </div>
          </div>
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