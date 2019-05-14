<?php
include "../config/connection.php";

function krs($con)
{
    $krs = "SELECT DISTINCT tabel_krs.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs.status_daftar_ulang, tabel_krs.gambar_krs, tabel_krs.gambar_krs
    FROM tabel_krs INNER JOIN tabel_mahasiswa ON tabel_krs.id_mahasiswa = tabel_mahasiswa.id_mahasiswa";
    
    $resultTampilKrs = mysqli_query($con, $krs);
    return $resultTampilKrs;
}

function krsCari($con, $kelas)
{
    $krs = "SELECT DISTINCT tabel_krs.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs.status_daftar_ulang, tabel_krs.gambar_krs, tabel_mahasiswa.id_kelas
    FROM tabel_krs INNER JOIN tabel_mahasiswa ON tabel_krs.id_mahasiswa = tabel_mahasiswa.id_mahasiswa
    AND tabel_mahasiswa.id_kelas='$kelas'";
    
    $resultTampilKrs = mysqli_query($con, $krs);
    return $resultTampilKrs;
}

function krsCariSemester($con, $kelas, $semester)
{
    $krs = "SELECT DISTINCT tabel_krs.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs.status_daftar_ulang, tabel_krs.gambar_krs, tabel_mahasiswa.id_kelas, tabel_krs.id_semester
    FROM tabel_krs INNER JOIN tabel_mahasiswa ON tabel_krs.id_mahasiswa = tabel_mahasiswa.id_mahasiswa
    AND tabel_mahasiswa.id_kelas='$kelas' AND tabel_krs.id_semester='$semester'";
    
    $resultTampilKrs = mysqli_query($con, $krs);
    return $resultTampilKrs;
}

function kelas($con){
    $kelas="select * from tabel_kelas";
    $resultKelas = mysqli_query($con, $kelas);
    return $resultKelas;
}

function tampilSemester($con){
    $semester="select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

function minKelas($con){
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}

function minSemester($con){
	$minSemester = "select min(id_semester) as minSemester from tabel_semester";
	$resultMinSemester = mysqli_query($con, $minSemester);
	$rowMinSemester=mysqli_fetch_assoc($resultMinSemester);
	return $rowMinSemester["minSemester"];
}

function tampilKelas($con, $id_kelas){
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
}

if(isset($_POST["hapusKrs"])){
    if($_GET["module"]=="krs" || $_GET["module"]=="krsPerKelas" && $_GET["act"]=="hapus"){
        $hapusKrs="update tabel_krs set gambar_krs=null where id_krs = '$_POST[id_krs]'";
        mysqli_query($con, $hapusKrs);
        header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

if(isset($_POST["lihatKrs"])){
    if($_GET["module"]=="krs" || $_GET["module"]=="krsPerKelas" && $_GET["act"]=="edit"){
      mysqli_query($con, "SELECT * FROM tabel_krs WHERE id_krs=$_POST'[id_krs]'");
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

if(isset($_POST["lihat_krs"])){
    $lihat = "select * from tabel_krs where id_krs=$_POST[lihat_krs]";
    $resultLihat = mysqli_query($con, $lihat);
    if(mysqli_num_rows($resultLihat)>0){
      $row=mysqli_fetch_assoc($resultLihat);
      $output="";
        $output.="
        <center>
            <img src='../attachment/img/$row[gambar_krs]' width='100%'>
        </center>";
        echo $output;
    }
}
    $module=$_GET['module'];
    $proses=$_GET['act'];

    if($module=='krs' || $module=='krsPerKelas' && $proses=='updateFoto'){
        if(!$_FILES["foto"]["name"]==""){
            $code=$_FILES["foto"]["error"];
                    if($code===0){
                        $nama_folder="../attachment/img";
                        $tmp=$_FILES["foto"]["tmp_name"];
                        $nama_file=$_FILES["foto"]["name"];
                        $path="$nama_folder/$nama_file";
                        $upload_check=false;
                        $tipe_file=array("image/jpeg","image/jpg","image/png");
                
                        if(!in_array($_FILES["foto"]["type"],$tipe_file)){
                            ?><script>alert("Cek kembali ekstensi file anda (*.jpeg,*.jpg,*.png)"); </script><?php
                            $upload_check=true;
                            header('location:../module/index.php?module=' . $module);
                        }
                        if(!$upload_check and move_uploaded_file($tmp,$path)){
                            mysqli_query($con, "update tabel_krs set gambar_krs='$nama_file' 
                            where id_krs=$_POST[id_krs]");
                            header('location:../module/index.php?module=' . $module);
                        }
                        else{
                            ?><script>alert("Upload gambar gagal!"); </script><?php
                            header('location:../module/index.php?module=' . $module);
                        }
                    }
                }
    }
?>