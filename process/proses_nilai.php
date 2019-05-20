<?php
include "../config/connection.php";

function khs($con, $idUser)
{
  $khs = "select a.*, b.* from tabel_khs a, tabel_matkul b, tabel_mahasiswa c, tabel_user d where a.id_matkul=b.id_matkul and a.id_mahasiswa=c.id_mahasiswa and c.id_user=d.id_user and d.id_user='$idUser' and a.id_semester=c.id_semester";
  $resultKhs = mysqli_query($con, $khs);
  return $resultKhs;
}

function filterKhs($con, $idUser, $idSemester)
{
  $filterKhs = "select a.*, b.* from tabel_khs a, tabel_matkul b, tabel_mahasiswa c, tabel_user d where a.id_matkul=b.id_matkul and a.id_mahasiswa=c.id_mahasiswa and c.id_user=d.id_user and d.id_user='$idUser' and a.id_semester=$idSemester";
  $resultFilterKhs = mysqli_query($con, $filterKhs);
  return $resultFilterKhs;
}

function cekSemester($con, $idUser){
    $cekSemester="select a.id_semester from tabel_semester a, tabel_mahasiswa b where a.id_semester=b.id_semester and b.id_user='$idUser'";
    $resultCekSemester=mysqli_query($con, $cekSemester);
    $row=mysqli_fetch_assoc($resultCekSemester);
    return $row["id_semester"];
}

function semester($con){
    $semester="select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

// function indeksSemester($con, $idUser){
//     $idSemester=cekSemester($con, $idUser);
//     $indeksSemester = "select avg(a.nilai) as indeksSemester from tabel_khs a, tabel_matkul b, tabel_mahasiswa c, tabel_user d where a.id_matkul=b.id_matkul and a.id_mahasiswa=c.id_mahasiswa and c.id_user=d.id_user and d.id_user='$idUser' and a.id_semester=$idSemester";
//     $resultIndeksSemester = mysqli_query($con, $indeksSemester);
//     $rowIndeksSemester=mysqli_fetch_assoc($resultIndeksSemester);
//     return $rowIndeksSemester["indeksSemester"];
// }

function indeksSemesterFix($con, $idUser, $idSemester){
  $indeksSemesterFix = "select ROUND(avg(a.nilai),2) as indeksSemester from tabel_khs a, tabel_matkul b, tabel_mahasiswa c, tabel_user d where a.id_matkul=b.id_matkul and a.id_mahasiswa=c.id_mahasiswa and c.id_user=d.id_user and d.id_user='$idUser' and a.id_semester=$idSemester";
  $resultIndeksSemesterFix = mysqli_query($con, $indeksSemesterFix);
  $rowIndeksSemesterFix=mysqli_fetch_assoc($resultIndeksSemesterFix);
  if($rowIndeksSemesterFix["indeksSemester"] == NULL){
    return 0;
  }else{
    return $rowIndeksSemesterFix["indeksSemester"];
  }
}

function indeksSemesterKumulatif($con, $id_mahasiswa){  
    $indeksSemesterKumulatif = "select distinct(ROUND(SUM(CASE
    WHEN a.nilai > 80 THEN 4.00*c.sks
    WHEN a.nilai > 70 && a.nilai <= 80 THEN 3.50*c.sks
    WHEN a.nilai > 65 && a.nilai <= 70 THEN 3.00*c.sks
    WHEN a.nilai > 60 && a.nilai <= 65 THEN 2.30*c.sks
    WHEN a.nilai > 50 && a.nilai <= 60 THEN 2.00*c.sks
    WHEN a.nilai > 40 && a.nilai <= 50 THEN 1.00*c.sks
    ELSE
    0.00*c.sks
    END)/SUM(c.sks),2)) as ipk , a.*, b.*, 
    c.*, d.*, e.* from tabel_khs a,
    tabel_mahasiswa b, tabel_matkul c, tabel_jadwal d, tabel_semester e
    where a.id_mahasiswa = b.id_mahasiswa
    and d.id_matkul = c.id_matkul 
    and d.id_semester = e.id_semester
    and a.id_mahasiswa = $id_mahasiswa";
    
    $resultIndeksSemesterKumulatif = mysqli_query($con, $indeksSemesterKumulatif);
    $rowIndeksSemesterKumulatif=mysqli_fetch_assoc($resultIndeksSemesterKumulatif);
    if($rowIndeksSemesterKumulatif["ipk"] == NULL){
      return 0;
    }else{
      return$rowIndeksSemesterKumulatif["ipk"];
    }
}

// konversi nilai
function grade($nilai)
{
    if ($nilai > 80 )
    { 
        $grade='A';
        $nindex = 4;
    } 
    else if (($nilai > 70) && ($nilai <= 80))
    { 
        $grade='B+';
        $nindex = 3.5;
    } 
    else if (($nilai > 65) && ($nilai <= 70))
    { 
        $grade='B';
        $nindex = 3.00;
    }
    else if (($nilai > 60) && ($nilai <= 65))
    { 
        $grade='C+';
        $nindex = 2.30;
    }
    else if (($nilai > 50) && ($nilai <= 60))
    { 
        $grade='C';
        $nindex = 2.00;
    }
    else if (($nilai > 40) && ($nilai <= 50))
    { 
        $grade='D';
        $nindex = 1.00;
    }
    else if ($nilai <= 40)
    { 
        $grade='E';
        $nindex = 0.00;
    }

 return $grade;
}

function khsNilai($con, $id_mahasiswa, $id_semester){
  $khsNilai = "select distinct(ROUND(SUM(CASE
  WHEN a.nilai > 80 THEN 4.00*c.sks
  WHEN a.nilai > 70 && a.nilai <= 80 THEN 3.50*c.sks
  WHEN a.nilai > 65 && a.nilai <= 70 THEN 3.00*c.sks
  WHEN a.nilai > 60 && a.nilai <= 65 THEN 2.30*c.sks
  WHEN a.nilai > 50 && a.nilai <= 60 THEN 2.00*c.sks
  WHEN a.nilai > 40 && a.nilai <= 50 THEN 1.00*c.sks
  ELSE
  0.00*c.sks
  END)/SUM(c.sks),2)) as ip , a.*, b.*, 
  c.*, d.*, e.* from tabel_khs a,
  tabel_mahasiswa b, tabel_matkul c, tabel_jadwal d, tabel_semester e
  where a.id_mahasiswa = b.id_mahasiswa
  and d.id_matkul = c.id_matkul 
  and d.id_semester = e.id_semester
  and a.id_mahasiswa = $id_mahasiswa and a.id_semester = $id_semester group by a.id_mahasiswa";

  $resultTampilKhsNilai = mysqli_query($con, $khsNilai);
  if(mysqli_num_rows($resultTampilKhsNilai)>0){
      $rowKhsNilai = mysqli_fetch_assoc($resultTampilKhsNilai);
      return $rowKhsNilai["ip"];
  } else{
      return 0;
  }
} 
?>