<?php
include "../config/connection.php";

//Data Mahasiswa Kelas
function kelas($con)
{
    $kelas = "select tm.id_mahasiswa, tm.id_user,tm.nim,tm.nama as nama_mahasiswa,tm.jenis_kelamin,tm.alamat 
    from tabel_mahasiswa tm,tabel_user tu,tabel_kelas tk
    where tm.id_user = tu.id_user
    and tm.id_kelas = tk.id_kelas";
    $resultKelas = mysqli_query($con, $kelas);
    return $resultKelas;
}
?>