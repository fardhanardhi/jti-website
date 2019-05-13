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
    $tampilCariBeasiswa="select * from tabel_info_beasiswa where waktu_publish = '$tanggal' OR waktu_berakhir ='$tanggal' OR judul = '$tanggal'";
    $resultTampilCariBeasiswa=mysqli_query($con, $tampilCariBeasiswa);
    return $resultTampilCariBeasiswa;
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
  $resultTampilBeasiswa=cariBeasiswa($con, $_POST["tanggal"]);
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
                <th colspan="2">Proses</th>
            </tr>
        </thead>
        <tbody class="text-center m-auto">
              <?php
            while ($row = mysqli_fetch_assoc($resultTampilBeasiswa)) {
                ?>
              <tr>
                  <td><?= $index?></td>
                  <td  style="width:40em;" class="text-left" data-toggle="modal" data-target="#preview<?= $index?>"><?= $row["judul"]?></td>
                  <td style="width:15em;"><?= date('d F Y', strtotime($row["waktu_publish"]))?></td>
                  <td style="width:15em;">25 Februari 2019</td>
                  <td style="width:15em;"><?= date('d F Y', strtotime($row["waktu_berakhir"]));?></td>
                  <td><button class="btn btn-primary beasiswa-edit-btn">Edit</button></td>
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
        <p class="text-muted">Data beasiswa kosong</p>
      </div>
      <?php
    }
}
?>