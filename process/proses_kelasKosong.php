<?php
    include "../config/connection.php";

    $module=$_GET["module"];
    $act=$_GET["act"];

    if($module=="kelasKosong" && $act=="checkout"){
        mysqli_query($con, "update tabel_info_kelas_kosong set status_dipinjam='Kosong' where id_info_kelas_kosong='$_GET[id]'");
        header("location: ../module/index.php?module=kelasKosong");
    }
?>