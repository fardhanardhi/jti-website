<?php
include "../config/connection.php";

function jadwalKuliah($con)
{
    $jadwalKuliah = "select tp.kode,tk.tingkat,tk.kode_kelas,tp.nama,ts.semester,count(tj.id_matkul) as jumlah_matkul,sum(tm.sks) as jumlah_sks from tabel_jadwal tj,tabel_kelas tk,tabel_prodi tp,tabel_semester ts,tabel_matkul tm
    where tj.id_kelas = tk.id_kelas
    and tj.id_prodi = tp.id_prodi
    and tj.id_semester = ts.id_semester
    and tj.id_matkul = tm.id_matkul
    group by tj.id_kelas";

    $resultJadwalKuliah = mysqli_query($con,$jadwalKuliah);
    return $resultJadwalKuliah;
}

function dosen($con)
{
    $dosen = "select * from tabel_dosen";

    $resultDosen = mysqli_query($con,$dosen);
    return $resultDosen;
}

function ruang($con)
{
    $ruang = "select * from tabel_ruang";

    $resultRuang = mysqli_query($con,$ruang);
    return $resultRuang;
}

function matkul($con)
{
    $matkul = "select * from tabel_matkul";

    $resultMatkul = mysqli_query($con,$matkul);
    return $resultMatkul;
}

function kelas($con)
{
    $kelas = "select * from tabel_kelas tk,tabel_prodi tp
    where tk.id_prodi = tp.id_prodi
    order by kode,kode_kelas,tingkat";

    $resultKelas = mysqli_query($con,$kelas);
    return $resultKelas;
}
?>