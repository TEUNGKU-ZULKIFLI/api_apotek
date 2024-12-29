<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_obat = $_POST['kode_obat'];
    $nama_obat = $_POST['nama_obat'];
    $stock = $_POST['stock'];
    $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];

    $query = "UPDATE daftar_obat SET nama_obat='$nama_obat', stock=$stock, tgl_kadaluarsa='$tgl_kadaluarsa' WHERE kode_obat=$kode_obat";

    if ($connect->query($query) === TRUE) {
        echo json_encode(["success" => true, "message" => "Data berhasil diperbarui"]);
    } else {
        echo json_encode(["success" => false, "message" => "Data gagal diperbarui: " . $connect->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}
?>
