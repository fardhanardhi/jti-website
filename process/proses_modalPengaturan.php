<?php
include "../config/connection.php";

if (isset($_POST["update"])){
    if ($_GET["module"]=="modalPengaturan" && $_GET["act"]=="edit"){

        if($_POST["id_levelnya"] == 'dosen'){

            $nama_folderDosen = "img";
            $tmp = $_FILES["foto"]["tmp_name"];
            $fotoDosen = $_FILES["foto"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folderDosen/$fotoDosen");
            
            if($fotoDosen == ""){

                $queryDosen="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                if(mysqli_query($con, $queryDosen)){

                    header('location:../module/index.php?module=home');
                }

                else{
                    echo("Error description: " . mysqli_error($con));
                }

            }

            else{

                $queryDosen="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                $queryUploadDosen="UPDATE tabel_dosen SET foto = '$fotoDosen' WHERE id_user = '$_POST[id_usernya]';";

                if(mysqli_query($con, $queryDosen) && mysqli_query($con, $queryUploadDosen)){

                    header('location:../module/index.php?module=home');
                }

                else{
                    echo("Error description: " . mysqli_error($con));
                }
            }

        }

        else if($_POST["id_levelnya"] == 'mahasiswa'){

            $nama_folderMahasiswa = "img";
            $tmp = $_FILES["foto"]["tmp_name"];
            $fotoMahasiswa = $_FILES["foto"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folderMahasiswa/$fotoMahasiswa");
            
            if($fotoMahasiswa == ""){
                $queryMahasiswa="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";
    
                if(mysqli_query($con, $queryMahasiswa)){
    
                    header('location:../module/index.php?module=home');
                }
    
                else{
                    echo("Error description: " . mysqli_error($con));
                }
                
            }
            
            else {
                $queryMahasiswa="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                $queryUploadMahasiswa="UPDATE tabel_mahasiswa SET foto = '$fotoMahasiswa' WHERE id_user = '$_POST[id_usernya]';";
    
                if(mysqli_query($con, $queryMahasiswa) && mysqli_query($con, $queryUploadMahasiswa)){
    
                    header('location:../module/index.php?module=home');
                }
    
                else{
                    echo("Error description: " . mysqli_error($con));
                }
            }
        }


        else if($_POST["id_levelnya"] == 'admin'){

            $nama_folderAdmin = "img";
            $tmp = $_FILES["foto"]["tmp_name"];
            $fotoAdmin = $_FILES["foto"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folderAdmin/$fotoAdmin");
           
            if($fotoAdmin == ""){

                $queryAdmin="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                if(mysqli_query($con, $queryAdmin)){

                    header('location:../module/index.php?module=home');
                }

                else{
                    echo("Error description: " . mysqli_error($con));
                }
            }

            else {
                 
                $queryAdmin="UPDATE tabel_user SET password = '$_POST[konfirmasiPassword]' WHERE id_user = $_POST[id_usernya]";

                $queryUploadAdmin="UPDATE tabel_admin SET foto = '$fotoAdmin' WHERE id_user = '$_POST[id_usernya]';";

                if(mysqli_query($con, $queryAdmin) && mysqli_query($con, $queryUploadAdmin)){

                    header('location:../module/index.php?module=home');
                }

                else{
                    echo("Error description: " . mysqli_error($con));
                }
            }
        }
        
    }
}



?>

