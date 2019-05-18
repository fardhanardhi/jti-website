<?php
include "../config/connection.php";

function menampilkanDataProfilDosen($con, $idUser){

    $menampilkanProfilDosen="SELECT * FROM tabel_dosen td INNER JOIN tabel_user tu
    ON tu.username = td.nip WHERE tu.id_user = '$idUser'";

    $resultTampilProfilDosen=mysqli_query($con, $menampilkanProfilDosen);
    return $resultTampilProfilDosen;
}

function menampilkanTaskDosen($con, $idUser){
    $queryTask="SELECT ts.semester, td.id_dosen, tpk.id_pekerjaan_kompen, tpk.nama, tpk.kuota FROM tabel_pekerjaan_kompen tpk INNER JOIN tabel_dosen td
    ON tpk.id_dosen = td.id_dosen INNER JOIN tabel_semester ts ON tpk.id_semester = ts.id_semester WHERE td.id_user = '$idUser' AND tpk.status_kompen='1'";

    $resultQueryTask = mysqli_query($con, $queryTask);

    return $resultQueryTask;
}

function ambilIdDosen($con, $idUser){
    $queryAmbilId = "SELECT td.id_dosen FROM tabel_dosen td WHERE td.id_user='$idUser'";

    $resultQueryAmbilId = mysqli_query($con, $queryAmbilId);
    $resultFinal = mysqli_fetch_assoc($resultQueryAmbilId);
    
    return $resultFinal["id_dosen"];
}

function verifikasiDosen($con, $idMahasiswa, $status){
    if($status == "Belum"){
        
        $queryVerifikasi1 = "UPDATE tabel_krs SET status_verifikasi = 'Sudah' WHERE id_mahasiswa = '$idMahasiswa'";

        $resultQueryVerifikasi1 = mysqli_query($con,$queryVerifikasi1);
    }

    else if($status == "Sudah"){
        $queryVerifikasi2 = "UPDATE tabel_krs SET status_verifikasi = 'Belum' WHERE id_mahasiswa = '$idMahasiswa'";

        $resultQueryVerifikasi2 = mysqli_query($con,$queryVerifikasi2);
    }
}

function SumbitKompenDosen($con, $idDosenKompen, $idTask){
   
    $queryDosenKompen = "UPDATE tabel_pekerjaan_kompen SET status_kompen='0' 
    where id_dosen='$idDosenKompen' AND id_pekerjaan_kompen='$idTask'";


    $resultQueryDosenKompen = mysqli_query($con,$queryDosenKompen);
}

if(isset($_POST["tambahTask"]) || isset($_POST["submitKompenDosen"]) || isset($_POST["hapusTask"]) || isset($_POST["tambahVerifikasi"])){
    if($_GET["module"] == "krs" && $_GET["act"] == "tambah"){

        $result = ambilIdDosen($con, $_POST["idDosen"]);

        $tambahTaskQuery = "INSERT INTO tabel_pekerjaan_kompen (nama, kuota, id_dosen, id_semester)  
        VALUES ('$_POST[taskPekerjaan]','$_POST[kuotaMhs]', $result, $_POST[semesterKompen])";

        mysqli_query($con, $tambahTaskQuery);

        header('location:../module/index.php?module=' . $_GET["module"]);

    }

    else if($_GET["module"] == "krs" && $_GET["act"] == "hapus"){
            $hapusTask = "DELETE FROM tabel_pekerjaan_kompen WHERE id_pekerjaan_kompen='$_POST[idTask]'";

            mysqli_query($con, $hapusTask);

            header('location:../module/index.php?module=' . $_GET["module"]);
    }

    else if($_GET["module"]=="krs" && $_GET["act"]=="sumbitTask"){
        SumbitKompenDosen($con, $_POST['idDsnSubmitKmpn'], $_POST['idTask']);

        header('location:../module/index.php?module=' . $_GET["module"]);
    }

    else if($_GET["module"]=="krs" && $_GET["act"]=="editVerifikasi"){

        verifikasiDosen($con, $_POST['idMahasiswa'], $_POST['statusVerifikasi']);

        header('location:../module/index.php?module=' . $_GET["module"]);
    }
}


?>
