<?php
include "../config/connection.php";

function kelasDipesan($con)
{
  $kelasDipesan = "select a.*, b.* from tabel_info_kelas_kosong a, tabel_ruang b where a.id_ruang = b.id_ruang and a.status_dipinjam='dipinjam' and a.peminjam='$_SESSION[id]'";
  $resultKelasDipesan = mysqli_query($con, $kelasDipesan);
  return $resultKelasDipesan; 
}

function kelasKosong($con, $jam, $hari)
{
  $kelasKosong = "select a.*, b.* from tabel_info_kelas_kosong a, tabel_ruang b where a.id_ruang = b.id_ruang and a.waktu_mulai='$jam' and a.hari='$hari'";
  $resultKelasKosong = mysqli_query($con, $kelasKosong);
  return $resultKelasKosong;
}

function cekKelasLogin($con)
{
  if ($_SESSION['level'] == "mahasiswa") {
    $login = mysqli_query($con, "select * from tabel_mahasiswa where id_user='$_SESSION[id]'");
    $resultLogin = mysqli_fetch_assoc($login);
    return $resultLogin["id_kelas"];
  }
}

function cekPeminjamSekelas($con, $jam, $hari)
{
  $resultPeminjam = mysqli_query($con, "select a.* from tabel_info_kelas_kosong a, tabel_user b, tabel_mahasiswa c where a.status_dipinjam='dipinjam' and a.peminjam=b.id_user and b.id_user=c.id_user and a.waktu_mulai='$jam' and a.hari='$hari' and c.id_kelas='" . cekKelasLogin($con) . "'");
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
  $resultJam = mysqli_query($con, "select distinct(waktu_mulai) from tabel_info_kelas_kosong order by waktu_mulai asc");
  return $resultJam;
}

// Cari Kelas Kosong
if(isset($_POST["cariKelasKosong"])){
  session_start();
  $resultKelasKosong=kelasKosong($con, $_POST["jam"], $_POST["hari"]);
  if (mysqli_num_rows($resultKelasKosong) > 0){
      while($row = mysqli_fetch_assoc($resultKelasKosong)){
          $id_info_kelas_kosong = $row["id_info_kelas_kosong"];
          if($row["status_dipinjam"]=="kosong"){
            ?>
            <div class="col-md-6 p-2">
              <div class="rounded ruang p-3">

                <form action="../process/proses_kelasKosong.php?module=kelasKosong&act=pesan&id=<?php echo $id_info_kelas_kosong; ?>" method="post" class="mb-0 mt-0">
                <div class="row d-flex align-items-center">
                  <div class="col-3 text-center">
                    <h4 class="p-0 m-0"><?php echo $row["kode"]; ?></h4>
                    <span class="text-secondary"><?php echo "(Lantai ".$row["lantai"].")"; ?></span>
                  </div>
                  <div class="col-5">
                    <h5><?php echo tampilWaktu($row["waktu_mulai"]). " - ".tampilWaktu($row["waktu_selesai"]) ?></h5>
                  </div>
                  <div class="col-4 text-right">
                    <?php
                      if (cekPeminjamSekelas($con, $row["waktu_mulai"], $row["hari"])==true){
                        ?>
                        <a tabindex="0" class="btn btn-pesan p-1 bg-blue text-white" role="button" data-toggle="popover" data-trigger="focus" data-content="*Kelas anda telah melakukan pemesanan ruangan!" data-placement="bottom">Pesan</a>
                        <?php
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
          }else if($row["status_dipinjam"]=="dipinjam"){
            ?>
            <div class="col-md-6 p-2">
              <div class="rounded ruang p-3 dipesan">
                <div class="mb-0 mt-0">
                  <div class="row d-flex align-items-center">
                    <div class="col-3 text-center">
                      <h4 class="p-0 m-0"><?php echo $row["kode"]; ?></h4>
                      <span class="text-secondary"><?php echo "(Lantai ".$row["lantai"].")"; ?></span>
                    </div>
                    <div class="col-5">
                      <h5><?php echo tampilWaktu($row["waktu_mulai"]). " - ".tampilWaktu($row["waktu_selesai"]) ?></h5>
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
  mysqli_close($con);
}

// Pesan
if (isset($_POST["pesan"])) {
  session_start();
  if ($_GET["act"] == "pesan") {
    $dateNow = date('Y-m-d H:i:s');
    mysqli_query($con, "update tabel_info_kelas_kosong set status_dipinjam='dipinjam', 
            peminjam='$_SESSION[id]', waktu_pinjam='$dateNow' where id_info_kelas_kosong='$_GET[id]'");
    header("location: ../module/index.php?module=kelasKosong");
  }
}

// Checkout
if (isset($_POST["checkout"])) {
  if ($_GET["module"] == "kelasKosong" && $_GET["act"] == "checkout") {
    mysqli_query($con, "update tabel_info_kelas_kosong set status_dipinjam='kosong' where id_info_kelas_kosong='$_POST[id_info_kelas_kosong]'");
    header("location: ../module/index.php?module=kelasKosong");
  }
}
