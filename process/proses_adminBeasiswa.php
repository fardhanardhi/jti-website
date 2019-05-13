<?php
include "../config/connection.php";

function tampilBeasiswa($con)
{
    $tampilBeasiswa="select * from tabel_info_beasiswa";
    $resultTampilBeasiswa=mysqli_query($con, $tampilBeasiswa);
    return $resultTampilBeasiswa;
}

function cariBeasiswa($con, $tanggal)
{
    $tampilCariBeasiswa="SELECT * from tabel_info_beasiswa WHERE waktu_publish LIKE '$tanggal%' OR waktu_berakhir LIKE '$tanggal%' OR judul LIKE '$tanggal%'";
    $resultTampilCariBeasiswa=mysqli_query($con, $tampilCariBeasiswa);
    return $resultTampilCariBeasiswa;
}

function tampilTanggal($tanggal)
{
  $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");  
  $tanggalHasil=date('d', strtotime($tanggal));
  $bulan=date('m', strtotime($tanggal));
  $tahun=date('Y', strtotime($tanggal));
  return $tanggalHasil." ".$arrBulan[$bulan-1]." ".$tahun;
}

function formatTanggalBeasiswa($tanggal){
  $date1=strtr($tanggal,'/','-');
  $newFormat=date('Y-m-d',strtotime($date1));
  return $newFormat;
}

if(isset($_POST["realSubmitBeasiswa"]) || isset($_POST["editIsi"]) || isset($_POST["hapusBeasiswa"])){

    if($_GET["module"]=="beasiswa" && $_GET["act"]=="tambah"){
      $dateNow = date("Y-m-d H:i:s");
      $batasTanggal = date('Y-m-d', strtotime($_POST[batasTanggal]));
      $BeasiswaQuery= "INSERT INTO tabel_info_beasiswa (judul, isi, link, waktu_publish, waktu_berakhir)  
                      VALUES ('$_POST[judulBeasiswa]','$_POST[isiBeasiswa]','$_POST[linkBeasiswa]','$dateNow','$batasTanggal')";
      mysqli_query($con, $BeasiswaQuery);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
  
    // else if($_GET["module"]=="beasiswa" && $_GET["act"]=="edit"){
    //   mysqli_query($con, "update tabel_kuisioner set kriteria='$_POST[isiKriteria]' where id_kuisioner='$_POST[id_kuisioner]'");
    //   header('location:../module/index.php?module=' . $_GET["module"]);
    // }
    
    else if($_GET["module"]=="beasiswa" && $_GET["act"]=="hapus"){
      $BeasiswaQuery="DELETE FROM tabel_info_beasiswa WHERE id_beasiswa='$_POST[idBeasiswa]'";
      mysqli_query($con, $BeasiswaQuery);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
  }

?>

<?php
if(isset($_POST["adminCariBeasiswa"])){
  $resultTampilBeasiswa=cariBeasiswa($con,formatTanggalBeasiswa($_POST["tanggal"]));
  $index=1;
  if (mysqli_num_rows($resultTampilBeasiswa) > 0){
    ?>
    <table class="table table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Beasiswa</th>
                <th>Tanggal Pembuatan</th>
                <th>Tanggal Perubahan</th>
                <th>Batas Tanggal</th>
                <th>Proses</th>
            </tr>
        </thead>
        <tbody class="text-center m-auto">
              <?php
            while ($row = mysqli_fetch_assoc($resultTampilBeasiswa)) {
                ?>
              <tr>
                  <td><?= $index?></td>
                  <td  style="width:40em;" class="text-left" data-toggle="modal" data-target="#preview<?= $index?>"><?= $row["judul"]?></td>
                  <td style="width:15em;"><?= tampilTanggal($row["waktu_publish"])?></td>
                  <td style="width:15em;"><?= tampilTanggal($row["waktu_berakhir"]);?></td>
                  <td><button class="btn btn-danger beasiswa-hapus-btn" data-toggle="modal" data-target="#hapus<?= $index?>">Hapus</button></td>
              </tr>
                <?php
            $index++;
            }
                ?>
                                              
        </tbody>
    </table>
    <?php
  }else{
      ?>
      <div class="text-center">
        <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
        <p class="text-muted">Tidak ada beasiswa pada "<?php echo tampilTanggal(formatTanggalBeasiswa($_POST["tanggal"]));?>"</p>
      </div>
      <?php
  }
}
?>