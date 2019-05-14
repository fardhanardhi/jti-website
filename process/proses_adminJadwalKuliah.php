<?php
include "../config/connection.php";

function jadwalKuliah($con)
{
    $jadwalKuliah = "select tj.id_kelas,ts.id_semester,tp.kode,tk.tingkat,tk.kode_kelas,tp.nama,ts.semester,count(tj.id_matkul) as jumlah_matkul,sum(tm.sks) as jumlah_sks from tabel_jadwal tj,tabel_kelas tk,tabel_ruang tr,tabel_semester ts,tabel_dosen td,tabel_matkul tm,tabel_prodi tp
    where tj.id_kelas = tk.id_kelas
    and tj.id_ruang = tr.id_ruang
    and tj.id_semester = ts.id_semester
    and tj.id_dosen = td.id_dosen
    and tj.id_matkul = tm.id_matkul
    and tk.id_prodi = tp.id_prodi
    group by tj.id_semester,tj.id_kelas";

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

function semester($con)
{
    $semester = "select * from tabel_semester";

    $resultSemester = mysqli_query($con,$semester);
    return $resultSemester;
}

function tampilDosen($con, $id_dosenEdit)
{
    $dosenMenu = "select * from tabel_dosen";
    $resultDosenMenu = mysqli_query($con, $dosenMenu);
    
    $output="";

    if(mysqli_num_rows($resultDosenMenu)>0)
    {
        while($rowDosen=mysqli_fetch_assoc($resultDosenMenu))
        {
            if($rowDosen["id_dosen"]==$id_dosenEdit)
            {
                $output.="<option value='$rowDosen[id_dosen]' selected>".$rowDosen["nama"]."</option>";
            }
            else
            {
                $output.="<option value='$rowDosen[id_dosen]'>$rowDosen[nama]</option>";
            }
        }
    }
    return $output;
}

function tampilRuang($con, $id_ruangEdit)
{
    $ruangMenu = "select * from tabel_ruang";
    $resultRuangMenu = mysqli_query($con, $ruangMenu);
    
    $output="";

    if(mysqli_num_rows($resultRuangMenu)>0)
    {
        while($rowRuang=mysqli_fetch_assoc($resultRuangMenu))
        {
            if($rowRuang["id_ruang"]==$id_ruangEdit)
            {
                $output.="<option value='$rowRuang[id_ruang]' selected>".$rowRuang["kode"]."</option>";
            }
            else
            {
                $output.="<option value='$rowRuang[id_ruang]'>$rowRuang[kode]</option>";
            }
        }
    }
    return $output;
}

function tampilMatkul($con, $id_matkulEdit)
{
    $matkulMenu = "select * from tabel_matkul";
    $resultMatkulMenu = mysqli_query($con, $matkulMenu);
    
    $output="";

    if(mysqli_num_rows($resultMatkulMenu)>0)
    {
        while($rowMatkul=mysqli_fetch_assoc($resultMatkulMenu))
        {
            if($rowMatkul["id_matkul"]==$id_matkulEdit)
            {
                $output.="<option value='$rowMatkul[id_matkul]' selected>".$rowMatkul["nama"]."</option>";
            }
            else
            {
                $output.="<option value='$rowMatkul[id_matkul]'>$rowMatkul[nama]</option>";
            }
        }
    }
    return $output;
}

function optionHari($hariEdit)
{
    $output="";
    $arrHari = array("Senin","Selasa","Rabu","Kamis","Jum'at");

    for($i=0;$i<=4;$i++)
    {
        if($hariEdit == $arrHari[$i])
        {
            $output.="<option value='$arrHari[$i]' selected='selected'>$arrHari[$i]</option>";
        }
        else
        {
            $output.="<option value='$arrHari[$i]'>$arrHari[$i]</option>";
        }
    }
    return $output;
}

function optionJamMulai($jamMulaiEdit)
{
    $output="";
    $arrJamMulai = array("07:00:00","07:50:00","08:30:00","08:40:00","09:15:00"
                        ,"09:30:00","09:45:00","10:00:00","10:35:00","10:45:00"
                        ,"11:00:00","12:30:00","12:50:00","13:15:00","13:35:00"
                        ,"13:45:00","14:25:00","14:30:00","15:15:00","15:30:00"
                        ,"16:15:00","16:20:00","16:40:00","17:10:00");

    for($i=0;$i<=23;$i++)
    {
        if($jamMulaiEdit == $arrJamMulai[$i])
        {
            $output.="<option value='$arrJamMulai[$i]' selected='selected'>$arrJamMulai[$i]</option>";
        }
        else
        {
            $output.="<option value='$arrJamMulai[$i]'>$arrJamMulai[$i]</option>";
        }
    }
    return $output;
}

function optionJamSelesai($jamSelesaiEdit)
{
    $output="";
    $arrJamSelesai = array("07:45:00","07:50:00","08:30:00","08:40:00","09:15:00"
                        ,"09:30:00","09:45:00","10:00:00","10:35:00","10:45:00"
                        ,"11:00:00","12:30:00","12:50:00","13:15:00","13:35:00"
                        ,"13:45:00","14:25:00","14:30:00","15:15:00","15:30:00"
                        ,"16:15:00","16:20:00","16:40:00","17:10:00","18:00:00");

    for($i=0;$i<=24;$i++)
    {
        if($jamSelesaiEdit == $arrJamSelesai[$i])
        {
            $output.="<option value='$arrJamSelesai[$i]' selected='selected'>$arrJamSelesai[$i]</option>";
        }
        else
        {
            $output.="<option value='$arrJamSelesai[$i]'>$arrJamSelesai[$i]</option>";
        }
    }
    return $output;
}

if (isset($_POST["insert"]) || isset($_POST["delete"]) || isset($_POST["update"]))
{
    $id_ruang = $_POST['id_ruang'];
    $id_kelas = $_POST['id_kelas'];
    $id_dosen = $_POST['id_dosen'];
    $id_matkul = $_POST['id_matkul'];
    $id_semester = $_POST['id_semester'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $id_jadwalEdit = $_POST['id_jadwalEdit'];

    if($_GET["module"]=="dataJadwalKuliah" && $_GET["act"]=="tambah")
    {

        $queryInsert =   "INSERT INTO tabel_jadwal (id_ruang, id_kelas, id_semester, id_dosen, id_matkul, hari, jam_mulai, jam_selesai, waktu_edit)

        values ('$id_ruang','$id_kelas','$id_semester','$id_dosen','$id_matkul','$hari','$jam_mulai','$jam_selesai',now())";

        mysqli_query($con, $queryInsert);

        header('location:../module/index.php?module=' . $_GET["module"]);
    }
    else if($_GET["module"]=="dataJadwalKuliah" && $_GET["act"]=="edit")
    {
        
        $queryUpdate = "UPDATE tabel_jadwal SET jam_mulai = '$jam_mulai', jam_selesai = '$jam_selesai', hari = '$hari', id_dosen = '$id_dosen', id_ruang = '$id_ruang'
                                                ,waktu_edit = now(), id_matkul = '$id_matkul'
                                                WHERE id_jadwal = '$id_jadwalEdit'";

        mysqli_query($con,$queryUpdate);      
        header('location:../module/index.php?module=' . $_GET["module"]);

        
    } 
    else if($_GET["module"]=="dataJadwalKuliah" && $_GET["act"]=="hapus")
    {
        $queryDelete = "DELETE FROM tabel_jadwal WHERE id_kelas='$id_kelas' and id_semester='$id_semester'";

        mysqli_query($con,$queryDelete);

        header('location:../module/index.php?module=' . $_GET["module"]);
    } 
}

// Modal Preview
if(isset($_POST["tampilDetailKelas"]) && isset($_POST["tampilDetailSemester"]))
{
    $id_kelas = $_POST['tampilDetailKelas'];
    $id_semester = $_POST['tampilDetailSemester'];

    $detailJadwalKuliah = "select tp.kode as prodi_kelas,tk.tingkat,tk.kode_kelas,ts.semester,tm.nama as nama_matkul,td.nama,tr.kode,tj.hari,DATE_FORMAT(tj.jam_mulai, '%H:%i') as jam_mulai,
    DATE_FORMAT(tj.jam_selesai, '%H:%i') as jam_selesai,tm.sks from tabel_jadwal tj,tabel_matkul tm,tabel_dosen td,tabel_ruang tr,tabel_kelas tk,tabel_semester ts,tabel_prodi tp
    where tj.id_matkul = tm.id_matkul
    and tj.id_dosen = td.id_dosen
    and tj.id_ruang = tr.id_ruang
    and tj.id_kelas = tk.id_kelas
    and tj.id_semester = ts.id_semester
    and tk.id_prodi = tp.id_prodi
    and tj.id_kelas = $id_kelas
    and tj.id_semester = $id_semester";

    $resultDetailJadwalKuliah = mysqli_query($con, $detailJadwalKuliah);
    $resultDetailJadwalKuliah2 = mysqli_query($con, $detailJadwalKuliah);

    if(mysqli_num_rows($resultDetailJadwalKuliah)>0)
    {
        $no = 1;
        $output ="";
        $outputDetail = "";

        $rowDetailJadwalKuliah2=mysqli_fetch_assoc($resultDetailJadwalKuliah2);

        $outputDetail ="
        <div class='card-body'>
                <div class='row'>
                    <div class='col-sm-2'>
                        <h5>Kelas : ".$rowDetailJadwalKuliah2["prodi_kelas"]."-".$rowDetailJadwalKuliah2["tingkat"]."".$rowDetailJadwalKuliah2["kode_kelas"]."</h5>
                    </div>
                    <div class='col-sm-9'>
                        <h5>Semester : ".$rowDetailJadwalKuliah2["semester"]."</h5>
                    </div>
                </div>
            </div>
        ";

        while($rowDetailJadwalKuliah=mysqli_fetch_assoc($resultDetailJadwalKuliah))
        {
            $output.="
                <div id='accordion'>
                    <div class='card'>
                        <div class='card-header cursor-pointer' id='heading".$no."' data-toggle='collapse' data-target='#collapse".$no."' aria-expanded='true' aria-controls='collapse".$no."'>
                            <h6 class='mb-0'>
                                ".$rowDetailJadwalKuliah["nama_matkul"]."<i class='fas fa-caret-down float-right'></i>
                            </h6>
                        </div>
                            <div id='collapse".$no."' class='collapse' aria-labelledby='heading".$no."' data-parent='#accordion'>
                                <div class='card-body'>
                                    <div class='col-md-12 p-0'>
                                        <div class='container-fluid'>
                                            <div class='row'>
                                                <div class='col-sm-6'>
                                                    <div class='form-group row'>
                                                        <label class='col-sm-4'>Dosen Pengajar</label>
                                                        <div class='col-sm-8'>
                                                            ".$rowDetailJadwalKuliah["nama"]."
                                                        </div>
                                                    </div>
                                                    <div class='form-group row'>
                                                        <label class='col-sm-4'>Ruangan</label>
                                                        <div class='col-sm-8'>
                                                            ".$rowDetailJadwalKuliah["kode"]."
                                                        </div>
                                                    </div>
                                                    <div class='form-group row'>
                                                        <label class='col-sm-4'>Hari</label>
                                                        <div class='col-sm-8'>
                                                            ".$rowDetailJadwalKuliah["hari"]."
                                                        </div>
                                                    </div>
                                                    <div class='form-group row'>
                                                        <label class='col-sm-4'>Jam</label>
                                                        <div class='col-sm-8'>
                                                            ".$rowDetailJadwalKuliah["jam_mulai"]." / ".$rowDetailJadwalKuliah["jam_selesai"]."
                                                        </div>
                                                    </div>
                                                    <div class='form-group row'>
                                                        <label class='col-sm-4'>SKS</label>
                                                        <div class='col-sm-8'>
                                                            ".$rowDetailJadwalKuliah["sks"]."
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            $no++;
        }
        
        echo $outputDetail;
        echo "<div class='card-body'>";
        echo $output;
        echo "</div>";

    }
    else
    {
        echo $output.="Data Kosong";
    }
}

// Modal Edit
if(isset($_POST["editJadwal_kelas"]) && isset($_POST["editJadwal_semester"]))
{
    $id_kelas = $_POST['editJadwal_kelas'];
    $id_semester = $_POST['editJadwal_semester'];

    $detailJadwalKuliah = "select tj.id_matkul,tj.id_jadwal,td.id_dosen,tj.id_ruang,tp.kode as prodi_kelas,tk.tingkat,tk.kode_kelas,ts.semester,tm.nama as nama_matkul,td.nama,tr.kode,tj.hari,tj.jam_mulai,tj.jam_selesai,tm.sks from tabel_jadwal tj,tabel_matkul tm,tabel_dosen td,tabel_ruang tr,tabel_kelas tk,tabel_semester ts,tabel_prodi tp
    where tj.id_matkul = tm.id_matkul
    and tj.id_dosen = td.id_dosen
    and tj.id_ruang = tr.id_ruang
    and tj.id_kelas = tk.id_kelas
    and tj.id_semester = ts.id_semester
    and tk.id_prodi = tp.id_prodi
    and tj.id_kelas = $id_kelas
    and tj.id_semester = $id_semester";

    $resultDetailJadwalKuliah = mysqli_query($con, $detailJadwalKuliah);
    $resultDetailJadwalKuliah2 = mysqli_query($con, $detailJadwalKuliah);

    if(mysqli_num_rows($resultDetailJadwalKuliah)>0)
    {
        $no = 1;
        $output ="";
        $outputDetail = "";

        $rowDetailJadwalKuliah2=mysqli_fetch_assoc($resultDetailJadwalKuliah2);

        $outputDetail ="
        <div class='card-body'>
                <div class='row'>
                    <div class='col-sm-2'>
                        <h5>Kelas : ".$rowDetailJadwalKuliah2["prodi_kelas"]."-".$rowDetailJadwalKuliah2["tingkat"]."".$rowDetailJadwalKuliah2["kode_kelas"]."</h5>
                    </div>
                    <div class='col-sm-9'>
                        <h5>Semester : ".$rowDetailJadwalKuliah2["semester"]."</h5>
                    </div>
                </div>
            </div>
        ";

        while($rowDetailJadwalKuliah=mysqli_fetch_assoc($resultDetailJadwalKuliah))
        {
            $output.="
                <div id='accordion'>
                    <div class='card'>
                        <div class='card-header cursor-pointer' id='heading".$no."' data-toggle='collapse' data-target='#collapse".$no."' aria-expanded='true' aria-controls='collapse".$no."'>
                            <h6 class='mb-0'>
                                ".$rowDetailJadwalKuliah["nama_matkul"]."<i class='fas fa-caret-down float-right'></i>
                            </h6>
                        </div>
                            <div id='collapse".$no."' class='collapse' aria-labelledby='heading".$no."' data-parent='#accordion'>
                                <div class='card-body'>
                                    <div class='col-md-12 p-0'>
                                        <form action='../process/proses_adminJadwalKuliah.php?module=dataJadwalKuliah&act=edit' method='POST'>
                                            <input type='hidden' name='id_jadwalEdit' id='id_jadwalEdit' value='".$rowDetailJadwalKuliah['id_jadwal']."'>
                                            <div class='container-fluid'>
                                                <div class='row'>
                                                    <div class='col-sm-6'>
                                                        <div class='form-group row'>
                                                            <label class='col-sm-3 col-form-label'>Jam</label>
                                                            <div class='col-sm-4'>
                                                                <select class='semester custom-select' id='jam_mulai' name='jam_mulai'>
                                                                    ".optionJamMulai($rowDetailJadwalKuliah['jam_mulai'])."
                                                                </select>
                                                            </div>
                                                            <div class='col-sm-1'>
                                                                <center>
                                                                    <h3>/</h3>
                                                                </center>
                                                            </div>
                                                            <div class='col-sm-4'>
                                                                <select class='semester custom-select' id='jam_selesai' name='jam_selesai'>
                                                                    ".optionJamSelesai($rowDetailJadwalKuliah['jam_selesai'])."
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label class='col-sm-3 col-form-label'>Hari</label>
                                                            <div class='col-sm-9'>
                                                                <select class='semester custom-select' id='hari' name='hari'>
                                                                    ".optionHari($rowDetailJadwalKuliah['hari'])."
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label class='col-sm-3 col-form-label'>Dosen Pengajar</label>
                                                            <div class='col-sm-9'>
                                                                <select class='semester custom-select' id='id_dosen' name='id_dosen'>
                                                                    ".tampilDosen($con,$rowDetailJadwalKuliah['id_dosen'])."
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-6'>
                                                        <div class='form-group row'>
                                                            <label class='col-sm-3 col-form-label'>Ruangan</label>
                                                            <div class='col-sm-9'>
                                                                <select class='semester custom-select' id='id_ruang' name='id_ruang'>
                                                                    ".tampilRuang($con,$rowDetailJadwalKuliah['id_ruang'])."
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label class='col-sm-3 col-form-label'>Mata Kuliah</label>
                                                            <div class='col-sm-9'>
                                                                <select class='semester custom-select' id='id_matkul' name='id_matkul'>
                                                                    ".tampilMatkul($con,$rowDetailJadwalKuliah['id_matkul'])."
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <div class='col-sm-12'>
                                                                <button type='submit' name='update'
                                                                    class='btn btn-success float-right btn-edit'>Edit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            $no++;
        }
        
        echo $outputDetail;
        echo "<div class='card-body'>";
        echo $output;
        echo "</div>";

    }
    else
    {
        echo $output.="Data Kosong";
    }
}

/*

*/ 

?>

