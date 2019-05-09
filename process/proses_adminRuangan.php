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

function kelasDipesan($con)
{
  $kelasDipesan = "select a.*, b.* from tabel_info_kelas_dipinjam a, tabel_ruang b where a.id_ruang = b.id_ruang and a.peminjam='$_SESSION[id]'";
  $resultKelasDipesan = mysqli_query($con, $kelasDipesan);
  return $resultKelasDipesan; 
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
  $cekRuangDipinjam="select * from tabel_ruang_dipinjam where waktu_mulai='$jamMulai' and waktu_selesai='$jamSelesai' and id_ruang='$id_ruang'";
  $resultCekRuangDipinjam = mysqli_query($con, $cekRuangDipinjam);
  if(mysqli_num_rows($resultCekRuangDipinjam)>0){
    return true;
  }else{
    return false;
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

function tampilTanggal($tanggal)
{
  return date('d F Y', strtotime($tanggal));
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

?>

