<?php
include "../config/connection.php";

function kelasDipesan($con)
{
  $kelasDipesan = "select a.*, b.* from tabel_ruang_dipinjam a, tabel_ruang b where a.id_ruang = b.id_ruang and a.peminjam='$_SESSION[id]'";
  $resultKelasDipesan = mysqli_query($con, $kelasDipesan);
  return $resultKelasDipesan;
}

function kelasKosong($con, $jam, $hari)
{
  $kelasKosong="select * from tabel_ruang where id_ruang not in (select id_ruang from tabel_jadwal where jam_mulai = '$jam' and hari = '$hari')";
  $resultKelasKosong = mysqli_query($con, $kelasKosong);
  return $resultKelasKosong;
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

function cekKelasLogin($con)
{
  if ($_SESSION['level'] == "mahasiswa") {
    $login = mysqli_query($con, "select * from tabel_mahasiswa where id_user='$_SESSION[id]'");
    $resultLogin = mysqli_fetch_assoc($login);
    return $resultLogin["id_kelas"];
  }
}

function cekPeminjamSekelas($con, $jamMulai, $jamSelesai, $hari)
{
  $resultPeminjam = mysqli_query($con, "select a.* from tabel_ruang_dipinjam a, tabel_user b, tabel_mahasiswa c where  a.peminjam=b.id_user and b.id_user=c.id_user and a.waktu_mulai='$jamMulai' and waktu_selesai='$jamSelesai' and a.hari='$hari' and c.id_kelas='" . cekKelasLogin($con) . "'");
  if (mysqli_num_rows($resultPeminjam) > 0) {
    return true;
  } else {
    return false;
  }
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

// Cari Kelas Kosong
if(isset($_POST["cariKelasKosong"])){
  session_start();
  $resultKelasKosong=kelasKosong($con, $_POST["jam"], $_POST["hari"]);
  if (mysqli_num_rows($resultKelasKosong) > 0){
    while($rowKelasKosong = mysqli_fetch_assoc($resultKelasKosong)){
      if(cekRuangDipinjam($con, $_POST["jam"], jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"]), $_POST["hari"], $rowKelasKosong["id_ruang"]) == false) {
        ?>
        <div class="col-md-6 p-2">
          <div class="rounded ruang p-3">

            <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=pesan" method="post" class="mb-0 mt-0">
              <input type="hidden" name="id_ruang" value="<?php echo $rowKelasKosong["id_ruang"];?>">
              <input type="hidden" name="waktu_mulai" value="<?php echo $_POST["jam"];?>">
              <input type="hidden" name="hari" value="<?php echo $_POST["hari"];?>">
              <input type="hidden" name="waktu_selesai" value="<?php echo jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"]); ?>">
            <div class="row d-flex align-items-center">
              <div class="col-3 text-center">
                <h4 class="p-0 m-0"><?php echo $rowKelasKosong["kode"]; ?></h4>
                <span class="text-secondary"><?php echo "(Lantai ".$rowKelasKosong["lantai"].")"; ?></span>
              </div>
              <div class="col-5">
                <h5><?php echo tampilWaktu($_POST["jam"]) . " - " . tampilWaktu(jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"])); ?></h5>
              </div>
              <div class="col-4 text-right">
                <?php
                  if($_SESSION["level"]=="mahasiswa"){
                    if (cekPeminjamSekelas($con, $_POST["jam"], jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"]), $_POST["hari"])==true){
                      ?>
                      <a tabindex="0" class="btn btn-pesan p-1 bg-blue text-white" role="button" data-toggle="popover" data-trigger="focus" data-content="*Kelas anda telah melakukan pemesanan ruangan!" data-placement="bottom">Pesan</a>
                      <?php
                    }else{
                      ?>
                      <button type="submit" name="pesan" class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                      <?php
                    }
                  }else{
                    ?>
                    <button type="submit" name="pesan" class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                    <?php
                  }
                ?>
              </div>
              </form>
            </div>
          </div>
        </div>
        <?php
      }else{
        ?>
        <div class="col-md-6 p-2">
          <div class="rounded ruang p-3 dipesan">
            <div class="mb-0 mt-0">
              <div class="row d-flex align-items-center">
                <div class="col-3 text-center">
                  <h4 class="p-0 m-0"><?php echo $rowKelasKosong["kode"]; ?></h4>
                  <span class="text-secondary"><?php echo "(Lantai ".$rowKelasKosong["lantai"].")"; ?></span>
                </div>
                <div class="col-5">
                  <h5><?php echo tampilWaktu($_POST["jam"])." - " . tampilWaktu(jamSelesaiKelasKosong($con, $_POST["jam"], $_POST["hari"], $rowKelasKosong["id_ruang"])); ?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    }
  }else{
    ?><div class="col-12 text-center mt-3"><strong>Tidak ada ruang yang kosong</strong></div><?php
  }
}

// Reload div pemesanan
if(isset($_POST["ruangDipesan"])){
  session_start();
  $resultKelasDipesan=kelasDipesan($con);
  if (mysqli_num_rows($resultKelasDipesan) > 0){
      while($rowKelasDipesan = mysqli_fetch_assoc($resultKelasDipesan)){
        ?>
        <div class="pesanan p-3 container-fluid border-top pb-3">
          <div class="row d-flex align-items-center">
            <div class="col-7 text-left">
              <strong><span class="p-0 m-0 kelas"><?php echo $rowKelasDipesan["kode"]; ?></span></strong>
              <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai ".$rowKelasDipesan["lantai"].")"; ?></span>
              <br> 
              <strong><?php echo tampilWaktu($rowKelasDipesan["waktu_mulai"]). " - ".tampilWaktu($rowKelasDipesan["waktu_selesai"]) ?></strong>
            </div>
            <div class="col-5 text-right">
              <h4><?php echo ucfirst($rowKelasDipesan["hari"]); ?></h4>
            </div>
          </div>

          <!-- Button trigger modal -->
          <div class="row">
            <div class="col-12 text-right">
              <button class="btn btn-danger btn-checkout text-white checkout-kelas" data-toggle="modal" data-target="#modalCheckout" id="<?php echo $rowKelasDipesan["id_ruang_dipinjam"] ; ?>">Checkout</button>
            </div>
          </div>
        </div>
        <?php
      }
  }else{
      ?>
      <div class="text-center pt-5 pb-5 container-fluid">
        <strong>Tidak ada ruang yang dipesan!</strong>
      </div>
    <?php
  }
}

// Auto checkout ruang dipinjam mhs
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

// Pesan & Checkout
if(isset($_POST["pesan"]) || isset($_POST["checkout"])){
  session_start();

  if($_GET["module"]=="kelasKosong" && $_GET["act"]=="pesan"){
    $dateNow = date('Y-m-d H:i:s');
    
    
    if(mysqli_query($con, "insert into tabel_ruang_dipinjam (id_ruang, peminjam, hari, waktu_mulai, waktu_selesai, waktu_pinjam) values ('$_POST[id_ruang]','$_SESSION[id]', '$_POST[hari]', '$_POST[waktu_mulai]', '$_POST[waktu_selesai]', '$dateNow')")){

          header('location:../module/index.php?module=' . $_GET["module"]);

    }

    else{

      echo("Error description: " . mysqli_error($con));
      // mysqli_error($con);
    }
  }
  else if ($_GET["module"] == "kelasKosong" && $_GET["act"] == "checkout") {
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
?>

<script>
$(function() {
  $('[data-toggle="popover"]').popover();
  $('[data-trigger="focus"]').popover();
  $(".checkout-kelas").click(function() {
    var id_ruang_dipinjam = $(this).attr("id");
    $("#id_ruang_dipinjam_mhs").val(id_ruang_dipinjam);
  });
});
</script>
