<?php
include "../config/connection.php";

// function tampilDosen($con, $idUser, $idDosen)
// {
//   $tampilDosen = "select a.*, b.* from tabel_khs a, tabel_matkul b, tabel_mahasiswa c, tabel_user d where a.id_matkul=b.id_matkul and a.id_mahasiswa=c.id_mahasiswa and c.id_user=d.id_user and d.id_user='$idUser' and a.id_semester=$idSemester";
//   $resulttampilDosen = mysqli_query($con, $tampilDosen);
//   return $resulttampilDosen;
// }

// function dataDosen($con)
// {
//     $query = "SELECT 
                                                
//         tabel_user.username, 
//         tabel_user.password, 

//         tabel_dosen.id_dosen,
//         tabel_dosen.nip, 
//         tabel_dosen.nama, 
//         tabel_dosen.alamat, 
//         tabel_dosen.jenis_kelamin, 
//         tabel_dosen.tempat_lahir, 
//         tabel_dosen.tanggal_lahir, 
//         tabel_dosen.foto
        
//         FROM tabel_user INNER JOIN
//         tabel_dosen ON 
//         tabel_user.username = tabel_dosen.nip
//         ";
        
//     $resultDataDosen = mysqli_query($con,$dataDosen);
//     return $resultDataDosen;    
// }

// function dataDosen($con)
// {
//     $kompen = "select a.*, b.username, b.password as pass, c.* from tabel_user a, tabel_mahasiswa b, tabel_dosen c, tabel_prodi d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and b.id_prodi=d.id_prodi";
// }

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