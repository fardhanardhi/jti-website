<?php
include "../config/connection.php";

function queryTampilChat($idUser)
{
  $chat =
    "SELECT
      *
    FROM
      tabel_chat
    WHERE
      penerima = $idUser
    OR 
      pengirim = $idUser
    ORDER BY
      waktu
    ";

  return $chat;
}

function tampilLevelUser($con, $idUser)
{
  $hasil =
    "SELECT
      level
    FROM
      tabel_user
    WHERE
      id_user = $idUser
    ";

  $resultHasil = mysqli_query($con, $hasil);

  $rowLevel = mysqli_fetch_assoc($resultHasil);
  return $rowLevel["level"];
}

function tampilMahasiswa($con, $idUser)
{
  $hasil =
    "SELECT
      nama
    FROM
      tabel_mahasiswa
    WHERE
      id_user = $idUser
    ";

  $resultHasil = mysqli_query($con, $hasil);

  $rowNama = mysqli_fetch_assoc($resultHasil);
  return $rowNama["nama"];
}

function tampilDosen($con, $idUser)
{
  $hasil =
    "SELECT
      nama
    FROM
      tabel_dosen
    WHERE
      id_user = $idUser
    ";

  $resultHasil = mysqli_query($con, $hasil);

  $rowNama = mysqli_fetch_assoc($resultHasil);
  return $rowNama["nama"];
}

function tampilAdmin($con, $idUser)
{
  $hasil =
    "SELECT
      nama
    FROM
      tabel_admin
    WHERE
      id_user = $idUser
    ";

  $resultHasil = mysqli_query($con, $hasil);

  $rowNama = mysqli_fetch_assoc($resultHasil);
  return $rowNama["nama"];
}

if (isset($_GET["tampilChat"])) {
  $idUser = $_GET['idUser'];
  $idUserTujuan = "SELECT id_user FROM tabel_user WHERE level = 'admin' LIMIT 1";;

  $resultChat = mysqli_query($con, queryTampilChat($idUser));

  if (mysqli_num_rows($resultChat) > 0) {
    $prev = '';
    while ($rowChat = mysqli_fetch_assoc($resultChat)) {
      if (tampilLevelUser($con, $rowChat["penerima"]) == tampilLevelUser($con, $idUser)) {
        ?>
        <div class="row global-chat-kiri px-3 py-1 <?php echo (($prev != 'kiri') ? 'pt-3' : ''); ?>">
          <div class="col">
            <div class="row">
              <div class="col-md-auto global-chat-window-item py-1 px-2">
                <div class="row">
                  <div class="col">
                    <?php echo $rowChat["isi"]; ?>
                  </div>
                </div>
                <div class="row global-chat-window-item-info">
                  <div class="col text-right">
                    <?php echo date("d M Y", strtotime($rowChat["waktu"])); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        $prev = 'kiri';
      } elseif (tampilLevelUser($con, $rowChat["pengirim"]) == tampilLevelUser($con, $idUser)) {
        ?>
        <div class="row global-chat-kanan px-3 py-1 <?php echo (($prev != 'kanan')  ? 'pt-3' : ''); ?>">
          <div class="col">
            <div class="row">
              <div class="col-md-auto global-chat-window-item py-1 px-2 ml-auto">
                <div class="row">
                  <div class="col">
                    <?php echo $rowChat["isi"]; ?>
                  </div>
                </div>
                <div class="row global-chat-window-item-info">
                  <div class="col text-right">
                    <?php echo date("d M Y", strtotime($rowChat["waktu"])); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $prev = 'kanan';
      }
    }
  } else {
    ?>
    <div class="row align-items-center justify-content-center h-100 pb-5">
      <div class="col mb-5 text-center">
        <span class="text-center" style="font-size: 10em; color: #dbdbdb;">
          <i class="fas fa-comment-dots "></i>
        </span>
      </div>
    </div>
  <?php
}
}

if (isset($_GET["tampilNamaUserTujuan"])) {
  $idUser = $_GET['idUser'];
  $idUserTujuan = $_GET['idUserTujuan'];

  if ($idUserTujuan != null) {
    ?>
    <img class="chat-profile-photo" src="../attachment/img/avatar.png">
    <h5 class="m-0 ml-3">
      <?php
      if (tampilLevelUser($con, $idUserTujuan) == "mahasiswa") {
        echo tampilMahasiswa($con, $idUserTujuan);
      } elseif (tampilLevelUser($con, $idUserTujuan) == "dosen") {
        echo tampilDosen($con, $idUserTujuan);
      } elseif (tampilLevelUser($con, $idUserTujuan) == "admin") {
        echo tampilAdmin($con, $idUserTujuan);
      }
      ?>
    </h5>
  <?php
}
}

if (isset($_POST['sendChat'])) {
  $isiChat = $_POST['isiChat'];
  $idUser = $_POST['idUser'];
  $idUserTujuan = $_POST['idUserTujuan'];
  $date = date("m/d/Y h:i A");
  $final = strtotime($date);
  $datetimeNow = date("Y-m-d H:i:s", $final);

  $sql =
    "INSERT INTO 
    tabel_chat(
      isi,
      pengirim,
      penerima,
      waktu
    )
    VALUES(
      '$isiChat',
      $idUser,
      $idUserTujuan,
      '$datetimeNow'
    )";

  if (mysqli_query($con, $sql)) {
    $id = mysqli_insert_id($con);
  } else {
    echo "Error: " . mysqli_error($con);
  }
  exit();
}
