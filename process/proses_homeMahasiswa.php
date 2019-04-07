<?php
    include "../config/connection.php";

    function info($con){
        $info="select * from tabel_info";
        $resultInfo=mysqli_query($con, $info);
        return $resultInfo;
    }

    function tampilTanggal($tanggal){
        return DATE_FORMAT($tanggal, '%d %b %Y');
    }
?>