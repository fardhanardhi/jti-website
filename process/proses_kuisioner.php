<?php
include "../config/connection.php";

function kuisioner($con, $tahun, $semester)
{
  $kuisioner = "select distinct(a.id_dosen), b.*, b.nama as namaDosen, c.id_semester, d.* from tabel_hasil_kuisioner a, tabel_dosen b, tabel_mahasiswa c, tabel_semester d where a.id_dosen=b.id_dosen and a.id_mahasiswa=c.id_mahasiswa and c.id_semester=d.id_semester and YEAR(a.waktu_edit)=$tahun and c.id_semester=$semester";
  $resultKuisioner = mysqli_query($con, $kuisioner);
  return $resultKuisioner;
}

function kuisionerCariDosen($con, $txtCariDosen){
  $kuisionerCariDosen="select distinct(a.id_dosen), b.*, b.nama as namaDosen, c.id_semester from tabel_hasil_kuisioner a, tabel_dosen b, tabel_mahasiswa c where a.id_dosen=b.id_dosen and a.id_mahasiswa=c.id_mahasiswa and (b.nama like '%$txtCariDosen%' or b.nip like '%$txtCariDosen%')";
  $resultKuisionerCariDosen = mysqli_query($con, $kuisionerCariDosen);
  return $resultKuisionerCariDosen;
}

function tampilTahun($con){
  $tahun="select distinct(YEAR(waktu_edit)) as tahun from tabel_hasil_kuisioner order by waktu_edit desc limit 5";
  $resultTahun = mysqli_query($con, $tahun);
  return $resultTahun;
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

function minIdSemester($con){
  $minIdSemester="select min(id_semester) as minIdSemester from tabel_semester";
  $resultIdSemester=mysqli_query($con, $minIdSemester);
  $row=mysqli_fetch_assoc($resultIdSemester);
  return $row["minIdSemester"];
}

function kelasDosen($con, $id_dosen)
{
  $kelasDosen = "select a.*, b.id_kelas, c.id_kelas from tabel_dosen a, tabel_jadwal b, tabel_kelas c where b.id_kelas=c.id_kelas and a.id_dosen=b.id_dosen and a.id_dosen=$id_dosen";
  $resultKelasDosen = mysqli_query($con, $kelasDosen);
  return $resultKelasDosen;
}

function tampilKelas($con, $id_kelas){
  $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
  $resultKelas = mysqli_query($con, $kelas);  
  $row=mysqli_fetch_assoc($resultKelas);
  $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
  return $hasil;
}

function cekStatusAktif($con){
  $status="select distinct(status_aktif) as status_aktif from tabel_kuisioner";
  $resultStatus = mysqli_query($con, $status);  
  $rowStatus=mysqli_fetch_assoc($resultStatus);
  if($rowStatus["status_aktif"]=='ya'){
    return true;
  }
  else if($rowStatus["status_aktif"]=='tidak'){
    return false;
  }
}

if(isset($_POST["hentikan"])){
  mysqli_query($con, "update tabel_kuisioner set status_aktif='tidak'");
}

if(isset($_POST["aktifkan"])){
  mysqli_query($con, "update tabel_kuisioner set status_aktif='ya'");
}

if(isset($_POST["namaDosen"])){
  $output='';
  $query="select * from tabel_dosen where id_dosen='$_POST[namaDosen]' ";
  $result=mysqli_query($con, $query);

  if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    echo "<h5 class='modal-title text-center'>".$row["nama"]."</h5>
          <input type='hidden' name='id_dosen' id='id_dosen' value='".$row["id_dosen"]."'>";
  }else{
    echo "-";
  }
}

if(isset($_POST["id_dosen"])){
  $output='';
  $query="select distinct(a.id_mahasiswa),sum(nilai) as totalNilai, c.*, d.* from tabel_hasil_kuisioner a, tabel_dosen b, tabel_mahasiswa c, tabel_semester d where a.id_dosen=b.id_dosen and a.id_mahasiswa=c.id_mahasiswa and c.id_semester=d.id_semester and c.id_kelas=$_POST[kelas] and YEAR(a.waktu_edit)=$_POST[tahun] and c.id_semester=$_POST[semester] and a.id_dosen=$_POST[id_dosen]";
  $result=mysqli_query($con, $query);

  if(mysqli_num_rows($result)>0){
    $output.="
      <table class='table table-striped table-bordered text-center'>
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Nilai Kuisioner</th>
        </tr>
      </thead>
      <tbody>";
      $no=1;
      while($row=mysqli_fetch_assoc($result)){
        $output.='
        <tr>
          <td>'.$no.'</td>
          <td>'.$row["nim"].'</td>
          <td>'.$row["nama"].'</td>
          <td>'.tampilkelas($con,$row["id_kelas"]).'</td>
          <td>'.$row["totalNilai"].'</td>
        </tr>';
        $no++;
      }
      $output .="
      </tbody>
    </table>";

    echo $output;

  }else{
    echo $output.="
      <div class='text-center'>
        <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
        <p class='text-muted'>Data Tidak Ditemukan</p>
      </div>";
  }
}

if(isset($_POST["lihatPerKelas"])){
  $output='';
  $query="select distinct(a.id_mahasiswa),b.nim, b.nama, count(distinct a.id_kuisioner) as 'telahMengisi' from tabel_hasil_kuisioner a, tabel_mahasiswa b, tabel_kelas c where a.id_mahasiswa=b.id_mahasiswa and b.id_kelas=b.id_kelas and b.id_kelas=$_POST[lihatPerKelas] group by a.id_mahasiswa";
  $result=mysqli_query($con, $query);

  $querySemuaKuisioner="select count(id_kuisioner) as 'semuaKuisioner' from tabel_kuisioner";
  $resultSemuaKuisioner=mysqli_query($con, $querySemuaKuisioner);
  $rowSemuaKuisioner=mysqli_fetch_assoc($resultSemuaKuisioner);
  
  if(mysqli_num_rows($result)>0){
    $output.="
      <table class='table table-striped table-bordered text-center'>
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Telah Mengisi Kuisioner</th>
          <th>Belum Mengisi Kuisioner</th>
        </tr>
      </thead>
      <tbody>";
      $no=1;
      while($row=mysqli_fetch_assoc($result)){
        $belumMengisi=$rowSemuaKuisioner["semuaKuisioner"]-$row["telahMengisi"];
        $output.='
        <tr>
          <td>'.$no.'</td>
          <td>'.$row["nim"].'</td>
          <td>'.$row["nama"].'</td>
          <td>'.$row["telahMengisi"].'</td>
          <td>'.$belumMengisi.'</td>
        </tr>';
        $no++;
      }
      $output .="
      </tbody>
    </table>";

    echo $output;

  }else{
    echo $output.="
      <div class='text-center'>
        <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
        <p class='text-muted'>Data Tidak Ditemukan</p>
      </div>";
  }
}

// Kriteria
function kriteria($con){
  $kriteria="select * from tabel_kuisioner";
  $resultKriteria = mysqli_query($con, $kriteria);
  return $resultKriteria;
}

function cariKriteria($con, $txtCariKriteria){
  $kriteria="select * from tabel_kuisioner where kriteria like '%$txtCariKriteria%'";
  $resultKriteria = mysqli_query($con, $kriteria);
  return $resultKriteria;
}

// CUD Kriteria
if(isset($_POST["edit_kuisioner"])){
  $output='';
  $query="select * from tabel_kuisioner where id_kuisioner='$_POST[edit_kuisioner]'";
  $result=mysqli_query($con, $query);

  if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    echo $row["kriteria"];
  }
}

if(isset($_POST["tambahIsi"]) || isset($_POST["editIsi"]) || isset($_POST["hapus"])){
  if($_GET["module"]=="kriteriaKuisioner" && $_GET["act"]=="tambah"){
    $status_aktif='tidak';
    if(cekStatusAktif($con)){
      $status_aktif='ya';
    }
    mysqli_query($con, "insert into tabel_kuisioner values('','$_POST[isiKriteria]','$status_aktif')");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }

  else if($_GET["module"]=="kriteriaKuisioner" && $_GET["act"]=="edit"){
    mysqli_query($con, "update tabel_kuisioner set kriteria='$_POST[isiKriteria]' where id_kuisioner='$_POST[id_kuisioner]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  
  else if($_GET["module"]=="kriteriaKuisioner" && $_GET["act"]=="hapus"){
    mysqli_query($con, "delete from tabel_kuisioner where id_kuisioner='$_POST[id_kuisioner]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
}