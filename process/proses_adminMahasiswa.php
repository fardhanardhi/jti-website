<?php
include "../config/connection.php";

function tampilProdi($con){
    $prodi = "select * from tabel_prodi";
    $resultProdi = mysqli_query($con, $prodi);
    return $resultProdi;
}

function kelas($con){
    $kelas = "select * from tabel_kelas";
    $resultKelas = mysqli_query($con, $kelas);
    return $resultKelas;
}

function tampilSemester($con){
    $semester="select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

function tampilKelas($con, $id_kelas){
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
}

if (isset($_POST["insert"]) || isset($_POST["hapusMahasiswa"]) || isset($_POST["editMahasiswa"])){

    if($_GET["module"]=="dataMahasiswa" && $_GET["act"]=="tambah"){

        // echo($_POST["passwordMahasiswaAdmin"]); 

        // die();

         $nama_folder = "img";
         $tmp = $_FILES["fileid2"]["tmp_name"];
         $nama_file = $_FILES["fileid2"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

        //  echo($nama_file);

        //  die();
   
        

     $query1 = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameMahasiswaAdmin]',
         '$_POST[passwordMahasiswaAdmin]',
         'mahasiswa'
     ); ";

     $query2 = "INSERT INTO tabel_mahasiswa (id_prodi,
     id_kelas,
     id_semester,
     nim,
     nama,
     alamat,
     jenis_kelamin,
     tempat_lahir,
     foto,
     id_user,
     waktu_edit,
     tanggal_lahir
     )

     values
     ('$_POST[prodiMahasiswa]',
     '$_POST[kelasMahasiswa]',
     '$_POST[semesterMahasiswa]',
     '$_POST[nimMahasiswaAdmin]',
     '$_POST[namaMahasiswaAdmin]',    
     '$_POST[alamatMahasiswaAdmin]',
     '$_POST[genderMahasiswaAdmin]',
     '$_POST[tempatlahirMahasiswaAdmin]',
      '$nama_file',
     (select id_user from tabel_user where username='$_POST[usernameMahasiswaAdmin]'),
     curdate(),
     '$_POST[tahunLahirMahasiswa]-$_POST[bulanLahirMahasiswa]-$_POST[tanggalLahirMahasiswa]');";

     $query3 = "INSERT INTO tabel_absensi (id_mahasiswa, sakit, ijin, alpa, jumlah, id_status_mahasiswa, id_semester)

     values
     ((SELECT id_mahasiswa FROM tabel_mahasiswa WHERE nim='$_POST[nimMahasiswaAdmin]'),
     0,
     0,
     0,
     0,
     7,
     '$_POST[semesterMahasiswa]'
     );
     ";

        if(mysqli_query($con, $query1) AND mysqli_query($con, $query2) AND mysqli_query($con, $query3)){
            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }   

    else if($_GET["module"]=="dataMahasiswa" && $_GET["act"]=="hapus")
    {
        $delete=$_POST['id_user'];
        $idnya = $_POST['id_mahasiswa'];

        $queryDelete5 = "DELETE FROM tabel_krs WHERE id_mahasiswa='$idnya';";
        $queryDelete3 = "DELETE FROM tabel_absensi WHERE id_mahasiswa='$idnya';";
        $queryDelete = "DELETE FROM tabel_mahasiswa WHERE id_user='$idnya';";
        $queryDelete2 = "DELETE FROM tabel_user WHERE id_user='$delete';";


        if(mysqli_query($con,$queryDelete5) && mysqli_query($con,$queryDelete3) && mysqli_query($con,$queryDelete) && mysqli_query($con,$queryDelete2)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
       
    } 

    else if($_GET["module"]=="dataMahasiswa" && $_GET["act"]=="edit"){

        $update = $_POST["id_userUpdate"];
        $id_mahasiswaUpdate = $_POST["id_mahasiswaUpdate"];

        //  echo($_POST["id_mahasiswaUpdate"]); 

        // die();

         $nama_folder = "img";
         $tmp = $_FILES["fileid3"]["tmp_name"];
         $namanya_file = $_FILES["fileid3"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$namanya_file");

        // echo($namanya_file);

        // die();


        $query9 = "UPDATE tabel_user 
        set username='$_POST[usernameMahasiswaAdmin2]',
        password='$_POST[passwordMahasiswaAdmin2]'
        where id_user= '$update';";

        $query10="UPDATE tabel_mahasiswa 
        set id_prodi = '$_POST[prodiMahasiswa2]',
        id_semester = '$_POST[semesterMahasiswa2]',
        id_kelas = '$_POST[kelasMahasiswa2]',
        nim = '$_POST[nimMahasiswaAdmin2]',
        nama = '$_POST[namaMahasiswaAdmin2]',
        alamat = '$_POST[alamatMahasiswaAdmin2]',
        jenis_kelamin = '$_POST[genderMahasiswaAdmin3]',
        tempat_lahir = '$_POST[tempatlahirMahasiswaAdmin2]',
        foto = '$namanya_file',
        waktu_edit = curdate(),
        tanggal_lahir = '$_POST[tahunLahirMahasiswa2]-$_POST[bulanLahirMahasiswa2]-$_POST[tanggalLahirMahasiswa2]'
        where id_user='$update';";

        $query11="UPDATE tabel_absensi SET id_semester = '$_POST[semesterMahasiswa2]' WHERE id_mahasiswa='$id_mahasiswaUpdate';";

        if(mysqli_query($con,$query9) && mysqli_query($con,$query10) && mysqli_query($con,$query11)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }

}

function opsiTanggal($tanggalLahir){
    $output="";
    $tanggal= date('d', strtotime($tanggalLahir));
    for($i=1;$i<=31;$i++){
      if($tanggal == $i){
        $output.="<option value='$i' selected='selected'>$i</option>";
      }else{
        $output.="<option value='$i'>$i</option>";
      }
    }
    return $output;
}

function opsiBulan($tanggalLahir){
    $output="";
    $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $bulan= date('m', strtotime($tanggalLahir));
    for($i=1;$i<=12;$i++){
      $tampilBulan=$arrBulan[$i-1];
      if($bulan == $i){
        $output.="<option value='$i' selected='selected'>$tampilBulan</option>";
      }else{
        $output.="<option value='$i'>$tampilBulan</option>";
      }
    }
    return $output;
}

function opsiTahun($tanggalLahir){
    $output="";
    $tahun= date('Y', strtotime($tanggalLahir));
    for($i=1;$i<=2019;$i++){
      if($tahun == $i){
        $output.="<option value='$i' selected='selected'>$i</option>";
      }else{
        $output.="<option value='$i'>$i</option>";
      }
    }
    return $output;
}
?>
