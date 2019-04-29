<?php
include "../config/connection.php";

// function username($con)
// {
//     $username = "select * from tabel_user";

//     $resultUsername = mysqli_query($con,$username);
//     return $resultUsername;
// }
// function password($con)
// {
//     $password = "select * from tabel_user";

//     $resultPassword = mysqli_query($con,$password);
//     return $resultPassword;
// }

// function gambar($con)
// {
//     $password = "select * from tabel_user";

//     $resultPassword = mysqli_query($con,$password);
//     return $resultPassword;
// }

// function nip($con)
// {
//     $nip = "select * from tabel_dosen";

//     $resultNip = mysqli_query($con,$nip);
//     return $resultNip;
// }

// function nama($con)
// {
//     $nama = "select * from tabel_dosen";

//     $resultNama = mysqli_query($con,$nama);
//     return $resultNama;
// }

// function tempatLahir($con)
// {
//     $tempatLahir = "select * from tabel_dosen";

//     $resultTempatLahir = mysqli_query($con,$tempatLahir);
//     return $resultTempatLahir;
// }


// // tanggal lhir
// function optionTanggal($tanggalEdit){
//     $output="";
//     $tanggal= date('d', strtotime($tanggalEdit));
//     for($i=1;$i<=31;$i++){
//       if($tanggal == $i){
//         $output.="<option value='$i' selected='selected'>$i</option>";
//       }else{
//         $output.="<option value='$i'>$i</option>";
//       }
//     }
//     return $output;
//   }
  
//   function optionBulan($tanggalEdit){
//     $output="";
//     $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
//     $bulan= date('m', strtotime($tanggalEdit));
//     for($i=1;$i<=12;$i++){
//       $tampilBulan=$arrBulan[$i-1];
//       if($bulan == $i){
//         $output.="<option value='$i' selected='selected'>$tampilBulan</option>";
//       }else{
//         $output.="<option value='$i'>$tampilBulan</option>";
//       }
//     }
//     return $output;
//   }
  
//   function optionTahun($tanggalEdit){
//     $output="";
//     $tahun= date('Y', strtotime($tanggalEdit));
//     for($i=$tahun-4;$i<=$tahun;$i++){
//       if($tahun == $i){
//         $output.="<option value='$i' selected='selected'>$i</option>";
//       }else{
//         $output.="<option value='$i'>$i</option>";
//       }
//     }
//     return $output;
//   }
// // tutup tgl lagir

// function jenisKelamin($con)
// {
//     $jenisKelamin = "select * from tabel_dosen";

//     $resultJenisKelamin = mysqli_query($con,$jenisKelamin);
//     return $resultJenisKelamin;
// }

// function alamat($con)
// {
//     $alamat = "select * from tabel_dosen";

//     $resultAlamat = mysqli_query($con,$alamat);
//     return $resultAlamat;
// }

if (isset($_POST["insert"]) || isset($_POST["delete"]))
{
    if($_GET["module"]=="dataDosen" && $_GET["act"]=="tambah"){

        // echo($_POST["semesterMahasiswa"]); 


     $query1 = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameDosenAdmin]',
         '$_POST[passwordDosenAdmin]',
         'dosen'

     ); ";

     $query2 = "INSERT INTO tabel_dosen (
     nip,
     nama,
     alamat,
     jenis_kelamin,
     tempat_lahir,
     foto,
     id_user
     )

     values
     '$_POST[nimDosenAdmin]',
     '$_POST[namaDosenAdmin]',    
     '$_POST[alamatDosenAdmin]',
     '$_POST[genderDosenAdmin]',
     '$_POST[tempatlahirDosenAdmin]',
     '$_POST[fileid]', (select max(id_user) from tabel_user)
     );";

     
        if(mysqli_query($con, $query1) AND mysqli_query($con, $query2)){
            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }   
}

?>
