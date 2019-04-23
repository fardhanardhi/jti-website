<?php
include "../config/connection.php";

// Absensi & Total Absensi
function absensi($con, $kelas)
{
  $absensi = "select a.*, b.*, c.id_kelas, d.* from tabel_absensi a, tabel_mahasiswa b, tabel_kelas c, tabel_status_mahasiswa d, tabel_semester e where a.id_mahasiswa=b.id_mahasiswa and b.id_kelas=b.id_kelas and b.id_kelas=c.id_kelas and a.id_status_mahasiswa=d.id_status_mahasiswa and a.id_semester=b.id_semester and a.id_semester=e.id_semester and b.id_kelas='$kelas'";
  $resultAbsensi = mysqli_query($con, $absensi);
  return $resultAbsensi;
}

function kelas($con){
	$kelas="select * from tabel_kelas";
	$resultKelas=mysqli_query($con, $kelas);
	return $resultKelas;
}

function tampilKelas($con, $id_kelas){
  $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
  $resultKelas = mysqli_query($con, $kelas);  
  $row=mysqli_fetch_assoc($resultKelas);
  $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
  return $hasil;
}

function minKelas($con){
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}

// Kompen
function kompen($con)
{
  $kompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.* from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_prodi d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and b.id_prodi=d.id_prodi";
  $resultKompen = mysqli_query($con, $kompen);
  return $resultKompen;
}

function cariKompen($con, $txtCariKompen)
{
  $kompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.* from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_prodi d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and b.id_prodi=d.id_prodi and (b.nim like '%$txtCariKompen%' or b.nama like '%$txtCariKompen%' or d.kode like '%$txtCariKompen%' or c.nama like '%$txtCariKompen%' or a.waktu like '%$txtCariKompen%') order by b.nama asc";
  $resultKompen = mysqli_query($con, $kompen);
  return $resultKompen;
}

function tampilTanggal($tanggal)
{
  return date('d F Y', strtotime($tanggal));
}

// Pekerjaan
function pekerjaan($con)
{
  $pekerjaan = "select a.*, b.nip, b.nama as namaDosen, c.* from tabel_pekerjaan_kompen a, tabel_dosen b, tabel_semester c where a.id_dosen=b.id_dosen and a.id_semester=c.id_semester order by a.id_pekerjaan_kompen asc";
  $resultPekerjaan = mysqli_query($con, $pekerjaan);
  return $resultPekerjaan;
}

function cariPekerjaan($con, $txtCariPekerjaan)
{
  $pekerjaan = "select a.*, b.nip, b.nama as namaDosen, c.* from tabel_pekerjaan_kompen a, tabel_dosen b, tabel_semester c where a.id_dosen=b.id_dosen and a.id_semester=c.id_semester and (a.nama like '%$txtCariPekerjaan%' or b.nip like '%$txtCariPekerjaan%' or b.nama like '%$txtCariPekerjaan%' or a.kuota like '%$txtCariPekerjaan%' or c.semester like '%$txtCariPekerjaan%') order by a.id_pekerjaan_kompen asc";
  $resultPekerjaan = mysqli_query($con, $pekerjaan);
  return $resultPekerjaan;
}

// Rekap Kompen
function rekap($con)
{
  $rekap = "select a.*, b.* from tabel_mahasiswa a, tabel_absensi b where a.id_mahasiswa=b.id_mahasiswa and b.alpa>0 order by a.nim asc";
  $resultRekap = mysqli_query($con, $rekap);
  return $resultRekap;
}

function cariRekap($con, $txtCariRekap)
{
  $rekap = "select a.*, b.* from tabel_mahasiswa a, tabel_absensi b where a.id_mahasiswa=b.id_mahasiswa and b.alpa>0 and (a.nim like '%$txtCariRekap%' or a.nama like '%$txtCariRekap%') order by a.nama asc";
  $resultRekap = mysqli_query($con, $rekap);
  return $resultRekap;
}

function kompenSemester($con, $id_mahasiswa, $id_semester){
  $kompenSemester="select sum(a.alpa) as kompenSemester from tabel_absensi a, tabel_mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.id_mahasiswa=$id_mahasiswa and a.id_semester=$id_semester";
  $resultKompenSemester = mysqli_query($con, $kompenSemester);
  if(mysqli_num_rows($resultKompenSemester)>0){
    $rowKompenSemester=mysqli_fetch_assoc($resultKompenSemester);
    return $rowKompenSemester["kompenSemester"];
  }
  else{
    return 0;
  }
}

function totalKompen($con, $id_mahasiswa){
  $totalKompen="select sum(a.alpa) as totalKompen from tabel_absensi a, tabel_mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.id_mahasiswa=$id_mahasiswa";
  $resultTotalKompen = mysqli_query($con, $totalKompen);
  if(mysqli_num_rows($resultTotalKompen)>0){
    $rowTotalKompen=mysqli_fetch_assoc($resultTotalKompen);
    return $rowTotalKompen["totalKompen"];
  }
  else{
    return 0;
  }
}

function kompenSelesai($con, $id_mahasiswa){
  $kompenSelesai="select sum(a.jumlah_jam) as kompenSelesai from tabel_kompen a, tabel_mahasiswa b where a.id_mahasiswa=b.id_mahasiswa and a.status_verifikasi='sudah terverifikasi' and a.id_mahasiswa=$id_mahasiswa";
  $resultKompenSelesai = mysqli_query($con, $kompenSelesai);
  if(mysqli_num_rows($resultKompenSelesai)>0){
    $rowKompenSelesai=mysqli_fetch_assoc($resultKompenSelesai);
    return $rowKompenSelesai["kompenSelesai"];
  }
  else{
    return 0;
  }
}

function prodi($con, $kode){
  if($kode=="TI"){
    $prodi="D4 - TI";
    return $prodi;
  }
  else if($kode=="MI"){
    $prodi="D3 - MI";
    return $prodi;
  }
}

// Modal Preview
if(isset($_POST["tampilDetail"])){
  $detailKompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.nama as pekerjaan from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_pekerjaan_kompen d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and a.id_pekerjaan_kompen=d.id_pekerjaan_kompen and a.id_kompen=$_POST[tampilDetail]";
  $resultDetailKompen = mysqli_query($con, $detailKompen);

  if(mysqli_num_rows($resultDetailKompen)>0){
    $rowDetailKompen=mysqli_fetch_assoc($resultDetailKompen);
      $output="";
      $output.="
      <div class='row px-5'>
        <div class='col-md-3'>NIM</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".$rowDetailKompen["nim"]."</div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3'>Nama</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".$rowDetailKompen["namaMhs"]."</div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3'>Tanggal</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".tampilTanggal($rowDetailKompen["waktu"])."</div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3'>Jenis Kompensasi</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".$rowDetailKompen["pekerjaan"]."</div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3'>Total Jam</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".$rowDetailKompen["jumlah_jam"]." Jam</div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3'>Dosen</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".$rowDetailKompen["namaDosen"]."</div>
      </div>";

    echo $output;

  }else{
    echo $output.="Data Kosong";
  }
  
}

// Dropdoen Tanggal
function optionTanggal($tanggalEdit){
  $output="";
  $tanggal= date('d', strtotime($tanggalEdit));
  for($i=1;$i<=31;$i++){
    if($tanggal == $i){
      $output.="<option value='$i' selected='selected'>$i</option>";
    }else{
      $output.="<option value='$i'>$i</option>";
    }
  }
  return $output;
}

function optionBulan($tanggalEdit){
  $output="";
  $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
  $bulan= date('m', strtotime($tanggalEdit));
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

function optionTahun($tanggalEdit){
  $output="";
  $tahun= date('Y', strtotime($tanggalEdit));
  for($i=$tahun-4;$i<=$tahun;$i++){
    if($tahun == $i){
      $output.="<option value='$i' selected='selected'>$i</option>";
    }else{
      $output.="<option value='$i'>$i</option>";
    }
  }
  return $output;
}
// End Dropdown Tanggal

function tampilPekerjaan($con, $id_dosen, $id_semester){
  $pekerjaan = "select * from tabel_pekerjaan_kompen where id_dosen='$id_dosen' and id_semester='$id_semester'";
  $resultPekerjaan = mysqli_query($con, $pekerjaan);

  $output="";
  if(mysqli_num_rows($resultPekerjaan)>0){
    while($rowPekerjaan=mysqli_fetch_assoc($resultPekerjaan)){
      $output.="<option value='$rowPekerjaan[id_pekerjaan_kompen]'>$rowPekerjaan[nama]</option>";
    }
  }
  return $output;
}

// Modal Edit Kompen
if(isset($_POST["edit_kompen"])){
  $editKompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.nama as pekerjaan from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_pekerjaan_kompen d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and a.id_pekerjaan_kompen=d.id_pekerjaan_kompen and a.id_kompen=$_POST[edit_kompen]";
  $resultEditKompen = mysqli_query($con, $editKompen);

  if(mysqli_num_rows($resultEditKompen)>0){
    $rowEditKompen=mysqli_fetch_assoc($resultEditKompen);
      
      $output="";
      $output.="
      <div class='row px-5'>
        <div class='col-md-3'>NIM</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".$rowEditKompen["nim"]."</div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3'>Nama</div>
        <div class='col-md-1 text-right pr-0'>:</div>
        <div class='col-md-8'>".$rowEditKompen["namaMhs"]."</div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3 pt-1'>Tanggal</div>
        <div class='col-md-1 text-right pt-1 pr-0'>:</div>
        <div class='col-md-8'>
          <div class='form-group form-sm row'>
            <div class='col-sm-auto'>
              <select class='form-control w-auto tanggal' onblur='validasiTanggal(this)' id='tanggal'>".
                optionTanggal($rowEditKompen["waktu"])."
              </select>
            </div>
            <div class='col-sm-auto'>
              <select class='form-control w-auto tanggal' style='width:6.6em;' onblur='validasiTanggal(this)' id='bulan'>".
                optionBulan($rowEditKompen["waktu"])."
              </select>
            </div>
            <div class='col-sm-auto'>
              <select class='form-control tanggal w-auto' onblur='validasiTanggal(this)' id='tahun'>".
              optionTahun($rowEditKompen["waktu"])."
              </select>
            </div>
            <div class='col-sm-auto'>
              <small class='text-danger d-none peringatanTanggal' id='peringatanTanggal'>*Masukkan Detail Tanggal</small>
            </div>
          </div>
        </div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3 pt-1'>Dosen</div>
        <div class='col-md-1 text-right pt-1 pr-0'>:</div>
        <div class='col-md-6'>
          <div class='form-group'>
            <select class='form-control' name='dosen' id='dosen' onblur='validasiDosen(this)'>
              <option value='$rowEditKompen[id_dosen]' selected>".$rowEditKompen["namaDosen"]."</option>
              <option>Ridwan Rismanto, SST., M.KOM</option>
              <option>Ridwan Rismanto, SST., M.KOM</option>
              <option>Ridwan Rismanto, SST., M.KOM</option>
            </select>
          </div>
        </div>
        <div class='col-md-2'>
          <small class='text-danger d-none peringatanDosen' id='peringatanDosen'>*Masukkan Nama Dosen</small>
        </div>
      </div>
      <div class='row px-5'>
        <div class='col-md-6'>Jenis Kompensasi
          <small class='text-danger d-none ml-3 peringatanJenis' id='peringatanJenis'>*Masukkan Detail Kompensasi</small>
        </div>
      </div>
      <div class='row px-5'>
        <div class='form-group col-md-12'>
          <select class='form-control' name='jenisKompensasi' id='jenisKompensasi' onblur='validasiJenis(this)'>
            <option value='$rowEditKompen[id_pekerjaan_kompen]' selected>".$rowEditKompen["pekerjaan"]."</option>".
            tampilPekerjaan($con,$rowEditKompen["id_dosen"], $rowEditKompen["id_semester"])."
          </select>
        </div>
      </div>
      <div class='row px-5'>
        <div class='col-md-3 pt-1'>Total Jam</div>
        <div class='col-md-1 text-right pt-1 pr-0'>:</div>
        <div class='col-md-2'>
          <div class='form-group'>
            <input type='number'
              class='form-control border' oninput='validasiJam(this)' onblur='validasiJam(this)' name='totalJam' min=0 value='$rowEditKompen[jumlah_jam]' id='totalJam'>
          </div>
        </div>
        <div class='col-md-3'>
          <small class='text-danger d-none peringatanJam' id='peringatanJam'>*Masukkan Total Jam Kompensasi</small>
        </div>
      </div>
      <div class='row px-5 mt-3 d-flex justify-content-end'>
        <button type='reset' class='btn btn-danger mr-4 btn-batal'>Delete</button>
        <button type='submit' name='submit' class='btn btn-success btn-ok'>Submit</button>
      </div>";

    echo $output;

  }else{
    echo $output.="Data Kosong";
  }
}

// UD Kompen
if(isset($_POST["editKompen"]) || isset($_POST["hapusKompen"])){
  if($_GET["module"]=="absenKompen" && $_GET["act"]=="edit"){
    mysqli_query($con, "update tabel_kompen set kriteria='$_POST[isiKriteria]' where id_kuisioner='$_POST[id_kuisioner]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  
  else if($_GET["module"]=="absenKompen" && $_GET["act"]=="hapus"){
    mysqli_query($con, "delete from tabel_kompen where id_kompen='$_POST[id_kompen]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
}

?>