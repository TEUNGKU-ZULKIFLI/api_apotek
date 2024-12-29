<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_obat = $_POST['nama_obat'];
    $stock = $_POST['stock'];
    $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];

    $query = "INSERT INTO daftar_obat (nama_obat, stock, tgl_kadaluarsa) VALUES ('$nama_obat', $stock, '$tgl_kadaluarsa')";

    if ($connect->query($query) === TRUE) {
        echo json_encode(["success" => true, "message" => "Data berhasil ditambahkan"]);
    } else {
        echo json_encode(["success" => false, "message" => "Data gagal ditambahkan: " . $connect->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}
?>
