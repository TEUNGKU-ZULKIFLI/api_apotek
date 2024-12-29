<?php
include '../conn.php';

$queryResult = $connect->query("SELECT * FROM stock_obat_in_out");

$result = array();
while ($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
}

echo json_encode($result);
?>
