<?php
include "../config/connection.php";

function tampilBeasiswa($con)
{
    $tampilBeasiswa="select * from tabel_info_beasiswa";
    $resultTampilBeasiswa=mysqli_query($con, $tampilBeasiswa);
    return $resultTampilBeasiswa;
}

// function tanggalPublishBeasiswa($tampilBeasiswa)
// {
//     return date('d F Y', strtotime($tampilBeasiswa));
// }

?>