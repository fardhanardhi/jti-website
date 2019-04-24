<?php
include "../config/connection.php";

function jadwalKuliah($con,$prodi,$kelas)
{
    $jadwalKuliah = "select tm.nama as nm_matkul,td.nama,tj.hari,tm.sks,tm.jam,tr.kode,tr.lantai from tabel_jadwal tj,tabel_matkul tm,tabel_dosen td,tabel_ruang tr
    where tj.id_matkul = tm.id_matkul
    and tj.id_dosen = td.id_dosen
    and tj.id_ruang = tr.id_ruang
    and tj.id_kelas = $kelas
    and tj.id_prodi = $prodi;";

    $resultJadwalKuliah = mysqli_query($con,$jadwalKuliah);
    return $resultJadwalKuliah;
}

function jadwalKuliahCariSemester($con,$prodi,$kelas,$semester)
{
    $jadwalKuliahCariSemester = "select tm.nama as nm_matkul,td.nama,tj.hari,tm.sks,tm.jam,tr.kode,tr.lantai from tabel_jadwal tj,tabel_matkul tm,tabel_dosen td,tabel_ruang tr
    where tj.id_matkul = tm.id_matkul
    and tj.id_dosen = td.id_dosen
    and tj.id_ruang = tr.id_ruang
    and tj.id_kelas = $kelas
    and tj.id_prodi = $prodi
    and tj.id_semester = $semester;";

    $resultJadwalKuliahCariSemester = mysqli_query($con,$jadwalKuliahCariSemester);
    return $resultJadwalKuliahCariSemester;
}

function semester($con)
{
    $semester = "select * from tabel_semester";

    $resultSemester = mysqli_query($con,$semester);
    return $resultSemester;
}
?>