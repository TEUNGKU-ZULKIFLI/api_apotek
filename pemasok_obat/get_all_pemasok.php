<?php
include '../conn.php';

$queryResult = $connect->query("SELECT kode_perusahaan, nama_perusahaan FROM pemasok");

$result = array();
while ($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);
?>
