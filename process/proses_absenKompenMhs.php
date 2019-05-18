<?php
include "../config/connection.php";
function semester($con)
{
    $semester="select a.waktu,a.jumlah_jam,b.nama,c.nama as nama_dosen
    from tabel_kompen a, tabel_pekerjaan_kompen b, tabel_dosen c
    where a.id_pekerjaan_kompen = b.id_pekerjaan_kompen
    and a.id_dosen = c.id_dosen";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

function absensi($con)
{
    $absen="select a.sakit, a.ijin, a.alpha, b.*
    from tabel_absensi a, tabel_mahasiswa b
    where a.id_mahasiswa = b.id_mahasiswa";
    $resultAbsen = mysqli_query($con, $absen);
    return $resultAbsen;
}

function tampil($con)
{
    $tampil="select * from tabel_absensi";
    $resultTampil = mysqli_query($con, $absen);
    return $resultAbsen;
}
?>