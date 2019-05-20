<?php

function getJumlahNotifikasiBelumDibaca($con, $idUser) {
  $getJumlah = "SELECT COUNT(*) AS jumlah FROM tabel_notifikasi WHERE id_user = '$idUser' AND status_dibaca = 'belum'";
  $resultJumlah = mysqli_query($con, $getJumlah);
  $row = mysqli_fetch_assoc($resultJumlah);
  return $row['jumlah'];
}

?>