<?php
include "../config/connection.php";

function jumlah($con, $tabel) {
  $jumlah = "select count(*) as jumlah from $tabel";
  $resultJumlah = mysqli_query($con, $jumlah);
  return $resultJumlah;
}

function hasilKuisioner($con) {
  $hasilKuisioner = "SELECT d.foto, d.nama, d.nip, SUM(hk.nilai) AS poin FROM tabel_hasil_kuisioner AS hk INNER JOIN tabel_dosen AS d ON hk.id_dosen = d.id_dosen GROUP BY hk.id_dosen ORDER BY poin DESC";
  $resultHasilKuisioner = mysqli_query($con, $hasilKuisioner);
  return $resultHasilKuisioner; 
}

function mahasiswaSp($con) {
  $mahasiswaSp = "SELECT m.foto, m.nama, p.kode, k.tingkat, k.kode_kelas, sm.keterangan, a.id_status_mahasiswa FROM tabel_absensi AS a INNER JOIN tabel_mahasiswa AS m ON m.id_mahasiswa = a.id_mahasiswa INNER JOIN tabel_status_mahasiswa AS sm ON a.id_status_mahasiswa = sm.id_status_mahasiswa INNER JOIN tabel_kelas AS k ON k.id_kelas = m.id_kelas INNER JOIN tabel_prodi AS p ON p.id_prodi = k.id_prodi WHERE a.id_status_mahasiswa = 1 OR a.id_status_mahasiswa = 2 OR a.id_status_mahasiswa = 3 ORDER BY a.id_status_mahasiswa DESC";
  $resultMahasiswaSp = mysqli_query($con, $mahasiswaSp);
  return $resultMahasiswaSp;
}
?>