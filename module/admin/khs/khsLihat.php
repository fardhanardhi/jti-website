<main role="main" class="container-fluid">
    <div id="khs" class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="pr-4 title"><a href="#"><strong>Lihat KHS</strong></a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.php?module=khsUpload">Kartu Hasil Studi(KHS)</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat KHS</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php 
            include('khsModalLihat.php');
        ?>
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <h4>Daftar Kartu Hasil Studi</h4>
                <hr>
                <select class="kelas custom-select" style="width:150px">
                    <option selected>Pilih Kelas</option>
                    <?php
                    include('../koneksi/connection.php');
					$tampil=mysqli_query($con, "SELECT tabel_prodi.kode as kode, tingkat, kode_kelas FROM tabel_kelas INNER JOIN tabel_prodi ON tabel_kelas.id_prodi = tabel_prodi.id_prodi GROUP BY id_kelas;");
					while($r=mysqli_fetch_array($tampil)){
					echo"<option value=$r[id_kelas]>$r[kode] - $r[tingkat] $r[kode_kelas]</option>";
					}
                    ?>
                </select>
                <select class="kelas custom-select ml-3" style="width:150px">
                    <option selected>Pilih Semester</option>
                    <?php
                    include('../koneksi/connection.php');
					$tampil=mysqli_query($con, "SELECT * FROM tabel_semester ;");
					while($r=mysqli_fetch_array($tampil)){
					echo"<option value=$r[id_semester]>Semester $r[semester]</option>";
					}
                    ?>
                </select>
                <button type="button" class="tmbl-filter btn btn-success ml-3">Cari</button>
                <br><br>
                <div class="media text-muted pt-8">
                    <div class="media-body pb-8 mb-0">
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>SKS</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT tabel_mahasiswa.nim, tabel_mahasiswa.nama , SUM(tabel_matkul.sks) AS sks
                            FROM tabel_khs INNER JOIN tabel_mahasiswa ON tabel_khs.id_mahasiswa = tabel_mahasiswa.id_mahasiswa
                            INNER JOIN tabel_matkul ON tabel_khs.id_matkul = tabel_matkul.id_matkul GROUP BY tabel_mahasiswa.id_mahasiswa";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                            $index = 1;
                                                
                            while($row = mysqli_fetch_assoc($result)){

                            echo"
                                <tr>
                                    <td>". $index++ ."</td>
                                    <td>". $row["nim"] ."</td>
                                    <td>". $row["nama"] ."</td>
                                    <td>". $row["sks"] ."</td>
                                    <td><button class='tmbl-table lihat btn btn-info' type='button' class='pratinjau btn' data-toggle='modal' data-target='#myModal' class='edit'>Lihat</button>
                                    </td>
                                </tr>
                                ";
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
</main>