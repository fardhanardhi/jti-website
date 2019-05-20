<?php
header('Content-Type: application/json');
include '../config/connection.php';

$query = "SELECT id_prodi AS prodi, COUNT(*) AS jumlah, YEAR(waktu_tambah) AS tahun FROM tabel_mahasiswa GROUP BY prodi, tahun ORDER BY tahun ASC LIMIT 6";

$result = mysqli_query($con, $query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>