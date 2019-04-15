
<body onload="setup();">
<main role="main" class="container-fluid">
  <div id="krsAdmin" class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
      <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="pr-4 title"><a href="index.php?module=krs"><strong>Kartu Rencana Studi</strong></a></li>
                <li class="breadcrumb-item"><a href="index.php?module=krs">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="index.php?module=krs">Kartu Rencana Studi (KRS)</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="index.php?module=krsPerKelas">Lihat KRS per Kelas</a></li>
            </ol>
        </nav>
      </div>
    </div>
    
    <div class="col-md-12 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <div class="col-md-12 p-0">
          <select class="optionKelas" name="kelas">
          <option selected>-</option>
                    <?php
                    include('../koneksi/connection.php');
					$tampil=mysqli_query($con, "SELECT tabel_prodi.kode as kode, tingkat, kode_kelas FROM tabel_kelas INNER JOIN tabel_prodi ON tabel_kelas.id_prodi = tabel_prodi.id_prodi GROUP BY id_kelas;");
					while($r=mysqli_fetch_array($tampil)){
					echo"<option value=$r[id_kelas]>$r[kode] - $r[tingkat] $r[kode_kelas]</option>";
					}
                    ?>
          </select>
          <select class="optionSemester" name="semester">
          <option selected>-</option>
                    <?php
                    include('../koneksi/connection.php');
					$tampil=mysqli_query($con, "SELECT * FROM tabel_semester ;");
					while($r=mysqli_fetch_array($tampil)){
					echo"<option value=$r[id_semester]>Semester $r[semester]</option>";
					}
                    ?>
            </select>
          <button type="button" class="btn btn-cari btn-success ml-2">Cari</button>
          <br><br>
          <table class="table tabel table-bordered">
            <thead class="text-white bg-blue">
              <tr>
                <th scope="col" style="text-align:center">No</th>
                <th scope="col" style="text-align:center; width: 300px">NIM</th>
                <th scope="col" style="text-align:center; width: 600px">Nama Mahasiswa</th>
                <th scope="col" style="text-align:center">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                            $query = "SELECT DISTINCT tabel_mahasiswa.nim, tabel_mahasiswa.nama
                            FROM tabel_krs INNER JOIN tabel_mahasiswa ON tabel_krs.id_mahasiswa = tabel_mahasiswa.id_mahasiswa";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                            $index = 1;
                                                
                            while($row = mysqli_fetch_assoc($result)){

                            echo"
                                <tr class='ukt-lunas-belum-upload'>
                                    <td>". $index++ ."</td>
                                    <td>". $row["nim"] ."</td>
                                    <td>". $row["nama"] ."</td>
                                    <td>
                                    <input id='fileid' type='file' name='filename' hidden required />
                                    <input id='buttonid' type='button' value='Upload' class='btn  btn-upload btn-success ml-2' />
                                    </td>
                                </tr>
                                ";
                                }
                            }
                            ?>
                            
            <?php
                            $query = "SELECT DISTINCT tabel_mahasiswa.nim, tabel_mahasiswa.nama
                            FROM tabel_krs INNER JOIN tabel_mahasiswa ON tabel_krs.id_mahasiswa = tabel_mahasiswa.id_mahasiswa";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                            $index = 2;
                                                
                            while($row = mysqli_fetch_assoc($result)){

                            echo"
                                <tr class='ukt-lunas-sudah-upload'>
                                    <td>". $index++ ."</td>
                                    <td>". $row["nim"] ."</td>
                                    <td>". $row["nama"] ."</td>
                                    <td><button type='button' class='btn btn-lihat btn-primary tmbl-lihat ml-2' data-toggle='modal'
                                    data-target='#modalGambar'>Lihat</button>

            <button type='button' class='btn btn-hapus btn-danger ml-2' data-toggle='modal'
                data-target='#modalCheckout'>Hapus</button>
                                    </td>
                                </tr>
                                ";
                                }
                            }
                            ?>
               
            <?php
                            $query = "SELECT DISTINCT tabel_mahasiswa.nim, tabel_mahasiswa.nama
                            FROM tabel_krs INNER JOIN tabel_mahasiswa ON tabel_krs.id_mahasiswa = tabel_mahasiswa.id_mahasiswa";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                            $index = 3;
                                                
                            while($row = mysqli_fetch_assoc($result)){

                            echo"
                                <tr class='ukt-belum-lunas'>
                                    <td>". $index++ ."</td>
                                    <td>". $row["nim"] ."</td>
                                    <td>". $row["nama"] ."</td>
                                    <td>
                                    </td>
                                </tr>
                                ";
                                }
                            }
                            ?>
            </tbody>
          </table>
          <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body pt-5 text-center">
                  <strong>Apakah Anda yakin?</strong>
                </div>
                <div class="container-fluid pb-4 pt-4 d-flex justify-content-around">
                  <button type="button" class="btn btn-tidak btn-danger btn-confirm" data-dismiss="modal">Tidak</button>
                  <button type="submit" name="checkout" class="btn btn-ya btn-success btn-confirm">Ya</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="modal fade" id="modalGambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="padding:10px">
                        <center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="false">&times;</span></button>
                            <img src="../attachment/img/krs1.png" width="100%" alt="">
                        </center>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
</div>