<?php
include "../config/connection.php";
include "../process/proses_adminBeasiswa.php";
?>

<main role="main" class="container-fluid" id="beasiswa">
<link rel="stylesheet" href="../css/adminBeasiswa.css">
    <div class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <div class="row">
          <div class="col-md-auto pr-0">
            <span class="nav-link">Beasiswa</span>
          </div>
          <div class="col pl-0">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb p-2 m-0 bg-white">
                <li class="breadcrumb-item"><a href="index.php?module=home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Beasiswa</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
        
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <div class="col-md-12 p-0">

                    <div class="card border border-secondary">
                        <div class="card-header">
                            Buat Postingan Beasiswa
                        </div>
                        <div class="card-body">
                            <form action="../process/proses_adminBeasiswa.php?module=beasiswa&act=tambah" method="post">
                            
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="text" style="border:none" name="judulBeasiswa" id="judulBeasiswa" placeholder="Judul..." class="form-control border-bottom border-gray pb-2 mb-0">
                                    </div>
                                    <div class="col-md-2">
                                      <div class="input-group date " id="datepickerBatasTanggal">
                                          <input type="text" class="form-control" placeholder="Batas Tanggal" name="batasTanggal">
                                          <div class="input-group-addon">
                                              <span>
                                                  <i class="far fa-calendar-alt"></i>
                                              </span>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea style="border:none" name="isiBeasiswa" 
                                            id="isiBeasiswa" cols="30" 
                                            rows="4" placeholder="Ketik Beasiswa..." 
                                            maxlength="300"
                                            class="form-control border-bottom border-gray pb-2 mb-0" oninput="Beasiswacharcountupdate(this.value)"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 border-right border-gray pb-2 mb-0 m-auto text-center"> <span style="color:grey" id=charcount></span></div>
                                    <div class="col-md-10">
                                        <div class="form-group row ">
                                            <label for="linkBeasiswa" class="m-auto" style="color:gray">Link</label>
                                            <div class="col-md-11">
                                                <input id="linkBeasiswa" style="border:none" name="linkBeasiswa" class="form-control border-bottom border-gray pb-2 mb-0" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" value="buttonValue" class="submitBeasiswa form-control btn btn-success" onclick="Kirim()">Kirim</button>
                                            <input id="submitBeasiswa" class="submitBeasiswa form-control btn btn-success" type="submit" value="Kirim" name="submitBeasiswa" hidden>
                                        </div>
                                    </div>

                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                    <div class="cari mt-2">
                        <form class="form-inline">
                            <i class="fas fa-search mr-2"></i>
                            <div class="col-2">
                                <div class="input-group date " id="datepicker">
                                    <input type="text" class="form-control" value="12-02-2012">
                                    <div class="input-group-addon">
                                        <span>
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-success cari-btn" type="submit">Cari</button>
                        </form>
                    </div>

               
                    <div class="scrolltable">
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
                                  $resultTampilBeasiswa=tampilBeasiswa($con);
                                  $index=1;
                              if (mysqli_num_rows($resultTampilBeasiswa) > 0){
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
                              }
                                    ?>
																	                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

		<!-- Modal Preview-->

    <?php
				$resultTampilBeasiswa=tampilBeasiswa($con);
				$index=1;
		if (mysqli_num_rows($resultTampilBeasiswa) > 0){
			while ($row = mysqli_fetch_assoc($resultTampilBeasiswa)) {
					?>
				<div class="modal fade" id="preview<?= $index?>" tabindex="-1" role="dialog" aria-labelledby="preview<?= $index?>Title" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
										<div class="modal-header">
												<h5 class="modal-title"> <?= $row["judul"]?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
														</button>
										</div>
										<div class="modal-body">
												<?= $row["isi"]?>
										</div>
										<div class="modal-footer">
												<button type="button" class="btn btn-tutup" data-dismiss="modal">Tutup</button>
										</div>
								</div>
						</div>
				</div>
					<?php
			$index++;
			}
		}
    	?>
    
    <!-- Button trigger modal valid-->
    <button type="button" id="validShow" hidden class="btn btn-primary btn-lg" data-toggle="modal" data-target="#validationModalId">
      Launch
    </button>
    
    <!-- Modal Valid -->
    <div class="modal fade" id="validationModalId" tabindex="-1" role="dialog" aria-labelledby="validationModalId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h1>Kesalahan</h1>
            <p>Judul Beasiswa, Isi Beasiswa atau Link Kosong</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>


    <!-- modal hapus -->
    <?php
				$resultTampilBeasiswa=tampilBeasiswa($con);
				$index=1;
		if (mysqli_num_rows($resultTampilBeasiswa) > 0){
			while ($row = mysqli_fetch_assoc($resultTampilBeasiswa)) {
        $idBeasiswa = $row["id_beasiswa"];
					?>

          <div class="modal fade hapusKompen-modal" id="hapus<?= $index?>" tabindex="-1" role="dialog" aria-labelledby="hapus<?= $index?>Title" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content konten-modal">
                <div class="modal-body ">
                  <h5 class="isiHapusKompen text-center">Apakah Anda Yakin?</h5>
                  <div class="tombolAksiHapusKompen text-center">
                    <form action="../process/proses_adminBeasiswa.php?module=beasiswa&act=hapus" method="post">
                      <input type="hidden" value="<?=$idBeasiswa?>" name="idBeasiswa">
                    <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-iya" name="hapusBeasiswa" id="hapusBeasiswa">Ya</button>
                    </form>
                  </div>
                </div>                 
              </div>
            </div>
          </div>

					<?php
			$index++;
			}
		}
    	?>
</main>

