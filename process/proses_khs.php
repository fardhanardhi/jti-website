<?php
include "../config/connection.php";

function khs($con, $kelas, $semester)
{
    $khs = "select distinct(a.id_mahasiswa), a.*, a.nim, 
    a.nama as nm_mahasiswa, c.*, SUM(c.sks) as sks, d.id_kelas, e.*, e.semester, f.*
    from tabel_mahasiswa a, tabel_matkul c, tabel_kelas d, tabel_semester e, tabel_jadwal f
    where a.id_kelas = d.id_kelas
    and d.id_kelas = f.id_kelas
    and a.id_semester = e.id_semester
    and e.id_semester = f.id_semester
    and c.id_matkul = f.id_matkul 
    and a.id_kelas = $kelas
    and a.id_semester = $semester
    group by a.id_mahasiswa";
    
    $resultTampilKhs = mysqli_query($con, $khs);
    return $resultTampilKhs;
}

function khsKelas($con, $kelas)
{
    $khsKelas = "select distinct(a.id_mahasiswa), a.*, a.nim, 
    a.nama as nm_mahasiswa, c.*, SUM(c.sks) as sks, d.id_kelas, e.*, e.semester, f.*
    from tabel_mahasiswa a, tabel_matkul c, tabel_kelas d, tabel_semester e, tabel_jadwal f
    where a.id_kelas = d.id_kelas
    and d.id_kelas = f.id_kelas
    and a.id_semester = e.id_semester
    and e.id_semester = f.id_semester
    and c.id_matkul = f.id_matkul 
    and a.id_kelas = $kelas
    group by a.id_mahasiswa";

    $resultTampilKhsKelas = mysqli_query($con, $khsKelas);
    return $resultTampilKhsKelas;
}

function khsLihat($con)
{
    $khsLihat = "select distinct(a.id_mahasiswa), a.*, a.nim, 
    a.nama as nm_mahasiswa, c.*, SUM(c.sks) as sks, d.id_kelas, e.*, e.semester, f.*
    from tabel_mahasiswa a, tabel_matkul c, tabel_kelas d, tabel_semester e, tabel_jadwal f
    where a.id_kelas = d.id_kelas
    and d.id_kelas = f.id_kelas
    and a.id_semester = e.id_semester
    and e.id_semester = f.id_semester
    and c.id_matkul = f.id_matkul 
    group by a.id_mahasiswa";
    
    $resultTampilKhsLihat = mysqli_query($con, $khsLihat);
    return $resultTampilKhsLihat;
}

function cekSemester($con, $id_mahasiswa){
    $cekSemester="select a.*, b.*, a.id_semester from tabel_semester a, tabel_mahasiswa b 
    where a.id_semester=b.id_semester and b.id_mahasiswa = $id_mahasiswa";
    $resultCekSemester=mysqli_query($con, $cekSemester);
    $row=mysqli_fetch_assoc($resultCekSemester);
    return $row["id_semester"];
}

function khsNilai($con, $id_mahasiswa, $id_semester){
    $khsNilai = "select distinct(ROUND(SUM(c.sks * a.nilai)/SUM(c.sks),2)) as ip, a.*, b.*, c.*, d.*, e.* from tabel_khs a, 
    tabel_mahasiswa b, tabel_matkul c, tabel_jadwal d, tabel_semester e
    where a.id_mahasiswa = b.id_mahasiswa
    and d.id_matkul = c.id_matkul 
    and d.id_semester = e.id_semester
    and a.id_mahasiswa = $id_mahasiswa and d.id_semester = $id_semester group by a.id_mahasiswa";

    $resultTampilKhsNilai = mysqli_query($con, $khsNilai);
    if(mysqli_num_rows($resultTampilKhsNilai)>0){
        $rowKhsNilai = mysqli_fetch_assoc($resultTampilKhsNilai);
        return $rowKhsNilai["ip"];
    } else{
        return 0;
    }
}

function kelas($con){
    $kelas="select * from tabel_kelas";
    $resultKelas = mysqli_query($con, $kelas);
    return $resultKelas;
}

function tampilSemester($con){
    $semester="select * from tabel_semester";
    $resultSemester = mysqli_query($con, $semester);
    return $resultSemester;
}

function tampilKelas($con, $id_kelas){
    $kelas = "select a.*, b.* from tabel_kelas a, tabel_prodi b where a.id_prodi=b.id_prodi and a.id_kelas=$id_kelas";
    $resultKelas = mysqli_query($con, $kelas);  
    $row=mysqli_fetch_assoc($resultKelas);
    $hasil= $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"];
    return $hasil;
}

function tampilTahun($con){
    $tahun="select distinct(YEAR(waktu_edit)) as tahun from tabel_hasil_kuisioner order by waktu_edit desc limit 5";
    $resultTahun = mysqli_query($con, $tahun);
    return $resultTahun;
}

function dosen($con)
{
    $dosen = "select * from tabel_dosen";

    $resultDosen = mysqli_query($con,$dosen);
    return $resultDosen;
}

function matkul($con)
{
    $matkul = "select * from tabel_matkul";

    $resultMatkul = mysqli_query($con,$matkul);
    return $resultMatkul;
}

function minKelas($con){
	$minKelas = "select min(id_kelas) as minKelas from tabel_kelas";
	$resultMinKelas = mysqli_query($con, $minKelas);
	$rowMinKelas=mysqli_fetch_assoc($resultMinKelas);
	return $rowMinKelas["minKelas"];
}

function minSemester($con){
	$minSemester = "select min(id_semester) as minSemester from tabel_semester";
	$resultMinSemester = mysqli_query($con, $minSemester);
	$rowMinSemester=mysqli_fetch_assoc($resultMinSemester);
	return $rowMinSemester["minSemester"];
}

// Modal KHS LIHAT
if(isset($_POST["tampilDetailMhs"]) && isset($_POST["tampilDetailSemester"]))
{
    $id_mahasiswa = $_POST['tampilDetailMhs'];
    $id_semester = $_POST['tampilDetailSemester'];

    $detailMahasiswa="select distinct(c.id_matkul), a.id_mahasiswa, a.*, a.nim, 
    a.nama as nm_mahasiswa, c.*, c.sks, d.id_kelas, d.* ,e.*, e.semester, f.*, h.*, c.nama as nm_matkul
    from tabel_mahasiswa a, tabel_matkul c, tabel_kelas d, tabel_semester e, tabel_jadwal f, tabel_prodi h
    where a.id_kelas = d.id_kelas
    and d.id_kelas = f.id_kelas
    and h.id_prodi = d.id_prodi
    and a.id_semester = e.id_semester
    and e.id_semester = f.id_semester
    and c.id_matkul = f.id_matkul
    and a.id_semester = $id_semester
    and a.id_mahasiswa = $id_mahasiswa group by a.id_mahasiswa";

    $resultDetailMahasiswa = mysqli_query($con, $detailMahasiswa);
    
    if(mysqli_num_rows($resultDetailMahasiswa) == 0){}
        else{
            $no = 1;
            while ($row = mysqli_fetch_assoc($resultDetailMahasiswa)) {
                ?>    
                <div class="modal-body">
                    <div class ="isi-modaLihat border-bottom1 border-gray">
                    <p>Tahun Akademik : 2017/2018 Ganjil</p>
                    <p>Nama : <?php echo $row["nm_mahasiswa"]; ?></p>
                    <p>NIM : <?php echo $row["nim"]; ?></p>
                    <p>Kelas : <?php echo $row["kode"]." - ".$row["tingkat"].$row["kode_kelas"] ?></p>
                    <p>Prodi : <?php echo $row["nama"]; ?></p>
                </div> 
                <div id = "khsModal">
                <div class="media text-muted pt-8">
                <?php
                
                $nilai = "select distinct(c.id_matkul), a.id_mahasiswa, a.*, c.*, d.* ,e.*, e.semester, f.*, g.*, h.*, c.nama as nm_matkul
                from tabel_mahasiswa a, tabel_matkul c, tabel_kelas d, tabel_semester e, tabel_jadwal f, tabel_khs g, tabel_prodi h
                where a.id_kelas = d.id_kelas
                and d.id_kelas = f.id_kelas
                and h.id_prodi = d.id_prodi
                and a.id_semester = e.id_semester
                and a.id_semester = f.id_semester
                and c.id_matkul = f.id_matkul
                and g.id_matkul = f.id_matkul 
                and g.id_mahasiswa = a.id_mahasiswa
                and g.id_semester = $id_semester
                and g.id_mahasiswa = $id_mahasiswa";
                
                $resultTampilNilai = mysqli_query($con, $nilai);
                if(mysqli_num_rows($resultTampilNilai) > 0){
                ?>            
                <div class="media-body pb-8 mb-0">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Jam</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $index=1;
                        while($row1 = mysqli_fetch_assoc($resultTampilNilai)){
                        if($row1["nilai"]!=0){
                        ?>
                        <tr>
                            <td><?php echo $index;?></td>
                            <td><?php echo $row1["nm_matkul"];?></td>
                            <td><?php echo $row1["sks"];?></td>
                            <td><?php echo $row1["jam"];?></td>
                            <td><?php echo $row1["nilai"];?></td>
                        </tr>
                        <?php
                        } else{
                        ?>
                        <tr>
                            <td><?php echo $index;?></td>
                            <td><?php echo $row1["nm_matkul"];?></td>
                            <td><?php echo $row1["sks"];?></td>
                            <td><?php echo $row1["jam"];?></td>
                        <td><?php echo "Belum Diisi"; ?></td>
                        </tr>
                        <?php
                        }
                        $index++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    }else{
                    ?>
                    <div class='text-center'>
                        <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                        <p class='text-muted'>Data Nilai Masih Kosong</p>
                    </div>
                    <?php
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
    $no++;
}
// MODAL KHS LIHAT END

?>
