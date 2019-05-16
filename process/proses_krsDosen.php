<?php
include "../config/connection.php";

function menampilkanDataProfilDosen($con, $idUser){

    $menampilkanProfilDosen="SELECT * FROM tabel_dosen td INNER JOIN tabel_user tu
    ON tu.username = td.nip WHERE tu.id_user = '$idUser'";

    $resultTampilProfilDosen=mysqli_query($con, $menampilkanProfilDosen);
    return $resultTampilProfilDosen;
}

function menampilkanTaskDosen($con, $idUser){
    $queryTask="SELECT tt.id_task, tt.pekerjaan, tt.kuota FROM tabel_task tt INNER JOIN tabel_dosen td
    ON tt.id_dosen = td.id_dosen WHERE td.id_user = '$idUser'";

    $resultQueryTask = mysqli_query($con, $queryTask);

    return $resultQueryTask;
}

function ambilIdDosen($con, $idUser){
    $queryAmbilId = "SELECT td.id_dosen FROM tabel_dosen td WHERE td.id_user='$idUser'";

    $resultQueryAmbilId = mysqli_query($con, $queryAmbilId);
    $resultFinal = mysqli_fetch_assoc($resultQueryAmbilId);
    
    return $resultFinal["id_dosen"];
}

if(isset($_POST["tambahTask"]) || isset_POST["hapusTask"]){
    if($_GET["module"] == "krs" && $_GET["act"] == "tambah"){

        

        $result = ambilIdDosen($con, $_POST["idDosen"]);

        $tambahTaskQuery = "INSERT INTO tabel_task (pekerjaan, kuota, id_dosen) VALUES ('$_POST[taskPekerjaan]', '$_POST[kuotaMhs]', $result)";

        mysqli_query($con, $tambahTaskQuery);

        header('location:../module/index.php?module=' . $_GET["module"]);

    }

    else if($_GET["module"] == "krs" && $_GET["act"] == "hapus"){
            $hapusTask = "DELETE FROM tabel_task WHERE id_task='$_POST[idTask]'";

            mysqli_query($con, $hapusTask);

            header('location:../module/index.php?module=' . $_GET["module"]);
    }
}


?>
