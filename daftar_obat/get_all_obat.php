<?php
include '../conn.php';

$queryResult = $connect->query("SELECT kode_obat, nama_obat FROM daftar_obat");

$result = array();
while ($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);
?>
