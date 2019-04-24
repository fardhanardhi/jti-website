<?php
include "../config/connection.php";

function tampilBeasiswa($con)
{
    $tampilBeasiswa="select * from tabel_info_beasiswa";
    $resultTampilBeasiswa=mysqli_query($con, $tampilBeasiswa);
    return $resultTampilBeasiswa;
}

if(isset($_POST["submitBeasiswa"]) || isset($_POST["editIsi"]) || isset($_POST["hapusBeasiswa"])){
    if($_GET["module"]=="beasiswa" && $_GET["act"]=="tambah"){
      $dateNow = date("Y-m-d H:i:s");
      $batasTanggal = date('Y-m-d', strtotime($_POST[batasTanggal]));
      $BeasiswaQuery= "INSERT INTO tabel_info_beasiswa (judul, isi, link, waktu_publish, waktu_berakhir)  
                      VALUES ('$_POST[judulBeasiswa]','$_POST[isiBeasiswa]','$_POST[linkBeasiswa]','$dateNow','$batasTanggal')";
      mysqli_query($con, $BeasiswaQuery);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
  
    else if($_GET["module"]=="beasiswa" && $_GET["act"]=="edit"){
      mysqli_query($con, "update tabel_kuisioner set kriteria='$_POST[isiKriteria]' where id_kuisioner='$_POST[id_kuisioner]'");
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
    
    else if($_GET["module"]=="beasiswa" && $_GET["act"]=="hapus"){
      $BeasiswaQuery="DELETE FROM tabel_info_beasiswa WHERE id_beasiswa='$_POST[idBeasiswa]'";
      mysqli_query($con, $BeasiswaQuery);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
  }

?>


