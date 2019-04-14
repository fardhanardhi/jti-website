<?php
include "../config/connection.php";

function tampilChat($con)
{
  $chat = "select * from tabel_chat";
  // WHERE pengirim = '$idUser' or penerima =' $idUser ORDER BY waktu
  $return = mysqli_query($con, $chat);
}
