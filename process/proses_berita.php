<?php
include "../config/connection.php";

function tampilBerita($con)
{
    $tampilBerita="select * from tabel_info";
    $resultTampilBerita=mysqli_query($con, $tampilBerita);
    return $resultTampilBerita;
}

function tampilBeritaModal($con)
{
    $tampilBeritaModal="select a.id_info , a.judul, a.isi, a.tipe, a.waktu, a.*, 
    b.id_attachment, b.tipe, b.file from tabel_info a, tabel_attachment b
    where a.id_attachment = b.id_attachment group by a.id_info";
    $resultTampilBeritaModal=mysqli_query($con, $tampilBeritaModal);
    return $resultTampilBeritaModal;
}

function tampilFile($con, $id_info){
    $tampilFile = "select a.*, b.* from tabel_info a, tabel_attachment b
    where a.id_info = b.id_info
    and b.id_info = $id_info";
    $resultTampilFile = mysqli_query($con, $resultTampilFile);
    return $resultTampilFile;
}

function beritaCari($con, $tanggal)
{
    $beritaCari="select * from tabel_info";
    $resultBeritaCari=mysqli_query($con, $beritaCari);
    return $resultBeritaCari;
}

function jumlahKomentar($con, $id_info){
    $jumlahKomentar = "select (b.id_info + c.id_komentar) as komentar , a.*, b.*, c.*
    from tabel_info a, tabel_komentar b, tabel_reply_komentar c where 
    a.id_info = b.id_info
    and b.id_komentar = c.id_komentar
    and b.id_info = $id_info group by a.id_info";

    $resultJumlahKomentar = mysqli_query($con, $jumlahKomentar);
    if(mysqli_num_rows($resultJumlahKomentar) > 0){
        $rowJumlahKomentar = mysqli_fetch_assoc($resultJumlahKomentar);
        return $rowJumlahKomentar["komentar"];
    } else {
        return "0";
    }
}

// Modal BERITA LIHAT
if(isset($_POST["tampilDetailInfo"]))
{
    $id_info= $_POST['tampilDetailInfo'];

    $detailBerita="select * from tabel_info where id_info = $id_info group by id_info";
    $resultDetailBerita = mysqli_query($con, $detailBerita);
    
    if(mysqli_num_rows($resultDetailBerita) == 0){}
        else{
            $no = 1;
            while ($row = mysqli_fetch_assoc($resultDetailBerita)) {
            ?>    
                <div class="modal-header">
                    <strong><h3 class="modal-title"><?php echo $row["judul"];?></h3></strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php echo $row["isi"];?>
                    </p>
                </div>
            <?php

            $tampilDataFile = "select a.*, b.* from tabel_info a, tabel_attachment b
            where a.id_info = b.id_info and b.id_info = $id_info";
            $resultTampilDataFile = mysqli_query($con, $tampilDataFile);
                if(mysqli_num_rows($resultTampilDataFile)){
                        $index=1;
                        while($row1 = mysqli_fetch_assoc($resultTampilDataFile)){
                            if($row1["tipe"]!="gambar"){
                            ?>
                                <button class="btn btn-outline-dark download d-flex">
                                    <div class="col-sm-7">
                                        <a href=""><h6 class="mt-1">Dokumen Rahasia</h6></a>
                                    </div>
                                </button>
                            <?php
                            } else if($row1["tipe"]=="gambar"){
                            ?>
                            <div class="photos">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <div class="image">
                                        <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/<?php echo $row1['file']; ?>" alt="<?php echo $row1['file']; ?>" width="150px"; height="150px";>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php
                            } else if($row1["tipe"]=="gambar" AND "file"){
                            ?>
                                <button class="btn btn-outline-dark download d-flex">
                                    <div class="col-sm-7">
                                        <a href=""><h6 class="mt-1">Dokumen Rahasia</h6></a>
                                    </div>
                                    <div class="col-sm-5 text-right">
                                        <img src="../img/vector.svg" alt="Download button" class="">
                                    </div>
                                </button>
                                <div class="photos">
                                <div class="row">
                                <div class="col-md-6 p-2">
                                    <div class="image">
                                        <img class="img img-fluid img-responsive full-width cursor" src="../attachment/img/<?php echo $row1['file']; ?>" alt="<?php echo $row1['file']; ?>" width="150px"; height="150px";>
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
            }else{
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