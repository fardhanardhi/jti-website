<?php
include "../config/connection.php";

function tampilProdi($con){
    $prodi = "select * from tabel_prodi";
    $resultProdi = mysqli_query($con, $prodi);
    return $resultProdi;
}

function kelas($con){
    $kelas = "select * from tabel_kelas";
    $resultKelas = mysqli_query($con, $kelas);
    return $resultKelas;
}

function tampilKelas($con, $id_kelas){
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
}

if (isset($_POST["insert"]) || isset($_POST["hapus"])){

    if($_GET["module"]=="dataMahasiswa" && $_GET["act"]=="tambah"){

     $query1 = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameMahasiswaAdmin]',
         '$_POST[passwordMahasiswaAdmin]',
         'mahasiswa'

     );
     INSERT INTO tabel_mahasiswa (id_prodi, 
     id_kelas, 
     id_kelas, 
     id_semester, 
     nim,
     nama,
     alamat,
     jenis_kelamin,
     tempat_lahir,
     foto,
     id_user
     );

     values
     ('$_POST[tes]',
     '$_POST[tes]',
     '$_POST[tes]',
     '$_POST[tes]'
         
     )



     ";

     mysqli_query($con, $query1);

     header('location:../module/index.php?module=' . $_GET["module"]);

    }   
}

?>
