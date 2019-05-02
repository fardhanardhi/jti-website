<?php
include "../config/connection.php";

function semester($con)
{
    $semester = "select * from tabel_semester";

    $resultSemester = mysqli_query($con,$semester);
    return $resultSemester;
}
?>