<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $no_hp = $_POST['no_hp'];

    $query = "INSERT INTO staf_apotek (nama, alamat, tgl_lahir, tmp_lahir, no_hp) VALUES ('$nama', '$alamat', '$tgl_lahir', '$tmp_lahir', '$no_hp')";

    if ($connect->query($query) === TRUE) {
        echo json_encode(["success" => true, "message" => "Data berhasil ditambahkan"]);
    } else {
        echo json_encode(["success" => false, "message" => "Data gagal ditambahkan: " . $connect->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}
?>
