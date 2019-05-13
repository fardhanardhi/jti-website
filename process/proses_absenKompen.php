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
  if(mysqli_num_rows($resultKelas)>0){
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
  }
  else{
    return "-";
  }
}

function minKelas($con){
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}

// Edit Absensi
if(isset($_POST["submitAbsen"])){
  mysqli_query($con, "update tabel_absensi set sakit='$_POST[sakit]', ijin='$_POST[ijin]', alpa='$_POST[alpa]' where id_absensi=$_POST[submitAbsen]");
}

// Kompen
function kompen($con)
{
  $kompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.* from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_prodi d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and b.id_prodi=d.id_prodi";
  $resultKompen = mysqli_query($con, $kompen);
  return $resultKompen;
}

function tampilTanggal($tanggal)
{
  $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");  
  $tanggalHasil=date('d', strtotime($tanggal));
  $bulan= date('m', strtotime($tanggal));
  $tahun=date('Y', strtotime($tanggal));
  return $tanggalHasil." ".$arrBulan[$bulan-1]." ".$tahun;
}

// Pekerjaan
function pekerjaan($con)
{
  $pekerjaan = "select a.*, b.nip, b.nama as namaDosen, c.* from tabel_pekerjaan_kompen a, tabel_dosen b, tabel_semester c where a.id_dosen=b.id_dosen and a.id_semester=c.id_semester order by a.id_pekerjaan_kompen asc";
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
  if(mysqli_num_rows($resultKompenSelesai)){
    $rowKompenSelesai=mysqli_fetch_assoc($resultKompenSelesai);
    if($rowKompenSelesai["kompenSelesai"]==NULL){
      return 0;
    }else{
      return $rowKompenSelesai["kompenSelesai"];
    }
  }
}

function kompenBelumSelesai($con, $id_mahasiswa){
  return totalKompen($con, $id_mahasiswa)-kompenSelesai($con, $id_mahasiswa);
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

if(isset($_POST["cariAbsensi"])){
  ?>
  <div class="col-md-12 p-0 d-flex justify-content-center">
  <?php
    $resultAbsensi=absensi($con, $_POST["cariAbsensi"]);
  
  if (mysqli_num_rows($resultAbsensi) > 0){
  ?>
  <table class="table table-striped table-bordered text-center">
    <thead>
      <tr>
        <th id="absenNo">No</th>
        <th id="absenNama">Nama</th>
        <th id="absenSakit">Sakit</th>
        <th id="absenIjin">Ijin</th>
        <th id="absenAlpha">Alpha</th>
        <th id="absenProses">Proses</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      while($rowAbsensi = mysqli_fetch_assoc($resultAbsensi)){
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td class="text-left"><?php echo $rowAbsensi["nama"]; ?></td>
          <td>
            <input type="number" id="sakit<?php echo $rowAbsensi["id_absensi"]; ?>" class="form-control bg-transparent" min="0" value="<?php echo $rowAbsensi["sakit"]; ?>" name="sakit">
          </td> 
          <td>
            <input type="number" id="ijin<?php echo $rowAbsensi["id_absensi"]; ?>" class="form-control bg-transparent" min="0" value="<?php echo $rowAbsensi["ijin"]; ?>" name="ijin">
          </td>
          <td>
            <input type="number" id="alpa<?php echo $rowAbsensi["id_absensi"]; ?>" class="form-control bg-transparent" min="0" value="<?php echo $rowAbsensi["alpa"]; ?>" name="alpha">
          </td>
          <td><input type="button" value="Simpan" id="<?php echo $rowAbsensi["id_absensi"]; ?>" class="btn btn-success submit-absen"></td>
        </tr>
      <?php
      $no++;
      }
      ?>
    </tbody>
  </table>
  <?php
  } else{
    ?>
    <div class="text-center">
      <p class="text-muted">Data Kosong</p>
    </div>
  <?php
  }
}

if(isset($_POST["cariTotalAbsensi"])){
  $resultTotal=absensi($con, $_POST["cariTotalAbsensi"]);
  
  if (mysqli_num_rows($resultTotal) > 0){
    $no=1;
    while($rowTotal = mysqli_fetch_assoc($resultTotal)){
      ?>
      <!-- Loop data -->
      <div class="row border-bottom border-top pt-1 pb-1 mr-1">
        <div class="col-md-1 align-self-center p-0">
          <span><?php echo $no;?></span>
        </div>
        <div class="col-md-8 p-0 align-self-center">
          <div class="container-fluid p-0">
            <div class="row">
              <div class="col-sm-12">
                <span><?php echo $rowTotal["nama"];?></span>
              </div>
            </div>
            <div class="row text-muted">
              <div class="col-sm-4">
                <small>A: <?php echo $rowTotal["alpa"];?></small>
              </div>
              <div class="col-sm-4">
                <small>I: <?php echo $rowTotal["ijin"];?></small>
              </div>
              <div class="col-sm-4">
                <small>S: <?php echo $rowTotal["sakit"];?></small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 text-right align-self-center p-0">
          <?php
          if($rowTotal["keterangan"]=="SP1"){
            ?>
            <small class="bg-success text-white pt-1 pb-1 pr-3 pl-3 rounded"><?php echo $rowTotal["keterangan"]?></small>
            <?php
          } else if($rowTotal["keterangan"]=="SP2"){
            ?>
            <small class="bg-orange text-white pt-1 pb-1 pr-3 pl-3 rounded"><?php echo $rowTotal["keterangan"]?></small>
            <?php
          } else if($rowTotal["keterangan"]=="SP3"){
            ?>
            <small class="bg-danger text-white pt-1 pb-1 pr-3 pl-3 rounded"><?php echo $rowTotal["keterangan"]?></small>
            <?php
          }
          ?>
        </div>
      </div>
      <!-- End Loop Data -->
  <?php
    $no++;
    }
  } else{
    ?>
    <div class="text-center">
      <p class="text-muted">Data Kosong</p>
    </div>
  <?php
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

function tampilPekerjaan($con, $id_pekerjaanEdit, $id_dosen, $id_semester){
  $pekerjaan = "select * from tabel_pekerjaan_kompen where id_dosen='$id_dosen' and id_semester='$id_semester'";
  $resultPekerjaan = mysqli_query($con, $pekerjaan);

  $output="";
  if(mysqli_num_rows($resultPekerjaan)>0){
    while($rowPekerjaan=mysqli_fetch_assoc($resultPekerjaan)){
      if($rowPekerjaan["id_pekerjaan_kompen"]==$id_pekerjaanEdit){
        $output.="<option value='$rowPekerjaan[id_pekerjaan_kompen]' selected>".$rowPekerjaan["nama"]."</option>";
      }else{
        $output.="<option value='$rowPekerjaan[id_pekerjaan_kompen]'>$rowPekerjaan[nama]</option>";
      }
    }
  }
  return $output;
}

function tampilDosen($con, $id_dosenEdit){
  $dosenPekerjaan = "select distinct(a.id_dosen), b.nama from tabel_pekerjaan_kompen a, tabel_dosen b where a.id_dosen=b.id_dosen";
  $resultDosenPekerjaan = mysqli_query($con, $dosenPekerjaan);

  $output="";
  if(mysqli_num_rows($resultDosenPekerjaan)>0){
    while($rowDosenPekerjaan=mysqli_fetch_assoc($resultDosenPekerjaan)){
      if($rowDosenPekerjaan["id_dosen"]==$id_dosenEdit){
        $output.="<option value='$rowDosenPekerjaan[id_dosen]' selected>".$rowDosenPekerjaan["nama"]."</option>";
      }else{
        $output.="<option value='$rowDosenPekerjaan[id_dosen]'>$rowDosenPekerjaan[nama]</option>";
      }
    }
  }
  return $output;
}

if(isset($_POST["pilihDosen"])){
  $pekerjaan = "select * from tabel_pekerjaan_kompen where id_dosen='$_POST[pilihDosen]' and id_semester='$_POST[id_semester]'";
  $resultPekerjaan = mysqli_query($con, $pekerjaan);

  $output="";
  if(mysqli_num_rows($resultPekerjaan)>0){
    while($rowPekerjaan=mysqli_fetch_assoc($resultPekerjaan)){
      $output.="<option value='$rowPekerjaan[id_pekerjaan_kompen]'>$rowPekerjaan[nama]</option>";
    }
  }

  echo $output;
}

// Modal Edit Kompen
if(isset($_POST["edit_kompen"])){
  $editKompen = "select a.*, b.nim, b.nama as namaMhs, c.nama as namaDosen, d.nama as pekerjaan from tabel_kompen a, tabel_mahasiswa b, tabel_dosen c, tabel_pekerjaan_kompen d where a.id_mahasiswa=b.id_mahasiswa and a.id_dosen=c.id_dosen and a.id_pekerjaan_kompen=d.id_pekerjaan_kompen and a.id_kompen=$_POST[edit_kompen]";
  $resultEditKompen = mysqli_query($con, $editKompen);

  if(mysqli_num_rows($resultEditKompen)>0){
    $rowEditKompen=mysqli_fetch_assoc($resultEditKompen);
      
      $output="";
      $output.="
      <input type='hidden' name='id_semester' id='id_semesterPekerjaan' value='$rowEditKompen[id_semester]'>
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
              <select class='form-control w-auto tanggal' name='tanggal' onblur='validasiTanggal(this)' id='tanggal'>".
                optionTanggal($rowEditKompen["waktu"])."
              </select>
            </div>
            <div class='col-sm-auto'>
              <select class='form-control w-auto tanggal' style='width:6.6em;' name='bulan' onblur='validasiTanggal(this)' id='bulan'>".
                optionBulan($rowEditKompen["waktu"])."
              </select>
            </div>
            <div class='col-sm-auto'>
              <select class='form-control tanggal w-auto' name='tahun' onblur='validasiTanggal(this)' id='tahun'>".
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
            <select class='form-control' name='dosen' id='dosen' onblur='validasiDosen(this)'>".
              tampilDosen($con, $rowEditKompen["id_dosen"])."
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
          <select class='form-control' name='jenisKompensasi' id='jenisKompensasi' onblur='validasiJenis(this)'>".
          tampilPekerjaan($con, $rowEditKompen["id_pekerjaan_kompen"], $rowEditKompen["id_dosen"], $rowEditKompen["id_semester"])."
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
        <button type='submit' name='editKompen' class='btn btn-success btn-ok'>Submit</button>
      </div>";

    echo $output;

  }else{
    echo $output.="Data Kosong";
  }
}

// UD Kompen
if(isset($_POST["editKompen"]) || isset($_POST["hapusKompen"])){
  if($_GET["module"]=="absenKompen" && $_GET["act"]=="edit"){
    mysqli_query($con, "update tabel_kompen set waktu='$_POST[tahun]-$_POST[bulan]-$_POST[tanggal]', id_dosen='$_POST[dosen]', id_pekerjaan_kompen='$_POST[jenisKompensasi]', jumlah_jam=$_POST[totalJam] where id_kompen='$_POST[id_kompen]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  
  else if($_GET["module"]=="absenKompen" && $_GET["act"]=="hapus"){
    mysqli_query($con, "delete from tabel_kompen where id_kompen='$_POST[id_kompen]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
}

?>