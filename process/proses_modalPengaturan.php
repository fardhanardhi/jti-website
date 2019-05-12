<?php
if (isset($_POST["update"])){
    if ($_GET["module"]=="modalPengaturan" && $_GET["act"]=="edit"){

        if($_POST["id_levelnya"] == "mahasiswa"){
            // echo "mahasiswa";

            $query1="";

            $query5="";

            if(mysqli_query($con,$query1) && mysqli_query($con,$query5)){

                header('location:../module/index.php?module=' . $_GET["module"]);
            }
    
            else{            
                echo("Error description: " . mysqli_error($con));
            }

        }

        else if($_POST["id_levelnya"] == "dosen"){
            echo "dosen";

        }




        // echo($_POST["id_usernya"]);

        // $nama_folder = "img";
        // $tmp = $_FILES["foto"]["tmp_name"];
        // $nama_file = $_FILES["foto"]["name"];
        // move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

        // $query="";

    }
}


?>