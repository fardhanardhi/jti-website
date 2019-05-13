<?php
if (isset($_POST["update"])){
    if ($_GET["module"]=="modalPengaturan" && $_GET["act"]=="edit"){

        // echo($_POST['id_usernya']);

        // die();

        $queryValidasi="SELECT password FROM tabel_user;";

        $result=mysqli_query($con, $queryValidasi);

        while($row = mysqli_fetch_assoc($result)){
            echo $row["password"];

            
        }    

        die();


        if($_POST["passwordLama"] == $result){
            echo "password sesuai";
        }

        else if($_POST["passwordLama"] != $result){
            echo "password tidak sesuai";
        }
    }
}


 // if($_POST["id_levelnya"] == "mahasiswa"){
        //     // echo "mahasiswa";

        //     // echo($_POST["id_usernya"]);

        //     $queryValidasi="select password from tabel_user where id_user=;";

        //     $result=mysqli_query($con, $queryValidasi);





        //     if(){

        //     }




        //     // $nama_foldernya = "img";
        //     // $tmp = $_FILES["foto"]["tmp_name"];
        //     // $nama_filenya = $_FILES["foto"]["name"];
        //     // move_uploaded_file($tmp, "../attachment/$nama_foldernya/$nama_filenya");

        //     // echo($nama_filenya);

        //     // die();

        //     // $query1="INSERT INTO tabel_mahasiswa (foto) values ($nama_filenya)";

        //     // $query5="INSERT INTO tabel_user (password) values ($_POST[konfirmasiPassword])";

        //     // if(mysqli_query($con,$query1) && mysqli_query($con,$query5)){

        //     //     header('location:../module/index.php?module=' . $_GET["module"]);
        //     // }
    
        //     // else{            
        //     //     echo("Error description: " . mysqli_error($con));
        //     // }

        // }

        // else if($_POST["id_levelnya"] == "dosen"){
        //     echo "dosen";

        // }


?>

