<?php
include "../config/connection.php";
//Data Mahasiswa Kelas
function kelasData($con, $kelas)
{
    $kelasData = "select a.nim, a.nama as nama_mahasiswa, a.alamat, a.jenis_kelamin 
    from tabel_mahasiswa a
    where a.id_kelas = '$kelas'";
    $resultKelasData = mysqli_query($con, $kelasData);
    return $resultKelasData;
}
function kelas($con)
{
	$kelas="select * from tabel_kelas";
	$resultKelas=mysqli_query($con, $kelas);
	return $resultKelas;
}
function tampilKelas($con, $id_kelas)
{
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    if(mysqli_num_rows($resultKelas)>0){
      $row=mysqli_fetch_assoc($resultKelas);
      $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
      return $hasil;
    }
    else
    {
      return "-";
    }
}
function minKelas($con)
{
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}

if(isset($_POST["cariAbsensi"]))
{
  ?>
  <div class="col-md-12 p-0 d-flex justify-content-center">
  <?php
    $resultKelasData=kelasData($con, $_POST["cariAbsensi"]);
  
    if (mysqli_num_rows($resultKelasData) > 0)
    {?>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th >Nama</th>
                    <th >Alamat </th>
                    <th >Jenis Kelamin</th>
                    <th >Proses</th>
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
        } else{
          ?>
          <div class="text-center">
            <p class="text-muted">Data Kosong</p>
          </div>
        <?php
        }
      }
?>