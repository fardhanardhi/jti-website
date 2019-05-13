<?php
include "../config/connection.php";

if (isset($_POST["tambahDosen"]) || isset($_POST["delete"]) || isset($_POST["edit"]))
{
    if($_GET["module"]=="dataDosen" && $_GET["act"]=="tambah"){

        $nama_folder = "img";
        $tmp = $_FILES["filenya"]["tmp_name"];
        $nama_file = $_FILES["filenya"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");    

        // echo($nama_file);

        // die();

     $queryUser = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameDosenAdmin]',
         '$_POST[passwordDosenAdmin]',
         'dosen'

     ); ";
  
     $queryDosen = "INSERT INTO tabel_dosen (
     nip,
     nama,
     alamat,
     jenis_kelamin,
     tanggal_lahir,
     tempat_lahir,
     foto,
     id_user
     )

     values
     (
        '$_POST[nimDosenAdmin]',
        '$_POST[namaDosenAdmin]',    
        '$_POST[alamatDosenAdmin]',
        '$_POST[genderDosenAdmin]',
        '$_POST[tahunLahirDosen]-$_POST[bulanLahirDosen]-$_POST[tanggalLahirDosen]',
        '$_POST[tempatlahirDosenAdmin]',
        '$nama_file',

     (select id_user from tabel_user where username='$_POST[usernameDosenAdmin]')
     );";

        if(mysqli_query($con, $queryUser) && mysqli_query($con, $queryDosen)){
            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }  
    
    else if($_GET["module"]=="dataDosen" && $_GET["act"]=="edit"){

        $updateDosen = $_POST["id_userUpdateModal"];

        $nama_folder = "img";
         $tmp = $_FILES["filenyaModal"]["tmp_name"];
         $namanya_file = $_FILES["filenyaModal"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$namanya_file");

        $queryEditUser = "UPDATE tabel_user 
        set username='$_POST[usernameDosenAdmin2]',
        password='$_POST[passwordDosenAdmin2]'
        where id_user= '$updateDosen';";

        $queryEditDosen="UPDATE tabel_dosen 
        set 
        nip = '$_POST[nimDosenAdmin2]',
        nama = '$_POST[namaDosenAdmin2]',
        alamat = '$_POST[alamatDosenAdmin2]',
        jenis_kelamin = '$_POST[genderDosenAdmin3]',
        tempat_lahir = '$_POST[tempatlahirDosenAdmin2]',
        foto = '$namanya_file',
        waktu_edit = curdate(),
        tanggal_lahir = '$_POST[tahunLahirDosenModal]-$_POST[bulanLahirDosenModal]-$_POST[tanggalLahirDosenModal]'
        where id_user='$updateDosen';";

        if(mysqli_query($con,$queryEditUser) && mysqli_query($con,$queryEditDosen)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }

    else if($_GET["module"]=="dataDosen" && $_GET["act"]=="hapus")
    {
        $id_user=$_POST['id_userDosen'];
        $id_dosen=$_POST['id_dosenDosen'];

        $queryDeleteUser = "DELETE FROM tabel_dosen WHERE id_user='$id_user';";
        $queryDeleteDosen = "DELETE FROM tabel_user WHERE id_user='$id_user';";

        if(mysqli_query($con,$queryDeleteUser) && mysqli_query($con,$queryDeleteDosen)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
       
    }
}

// Dropdown Tanggal
function optionTanggalAdmin($tanggalLahirDosen){
    $output="";
    $tanggal= date('d', strtotime($tanggalLahirDosen));
    for($i=1;$i<=31;$i++){
    if($tanggal == $i){
        $output.="<option value='$i' selected='selected'>$i</option>";
    }else{
        $output.="<option value='$i'>$i</option>";
    }
    }
    return $output;
}

function optionBulanAdmin($tanggalLahirDosen){
    $output="";
    $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $bulan= date('m', strtotime($tanggalLahirDosen));
    for($i=1;$i<=12;$i++){
    $tampilBulan=$arrBulan[$i-1];
    if($bulan == $i){
        $output.="<option value='$i' selected='selected'>$tampilBulan</option>";
    }else{
        $output.="<option value='$i'>$tampilBulan</option>";
    }
    }
    return $output;
}

function optionTahunAdmin($tanggalLahirDosen){
    $output="";
    $tahun= date('Y', strtotime($tanggalLahirDosen));
    for($i=1950;$i<=1995;$i++){
    if($tahun == $i){
        $output.="<option value='$i' selected='selected'>$i</option>";
    }else{
        $output.="<option value='$i'>$i</option>";
    }
    }
    return $output;
}
// End Dropdown Tanggal

?>