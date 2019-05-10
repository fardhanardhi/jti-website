<?php
include "../config/connection.php";

function peminjam($con){
  $peminjam="select a.*, b.*, c.* from tabel_ruang_dipinjam a, tabel_user b, tabel_ruang c where a.peminjam=b.id_user and a.id_ruang=c.id_ruang order by a.waktu_pinjam asc";
  $resultPeminjam = mysqli_query($con, $peminjam);
  return $resultPeminjam;
}

function riwayatPeminjam($con){
  $riwayatPeminjam="select a.*, b.*, c.* from tabel_riwayat_peminjam_kelas_kosong a, tabel_user b, tabel_ruang c where a.peminjam=b.id_user and a.id_ruang=c.id_ruang order by a.waktu_pinjam asc";
  $resultRiwayatPeminjam = mysqli_query($con, $riwayatPeminjam);
  return $resultRiwayatPeminjam;
}

function user($con, $id_user){
  $resultMhs= mysqli_query($con, "select a.* from tabel_mahasiswa a, tabel_user b where a.id_user=b.id_user and a.id_user='$id_user'");
  $resultDosen= mysqli_query($con, "select a.* from tabel_dosen a, tabel_user b where a.id_user=b.id_user and a.id_user='$id_user'");
  $resultAdmin= mysqli_query($con, "select a.* from tabel_admin a, tabel_user b where a.id_user=b.id_user and a.id_user='$id_user'");
  
  if(mysqli_num_rows($resultMhs)>0){
    return $resultMhs;
  }
  else if(mysqli_num_rows($resultDosen)>0){
    return $resultDosen;
  }
  else if(mysqli_num_rows($resultAdmin)>0){
    return $resultAdmin;
  }
}

function tampilKelas($con, $id_user){
  $kelas = "select a.*, b.*, c.* from tabel_mahasiswa a, tabel_kelas b, tabel_prodi c where a.id_prodi=b.id_prodi and a.id_User=$id_user";
  $resultKelas = mysqli_query($con, $kelas);  
  if(mysqli_num_rows($resultKelas)>0){
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]."-".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
  }
  else{
    return "-";
  }
}

function kelasKosong($con, $jam, $hari)
{
  $kelasKosong="select * from tabel_ruang where id_ruang not in (select id_ruang from tabel_jadwal where jam_mulai = '$jam' and hari = '$hari')";
  $resultKelasKosong = mysqli_query($con, $kelasKosong);
  return $resultKelasKosong;
}

function jamSelesaiKelasKosong($con, $jam, $hari, $id_ruang){
  $ruangSama="select * from tabel_jadwal where id_ruang = '$id_ruang' and jam_mulai > '$jam' and hari='$hari' order by jam_mulai limit 1";
  $resultRuangSama = mysqli_query($con, $ruangSama);
  if(mysqli_num_rows($resultRuangSama) > 0){
    $rowRuangSama=mysqli_fetch_assoc($resultRuangSama);
    return $rowRuangSama["jam_mulai"];
  }else{
    return '18:00:00';
  }
}

function cekRuangDipinjam($con, $jamMulai, $jamSelesai, $hari, $id_ruang){
  $cekRuangDipinjam="select * from tabel_ruang_dipinjam where waktu_mulai='$jamMulai' and waktu_selesai='$jamSelesai' and id_ruang='$id_ruang' and hari='$hari'";
  $resultCekRuangDipinjam = mysqli_query($con, $cekRuangDipinjam);
  if(mysqli_num_rows($resultCekRuangDipinjam)>0){
    return true;
  }else{
    return false;
  }
}

function tampilTanggal($tanggal)
{
  $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");  
  $tanggalHasil=date('d', strtotime($tanggal));
  $bulan= date('m', strtotime($tanggal));
  $tahun=date('Y', strtotime($tanggal));
  return $tanggalHasil." ".$arrBulan[$bulan-1]." ".$tahun;
}

function tampilWaktu($waktu)
{
  return date('H.i', strtotime($waktu));
}

function tampilWaktuDefault($waktu)
{
  return date('H:i', strtotime($waktu));
}

function tampilJam($con)
{
  $resultJam = mysqli_query($con, "select distinct(jam_mulai) from tabel_jadwal order by jam_mulai asc");
  return $resultJam;
}

if(isset($_POST["cariKelasKosong"])){
  $resultKelasKosong=kelasKosong($con, $_POST["jam"], $_POST["hari"]);
  if (mysqli_num_rows($resultKelasKosong) > 0) {
    while ($rowKelasKosong = mysqli_fetch_assoc($resultKelasKosong)) {
      if(cekRuangDipinjam($con, $_POST["jam"], jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"]), $_POST["hari"], $rowKelasKosong["id_ruang"]) == false) {
      ?>
      <div class="col-md-6 p-2">
        <div class="p-3 ruang rounded">
          <form action="../process/proses_adminRuangan.php?module=ruang&act=pesan" class="m-0" method="post">
            <input type="hidden" name="id_ruang" value="<?php echo $rowKelasKosong["id_ruang"];?>">
            <input type="hidden" name="waktu_mulai" value="<?php echo $_POST["jam"]; ?>">
            <input type="hidden" name="hari" value="<?php echo $_POST["hari"]; ?>">
            <input type="hidden" name="waktu_selesai" value="<?php echo jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"]); ?>">
            <div class="row d-flex align-items-center">
              <div class="col-7 text-left">
                <strong><span class="p-0 m-0 kelas"><?php echo $rowKelasKosong["kode"]; ?></span></strong>
                <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $rowKelasKosong["lantai"] . ")"; ?></span>
                <br>
                <strong><?php echo tampilWaktu($_POST["jam"]) . " - " . tampilWaktu(jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"])); ?></strong>
              </div>
              <div class="col-5 text-right">
                <button type="submit" name="pesan" class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php
    }else{
      ?>
      <div class="col-md-6 p-2">
        <div class="p-3 ruang rounded dipesan">
          <div class="m-0">
            <div class="row d-flex align-items-center">
              <div class="col-7 text-left">
                <strong><span class="p-0 m-0 kelas"><?php echo $rowKelasKosong["kode"]; ?></span></strong>
                <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $rowKelasKosong["lantai"] . ")"; ?></span>
                <br>
                <strong><?php echo tampilWaktu($_POST["jam"]) . " - " . tampilWaktu(jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"])); ?></strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    }
  } else {
    ?><div class="col-12 text-center mt-3"><strong>Tidak ada ruang yang kosong</strong></div><?php
  }
}

function pinjaman($con, $id_user){
  $pinjaman="select * from tabel_ruang_dipinjam where peminjam='$id_user'";
  $resultPinjaman = mysqli_query($con, $pinjaman);
  return $resultPinjaman;
}

function countPinjaman($con, $id_user){
  $countPinjaman="select count(id_ruang_dipinjam) as countPinjaman from tabel_ruang_dipinjam where peminjam='$id_user'";
  $resultCountPinjaman = mysqli_query($con, $countPinjaman);
  $rowCountPinjaman=mysqli_fetch_assoc($resultCountPinjaman);
  return $rowCountPinjaman["countPinjaman"];
}

function itemPinjaman($con, $id_user, $mulaiLimit, $jmlLimit){
  $itemPinjaman="select a.*, b.* from tabel_ruang_dipinjam a, tabel_ruang b where a.id_ruang=b.id_ruang and a.peminjam='$id_user' order by a.hari desc limit $mulaiLimit, $jmlLimit";
  $resultItemPinjaman = mysqli_query($con, $itemPinjaman);
  return $resultItemPinjaman;
}

function ruangan($con){
  $ruangan="select * from tabel_ruang";
  $resultRuangan = mysqli_query($con, $ruangan);
  return $resultRuangan;
}

function jmlRuangLantai($con){
  $jmlRuangLantai="select count(id_ruang) as jmlRuang, lantai from tabel_ruang group by lantai";
  $resultJmlRuangLantai = mysqli_query($con, $jmlRuangLantai);
  return $resultJmlRuangLantai;
}

if(isset($_POST["pesan"]) || isset($_POST["tambahRuang"]) || isset($_POST["hapusRuang"]) || isset($_POST["checkoutRuang"])){
  session_start();

  if($_GET["module"]=="ruang" && $_GET["act"]=="pesan"){
    $dateNow = date('Y-m-d H:i:s');
    mysqli_query($con, "insert into tabel_ruang_dipinjam values('','$_POST[id_ruang]','$_SESSION[id]', '$_POST[hari]', '$_POST[waktu_mulai]', '$_POST[waktu_selesai]', '$dateNow')");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  else if($_GET["module"]=="ruang" && $_GET["act"]=="tambah"){
    mysqli_query($con, "insert into tabel_ruang values('','$_POST[kode]','$_POST[lantai]')");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  else if($_GET["module"]=="ruang" && $_GET["act"]=="hapus"){
    mysqli_query($con, "delete from tabel_ruang where id_ruang='$_POST[id_ruang]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  else if ($_GET["module"] == "ruang" && $_GET["act"] == "checkout") {
    $ruangDipinjam=mysqli_query($con,"select * from tabel_ruang_dipinjam where id_ruang_dipinjam='$_POST[id_ruang_dipinjam]'");
    $rowRuangDipinjam=mysqli_fetch_assoc($ruangDipinjam);
    $id_ruang=$rowRuangDipinjam["id_ruang"];
    $peminjam=$rowRuangDipinjam["peminjam"];
    $hari=$rowRuangDipinjam["hari"];
    $waktu_mulai=$rowRuangDipinjam["waktu_mulai"];
    $waktu_pinjam=$rowRuangDipinjam["waktu_pinjam"];
    $waktu_selesai=$rowRuangDipinjam["waktu_selesai"];
    $waktu_checkout=date('Y-m-d H:i:s');

    // insert ke tabel_riwayat_peminjam_kelas_kosong
    mysqli_query($con, "insert into tabel_riwayat_peminjam_kelas_kosong values ('', '$id_ruang', '$peminjam', '$hari', '$waktu_mulai', '$waktu_selesai', '$waktu_pinjam', '$waktu_checkout')");

    // menghapus data di tabel_ruang_dipinjam
    mysqli_query($con, "delete from tabel_ruang_dipinjam where id_ruang_dipinjam='$_POST[id_ruang_dipinjam]'");
    header('location: ../module/index.php?module='.$_GET["module"]);
  }
}

function hari(){
  $hari = date ("D");
  switch($hari){
    case 'Sun':
        $hari_ini = "minggu";
    break;

    case 'Mon':         
        $hari_ini = "senin";
    break;

    case 'Tue':
        $hari_ini = "selasa";
    break;

    case 'Wed':
        $hari_ini = "rabu";
    break;

    case 'Thu':
        $hari_ini = "kamis";
    break;

    case 'Fri':
        $hari_ini = "jumat";
    break;

    case 'Sat':
        $hari_ini = "sabtu";
    break;
    
    default:
        $hari_ini = "NULL";     
    break;
  }
  return $hari_ini;
}

// auto checkout
if(isset($_POST["autoCheckout"])) {
  $hariIni=hari();
  $jamSekarang = date("H:i:s");

  $ruangDipinjam=mysqli_query($con,"select * from tabel_ruang_dipinjam where hari='$hariIni' and waktu_selesai<='$jamSekarang'");

  if(mysqli_num_rows($ruangDipinjam)>0){
    while($rowRuangDipinjam=mysqli_fetch_assoc($ruangDipinjam)){
      $id_ruang_dipinjam=$rowRuangDipinjam["id_ruang_dipinjam"];
      $id_ruang=$rowRuangDipinjam["id_ruang"];
      $peminjam=$rowRuangDipinjam["peminjam"];
      $hari=$rowRuangDipinjam["hari"];
      $waktu_mulai=$rowRuangDipinjam["waktu_mulai"];
      $waktu_pinjam=$rowRuangDipinjam["waktu_pinjam"];
      $waktu_selesai=$rowRuangDipinjam["waktu_selesai"];
      $waktu_checkout=date('Y-m-d H:i:s');
      echo $id_ruang_dipinjam;

      // insert ke tabel_riwayat_peminjam_kelas_kosong
      mysqli_query($con, "insert into tabel_riwayat_peminjam_kelas_kosong values ('', '$id_ruang', '$peminjam', '$hari', '$waktu_mulai', '$waktu_selesai', '$waktu_pinjam', '$waktu_checkout')");

      // menghapus data di tabel_ruang_dipinjam
      mysqli_query($con, "delete from tabel_ruang_dipinjam where id_ruang_dipinjam='$id_ruang_dipinjam'");
    }
  }
}

// reload div pemesanan ruang
if(isset($_POST["reloadPemesanan"])){
  $resultPeminjam=peminjam($con);
  $resultRiwayatPeminjam=riwayatPeminjam($con);

  if (mysqli_num_rows($resultPeminjam) > 0 || mysqli_num_rows($resultRiwayatPeminjam) > 0){
  $no=1;
  while($rowPeminjam = mysqli_fetch_assoc($resultPeminjam)){
  ?>
    <div class="col-md-12 p-2 border-top border-bottom itemPemesanan">
      <div class="container-fluid p-0">
        <div class="row d-flex justify-content-around p-0 m-0">
          <div class="col-md-1 my-auto">
            <strong><?php echo $no;?></strong>
          </div>
          <div class="col-md-1 my-auto">
          <?php
          $resultUser=user($con, $rowPeminjam["peminjam"]);
          $rowUser=mysqli_fetch_assoc($resultUser);

          if($rowPeminjam["level"]=="admin"){
            ?>
            <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="">
            <?php
          }else{
            if($rowUser["foto"]=="NULL"){
              ?>
              <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="">
              <?php
            }else{
              ?>
              <img src="../attachment/img/<?php echo $rowUser["foto"];?>" class="nav-profile-photo" alt="">
              <?php
            }
          }
          ?>
          </div>
          <div class="col-md-7 pl-5 my-auto">
            <div class="container-fluid p-0">
              <div class="row">
                <div class="col-md-12">
                  <strong class="nama"><?php echo $rowUser["nama"];
                  if($rowPeminjam["level"]=="mahasiswa"){
                    echo " (".tampilKelas($con, $rowPeminjam["id_user"]).")";
                  }
                  ?>
                  </strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-auto">
                  <small>
                    <i class="far fa-calendar-alt text-secondary"></i>
                    <span class="pl-1 text-muted tanggalPinjam"><?php echo tampilTanggal($rowPeminjam["waktu_pinjam"]);?></span>
                  </small>
                </div>
                <div class="col-md-auto">
                  <small>
                    <i class="far fa-clock text-secondary"></i>
                    <span class="pl-1 text-muted waktuMulai"><?php echo tampilWaktu($rowPeminjam["waktu_mulai"]);?></span>
                  </small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 my-auto pl-0">
            <h4 class="kodeRuang"><?php echo $rowPeminjam["kode"];?></h4>
          </div>
          <div class="col-md-1"></div>
          <div class="bungkus label p-0">
            <label class="bg-success text-white rounded-bottom text-center caption-label">
              <small class="pesan">Pesan</small>
            </label>                  
          </div>
        </div>
      </div>
    </div>
  <?php
    $no++;
    }

  // perulangan untuk tabel riwayat peminjam
  $no=$no;
  while($rowRiwayatPeminjam = mysqli_fetch_assoc($resultRiwayatPeminjam)){
  ?>
    <div class="col-md-12 p-2 border-top border-bottom itemPemesanan">
      <div class="container-fluid p-0">
        <div class="row d-flex justify-content-around p-0 m-0">
          <div class="col-md-1 my-auto">
            <strong><?php echo $no;?></strong>
          </div>
          <div class="col-md-1 my-auto">
            <?php
            $resultRiwayatUser=user($con, $rowRiwayatPeminjam["peminjam"]);
            $rowRiwayatUser=mysqli_fetch_assoc($resultRiwayatUser);

            if($rowRiwayatPeminjam["level"]=="admin"){
              ?>
              <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="">
              <?php
            }else{
              if($rowRiwayatUser["foto"]=="NULL"){
                ?>
                <img src="../attachment/img/avatar.jpeg" class="nav-profile-photo" alt="">
                <?php
              }else{
                ?>
                <img src="../attachment/img/<?php echo $rowRiwayatUser["foto"];?>" class="nav-profile-photo" alt="">
                <?php
              }
            }
            ?>
          </div>
          <div class="col-md-7 pl-5 my-auto">
            <div class="container-fluid p-0">
              <div class="row">
                <div class="col-md-12">
                  <strong class="nama"><?php echo $rowRiwayatUser["nama"];
                  if($rowRiwayatPeminjam["level"]=="mahasiswa"){
                    echo " (".tampilKelas($con, $rowRiwayatPeminjam["id_user"]).")";
                  }
                  ?>
                  </strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-auto">
                  <small>
                    <i class="far fa-calendar-alt text-secondary"></i>
                    <span class="pl-1 text-muted tanggalPinjam"><?php echo tampilTanggal($rowRiwayatPeminjam["waktu_pinjam"]);?></span>
                  </small>
                </div>
                <div class="col-md-auto">
                  <small>
                    <i class="far fa-clock text-secondary"></i>
                    <span class="pl-1 text-muted waktuMulai"><?php echo tampilWaktu($rowRiwayatPeminjam["waktu_mulai"]);?></span>
                  </small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 my-auto pl-0">
            <h4 class="kodeRuang"><?php echo $rowRiwayatPeminjam["kode"];?></h4>
          </div>
          <div class="col-md-1"></div>
          <div class="bungkus label p-0">
            <label class="bg-danger text-white rounded-bottom text-center caption-label">
              <small class="selesai">Selesai</small>
            </label>                   
          </div>
        </div>
      </div>
    </div>
  <?php
    $no++;
    }
  }else{
    ?>
    <div class='col-md-12 p-2 text-center text-muted'>Data Pemesanan Ruang Kosong</div>
    <?php
  }
}

// reload div ruangan dipesan
if(isset($_POST["ruangDipesan"])){
  session_start();
  $resultPinjaman=pinjaman($con, $_SESSION["id"]);
  if(mysqli_num_rows($resultPinjaman)>0){
    $resultCountPinjaman=countPinjaman($con, $_SESSION["id"]);
    if($resultCountPinjaman>0){
      ?>               
      <!-- Carousel -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
          $mulaiLimit=-2;
          for($i=0; $i<$resultCountPinjaman/2; $i++){
              if($i==0){
                ?>
                <div class="carousel-item active">
                <?php
              }else{
                ?>
                <div class="carousel-item">
                <?php
              }
              ?>
              <div class="container-fluid">
                <div class="row">
                  <?php
                  $mulaiLimit=$mulaiLimit+2;
                  $jmlLimit=2;
                  $resultItemPinjaman=itemPinjaman($con, $_SESSION["id"], $mulaiLimit, $jmlLimit);
                  if(mysqli_num_rows($resultItemPinjaman)>0){
                    while($rowItemPinjaman=mysqli_fetch_assoc($resultItemPinjaman)){
                      ?>             
                      <div class="col-md-6 p-2">
                        <div class="p-3 ruang rounded container-fluid">
                          <div class="row align-items-center">
                            <div class="col-7 text-left">
                              <strong><span class="p-0 m-0 kelas"><?php echo $rowItemPinjaman["kode"] ?></span></strong>
                              <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " .$rowItemPinjaman["lantai"]. ")"; ?></span>
                              <br>
                              <strong><?php echo tampilWaktu($rowItemPinjaman["waktu_mulai"]) . " - " . tampilWaktu($rowItemPinjaman["waktu_selesai"]) ?></strong>
                            </div>
                            <div class="col-5 text-right">
                              <h5><?php echo ucfirst($rowItemPinjaman["hari"]); ?></h5>
                              <button class="btn btn-danger btn-checkout text-white checkout-ruang-admin" id=<?php echo $rowItemPinjaman["id_ruang_dipinjam"];?> data-toggle="modal" data-target="#modalCheckoutPinjamanAdmin">Checkout</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                  }
                  ?> 
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- End Carousel -->
      <?php
    }
  }else{
    ?>
    <div class="text-center text-muted">Tidak ada ruangan yang dipesan</div>
    <?php
  }
}

?>
<script>
$(function(){
  $(".checkout-ruang-admin").click(function() {
    var id_ruang_dipinjam = $(this).attr("id");
    $("#id_ruang_dipinjam").val(id_ruang_dipinjam);
  });
})
</script>

