<?php
include "../config/connection.php";

function tampilProdi($con){
    $prodi = "select * from tabel_prodi";
    $resultProdi = mysqli_query($con, $prodi);
    return $resultProdi;
}

function tampilProdiEdit($con, $id_prodiEdit){
    $prodi = "select * from tabel_prodi";
    $resultProdi = mysqli_query($con, $prodi);

    $output="";

    if(mysqli_num_rows($resultProdi) > 0){
        while($rowProdi=mysqli_fetch_assoc($resultProdi)){
            if($rowProdi["id_prodi"]==$id_prodiEdit){
                $output.="<option value='$rowProdi[id_prodi]' selected>".$rowProdi["nama"]."</option>";
            }

            else{
                $output.="<option value='$rowProdi[id_prodi]'>$rowProdi[nama]</option>";
            }
        }
    }

    return $output;
}

function kelas($con){
    $kelas = "select * from tabel_kelas";
    $resultKelas = mysqli_query($con, $kelas);
    return $resultKelas;
}

function tampilKelasEdit($con){
    
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi";
    $resultKelas = mysqli_query($con, $kelas);

    $output="";

    if(mysqli_num_rows($resultKelas) > 0){
        while($rowKelas=mysqli_fetch_assoc($resultKelas)){

                $hasil= $rowKelas["kode"]." - ".$rowKelas["tingkat"].$rowKelas["kode_kelas"];

                $output.="<option value='$rowKelas[id_kelas]' selected>".$hasil."</option>";
        }
    }

    return $output;
}

function tampilSemester($con){
    $semester="select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

function tampilSemesterEdit($con, $id_semesterEdit){
    $semester = "select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);

    $output="";

    if(mysqli_num_rows($resultSemester) > 0){
        while($rowSemester=mysqli_fetch_assoc($resultSemester)){
            if($rowSemester["id_semester"]==$id_semesterEdit){
                $output.="<option value='$rowSemester[id_semester]' selected>".$rowSemester["semester"]."</option>";
            }

            else{
                $output.="<option value='$rowSemester[id_semester]'>$rowSemester[semester]</option>";
            }
        }
    }

    return $output;
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

         $nama_folder = "img";
         $tmp = $_FILES["fileid2"]["tmp_name"];
         $nama_file = $_FILES["fileid2"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

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

     $queryKrs = "INSERT INTO tabel_krs (id_mahasiswa, status_daftar_ulang, id_semester, status_verifikasi, waktu_edit)
     VALUES ((SELECT id_mahasiswa FROM tabel_mahasiswa WHERE nim='$_POST[nimMahasiswaAdmin]'), 
     'belum',
     '$_POST[semesterMahasiswa]',
     'belum',      
     curdate()
     );";

        if(mysqli_query($con, $query1) AND mysqli_query($con, $query2) AND mysqli_query($con, $query3) AND mysqli_query($con, $queryKrs)){
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

        // echo($id_mahasiswaUpdate); 

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

        $queryUpdateKrs="UPDATE tabel_krs SET id_semester = '$_POST[semesterMahasiswa2]' WHERE id_mahasiswa='$id_mahasiswaUpdate';";

        if(mysqli_query($con,$query9) && mysqli_query($con,$query10) && mysqli_query($con,$query11) && mysqli_query($con,$queryUpdateKrs)){

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

// select tp.kode, tk.tingkat, tm.id_mahasiswa, tm.id_user, tu.username,tu.password,tm.foto,tm.nim,tm.nama as nama_mahasiswa,tm.tempat_lahir,tm.tanggal_lahir,tm.jenis_kelamin,tm.alamat,tp.nama as nama_prodi,tk.kode_kelas 
//                                             from tabel_mahasiswa tm,tabel_prodi tp,tabel_user tu,tabel_kelas tk
//                                             where tm.id_prodi = tp.id_prodi
//                                             and tm.id_user = tu.id_user
//                                             and tm.id_kelas = tk.id_kelas;


// Modal Edit Mahasiswa
if(isset($_POST["editMahasiswa_idMahasiswa"])){
  $editMahasiswa = 
  "select tu.username, tu.password, tm.id_mahasiswa, tm.id_user, tm.foto, tm.nim, tm.nama as nama_mahasiswa, tm.tempat_lahir, tm.tanggal_lahir, tm.jenis_kelamin, tm.alamat, tp.nama as nama_jurusan, tp.kode, tp.id_prodi, tk.kode_kelas, tk.tingkat, tk.id_kelas, ts.semester, ts.id_semester from tabel_user tu, tabel_mahasiswa tm, tabel_prodi tp, tabel_kelas tk, tabel_semester ts 
  where tu.id_user = tm.id_user 
  and tm.id_mahasiswa=$_POST[editMahasiswa_idMahasiswa] and tm.id_prodi = tp.id_prodi and tm.id_kelas = tk.id_kelas and tm.id_semester = ts.id_semester";
  $resultEditMahasiswa = mysqli_query($con, $editMahasiswa);

  if(mysqli_num_rows($resultEditMahasiswa)>0){
    $rowEditMahasiswa=mysqli_fetch_assoc($resultEditMahasiswa);
      
      $output="";
      $output.="      
      <div class='row' id='modail'>
                                        <div class='col-sm-6'>
                                            <div class='form-group row'>
                                                <input type='hidden' name='id_userUpdate' value=".$rowEditMahasiswa["id_user"].">
                                                <input type='hidden' name='id_mahasiswaUpdate' value=".$rowEditMahasiswa["id_mahasiswa"].">               
                                                <label class='col-sm-3 col-form-label'>Username</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' placeholder='Username'
                                                        id='usernameMahasiswaAdmin2' name='usernameMahasiswaAdmin2' value=".$rowEditMahasiswa["username"]."
                                                        required />
                                                </div>
                                                <div class='col-sm-3 col-form-label'></div>
                                                <div class='col-sm-9'>
                                                    <div id='usernameMahasiswaAdminBlank2' class='text-danger'></div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3 col-form-label'>Password</label>
                                                <div class='col-sm-9'>
                                                    <input type='password' class='form-control' placeholder='**********'
                                                        id='passwordMahasiswaAdmin2' name='passwordMahasiswaAdmin2' value=".$rowEditMahasiswa["password"]."
                                                        required />
                                                </div>
                                                <div class='col-sm-3'></div>
                                                <div class='col-sm-9'>
                                                    <div id='passwordMahasiswaAdminBlank2' class='text-danger'></div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-md-3 col-form-label'>Gambar</label>
                                                <div class='input-group col-md-9'>
                                                    <img src='../attachment/img/avatar.jpeg'
                                                        id='fotoPrevMahasiswaAdmin2' height='150px' width='150px'>
                                                </div>
                                                <div class='col-md-3'></div>
                                                <div class='col-md-9'>
                                                    <br>
                                                    <input id='fileid3' type='file' name='fileid3' onchange='preview_images6(event);'  hidden
                                                        required />
                                                    <input id='buttonid3' type='button' value='Load Gambar'
                                                        class='btn btn-loading btn-primary tmbl-loading ml-2'  />
                                                </div>
                                                <div class='col-sm-3'></div>
                                                <div class='col-sm-9'>
                                                    <div id='fileidMahasiswaAdminBlank2' class='text-danger'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-sm-6'>
                                            <div class='form-group row'>
                                                <label class='col-sm-3 col-form-label'>NIM</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' placeholder='NIM Mahasiswa'
                                                        id='nimMahasiswaAdmin2' name='nimMahasiswaAdmin2' value='".$rowEditMahasiswa["nim"]."' required />
                                                </div>
                                                <div class='col-sm-3'></div>
                                                <div class='col-sm-9'>
                                                    <div id='nimMahasiswaAdminBlank2' class='text-danger'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3 col-form-label'>Nama Lengkap</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' placeholder='Nama Mahasiswa'
                                                        id='namaMahasiswaAdmin2' name='namaMahasiswaAdmin2' value=".$rowEditMahasiswa['nama_mahasiswa']." required />
                                                </div>
                                                <div class='col-sm-3'></div>
                                                <div class='col-sm-9'>
                                                    <div id='namaMahasiswaAdminBlank2' class='text-danger'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3 col-form-label'>Tempat Lahir</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control'
                                                        placeholder='Tempat Lahir Mahasiswa'
                                                        id='tempatlahirMahasiswaAdmin2'
                                                        name='tempatlahirMahasiswaAdmin2' value=".$rowEditMahasiswa["tempat_lahir"]." required />
                                                </div>
                                                <div class='col-sm-3'></div>
                                                <div class='col-sm-9'>
                                                    <div id='tempatlahirMahasiswaAdminBlank2' class='text-danger'></div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3 col-form-label'>Tanggal Lahir</label>
                                                <br>
                                                <div class='col-sm-3'>
                                                    <select class='custom-select' id='tanggalLahirMahasiswa2' name='tanggalLahirMahasiswa2'>
                                                        ".opsiTanggal($row['tanggal_lahir'])."
                                                    </select>
                                                </div>
                                                <div class='col-sm-3'>
                                                    <select class='custom-select' id='bulanLahirMahasiswa2' name='bulanLahirMahasiswa2'>
                                                        ".opsiBulan($row['tanggal_lahir'])."
                                                    </select>
                                                </div>
                                                <div class='col-sm-3'>
                                                    <select class='custom-select' id='tahunlLahirMahasiswa2' name='tahunLahirMahasiswa2'>
                                                        ".opsiTahun($row['tanggal_lahir'])."
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3 col-form-label'>Jenis Kelamin</label>
                                                <br>
                                                <div class='col-sm-9'>
                                                    <div class='form-check form-check-inline'>
                                                        <label class='form-check-label' for='genderMahasiswaAdmin1'>
                                                            <input class='mt-2' type='radio' name='genderMahasiswaAdmin3'
                                                                id='genderMahasiswaAdmin1' value='Laki-laki' checked>
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class='form-check form-check-inline'>
                                                        <label class='form-check-label' for='genderMahasiswaAdmin2'>
                                                            <input class='mt-2' type='radio' name='genderMahasiswaAdmin3'
                                                                id='genderMahasiswaAdmin2' value='Perempuan'>
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3 col-form-label'>Alamat</label>
                                                <div class='col-sm-9'>
                                                    <input type='text' class='form-control' id='alamatMahasiswaAdmin2'
                                                        name='alamatMahasiswaAdmin2' rows='3'
                                                        placeholder='Alamat Mahasiswa' value=".$rowEditMahasiswa["alamat"]." required></textarea>
                                                </div>
                                                <div class='col-sm-3'></div>
                                                <div class='col-sm-9'>
                                                    <div id='alamatMahasiswaAdminBlank2' class='text-danger'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3'>Prodi</label>
                                                <br>
                                                <div class='col-sm-9'>
                                                    <select class='semester custom-select'  name='prodiMahasiswa2'>
                                                        ".tampilProdiEdit($con,$rowEditMahasiswa["id_prodi"])."
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label class='col-sm-3'>Kelas</label>
                                                <div class='col-sm-9'>
                                                    <select class='semester custom-select' name='kelasMahasiswa2'>
                                                        ".tampilKelasEdit($con)."
                                                    </select>
                                                </div>
                                                <div class='col-sm-3'></div>
                                                <div class='col-sm-9'>
                                                    <div id='kelasMahasiswaAdminBlank2' class='text-danger'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                            <label class='col-sm-3'>Semester</label>
                                                            <div class='col-sm-9'>
                                                                <select class='semester custom-select' name='semesterMahasiswa2'>
                                                                    ".tampilSemesterEdit($con,$rowEditMahasiswa["id_semester"])."
                                                                </select>
                                                            </div>
                                                            <div class='col-sm-3'></div>
                                                            <div class='col-sm-9'>
                                                                <div id='kelasMahasiswaAdminBlank' class='text-danger'>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <div class='row'>
                                                <div class='col-sm-9'></div>
                                                <div class='col-sm-3'>
                                                    <button type='submit' class='btn btn-tambahkan btn-success tmbl-tambahkan' name='editMahasiswa'
                                                        onclick='validasi2(); 
                                                                    preventDefaultAction2(event);'>Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        document.getElementById('modail').addEventListener('load', setup3());

                                        function setup3() {
                                            document.getElementById('buttonid3').addEventListener('click', openDialog2);
                                            function openDialog2() {
                                                document.getElementById('fileid3').click();
                                            }
                                        }
                                    
                                    </script>";



    echo $output;

  }else{
    echo $output.="Data Kosong";
  }
}
?>
