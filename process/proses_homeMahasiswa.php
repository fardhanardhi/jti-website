<?php
include "../config/connection.php";

function info($con)
{
  $info =
    "SELECT 
      * 
    FROM 
      tabel_info
    ORDER BY
      waktu_publish
    DESC
    ";
  $resultInfo = mysqli_query($con, $info);
  return $resultInfo;
}

function infoBeasiswa($con)
{
  $infoBerita =
    "SELECT 
      * 
    FROM 
      tabel_info_beasiswa
    ";

  $resultInfoBeasiswa = mysqli_query($con, $infoBerita);
  return $resultInfoBeasiswa;
}

function attachment($con, $id_info)
{
  $attachment =
    "SELECT
      a.*
    FROM
      tabel_attachment a,
      tabel_info b
    WHERE
      a.id_info = b.id_info 
    AND 
      a.id_info = '$id_info'
    ";

  $resultAttachment = mysqli_query($con, $attachment);
  return $resultAttachment;
}

function tampilTanggal($tanggal)
{
  return date('d F Y', strtotime($tanggal));
}

function komentar($con, $id_info)
{
  $komentar = "select a.* from tabel_komentar a, tabel_info b, tabel_user c where a.id_info=b.id_info and a.id_user=c.id_user and a.id_info='$id_info'";
  $resultKomentar = mysqli_query($con, $komentar);
  return $resultKomentar;
}

function tampilUser($con, $id_user)
{
  $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_admin b WHERE a.id_user=$id_user and a.id_user=b.id_user";
  $resultUser = mysqli_query($con, $queryUser);
  if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    return $namaUser = "Admin";
  }

  $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_mahasiswa b WHERE a.id_user=$id_user and a.id_user=b.id_user";
  $resultUser = mysqli_query($con, $queryUser);
  if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    return $namaUser = $rowUser["nama"];
  }

  $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_dosen b WHERE a.id_user=$id_user and a.id_user=b.id_user";
  $resultUser = mysqli_query($con, $queryUser);
  if (mysqli_num_rows($resultUser) > 0) {
    $rowUser = mysqli_fetch_assoc($resultUser);
    return $namaUser = $rowUser["nama"];
  }
}

function replyKomentar($con, $id_komentar)
{
  $replyKomentar = "select a.* from tabel_reply_komentar a, tabel_komentar b where a.id_komentar=b.id_komentar and  a.id_komentar='$id_komentar'";
  $resultReplyKomentar = mysqli_query($con, $replyKomentar);
  return $resultReplyKomentar;
}

function dosenKuisioner($con)
{
  $dosenKuisioner =
    "SELECT 
    a.id_matkul, b.nama dosen, c.nama matkul 
  FROM 
    tabel_jadwal a 
  INNER JOIN 
    tabel_dosen b ON a.id_dosen = b.id_dosen 
  INNER JOIN 
    tabel_matkul c ON a.id_matkul = c.id_matkul
  INNER JOIN 
    tabel_mahasiswa d ON a.id_kelas = d.id_kelas
  where a.id_matkul not in 
    (select id_matkul from tabel_hasil_kuisioner where id_mahasiswa=(select id_mahasiswa from tabel_mahasiswa where id_user='$_SESSION[id]'))
  and a.id_kelas=d.id_kelas and d.id_user='$_SESSION[id]'";

  $resultDosenKuisioner = mysqli_query($con, $dosenKuisioner);
  return $resultDosenKuisioner;
}

if (isset($_POST["kirimKuisioner"])) {
  session_start();

  if ($_GET["module"] == "home" && $_GET["act"] == "tambah") {
    $idMhs = mysqli_fetch_assoc(mysqli_query($con, "SELECT id_mahasiswa FROM tabel_mahasiswa WHERE id_user = $_SESSION[id]"));
    $idMhs = $idMhs["id_mahasiswa"];

    $id_dosen = mysqli_fetch_assoc(mysqli_query($con, "SELECT id_dosen FROM tabel_jadwal a, tabel_matkul b, tabel_mahasiswa c WHERE a.id_matkul=b.id_matkul and a.id_kelas=c.id_kelas and a.id_semester=c.id_semester and a.id_matkul='$_POST[id_matkul]' and c.id_mahasiswa='$idMhs'"));
    $id_dosen = $id_dosen["id_dosen"];

    $resultIsiKuis = mysqli_query($con, "select * from tabel_kuisioner");
    if (mysqli_num_rows($resultIsiKuis) > 0) {
      $i = 1;
      while ($rowIsiKuis = mysqli_fetch_assoc($resultIsiKuis)) {
        $kuisioner = $_POST['id_kuisioner' . $i];
        $nilai = $_POST['nilai' . $i];
        $waktu = date('Y-m-d H:i:s');
        mysqli_query($con, "INSERT INTO tabel_hasil_kuisioner (id_mahasiswa, id_matkul, id_dosen, id_kuisioner, nilai, waktu_edit)
        VALUES ('$idMhs', '$_POST[id_matkul]', '$id_dosen', $kuisioner, $nilai, '$waktu')");

        $i++;
      }
    }
    header('location:../module/index.php?module=' . $_GET["module"]);
  }
}

function cekStatusAktif($con)
{
  $status = "select distinct(status_aktif) as status_aktif from tabel_kuisioner";
  $resultStatus = mysqli_query($con, $status);
  $rowStatus = mysqli_fetch_assoc($resultStatus);
  if ($rowStatus["status_aktif"] == 'ya') {
    return true;
  } else if ($rowStatus["status_aktif"] == 'tidak') {
    return false;
  }
}



// ---------------ajax-----------

function formatTanggal($tanggal)
{
  $date1 = strtr($tanggal, '/', '-');
  $newFormat = date('Y-m-d', strtotime($date1));
  return $newFormat;
}

function queryTampilPencarianBerita($date)
{
  $tanggal = formatTanggal($date);

  $recentChat =
    "SELECT 
      *
    FROM
      tabel_info
    WHERE
      waktu_publish
    LIKE
      '$tanggal%'
    ";

  return $recentChat;
}



if (isset($_GET["searchBerita"])) {
  $tglPencarianBerita = $_GET['tglPencarianBerita'];

  $resultSearchBerita = mysqli_query($con, queryTampilPencarianBerita($tglPencarianBerita));

  if (mysqli_num_rows($resultSearchBerita) > 0) {
    ?>
    <div class="search-know mt-2 pb-2 border-bottom border-gray">
      <h5><strong>Hasil Pencarian</strong></h5>
      <div class="temu-berita ml-2">
        <?php
        while ($rowPencarianBerita = mysqli_fetch_assoc($resultSearchBerita)) {
          ?>
          <a href="#" class="hasilSearchBerita" data-idinfo="<?php echo $rowPencarianBerita["id_info"] ?>"><?php echo $rowPencarianBerita["judul"] ?></a><br>
        <?php
      }
      ?>
      </div>
    </div>
    <div class="search-back text-center mt-1">
      <a href="">Kembali</a>
    </div>
  <?php
} else {
  ?>
    <div class="search-null text-center">
      <img src="../img/magnifier.svg" alt="Search Not Found" class="p-3">
      <p>Tidak ada berita pada tanggal "<?php echo date("d M Y", strtotime(formatTanggal($tglPencarianBerita))) ?>"</p>
    </div>
  <?php
}
}

// --------- kirim komentar -----------

if (isset($_POST['insertKomentar'])) {
  $id_user = $_POST['iduser'];
  $id_info = $_POST['idinfo'];
  $isi = $_POST['val'];

  $date = date("m/d/Y h:i A");
  $final = strtotime($date);
  $datetimeNow = date("Y-m-d H:i:s", $final);

  $sql =
    "INSERT INTO 
    tabel_komentar(
      id_info,
      id_user,
      isi,
      waktu
    )
    VALUES(
      $id_info,
      $id_user,
      '$isi',
      '$datetimeNow'
    )";

  if (mysqli_query($con, $sql)) {
    $id = mysqli_insert_id($con);
  } else {
    echo "Error: " . mysqli_error($con);
  }
  exit();
}


// --------- kirim reply komentar -----------

if (isset($_POST['insertReplyKomentar'])) {
  $id_user = $_POST['iduser'];
  $id_info = $_POST['idinfo'];
  $id_komentar = $_POST['idkomentar'];
  $isi = $_POST['val'];

  $date = date("m/d/Y h:i A");
  $final = strtotime($date);
  $datetimeNow = date("Y-m-d H:i:s", $final);

  $sql =
    "INSERT INTO 
    tabel_reply_komentar(
      id_user,
      isi,
      id_komentar,
      waktu
    )
    VALUES(
      $id_user,
      '$isi',
      $id_komentar,
      '$datetimeNow'
    )";

  if (mysqli_query($con, $sql)) {
    $id = mysqli_insert_id($con);
  } else {
    echo "Error: " . mysqli_error($con);
  }
  exit();
}






// ---------------

function queryTampilInfo($idInfo)
{
  $info =
    "SELECT
      *
    FROM
      tabel_info
    WHERE
      id_info = $idInfo
    ";

  return $info;
}


if (isset($_GET['hasilSearchBerita'])) {
  $id_info = $_GET["id_info"];

  $row = mysqli_fetch_assoc(mysqli_query($con, queryTampilInfo($id_info)));


  ?>


  <div class="m-2 p-3 mb-3 bg-white rounded shadow-sm px-4">
    <div class="border-bottom border-gray">
      <div class="row">
        <div class="col-sm-8">
          <div class="judul">
            <h5><strong><?php echo $row["judul"]; ?></strong></h5>
            <p><?php echo tampilTanggal($row["waktu_publish"]); ?></p>
          </div>
        </div>
        <div class="col-sm-4 mt-2 text-right">
          <span class="kategori-label badge badge-secondary px-3 py-2"><?php echo ucfirst($row["tipe"]); ?></span>
        </div>
      </div>
    </div>
    <div class="media text-muted pt-3">
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="isi-mhs">
          <?php echo $row["isi"]; ?>
        </div>
        <?php
        $resultAttachment = attachment($con, $row["id_info"]);
        $resultAttachment2 = attachment($con, $row["id_info"]);
        if (mysqli_num_rows($resultAttachment) > 0) {
          ?>
          <div class="photos">
            <div class="row">
              <?php
              while ($row = mysqli_fetch_assoc($resultAttachment)) {
                if ($row["tipe"] == "gambar") {
                  ?>
                  <div class="col-md-6 p-2">
                    <div class="image">
                      <a href="../attachment/img/<?php echo $row['file']; ?>" data-toggle="lightbox" data-gallery="mixedgallery<?php echo $row['id_info']; ?>">
                        <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/<?php echo $row['file']; ?>" alt="<?php echo $row['file']; ?>">
                      </a>
                    </div>
                  </div>

                <?php
              }
            }
            ?>
            </div>
          </div>

          <div class="files">
            <?php
            while ($row = mysqli_fetch_assoc($resultAttachment2)) {
              if ($row["tipe"] == "file") {
                ?>
                <div class="row isi-download">
                  <div class="col-md-12">
                    <button class="btn btn-outline-dark download d-flex">
                      <div class="col-sm-7">
                        <a href="">
                          <h5>Dokumen Rahasia</h5>
                        </a>
                      </div>
                      <div class="col-sm-5 text-right">
                        <img src="../img/vector.svg" alt="Download button" class="">
                      </div>
                    </button>
                  </div>
                </div>
              <?php
            }
          }
          ?>
          </div>
        <?php
      }
      ?>

      </div>
    </div>

  </div>




<?php
}
