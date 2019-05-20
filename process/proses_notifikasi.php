<?php
include "../config/connection.php";

function notifikasi($con, $idUser) {
  $notifikasi = "select * from tabel_notifikasi where id_user = '$idUser' order by waktu DESC";
  $resultNotifikasi = mysqli_query($con, $notifikasi);
  return $resultNotifikasi;
}

if ($_GET['module'] == 'notifikasi' && $_GET['act'] == 'baca' && $_GET['id']) {
  $queryBaca = "UPDATE tabel_notifikasi SET status_dibaca = 'sudah' WHERE id_notifikasi = '$_GET[id]'";
  mysqli_query($con, $queryBaca);
  header('location:../module/index.php?module=' . $_GET["module"] . '&act=&id=');
}

?>