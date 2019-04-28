<?php
include "../config/connection.php";

function krs($con)
{
    $krs = "SELECT DISTINCT tabel_krs_admin.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs_admin.status_daftar_ulang, tabel_krs_admin.gambar_krs, tabel_krs_admin.gambar_krs
    FROM tabel_krs_admin INNER JOIN tabel_mahasiswa ON tabel_krs_admin.id_mahasiswa = tabel_mahasiswa.id_mahasiswa";
    
    $resultTampilKrs = mysqli_query($con, $krs);
    return $resultTampilKrs;
}

function krsCari($con, $kelas)
{
    $krs = "SELECT DISTINCT tabel_krs_admin.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs_admin.status_daftar_ulang, tabel_krs_admin.gambar_krs, tabel_mahasiswa.id_kelas
    FROM tabel_krs_admin INNER JOIN tabel_mahasiswa ON tabel_krs_admin.id_mahasiswa = tabel_mahasiswa.id_mahasiswa
    AND tabel_mahasiswa.id_kelas='$kelas'";
    
    $resultTampilKrs = mysqli_query($con, $krs);
    return $resultTampilKrs;
}

function krsCariSemester($con, $kelas, $semester)
{
    $krs = "SELECT DISTINCT tabel_krs_admin.id_krs, tabel_mahasiswa.nim, tabel_mahasiswa.nama,
    tabel_krs_admin.status_daftar_ulang, tabel_krs_admin.gambar_krs, tabel_mahasiswa.id_kelas, tabel_krs_admin.id_semester
    FROM tabel_krs_admin INNER JOIN tabel_mahasiswa ON tabel_krs_admin.id_mahasiswa = tabel_mahasiswa.id_mahasiswa
    AND tabel_mahasiswa.id_kelas='$kelas' AND tabel_krs_admin.id_semester='$semester'";
    
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
        $hapusKrs="update tabel_krs_admin set gambar_krs=null where id_krs = '$_POST[id_krs]'";
        mysqli_query($con, $hapusKrs);
        header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

if(isset($_POST["lihatKrs"])){
    if($_GET["module"]=="krs" || $_GET["module"]=="krsPerKelas" && $_GET["act"]=="edit"){
      mysqli_query($con, "SELECT * FROM tabel_krs_admin WHERE id_krs=$_POST'[id_krs]'");
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

if(isset($_POST["lihat_krs"])){
    $lihat = "select * from tabel_krs_admin where id_krs=$_POST[lihat_krs]";
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

if (isset($_POST["upload"])) {
    if($_GET["module"]=="krs" || $_GET["module"]=="krsPerKelas" && $_GET["act"]=="upload"){
    $message  = '';
    $valid_file  = true;
    $idKrs= $_GET["id"];
    if($_FILES['photo']['name']){
    // if no errors...
    
        if(!$_FILES['photo']['error']){
        
        // now is the time to modify the future file name and validate the file
        $new_file_name = strtolower($_FILES['photo']['tmp_name']); //rename file menjadi huruf kecil
        
        // Mengatur format file yang boleh diupload
        $image_path = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION); //ambil extensi file
        $extension = strtolower($image_path); //rename extensi file menjadi huruf kecil
        
        if($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif" ) {
        $valid_file = false;
        //$message = "Maaf, file yang diijinkan hanya format JPG, JPEG, PNG & GIF. #".$extension;
        header('location:../module/index.php?module=' . $_GET["module"]);
        }
        
        // jika file lolos filter
        if($valid_file == true)
        {
            // mengganti nama gambar
            $rename_nama_file = date('YmdHis');
            $nama_file_baru  = $rename_nama_file.'.'.$extension;
            
            $sql = "UPDATE tabel_krs_admin SET gambar_krs='$nama_file_baru'
            WHERE id_krs = '$idKrs'";
            if (!mysqli_query($con, $sql)) {
                echo "Error: ".mysqli_error($con)."
            ";
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            
            //memindahkan gambar ke tempat yang kita inginkan
            move_uploaded_file($_FILES['photo']['tmp_name'], '../attachment/img/'.$nama_file_baru);
            header('location:../module/index.php?module=' . $_GET["module"]);
            }
            }
            //if there is an error...
            else
            {
            //set that to be the returned message
            //$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['photo']['error'];
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
        }
    }
}
?>