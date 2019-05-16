<?php
include "../config/connection.php";

function tampilDataProfilDosen($con, $idUser)
{
  $tampilProfilDosen="SELECT * FROM tabel_dosen td INNER JOIN tabel_user tu
    ON tu.username = td.nip where tu.id_user = '$idUser'";
    $resultTampilProfilDosen=mysqli_query($con, $tampilProfilDosen);
    return $resultTampilProfilDosen;
}

function mhsKompen($con){
    $mhsKompen = "select a.*, b.nim, b.nama as namaMhs, d.* from tabel_kompen a, tabel_mahasiswa b, tabel_kelas d where a.id_mahasiswa=b.id_mahasiswa and b.id_kelas=d.id_kelas";
    $resultMhsKompen = mysqli_query($con, $mhsKompen);
    return $resultMhsKompen;
}

function tampilTanggal($tanggal)
{
    $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");  
    $tanggalHasil=date('d', strtotime($tanggal));
    $bulan= date('m', strtotime($tanggal));
    $tahun=date('Y', strtotime($tanggal));
    return $tanggalHasil." ".$arrBulan[$bulan-1]." ".$tahun;
}

#modal lihat kompen
// Modal Edit Kompen
if(isset($_POST["kompenDosen"])){
    ?>    
    <form action="../process/proses_dosenKompen.php?module=kompenAbsen&act=konfirmasi" method="post">
            <div class="modal-body">
            <?php
              $idKompen = $_POST['id_kompen'];
              $queryModal = "select a.*, b.nama as namaMhs, b.nim, c.nama as namaTugas, d.nama as namaDosen from tabel_kompen a 
              inner join tabel_mahasiswa b on a.id_mahasiswa = b.id_mahasiswa 
              inner join tabel_pekerjaan_kompen c on a.id_pekerjaan_kompen = c.id_pekerjaan_kompen 
              inner join tabel_dosen d on a.id_dosen = d.id_dosen ";
              $resultModal = mysqli_query($con, $queryModal);
              while($rowModal = mysqli_fetch_assoc($resultModal)) {
            ?>
              <div class="form-group row">
                <input type="hidden" name="id_kompen" value="<?php echo $rowModal["id_kompen"]; ?>">
                  <label class="col-sm-3">NIM</label>
                  <div class="input-group col-sm-9">
                    <p>: <?php echo $rowModal["nim"]; ?></p>
                  </div>
                  <label class="col-sm-3">Nama</label>
                  <div class="input-group col-sm-9">
                    <p>: <?php echo $rowModal["namaMhs"]; ?></p>
                  </div>
                  <label class="col-sm-3">Tanggal</label>
                  <div class="input-group col-sm-9">
                    <p>: <?php echo tampilTanggal($rowModal["waktu"]); ?></p>
                  </div>
                  <label class="col-sm-3">Jenis Kompensasi</label>
                  <div class="input-group col-sm-9">
                    <p>: <?php echo $rowModal["namaTugas"]; ?></p>
                  </div>
                  <label class="col-sm-3">Total Jam</label>
                  <div class="input-group col-sm-9">
                    <p>: <?php echo $rowModal["jumlah_jam"]; ?></p>
                  </div>
                  <label class="col-sm-3">Dosen</label>
                  <div class="input-group col-sm-9">
                    <p>: <?php echo $rowModal["namaDosen"]; ?></p>
                  </div>
                <div class=" col-12 tambahkan-modal-parent text-right">
                  <button type="submit" name="konfirmasiKompen" class="btn tambahkan-modal ">Konfirmasi</button>
                </div>
              </div>
            <?php
              }
            ?>
            </div>
          </form>
    <?php
  }

if(isset($_POST["konfirmasiKompen"])){
    if($_GET["module"]=="kompenAbsen" && $_GET["act"]=="konfirmasi"){
        $waktu_verifikasi=date('Y-m-d H:i:s');
        mysqli_query($con, "update tabel_kompen set waktu_verifikasi='$waktu_verifikasi', status_verifikasi='sudah terverifikasi' where id_kompen='$_POST[id_kompen]';");
        header('location:../module/index.php?module=' . $_GET["module"]);
    }
}


// list kompen
function ambilJadwalDosen($con, $idUser){
    $queryJadwalDosen = "SELECT tr.kode, tr.lantai, tm.sks, tj.jam_mulai, tj.jam_selesai, tj.hari, tm.nama 
                         FROM tabel_jadwal tj INNER JOIN tabel_dosen td
                         ON tj.id_dosen = td.id_dosen INNER JOIN tabel_matkul tm 
                         ON tj.id_matkul = tm.id_matkul INNER JOIN tabel_ruang tr
                         ON tj.id_ruang = tr.id_ruang WHERE td.id_user = '$idUser'";
    $resultQueryJadwalDosen = mysqli_query($con, $queryJadwalDosen);
    return $resultQueryJadwalDosen;
   }
   
   function tampilTaskDosen($con, $idUser){
    $queryTask = "SELECT tt.id_task, tt.pekerjaan, tt.kuota FROM tabel_task tt INNER JOIN tabel_dosen td
                  ON tt.id_dosen = td.id_dosen WHERE td.id_user = '$idUser'";
    $resultQueryTask = mysqli_query($con, $queryTask);
    return $resultQueryTask;
   }
   
   function ambilIdDosen($con, $idUser){
    $queryAmbilId = "SELECT td.id_dosen FROM tabel_dosen td WHERE td.id_user='$idUser'";
    $resultQueryAmbilId = mysqli_query($con, $queryAmbilId);
    $resultFinal = mysqli_fetch_assoc($resultQueryAmbilId);
    return $resultFinal["id_dosen"];
   }
   
   if(isset($_POST["tambahTask"]) || isset($_POST["editIsi"]) || isset($_POST["hapusTask"])){
   
    if($_GET["module"]=="kompenAbsen" && $_GET["act"]=="tambah"){
      $result=ambilIdDosen($con,$_POST["idDosen"]);
      $tambahTaskQuery= "INSERT INTO tabel_task (pekerjaan, kuota, id_dosen)  
                        VALUES ('$_POST[taskPekerjaan]','$_POST[kuotaMhs]', $result)";
      mysqli_query($con, $tambahTaskQuery);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
    
    else if($_GET["module"]=="kompenAbsen" && $_GET["act"]=="hapus"){
      $hapusTask="DELETE FROM tabel_task WHERE id_task='$_POST[idTask]'";
      mysqli_query($con, $hapusTask);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
   }
?>