<?php
include "../config/connection.php";

$module = $_GET['module'];
$proses = $_GET['act'];


if (isset($_POST["insert"]) || isset($_POST["hapus"])){

    if($_GET["module"]=="dataMahasiswa" && $_GET["act"]=="tambah"){

       if($_POST["prodiMahasiswa"] = 'Teknik Informatika'){

                $query1 = "INSERT INTO tabel_user
                (username, password, level)
                VALUES 
                ('$_POST[usernameMahasiswaAdmin]',
                '$_POST[passwordMahasiswaAdmin]',
                'mahasiswa');
                ";

                $query2 = "
                INSERT INTO tabel_mahasiswa ( nim, nama, tempat_lahir, alamat)
                VALUES
                '$_POST[nimMahasiswaAdmin]',
                '$_POST[namaMahasiswaAdmin]',
                '$_POST[tempatlahirMahasiswaAdmin]',
                '$_POST[alamatMahasiswaAdmin]'
                ); 
                ";  
        
                mysqli_query($con, $query1) AND 
                mysqli_query($con, $query2);
        
                header('location:../module/index.php?module=' . $_GET["module"]);
            
       }
    }   
}

?>
