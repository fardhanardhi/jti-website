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


?>
