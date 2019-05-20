<?php
header('Content-Type: application/json');
include '../config/connection.php';

$query = "SELECT YEAR(waktu_tambah) AS tahun, COUNT(*) AS jumlah FROM tabel_dosen GROUP BY YEAR(waktu_tambah) ORDER BY tahun ASC LIMIT 6";

$result = mysqli_query($con, $query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>