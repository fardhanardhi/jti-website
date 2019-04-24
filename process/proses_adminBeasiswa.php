<?php
include "../config/connection.php";

function tampilBeasiswa($con)
{
    $tampilBeasiswa="select * from tabel_info_beasiswa";
    $resultTampilBeasiswa=mysqli_query($con, $tampilBeasiswa);
    return $resultTampilBeasiswa;
}

// function tanggalPublishBeasiswa($tampilBeasiswa)
// {
//     return date('d F Y', strtotime($tampilBeasiswa));
// }

if(isset($_POST["submitBeasiswa"]) || isset($_POST["editIsi"]) || isset($_POST["hapus"])){
    if($_GET["module"]=="beasiswa" && $_GET["act"]=="tambah"){
      mysqli_query($con, "insert into tabel_info_beasiswa values('$_POST[judulBeasiswa]','$_POST[isiBeasiswa]')");
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
  
    else if($_GET["module"]=="beasiswa" && $_GET["act"]=="edit"){
      mysqli_query($con, "update tabel_kuisioner set kriteria='$_POST[isiKriteria]' where id_kuisioner='$_POST[id_kuisioner]'");
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
    
    else if($_GET["module"]=="beasiswa" && $_GET["act"]=="hapus"){
      mysqli_query($con, "delete from tabel_kuisioner where id_kuisioner='$_POST[id_kuisioner]'");
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
  }

?>