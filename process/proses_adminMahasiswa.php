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

function tampilSemester($con){
    $semester="select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

function tampilKelas($con, $id_kelas){
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
}

if (isset($_POST["insert"]) || isset($_POST["hapusMahasiswa"])){

    echo "nanana";

    if($_GET["module"]=="dataMahasiswa" && $_GET["act"]=="tambah"){

        // echo($_POST["semesterMahasiswa"]); 

        $nama_folder = "img";
        $tmp = $_FILES["fileid"]["tmp_name"];
        $nama_file = $_FILES["fileid"]["name"];
        move_uploaded_file($tmp, "../$nama_folder/$nama_file");
   

     $query1 = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameMahasiswaAdmin]',
         '$_POST[passwordMahasiswaAdmin]',
         'mahasiswa'

     ); ";

     $query2 = "INSERT INTO tabel_mahasiswa (id_prodi,
     id_kelas,
     id_semester,
     nim,
     nama,
     alamat,
     jenis_kelamin,
     tempat_lahir,
     foto,
     id_user
     )

     values
     ('$_POST[prodiMahasiswa]',
     '$_POST[kelasMahasiswa]',
     '$_POST[semesterMahasiswa]',
     '$_POST[nimMahasiswaAdmin]',
     '$_POST[namaMahasiswaAdmin]',    
     '$_POST[alamatMahasiswaAdmin]',
     '$_POST[genderMahasiswaAdmin]',
     '$_POST[tempatlahirMahasiswaAdmin]',
     '$nama_file',
    (select id_user from tabel_user where username='$_POST[nimMahasiswaAdmin]')
     );";

     $query3 = "INSERT INTO tabel_absensi (id_mahasiswa, sakit, ijin, alpa, jumlah, id_status_mahasiswa, id_semester)

     values
     ((SELECT id_mahasiswa FROM tabel_mahasiswa WHERE nim='$_POST[nimMahasiswaAdmin]'),
     0,
     0,
     0,
     0,
     7,
     '$_POST[semesterMahasiswa]'
     );
     ";

     
        if(mysqli_query($con, $query1) AND mysqli_query($con, $query2) AND mysqli_query($con, $query3)){
            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }   

    else if($_GET["module"]=="dataMahasiswa" && $_GET["act"]=="hapus")
    {
        $delete=$_POST['id_delete'];
        $idnya = $_POST['id_mahasiswa'];

        $queryDelete = "DELETE FROM tabel_mahasiswa WHERE id_user='$delete';";
        $queryDelete2 = "DELETE FROM tabel_user WHERE id_user='$delete';";
        $queryDelete3 = "DELETE FROM tabel_absensi WHERE id_mahasiswa='$idnya';";


        if(mysqli_query($con,$queryDelete) && mysqli_query($con,$queryDelete2) && mysqli_query($con,$queryDelete3)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
       
    } 

}



?>
