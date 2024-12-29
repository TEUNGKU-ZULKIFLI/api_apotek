<?php

$connect = new mysqli("localhost", "root", "", "app_apotek");

if ($connect->connect_error) {
    echo "Connection Failed: " . $connect->connect_error;
    exit();
}

?>
