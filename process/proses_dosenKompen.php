<?php
include "../config/connection.php";

function tampilDataProfilDosen($con, $idUser){
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
    <form action="" method="post">
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
                <div class="modal-footer col-12 tambahkan-modal-parent text-right">
                  <button type="submit" class="btn tambahkan-modal ">Konfirmasi</button>
                </div>
              </div>
            <?php
              }
            ?>
            </div>
          </form>
    <?php
  }
?>