<?php
include "../config/connection.php";
include "../process/proses_homeMahasiswa.php";

$queryIsiKuis = "SELECT * FROM tabel_kuisioner";
$resultIsiKuis = mysqli_query($con, $queryIsiKuis);

?>

<main role="main" class="container-fluid" id="home">
  <div class="row">
    <div class="col-md-3 p-0 ">
      <div class="sticky-sidebar sticky-top">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
          <h5><strong>Pencarian Berita</strong></h5>
          <!-- datepicker -->
          <div id="datepickerSearchBerita" class="pb-3 border-bottom border-gray">
          </div>
          <!-- datepicker hidden input -->
          <input type="hidden" id="tanggalPencarianBerita">

          <div id="hasilPencarianBerita">
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 p-0 pb-3">
      <?php
      if (cekStatusAktif($con) == true) {
        ?>
        <div class="m-2 p-3 mb-3 bg-white rounded shadow-sm px-4">
          <h5 class="border-bottom border-gray pb-2 mb-3"><strong>Kuisioner</strong></h5>
          <div class="isi-mhs small lh-125 mb-2">
            note : Apabila tidak mengisi kuisioner maka akan mendapat sanksi berupa alpha 1(satu) jam setiap mata kuliah
          </div>
          <!-- Button trigger modal -->
          <button type="button" class="check-modal btn" data-toggle="modal" data-target="#modelId">Isi Kuisioner</button>

          <!-- Modal -->
          <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="icon">
                    <button type="button" class="close text-right text-white active" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="container-fluid">
                    <strong>
                      <center>
                        <h5 class="p-2">Kuisioner</h5>
                      </center>
                    </strong>
                    <form action="../process/proses_homeMahasiswa.php?module=home&act=tambah" method="post">
                      <div class="pilihan-dosen">
                        <strong><label for="nama-dosen" class="nama-dosen">Dosen Pengajar dan Mata Kuliah :
                          </label></strong>
                        <select name="id_matkul" id="nama-dosen" class="p-1 ">
                          <option selected disable>---</option>
                          <?php
                          $resultDosenKuisioner = dosenKuisioner($con);
                          if (mysqli_num_rows($resultDosenKuisioner) > 0) {
                            while ($rowDosenKuisioner = mysqli_fetch_assoc($resultDosenKuisioner)) {
                              ?>
                              <option value="<?php echo $rowDosenKuisioner["id_matkul"]; ?>">
                                <?php echo $rowDosenKuisioner["dosen"] . " (" . $rowDosenKuisioner["matkul"] . ")"; ?>
                              </option>
                            <?php
                          }
                        }
                        ?>
                        </select>
                        <input type="hidden" name="idDosen" value="">
                        <input type="hidden" name="idMatkul" value="">
                      </div>
                      <div class="kriteria-kuisioner p-2 border-bottom border-gray ">
                        <div class="row kriteria">
                          <div class="col-sm-7">
                            <strong>
                              <center>Kriteria Kuisioner</center>
                            </strong>
                          </div>
                          <div class="col-sm-5">
                            <div class="row pilihan">
                              <div class="col-sm-2">1</div>
                              <div class="col-sm-2">2</div>
                              <div class="col-sm-2">3</div>
                              <div class="col-sm-2">4</div>
                              <div class="col-sm-2">5</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="isi-kuisioner p-1">
                        <?php
                        if (mysqli_num_rows($resultIsiKuis) > 0) {
                          $i = 1;
                          while ($rowIsiKuis = mysqli_fetch_assoc($resultIsiKuis)) {
                            ?>
                            <div class="row pil1">
                              <div class="col-sm-7">
                                <input type="hidden" name="id_kuisioner<?= $i ?>" value="<?= $rowIsiKuis["id_kuisioner"] ?>">
                                <label><?= $rowIsiKuis['kriteria'] ?></label>
                              </div>
                              <div class="col-sm-5">
                                <div class="row">
                                  <div class="col-sm-2"><input type="radio" name="nilai<?= $i ?>" value="1" checked /></div>
                                  <div class="col-sm-2"><input type="radio" name="nilai<?= $i ?>" value="2" /></div>
                                  <div class="col-sm-2"><input type="radio" name="nilai<?= $i ?>" value="3" /></div>
                                  <div class="col-sm-2"><input type="radio" name="nilai<?= $i ?>" value="4" /></div>
                                  <div class="col-sm-2"><input type="radio" name="nilai<?= $i ?>" value="5" /></div>
                                </div>
                              </div>
                            </div>

                            <?php
                            $i++;
                          }
                        }
                        ?>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn kirimKuisioner" name="kirimKuisioner">Kirim</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <script>
            $('#exampleModal').on('show.bs.modal', event => {
              var button = $(event.relatedTarget);
              var modal = $(this);
              // Use above variables to manipulate the DOM

            });
          </script>
        </div>
      <?php
    }

    $resultInfo = info($con);
    if (mysqli_num_rows($resultInfo) > 0) {
      while ($row = mysqli_fetch_assoc($resultInfo)) {
        $id_info = $row["id_info"];
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
            <?php
            $resultKomentar = komentar($con, $id_info);
            if (mysqli_num_rows($resultKomentar) > 0) {
              ?>
              <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="isi-mhs">
                  <?php
                  while ($row = mysqli_fetch_assoc($resultKomentar)) {
                    ?>
                    <div class="col mt-3">
                      <strong><?php echo tampilUser($con, $row["id_user"]) ?></strong>&nbsp;&nbsp;&nbsp;<span class="komen text-secondary"><?php echo $row["isi"] ?></span> <br>
                    </div>

                    <div class="row komens">
                      <div class="col ml-4 ">
                        <div class="balas-komen mt-1 border-left border-dark">
                          <?php
                          $resultReplyKomentar = replyKomentar($con, $row["id_komentar"]);
                          if (mysqli_num_rows($resultKomentar) > 0) {
                            while ($rowKomentar = mysqli_fetch_assoc($resultReplyKomentar)) {
                              ?>
                              <div class="col pr-0 mb-1">
                                <strong>Admin</strong>&nbsp;&nbsp;&nbsp;
                                <span class="komen text-secondary"><?php echo $rowKomentar["isi"] ?></span>
                              </div>
                            <?php
                          }
                        }
                        ?>
                        </div>
                      </div>
                    </div>
                  <?php
                }
                ?>
                </div>
              </div>
            <?php
          }
          ?>

            <div class="form-group">
              <textarea class="form-control border-0 input-komentar" data-idinfo="<?php echo $id_info ?>" data-iduser="<?php echo $idUser ?>" rows="auto" placeholder="Tulis Komentar..."></textarea>

            </div>

          </div>
        <?php
      }
    }
    ?>

      <div class="button-back m-2 p-0 mb-3">
        <div class="row btn-back">
          <div class="col-sm-6 text-left ">
            <button class="shadow-sm back btn pl-1"><a href="#">&xlarr; &#124; Berita Lama</a></button>
          </div>
          <div class="col-sm-6 d-block text-right ">
            <button class="shadow-sm back btn pl-1"><a href="#">Berita Baru &#124; &rarr; </a></button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 p-0">
      <div class="sticky-sidebar sticky-top">
        <div class="m-2 px-3 py-1 bg-white rounded shadow-sm">
          <h5 class="text-center my-3"><strong>Info Beasiswa</strong></h5>
          <?php
          $resultInfoBeasiswa = infoBeasiswa($con);
          if (mysqli_num_rows($resultInfoBeasiswa) > 0) {
            while ($row = mysqli_fetch_assoc($resultInfoBeasiswa)) {
              $id_infoBeasiswa = $row["id_beasiswa"];
              ?>
              <div class="beasiswa pb-2 pt-3 mb-0 border-top border-dark">
                <h6><strong><?php echo $row["judul"]; ?></strong></h6>
                <p class="isi-beasiswa">
                  <?php echo $row["isi"]; ?>
                </p>
                <small class="d-block text-right mt-3 ">
                  <button class="check btn"><a href="<?= $row['link']; ?>" target="_blank">Cek Link</a></button>
                </small>
              </div>
            <?php
          }
        } else {
          ?>
            <div class="beasiswa pb-3 mb-0 ">
              <div class="scholarship text-center mt-5 mb-5">
                <img src="../img/scholarship.svg" alt="Scholarship" class="">
                <br>
                <p>Mohon maaf, untuk saat ini beasiswa belum tersedia</p>
              </div>
            </div>
          <?php
        }
        ?>
        </div>

      </div>
    </div>
  </div>
</main>