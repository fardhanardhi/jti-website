<?php
include "../config/connection.php";

function semester($con)
{
    $semester = "select * from tabel_semester";

    $resultSemester = mysqli_query($con,$semester);
    return $resultSemester;
}

function krsCariSemester($con,$idMahasiswa,$semester)
{
    $krsCariSemester = "select * from tabel_krs
    where id_mahasiswa = $idMahasiswa
    and id_semester = $semester";

    $resultKrsCariSemester = mysqli_query($con,$krsCariSemester);
    return $resultKrsCariSemester;
}

function krsCariStatusVerifikasi($con, $idMahasiswa, $semester)
{
    $krsCariStatusVerifikasi = "select * from tabel_krs
    where id_semester = $semester
    and id_mahasiswa = $idMahasiswa";

    $resultKrsCariStatusVerifikasi = mysqli_query($con,$krsCariStatusVerifikasi);
    return $resultKrsCariStatusVerifikasi;
}

?>