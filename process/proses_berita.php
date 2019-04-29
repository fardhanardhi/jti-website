<?php
include "../config/connection.php";

function tampilBerita($con)
{
    $tampilBerita="select * from tabel_info";
    $resultTampilBerita=mysqli_query($con, $tampilBerita);
    return $resultTampilBerita;
}

function tampilBeritaModal($con)
{
    $tampilBeritaModal="select a.id_info , a.judul, a.isi, a.tipe, a.waktu, a.*, 
    b.id_attachment, b.tipe, b.file from tabel_info a, tabel_attachment b
    where a.id_attachment = b.id_attachment group by a.id_info";
    $resultTampilBeritaModal=mysqli_query($con, $tampilBeritaModal);
    return $resultTampilBeritaModal;
}

function beritaCari($con, $tanggal)
{
    $beritaCari="select * from tabel_info";
    $resultBeritaCari=mysqli_query($con, $beritaCari);
    return $resultBeritaCari;
}

function jumlahKomentar($con){
    $jumlahKomentar = "select sum(b.id_info) as komentar from tabel_info a, 
    tabel_komentar b where 
    a.id_info = b.id_info
    and b.id_info = '$id_info'";
    $resultJumlahKomentar = mysqli_query($con, $jumlahKomentar);
    $rowJumlahKomentar = mysqli_fetch_assoc($resultJumlahKomentar);
    return $rowJumlahKomentar["jumlahKomentar"];
}
?>