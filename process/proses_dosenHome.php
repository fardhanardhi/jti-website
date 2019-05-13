<?php
include "../config/connection.php";

function tampilDataProfilDosen($con, $idUser){
 $tampilProfilDosen="SELECT * FROM tabel_dosen td INNER JOIN tabel_user tu
                     ON tu.username = td.nip where tu.id_user = '$idUser'";
 $resultTampilProfilDosen=mysqli_query($con, $tampilProfilDosen);
 return $resultTampilProfilDosen;
}

?>