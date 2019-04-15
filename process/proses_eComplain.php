<?php
include "../config/connection.php";

function tampilChat($con, $idUser)
{
  $chat = "SELECT * FROM tabel_chat WHERE pengirim = $idUser or penerima = $idUser ORDER BY waktu";
  $resultChat = mysqli_query($con, $chat);
  return $resultChat;
}
