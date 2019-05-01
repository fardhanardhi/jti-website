<?php
header('Content-Type: application/json');
include '../config/connection.php';

$query = "SELECT MONTH(waktu) AS bulan, COUNT(*) AS jumlah FROM tabel_info GROUP BY MONTH(waktu) ORDER BY bulan ASC";

$result = mysqli_query($con, $query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>