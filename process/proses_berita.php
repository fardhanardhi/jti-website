<?php
include "../config/connection.php";

function tampilBerita($con)
{
    $tampilBerita = "select * from tabel_info";
    $resultTampilBerita = mysqli_query($con, $tampilBerita);
    return $resultTampilBerita;
}

function tampilTanggal($tanggal)
{
    return date('d F Y', strtotime($tanggal));
}

function cariBerita($con, $tanggal)
{
    $tampilCariBerita = "SELECT * from tabel_info WHERE waktu_publish LIKE '$tanggal%'";
    $resultTampilCariBerita = mysqli_query($con, $tampilCariBerita);
    return $resultTampilCariBerita;
}

function tampilBeritaModal($con)
{
    $tampilBeritaModal = "select a.id_info , a.judul, a.isi, a.tipe, a.waktu, a.*, 
    b.id_attachment, b.tipe, b.file from tabel_info a, tabel_attachment b
    where a.id_attachment = b.id_attachment group by a.id_info";
    $resultTampilBeritaModal = mysqli_query($con, $tampilBeritaModal);
    return $resultTampilBeritaModal;
}

function tampilFile($con, $id_info)
{
    $tampilFile = "select a.*, b.* from tabel_info a, tabel_attachment b
    where a.id_info = b.id_info
    and b.id_info = $id_info";
    $resultTampilFile = mysqli_query($con, $resultTampilFile);
    return $resultTampilFile;
}



function jumlahKomentar($con, $id_info)
{
    $jumlahKomentar = "select (b.id_info + c.id_komentar) as komentar , a.*, b.*, c.*
    from tabel_info a, tabel_komentar b, tabel_reply_komentar c where 
    a.id_info = b.id_info
    and b.id_komentar = c.id_komentar
    and b.id_info = $id_info group by a.id_info";

    $resultJumlahKomentar = mysqli_query($con, $jumlahKomentar);
    if (mysqli_num_rows($resultJumlahKomentar) > 0) {
        $rowJumlahKomentar = mysqli_fetch_assoc($resultJumlahKomentar);
        return $rowJumlahKomentar["komentar"];
    } else {
        return "0";
    }
}

// Modal BERITA LIHAT
if (isset($_POST["tampilDetailInfo"])) {
    $id_info = $_POST['tampilDetailInfo'];

    $detailBerita = "select * from tabel_info where id_info = $id_info group by id_info";
    $resultDetailBerita = mysqli_query($con, $detailBerita);

    if (mysqli_num_rows($resultDetailBerita) == 0) { } else {
        $no = 1;
        while ($row = mysqli_fetch_assoc($resultDetailBerita)) {
            ?>
            <div class="modal-header">
                <strong>
                    <h3 class="modal-title"><?php echo $row["judul"]; ?></h3>
                </strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo $row["isi"]; ?>
                </p>
            </div>
            <?php

            $tampilDataFile = "select a.*, b.* from tabel_info a, tabel_attachment b
            where a.id_info = b.id_info and b.id_info = $id_info";
            $resultTampilDataFile = mysqli_query($con, $tampilDataFile);
            if (mysqli_num_rows($resultTampilDataFile)) {
                $index = 1;
                while ($row1 = mysqli_fetch_assoc($resultTampilDataFile)) {
                    if ($row1["tipe"] != "gambar") {
                        ?>
                        <button class="btn btn-outline-dark download d-flex">
                            <div class="col-sm-7">
                                <a href="">
                                    <h6 class="mt-1">Dokumen Rahasia</h6>
                                </a>
                            </div>
                        </button>
                    <?php
                } else if ($row1["tipe"] == "gambar") {
                    ?>
                        <div class="photos">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <div class="image">
                                        <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/<?php echo $row1['file']; ?>" alt="<?php echo $row1['file']; ?>" width="150px" ; height="150px" ;>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                } else if ($row1["tipe"] == "gambar" and "file") {
                    ?>
                        <button class="btn btn-outline-dark download d-flex">
                            <div class="col-sm-7">
                                <a href="">
                                    <h6 class="mt-1">Dokumen Rahasia</h6>
                                </a>
                            </div>
                            <div class="col-sm-5 text-right">
                                <img src="../img/vector.svg" alt="Download button" class="">
                            </div>
                        </button>
                        <div class="photos">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <div class="image">
                                        <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/<?php echo $row1['file']; ?>" alt="<?php echo $row1['file']; ?>" width="150px" ; height="150px" ;>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                $index++;
            }
            ?>
            <?php
        } else {
            ?>
                <p></p>
            <?php
        }
    }
}
$no++;
}
// MODAL BERITA LIHAT END
?>

<!-- Post cari -->
<?php

function formatTanggal($tanggal)
{
    $date1 = strtr($tanggal, '/', '-');
    $newFormat = date('Y-m-d', strtotime($date1));
    // echo $newFormat;
    return $newFormat;
}



if (isset($_GET["adminCariBerita"])) {
    $resultTampilBerita = cariBerita($con, formatTanggal($_GET["tanggal"]));
    $index = 1;
    if (mysqli_num_rows($resultTampilBerita) > 0) {
        ?>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <tr class="p-2">
                    <th>No</th>
                    <th id="beritaBerita">Berita</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Tanggal Perubahan</th>
                    <th>Komentar</th>
                    <th colspan="2">Proses</th>
                </tr>
            </thead>
            <tbody class="text-center m-auto">
                <?php
                while ($row = mysqli_fetch_assoc($resultTampilBerita)) {
                    ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td class="text-left detail-berita" data-toggle="modal" data-target="#modalPreview" data-info="<?php echo $row["id_info"]; ?>"><?php echo $row["judul"]; ?></td>
                        <td><?= tampilTanggal($row["waktu_publish"]); ?></td>
                        <td><?= tampilTanggal($row["waktu_perubahan"]); ?></td>
                        <td><?php echo jumlahKomentar($con, $row["id_info"]); ?></td>
                        <td><button class=" tmbl-table btn btn-danger" type="button" class="pratinjau btn" data-toggle="modal" data-target="#hapus<?= $index ?>" class="hapus">Hapus</button></td>
                    </tr>
                    <?php
                    $index++;
                }
                ?>

            </tbody>
        </table>
    <?php
} else {
    ?>
        <div class="text-center">
            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
            <p class="text-muted">Tidak ada berita pada "<?php echo date("d M Y", strtotime($_GET["tanggal"])); ?>"</p>
        </div>
    <?php
}
}
?>