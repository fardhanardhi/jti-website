<?php
header('Content-Type: application/json');
include '../config/connection.php';

$query = "SELECT MONTH(waktu_publish) AS bulan, COUNT(*) AS jumlah FROM tabel_info GROUP BY MONTH(waktu_publish) ORDER BY bulan ASC";

$result = mysqli_query($con, $query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>