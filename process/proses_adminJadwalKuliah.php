<?php
include "../config/connection.php";

function jadwalKuliah($con)
{
    $jadwalKuliah = "select tj.id_kelas,ts.id_semester,tp.kode,tk.tingkat,tk.kode_kelas,tp.nama,ts.semester,count(tj.id_matkul) as jumlah_matkul,sum(tm.sks) as jumlah_sks from tabel_jadwal tj,tabel_kelas tk,tabel_ruang tr,tabel_semester ts,tabel_dosen td,tabel_matkul tm,tabel_prodi tp
    where tj.id_kelas = tk.id_kelas
    and tj.id_ruang = tr.id_ruang
    and tj.id_semester = ts.id_semester
    and tj.id_dosen = td.id_dosen
    and tj.id_matkul = tm.id_matkul
    and tk.id_prodi = tp.id_prodi
    group by tj.id_semester,tj.id_kelas";

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

function semester($con)
{
    $semester = "select * from tabel_semester";

    $resultSemester = mysqli_query($con,$semester);
    return $resultSemester;
}

if (isset($_POST["insert"]) || isset($_POST["delete"]))
{
    $id_ruang = $_POST['id_ruang'];
    $id_kelas = $_POST['id_kelas'];
    $id_dosen = $_POST['id_dosen'];
    $id_matkul = $_POST['id_matkul'];
    $id_semester = $_POST['id_semester'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    if($_GET["module"]=="dataJadwalKuliah" && $_GET["act"]=="tambah")
    {

        $queryInsert =   "INSERT INTO tabel_jadwal (id_ruang, id_kelas, id_semester, id_dosen, id_matkul, hari, jam_mulai, jam_selesai, waktu_edit)

        values ('$id_ruang','$id_kelas','$id_semester','$id_dosen','$id_matkul','$hari','$jam_mulai','$jam_selesai',now())";

        mysqli_query($con, $queryInsert);

        header('location:../module/index.php?module=' . $_GET["module"]);
    }
    else if($_GET["module"]=="dataJadwalKuliah" && $_GET["act"]=="hapus")
    {
        $queryDelete = "DELETE FROM tabel_jadwal WHERE id_kelas='$id_kelas' and id_semester='$id_semester'";

        mysqli_query($con,$queryDelete);

        header('location:../module/index.php?module=' . $_GET["module"]);
    } 
}

?>