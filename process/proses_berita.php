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

function jumlahKomentar($con, $id_info){
    $jumlahKomentar = "select (b.id_info + c.id_komentar) as komentar , a.*, b.*, c.*
    from tabel_info a, tabel_komentar b, tabel_reply_komentar c where 
    a.id_info = b.id_info
    and b.id_komentar = c.id_komentar
    and b.id_info = $id_info group by a.id_info";

    $resultJumlahKomentar = mysqli_query($con, $jumlahKomentar);
    if(mysqli_num_rows($resultJumlahKomentar) > 0){
        $rowJumlahKomentar = mysqli_fetch_assoc($resultJumlahKomentar);
        return $rowJumlahKomentar["komentar"];
    } else {
        return "0";
    }
}

?>