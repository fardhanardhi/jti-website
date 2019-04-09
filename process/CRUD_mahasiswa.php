<?php
include "../config/connection.php";

$module = $_GET['module'];
$proses = $_GET['act'];

if ($module == 'mahasiswa' && $proses == 'input') {
  mysqli_query($con, "insert into tabel_mahasiswa(id_prodi, id_kelas, username, Nim, password, nama_mahasiswa, alamat, jenis_kelamin, ttl, gambar) values('$_POST[id_prodi]', '$_POST[id_kelas]', '$_POST[username]', '$_POST[Nim]', '$_POST[password]', '$_POST[nama_mahasiswa]', '$_POST[alamat]', '$_POST[jenis_kelamin]', '$_POST[ttl]', '$_POST[gambar]')");

  header('location:../module/index.php?module=' . $module);
} else if ($module == 'mahasiswa' && $proses == 'update') {
  mysqli_query($con, "update mahasiswa set id_prodi='$_POST[id_prodi]', id_kelas='$_POST[id_kelas]', username='$_POST[username]', Nim='$_POST[Nim]', password='$_POST[password]', nama_mahasiswa='$_POST[nama_mahasiswa]', alamat='$_POST[alamat]', jenis_kelamin='$_POST[jenis_kelamin]', ttl='$_POST[ttl]', gambar='$_POST[gambar]' where id_mahasiswa='$_POST[id_mahasiswa]'");

  header('location:../module/index.php?module=' . $module);
} else if ($module == 'mahasiswa' && $proses == 'delete') {
  $query = "delete from mahasiswa where id_mahasiswa=$_GET[id]";

  header('location:../module/index.php?module=' . $module);
}
