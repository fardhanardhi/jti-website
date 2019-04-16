<?php
include "../config/connection.php";

function tampilChat($con, $idUser)
{
  $chat =
    "SELECT
      *
    FROM
      tabel_chat
    WHERE
      pengirim = $idUser AND penerima = 2 OR pengirim = 2 AND penerima = $idUser
    ORDER BY
      waktu
    ";

  $resultChat = mysqli_query($con, $chat);
  return $resultChat;
}

function tampilRecentChat($con, $idUser)
{
  $chat =
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
          pengirim = 32,
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
          pengirim = 32,
          penerima,
          pengirim
        )
      ) 
    ) AS b
    ORDER BY
      waktu
    DESC
    ";

  /* 
SELECT
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
          pengirim = 32,
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
          pengirim = 32,
          penerima,
          pengirim
        )
      ) 
    ) AS b
    ORDER BY
      waktu
    DESC
*/

  $resultChat = mysqli_query($con, $chat);
  return $resultChat;
}
