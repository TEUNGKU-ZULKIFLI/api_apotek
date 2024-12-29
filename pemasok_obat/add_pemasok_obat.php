<?php
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $email = $_POST['email'];
    $no_kontak = $_POST['no_kontak'];

    $query = "INSERT INTO pemasok (nama_perusahaan, alamat_perusahaan, email, no_kontak) VALUES ('$nama_perusahaan', '$alamat_perusahaan', '$email', '$no_kontak')";

    if ($connect->query($query) === TRUE) {
        echo json_encode(["success" => true, "message" => "Data berhasil ditambahkan"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menambahkan data: " . $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}
?>
