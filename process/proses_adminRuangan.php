<?php
include "../config/connection.php";

function peminjam($con){
  $peminjam="select a.*,b.*, c.* from tabel_info_kelas_kosong a, tabel_user b, tabel_ruang c where a.peminjam=b.id_user and a.id_ruang=c.id_ruang order by a.waktu_pinjam asc";
  $resultPeminjam = mysqli_query($con, $peminjam);
  return $resultPeminjam;
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
  $resultJam = mysqli_query($con, "select distinct(waktu_mulai) from tabel_info_kelas_kosong order by waktu_mulai asc");
  return $resultJam;
}

if(isset($_POST["cariKelasKosong"])){
  $resultKelasKosong=kelasKosong($con, $_POST["jam"], $_POST["hari"]);
  if (mysqli_num_rows($resultKelasKosong) > 0) {
    while ($row = mysqli_fetch_assoc($resultKelasKosong)) {
      $id_info_kelas_kosong = $row["id_info_kelas_kosong"];
      if ($row["status_dipinjam"] == "kosong") {
        ?>
        <div class="col-md-6 p-2">
          <div class="p-3 ruang rounded">
            <form action="../process/proses_kelasKosong.php?act=pesan&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
              <div class="row d-flex align-items-center">
                <div class="col-7 text-left">
                  <strong><span class="p-0 m-0 kelas"><?php echo $row["kode"]; ?></span></strong>
                  <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $row["lantai"] . ")"; ?></span>
                  <br>
                  <strong><?php echo tampilWaktu($row["waktu_mulai"]) . " - " . tampilWaktu($row["waktu_selesai"]) ?></strong>
                </div>
                <div class="col-5 text-right">
                  <button type="submit" name="pesan" class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    <?php
  } else if ($row["status_dipinjam"] == "dipinjam") {
    ?>
      <div class="col-md-6 p-2">
          <div class="p-3 ruang rounded container-fluid">
              <div class="row d-flex align-items-center">
                <div class="col-7 text-left">
                  <strong><span class="p-0 m-0 kelas"><?php echo $row["kode"]; ?></span></strong>
                  <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $row["lantai"] . ")"; ?></span>
                  <br>
                  <strong><?php echo tampilWaktu($row["waktu_mulai"]) . " - " . tampilWaktu($row["waktu_selesai"]) ?></strong>
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

if(isset($_POST["tambahRuang"]) || isset($_POST["hapusRuang"])){
  if($_GET["module"]=="ruang" && $_GET["act"]=="tambah"){
    mysqli_query($con, "insert into tabel_ruang values('','$_POST[kode]','$_POST[lantai]')");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
  else if($_GET["module"]=="ruang" && $_GET["act"]=="hapus"){
    mysqli_query($con, "delete from tabel_ruang where id_ruang='$_POST[id_ruang]'");
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
}
?>

