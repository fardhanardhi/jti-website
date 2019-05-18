<?php
    include "../config/connection.php";
    include "../process/proses_kelas.php";
?>

<main role="main" class="container-fluid" id="kelas">
  <div class="row">
    <div class="col-md-12 p-0">
        <div class="m-2 bg-white shadow-sm rounded">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="pr-4 title "><a href="#"><strong>Kelas</strong></a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelas</li>
                </ol>
            </nav>
        </div>
    </div>  
    <div class="col-md-9 p-0">
      <div class="m-2 p-3 bg-white mb-3 rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Kelas Mahasiswa</h6>
        <div class="pt-3">
          <div class="container-fluid">
            <div class="row">
                <label class="col-form-label">Kelas</label>
                <div class="col-sm-1">
                    <select class="form-control w-auto form-control-sm" name="kelas" id="kelasCari">
                        <?php
                        $resultKelas=kelas($con);
                        if(mysqli_num_rows($resultKelas)){
                            while($rowKelas=mysqli_fetch_assoc($resultKelas)){
                            ?>
                            <option value="<?php echo $rowKelas["id_kelas"];?>"><?php echo tampilKelas($con,$rowKelas["id_kelas"]);?></option>
                            <?php
                            }
                        }else{
                            ?>
                            <option value="0">Kelas Kosong</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <label class="col-form-label">Tahun Ajaran</label>
                <div class="col-sm-2">
                    <select class="form-control form-control-sm" name="tahunajaran">
                        <option value="1">Tahun Ajaran</option>
                        <option value="1">2017/2018</option>
                        <option value="2">2018/2019</option>
                        <option value="3">2019/2020</option>
                    </select>
                </div>
              
              <div class="col-md-2">
                <button id="cariKelas"class="btn btn-success btn-checkout text-white">Cari</button>
              </div>
            </div>

            <div class="row pt-2 mt-2 pl-0 scrollbar" id="mencariKelas">
                <?php $resultKelasData=kelasData($con, minKelas($con));
                if(mysqli_num_rows($resultKelasData) > 0)
                {?>
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Alamat </th>
                                <th>Jenis Kelamin</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index=1;
                            while($rowKelas = mysqli_fetch_assoc($resultKelasData)){
                            ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td class="nimMahasiswa"><?php echo $rowKelas["nim"]; ?></td>
                                <td class="namaMahasiswa"><?php echo $rowKelas["nama_mahasiswa"]; ?></td>
                                <td class="alamatMahasiswa"><?php echo $rowKelas["alamat"]; ?></td>
                                <td class="jenisKelaminMahasiswa"><?php echo $rowKelas["jenis_kelamin"]; ?></td>
                                <td><button class=" tmbl-table btn btn-danger" type="button" class="pratinjau btn" data-toggle="modal" data-target="#hapus" class="edit">Hapus</button></td>    
                            </tr>
                            <?php $index++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } 
                else
                {
                  ?>
                  <div class="text-center">
                    <p class="text-muted">Data Kosong</p>
                  </div>
                <?php
                }
                ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-3 p-0">
      <div class="container-fluid m-0 p-0">
        <div class="row">
          <div class="col-md-12">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Tambah Mahasiswa</h6>
            <form class="pt-3" id="tambah-data">
                <div class="form-group row mt-0">
                    <label class="col-sm-3 col-form-label">Tahun Akademik</label>
                    <div class="col-sm-4">
                        <select class="form-control form-control-sm" name="tahunajaran">
                            <option value="">Tahun Ajaran</option>
                            <option value="1">2017</option>
                            <option value="2">2018</option>
                            <option value="3">2019</option>
                        </select>
                    </div>
                    <h2> / </h2>
                    <div class="col-sm-4">
                        <select class="form-control form-control-sm" name="tahunajaran">
                            <option value="">Tahun Ajaran</option>
                            <option value="1">2018</option>
                            <option value="2">2019</option>
                            <option value="3">2020</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-0">
                    <label class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-4">
                        <select class="form-control form-control-sm" name="Kelas">
                            <option value="">Pilih</option>
                            <option value="1">TI-1F</option>
                            <option value="2">TI-2F</option>
                            <option value="3">TI-3F</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NIM</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" placeholder="NIM"></small>
                    </div>
                </div>
              <div class="form-group mb-0 row">
                <div class="col-sm-12 text-right">
                  <input type="submit" value="Tambah" class="btn btn-primary btn-checkout">
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade hapusKompen-modal" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content konten-modal">
              <div class="modal-body ">
                  <h5 class="isiHapusKompen text-center">Apakah Anda Yakin?</h5>
                  <div class="tombolAksiHapusKompen text-center">
                      <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                      <button type="button" class="btn btn-iya">Ya</button>
                  </div>
              </div>                 
          </div>
      </div>
  </div>
</main>