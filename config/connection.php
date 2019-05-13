<?php
date_default_timezone_set('Asia/Jakarta');

    $dbUrl  = $dbUser = $dbPass = $dbName = "";

    include "constant.php";

    $con=mysqli_connect($dbUrl, $dbUser, $dbPass, $dbName);
    if(!$con){
        die("Koneksi Database Gagal! <br>".mysqli_connect_error());
    }
?>