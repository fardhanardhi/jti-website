<?php
include "../config/connection.php";

function tampilChat($con, $idUser, $idUserTujuan)
{
  $chat =
    "SELECT
      *
    FROM
      tabel_chat
    WHERE
      pengirim = $idUser 
    AND 
      penerima = $idUserTujuan
    OR 
      pengirim = $idUserTujuan
    AND 
      penerima = $idUser
    ORDER BY
      waktu
    ";

  $resultChat = mysqli_query($con, $chat);
  return $resultChat;
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

function tampilRecentChat($con, $idUser)
{
  $recentChat =
    "SELECT
      id_chat,
      isi,
      b.recent_user,
      waktu
    FROM (
      SELECT
        id_chat,
        isi,
        pengirim,
        penerima,
        IF (
          pengirim = $idUser,
          penerima,
          pengirim
        ) 
        AS 
        recent_user,
        waktu
      FROM
        tabel_chat
      WHERE
        waktu IN (
        SELECT
          MAX(waktu)
        FROM
          tabel_chat
        GROUP BY
          IF (
          pengirim = $idUser,
          penerima,
          pengirim
        )
      ) 
    ) AS b
    ORDER BY
      waktu
    DESC
    ";

  $resultRecentChat = mysqli_query($con, $recentChat);
  return $resultRecentChat;
}
