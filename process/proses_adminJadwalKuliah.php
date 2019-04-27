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

if (isset($_POST["insert"]) || isset($_POST["hapus"]))
{
    $id_ruang = $_POST['id_ruang'];
    $id_kelas = $_POST['id_kelas'];
    $id_dosen = $_POST['id_dosen'];
    $id_matkul = $_POST['id_matkul'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    // Query mencari id_prodi dan tingkat, sebenere gak perlu sampek diganti kolom database e
    $queryMencariProdiDanTingkat = "SELECT * FROM tabel_kelas where id_kelas='$id_kelas'";
    $resultMencariProdiDanTingkat = mysqli_query($con,$queryMencariProdiDanTingkat);
    $rowMencariProdiDanTingkat = mysqli_fetch_assoc($resultMencariProdiDanTingkat);

    $id_prodi = $rowMencariProdiDanTingkat["id_prodi"];
    $tingkat = $rowMencariProdiDanTingkat["tingkat"];

    if($_GET["module"]=="dataJadwalKuliah" && $_GET["act"]=="tambah")
    {

        $query =   "INSERT INTO tabel_jadwal (id_ruang, id_kelas, id_prodi, id_semester, id_dosen, id_matkul, hari, jam_mulai, jam_selesai, tingkat, waktu_edit)

        values ('$id_ruang','$id_kelas','$id_prodi','7','$id_dosen','$id_matkul','$hari','$jam_mulai','$jam_selesai','$tingkat',now())";

        mysqli_query($con, $query);

        header('location:../module/index.php?module=' . $_GET["module"]);
    }   
}

?>