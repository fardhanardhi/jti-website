<?php
include "../config/connection.php";

// function tampilDosen($con, $idUser, $idDosen)
// {
//   $tampilDosen = "select a.*, b.* from tabel_khs a, tabel_matkul b, tabel_mahasiswa c, tabel_user d where a.id_matkul=b.id_matkul and a.id_mahasiswa=c.id_mahasiswa and c.id_user=d.id_user and d.id_user='$idUser' and a.id_semester=$idSemester";
//   $resulttampilDosen = mysqli_query($con, $tampilDosen);
//   return $resulttampilDosen;
// }

if (isset($_POST["tambahDosen"]) || isset($_POST["delete"]))
{
    if($_GET["module"]=="dataDosen" && $_GET["act"]=="tambah"){

     $queryUser = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameDosenAdmin]',
         '$_POST[passwordDosenAdmin]',
         'dosen'

     ); ";

    
    // $code = $_FILES["filename"]["error"];
    // // die();

    // if ($code == 0) 
    // {
    //     $pesan = "";
    //     $nama_folder="attachment/img";
    //     $tmp = $_FILES["filename"]["tmp_name"];
    //     $nama_file=$_FILES["filename"]["name"];
    //     $path = "../$nama_folder/$nama_file";
    //     $dbpath = "$nama_folder/$nama_file";

    //     $tipe_file = array("image/jpeg", "image/gif", "image/png");
    //     if (!in_array($_FILES["filename"]["type"], $tipe_file)) {
    //         $error = urldecode("tipe file salah");
    //         header("Location:../module/index.php?module=dataDosen");
    //         die();
    //     }

    //     if (move_uploaded_file($tmp,$path)) {
    //         $error = "Upload Sukses";
    //     }

    // } elseif ($code === 4) {
    //     $error = urldecode("UPLOAD GAGAL!, TIDAK TERUPLOAD");
    //     header("Location:../module/index.php?error=$error");
    // } else {
    //     $error = "Upload gagal";
    //     header("Location:../module/index.php?error=$error");
    // }

     $queryDosen = "INSERT INTO tabel_dosen (
     nip,
     nama,
     alamat,
     jenis_kelamin,
     tempat_lahir,
     id_user
     )

     values
     (
        '$_POST[nimDosenAdmin]',
        '$_POST[namaDosenAdmin]',    
        '$_POST[alamatDosenAdmin]',
        '$_POST[genderDosenAdmin]',
        '$_POST[tempatlahirDosenAdmin]',

     (select id_user from tabel_user where username='$_POST[nimDosenAdmin]')
     );";

        if(mysqli_query($con, $queryUser) && mysqli_query($con, $queryDosen)){
            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }  
    
    else if($_GET["module"]=="dataDosen" && $_GET["act"]=="hapus")
    {
        $delete=$_POST['id_delete'];
        // $idnya = $_POST['id_dosen'];

        $queryDeleteUser = "DELETE FROM tabel_dosen WHERE id_user='$delete';";
        $queryDeleteDosen = "DELETE FROM tabel_user WHERE id_user='$delete';";

        if(mysqli_query($con,$queryDeleteUser) && mysqli_query($con,$queryDeleteDosen)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
       
    }
}

?>