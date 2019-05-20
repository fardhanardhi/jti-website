<?php
include "../config/connection.php";

function linkFoto($Foto){

    $ling = "";

    if($Foto == null){
        $ling = "../attachment/img/avatar.jpeg";
    }

    else if($Foto != null){
        $link = "../attachment/img/";

        $ling = ($link . $Foto);
        
    }

    return $ling;    
    
}

if (isset($_POST["tambahDosen"]) || isset($_POST["delete"]) || isset($_POST["edit"]))
{
    if($_GET["module"]=="dataDosen" && $_GET["act"]=="tambah"){

        $nama_folder = "img";
        $tmp = $_FILES["filenya"]["tmp_name"];
        $nama_file = $_FILES["filenya"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");    

        // echo($nama_file);

        // die();

     $queryUser = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameDosenAdmin]',
         '$_POST[passwordDosenAdmin]',
         'dosen'

     ); ";
  
     $queryDosen = "INSERT INTO tabel_dosen (
     nip,
     nama,
     alamat,
     jenis_kelamin,
     tanggal_lahir,
     tempat_lahir,
     foto,
     id_user
     )

     values
     (
        '$_POST[nimDosenAdmin]',
        '$_POST[namaDosenAdmin]',    
        '$_POST[alamatDosenAdmin]',
        '$_POST[genderDosenAdmin]',
        '$_POST[tahunLahirDosen]-$_POST[bulanLahirDosen]-$_POST[tanggalLahirDosen]',
        '$_POST[tempatlahirDosenAdmin]',
        '$nama_file',

     (select id_user from tabel_user where username='$_POST[usernameDosenAdmin]')
     );";

        if(mysqli_query($con, $queryUser) && mysqli_query($con, $queryDosen)){
            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }  
    
    else if($_GET["module"]=="dataDosen" && $_GET["act"]=="edit"){

        $updateDosen = $_POST["id_userUpdateModal"];

        $nama_folder = "img";
         $tmp = $_FILES["filenyaModal"]["tmp_name"];
         $namanya_file = $_FILES["filenyaModal"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$namanya_file");

        $queryEditUser = "UPDATE tabel_user 
        set username='$_POST[usernameDosenAdmin2]',
        password='$_POST[passwordDosenAdmin2]'
        where id_user= '$updateDosen';";

        $queryEditDosen="UPDATE tabel_dosen 
        set 
        nip = '$_POST[nimDosenAdmin2]',
        nama = '$_POST[namaDosenAdmin2]',
        alamat = '$_POST[alamatDosenAdmin2]',
        jenis_kelamin = '$_POST[genderDosenAdmin3]',
        tempat_lahir = '$_POST[tempatlahirDosenAdmin2]',
        foto = '$namanya_file',
        waktu_edit = curdate(),
        tanggal_lahir = '$_POST[tahunLahirDosenModal]-$_POST[bulanLahirDosenModal]-$_POST[tanggalLahirDosenModal]'
        where id_user='$updateDosen';";

        if(mysqli_query($con,$queryEditUser) && mysqli_query($con,$queryEditDosen)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }

    else if($_GET["module"]=="dataDosen" && $_GET["act"]=="hapus")
    {
        $id_user=$_POST['id_userDosen'];
        $id_dosen=$_POST['id_dosenDosen'];

        $queryDeleteUser = "DELETE FROM tabel_dosen WHERE id_user='$id_user';";
        $queryDeleteDosen = "DELETE FROM tabel_user WHERE id_user='$id_user';";

        if(mysqli_query($con,$queryDeleteUser) && mysqli_query($con,$queryDeleteDosen)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
       
    }
}

// Dropdown Tanggal
function optionTanggalAdmin($tanggalLahirDosen){
    $output="";
    $tanggal= date('d', strtotime($tanggalLahirDosen));
    for($i=1;$i<=31;$i++){
    if($tanggal == $i){
        $output.="<option value='$i' selected='selected'>$i</option>";
    }else{
        $output.="<option value='$i'>$i</option>";
    }
    }
    return $output;
}

function optionBulanAdmin($tanggalLahirDosen){
    $output="";
    $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    $bulan= date('m', strtotime($tanggalLahirDosen));
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

function optionTahunAdmin($tanggalLahirDosen){
    $output="";
    $tahun= date('Y', strtotime($tanggalLahirDosen));
    for($i=1950;$i<=1995;$i++){
    if($tahun == $i){
        $output.="<option value='$i' selected='selected'>$i</option>";
    }else{
        $output.="<option value='$i'>$i</option>";
    }
    }
    return $output;
}
// End Dropdown Tanggal

//edit modal
if(isset($_POST["editDosen_idDosen"]))
{
    $detailDataDosen = "select tu.username, tu.password, td.id_dosen, td.id_user, td.foto, td.nip, td.nama as nama_dosen, td.tempat_lahir, td.tanggal_lahir, td.jenis_kelamin, td.alamat
    from tabel_user tu, tabel_dosen td where tu.id_user = td.id_user
    and td.id_dosen=$_POST[editDosen_idDosen]";
    $resultDetailDataDosen = mysqli_query($con, $detailDataDosen);

    if(mysqli_num_rows($resultDetailDataDosen)>0)
    {
        $rowDetailDataDosen = mysqli_fetch_assoc($resultDetailDataDosen);

        $output ="";
        $output.="
        <div class='row' id='modalFoto'>
            <div class='col-sm-6'>
                <div class='form-group row'>
                    <input type='hidden' name='id_userUpdateModal' value=".$rowDetailDataDosen["id_user"].">
                    <input type='hidden' name='id_dosenEditnya'  value=".$rowDetailDataDosen["id_dosen"].">
                    <label class='col-sm-3 col-form-label'>Username</label>
                    <div class='col-sm-9'>
                        <input type='text' class='form-control' placeholder='Username'
                            id='usernameDosenAdmin2' name='usernameDosenAdmin2' value='".$rowDetailDataDosen["username"]."'
                            required />
                    </div>
                    <div class='col-sm-3 col-form-label'></div>
                    <div class='col-sm-9'>
                        <div id='usernameDosenAdminBlank2' class='text-danger'></div>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Password</label>
                    <div class='col-sm-9'>
                        <input type='password' class='form-control' placeholder='**********'
                            id='passwordDosenAdmin2' name='passwordDosenAdmin2' value='".$rowDetailDataDosen["password"]."'
                            required />
                    </div>
                    <div class='col-sm-3'></div>
                    <div class='col-sm-9'>
                        <div id='passwordDosenAdminBlank2' class='text-danger'></div>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-md-3 col-form-label'>Gambar</label>
                    <div class='input-group col-md-9'>
                    <img src='".linkFoto($rowDetailDataDosen["foto"])."'
                            id='fotoPrevDosenAdmin2' height='150px' width='150px'>
                    </div>
                    <div class='col-md-3'></div>
                    <div class='col-md-9'>
                        <br>
                        <input id='filenyaModal' type='file' name='filenyaModal' onchange='preview_imagesModal(event);'  hidden
                            required />
                        <input id='tombolidModal' type='button' value='Load Gambar'
                            class='btn btn-loading btn-primary tmbl-loading ml-2'  />
                    </div>
                    <div class='col-sm-3'></div>
                    <div class='col-sm-9'>
                        <div id='fileidDosenAdminBlank2' class='text-danger'>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>NIM</label>
                    <div class='col-sm-9'>
                        <input type='text' class='form-control' placeholder='NIM Dosen'
                            id='nimDosenAdmin2' name='nimDosenAdmin2' value='".$rowDetailDataDosen["nip"]."' required />
                    </div>
                    <div class='col-sm-3'></div>
                    <div class='col-sm-9'>
                        <div id='nimDosenAdminBlank2' class='text-danger'>
                        </div>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Nama Lengkap</label>
                    <div class='col-sm-9'>
                        <input type='text' class='form-control' placeholder='Nama Dosen'
                            id='namaDosenAdmin2' name='namaDosenAdmin2' value='".$rowDetailDataDosen["nama_dosen"]."' required />
                    </div>
                    <div class='col-sm-3'></div>
                    <div class='col-sm-9'>
                        <div id='namaDosenAdminBlank2' class='text-danger'>
                        </div>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Tempat Lahir</label>
                    <div class='col-sm-9'>
                        <input type='text' class='form-control'
                            placeholder='Tempat Lahir Dosen'
                            id='tempatlahirDosenAdmin2'
                            name='tempatlahirDosenAdmin2' value='".$rowDetailDataDosen["tempat_lahir"]."' required />
                    </div>
                    <div class='col-sm-3'></div>
                    <div class='col-sm-9'>
                        <div id='tempatlahirDosenAdminBlank2' class='text-danger'></div>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Tanggal Lahir</label>
                    <br>
                    <div class='col-sm-3'>
                        <select class='custom-select' style='width:110px;' id='tanggalLahirDosenModal' name='tanggalLahirDosenModal'>
                        ".optionTanggalAdmin($rowDetailDataDosen['tanggal_lahir'])."
                        </select>
                    </div>
                    <div class='col-sm-3'>
                        <select class='custom-select' style='width:110px;' id='bulanLahirDosenModal' name='bulanLahirDosenModal'>
                        ".optionBulanAdmin($rowDetailDataDosen['tanggal_lahir'])."
                        </select>
                    </div>
                    <div class='col-sm-3'>
                        <select class='custom-select' style='width:110px;' id='tahunLahirDosenModal' name='tahunLahirDosenModal'>
                        ".optionTahunAdmin($rowDetailDataDosen['tanggal_lahir'])."
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Jenis Kelamin</label>
                    <br>
                    <div class='col-sm-9'>
                        <div class='form-check form-check-inline'>
                            <label class='form-check-label' for='genderDosenAdmin1'>
                                <input class='mt-2' type='radio' name='genderDosenAdmin3'
                                    id='genderDosenAdmin1' value='Laki-laki' checked>
                                Laki-laki
                            </label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <label class='form-check-label' for='genderDosenAdmin2'>
                                <input class='mt-2' type='radio' name='genderDosenAdmin3'
                                    id='genderDosenAdmin2' value='Perempuan'>
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Alamat</label>
                    <div class='col-sm-9'>
                        <input type='text' class='form-control' id='alamatDosenAdmin2'
                            name='alamatDosenAdmin2' rows='3'
                            placeholder='Alamat Dosen' value='".$rowDetailDataDosen["alamat"]."' required></input>
                    </div>
                    <div class='col-sm-3'></div>
                    <div class='col-sm-9'>
                        <div id='alamatDosenAdminBlank2' class='text-danger'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-9'></div>
                    <div class='col-sm-3'>
                        <button type='submit' class='btn btn-tambahkan btn-success tmbl-tambahkan' name='edit'
                            onclick='erorModal(); showFilesSizesModal();'>Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('modalFoto').addEventListener('load', setupDosenModal());
            function setupDosenModal() {
                document.getElementById('tombolidModal').addEventListener('click', openDialog2);
                function openDialog2() {
                    document.getElementById('filenyaModal').click();
                }
            }
        
        </script>";
    
        echo $output;
    }else{
        echo $output.="Data Kosong";
    }
        
}
?>