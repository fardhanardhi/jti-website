<?php
if (isset($_POST["update"])){
    if ($_GET["module"]=="modalPengaturan" && $_GET["act"]=="edit"){

        echo($_POST["id_usernya"]);

        $nama_folder = "img";
        $tmp = $_FILES["foto"]["tmp_name"];
        $nama_file = $_FILES["foto"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

        $query="";

    }
}


?>