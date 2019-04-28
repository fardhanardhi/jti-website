<?php
header('Content-Type: application/json');
include '../config/connection.php';

$query = "SELECT m.id_prodi AS prodi, SUM(k.jumlah_jam) AS jumlah, YEAR(k.waktu) AS tahun FROM tabel_kompen AS k INNER JOIN tabel_mahasiswa AS m ON m.id_mahasiswa = k.id_mahasiswa GROUP BY prodi, YEAR(k.waktu) ORDER BY tahun ASC LIMIT 6";

$result = mysqli_query($con, $query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>